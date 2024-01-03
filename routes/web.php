<?php

use App\Blueprint\Facades\RouteServer;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

//Admin routes
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'CustomMiddlewares']], function () {

    Route::group(['prefix' => 'api', 'namespace' => 'Auth'], function () {
        Route::get('getpackages','LoginController@packages');
    });
    // Api Routes
    Route::group(['prefix' => 'api', 'middleware' => 'Routeserver:shared'], function () {
        Route::post('/', 'Api\ApiController@index')->name('api');
        Route::post('user', 'Api\ApiUser@index')->name('user.api');
        Route::post('local', 'Api\ApiLocal@index')->name('local.api');
        Route::post('system', 'Api\ApiSystem@index')->name('system.api');
        Route::post('utils', 'Api\ApiUtils@index')->name('utils.api');
    });
    // Common Authentication Routes
    Route::group(['middleware' => "Routeserver:user"], function () {
        Auth::routes();
    });

    Route::get("/referall/{id}",'User\Profile\ProfileController@referall')->name('referall');
    //RouteServer::authRoutes('shared.', ['middleware' => "Routeserver:shared"]);
    foreach (getScopes() as $scope) {

        RouteServer::authRoutes($scope, ['middleware' => "Routeserver:$scope"]);
        Route::group(['namespace' => 'Payment', 'prefix' => $scope . '/payment', 'middleware' => ["Routeserver:$scope"]], function () use ($scope) {
            Route::post('', 'PaymentController@handle')->name($scope . '.payment.handler');
            Route::any('callBack', 'PaymentController@callBack')->name($scope . '.payment.callback');
            Route::any('getGateways', 'PaymentController@getGateways')->name($scope . '.getGateways');
            Route::any('getGatewayitem', 'PaymentController@getGatewayitem')->name($scope . '.getGatewayitem');
        });
    }

    //lockScreen
    foreach (getScopes()->except('shared') as $scope) {
        Route::group(['middleware' => 'auth', 'prefix' => $scope], function () use ($scope) {
            Route::get('lockScreen', 'Auth\LockAccountController@lockScreen')->name($scope . '.lockScreen');
            Route::post('lockScreen', 'Auth\LockAccountController@unlock')->name($scope . '.unlock');
        });
    }

    //login as user
    Route::group(['middleware' => 'auth'], function () {
        Route::get('user/loginBackToAdmin', 'Misc\LoginAsUserController@loginBack');
        Route::get('admin/loginAsUser', 'Misc\LoginAsUserController@loginAsUser')->name('admin.loginAsUser');
    });

    Route::get('/', function () {
        if (session()->has('theScope') && is_string(session()->has('theScope'))) {
            return redirect()->route(session('theScope') . 'Home');
        } else {
            if (isAdmin()) {
                return redirect()->route('admin.login');
            } else {
                return redirect()->route('user.login');
            }
        }
    });

    Route::get('home', function () {

        return redirect()->route(loggedUser()->userType->title . '.home');
    })->name('home')->middleware(['auth', 'CustomMiddlewares', 'Routeserver']);

    // Routes which are to be authenticated
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['CustomMiddlewares', 'lock', 'Routeserver:admin']], function () {
        Route::group(['middleware' => 'auth'], function () {
            //  Route::get('/', 'IndexController@index')->name('adminIndex');
            Route::group(['prefix' => 'security', 'namespace' => 'Security'], function () {
                Route::post('securityPin/validate', 'SecurityController@validatePin')
                    ->name("securityPin.validate");
            });
            Route::get('home', 'IndexController@index')->name('admin.home');
            Route::post('dashboardUnit', 'IndexController@requestUnit')->name('dashboard.unit');
            // Management section
            Route::group(['namespace' => 'Management', 'prefix' => 'manage'], function () {
                // Member management
                Route::group(['prefix' => 'members'], function () {
                    Route::get('/{user?}', 'MemberController@index')->name('management.members');
                    Route::post('/requestUnit', 'MemberController@requestUnit')->name('management.members.unit');
                    Route::post('profileProfile', 'MemberController@profileProfile')->name('management.members.profileProfile');
                    Route::post('profilePassword', 'MemberController@profilePassword')->name('management.members.profilePassword');
                    Route::post('profileSocial', 'MemberController@profileSocial')->name('management.members.profileSocial');
                    Route::post('profilePayout', 'MemberController@profilePayout')->name('management.members.profilePayout');
                    Route::post('transactions', 'MemberController@Transactions')->name('management.members.transactions');
                    Route::post('advanceSearchFilter', 'MemberController@filter')->name('management.members.filter');
                    Route::post('profileUsername', 'MemberController@profileUsername')->name('management.members.profileUsername');
                });
                // Task management
                Route::group(['prefix' => 'tasks'], function () {
                    Route::get('/', 'TaskController@index');
                    Route::post('getTasks', 'TaskController@getTasks')->name('admin.tasks.view');
                    Route::post('getTask', 'TaskController@getTask')->name('admin.task.view');
                    Route::post('deleteTask', 'TaskController@deleteTask')->name('admin.tasks.delete');
                    Route::post('getOperation', 'TaskController@operationData')
                        ->name('admin.task.operation.view');
                    Route::post('operationHistory', 'TaskController@operationHistory')
                        ->name('admin.task.history.view');
                });
                Route::get('pendingRegistration', 'PendingRegistrationController@index')->name('management.pendingRegistration');
                Route::post('pendingRegistrationList', 'PendingRegistrationController@getList')->name('management.pendingRegistrationList');
                Route::post('pendingRegistrationDetails', 'PendingRegistrationController@getDetails')->name('management.pendingRegistration.getDetails');
                Route::post('pendingRegistrationActivate', 'PendingRegistrationController@activate')->name('management.pendingRegistrationActivate');
            });
            // Settings pages
            Route::group(['namespace' => 'Settings', 'prefix' => 'settings'], function () {
                Route::get('reset', 'ResetController@reset')->name('admin.reset');
                //Modules
                Route::group(['prefix' => 'modules'], function () {
                    Route::get('/', 'ModuleController@index')->name('admin.module');
                    Route::post('/', 'ModuleController@install')->name('admin.module.install');
                    Route::get('/list', 'ModuleController@moduleList')->name('admin.module.list');
                    Route::post('upload', 'ModuleController@upload')->name('admin.module.upload');
                    Route::post('activate', 'ModuleController@activate')->name('admin.module.activate');
                    Route::post('deactivate', 'ModuleController@deactivate')->name('admin.module.deactivate');
                    Route::match(['get', 'post'], '/{id}/configure', 'ModuleController@configure')->name('admin.module.configure');
                    Route::post('uninstall', 'ModuleController@uninstall')->name('admin.module.uninstall');
                    Route::post('save', 'ModuleController@saveData')->name('admin.module.save');
                });
                //Themes
                Route::group(['prefix' => 'themes'], function () {
                    Route::get('/', 'ThemeController@index')->name('admin.theme');
                    Route::post('/', 'ThemeController@install')->name('admin.theme.install');
                    Route::post('upload', 'ThemeController@upload')->name('admin.theme.upload');
                    Route::post('activate', 'ThemeController@activate')->name('admin.theme.activate');
                    Route::post('deactivate', 'ThemeController@deactivate')->name('admin.theme.deactivate');
                    Route::match(['get', 'post'], '/{id}/configure', 'ThemeController@configure')->name('admin.theme.configure');
                    Route::post('uninstall', 'ThemeController@uninstall')->name('admin.theme.uninstall');
                    Route::post('save', 'ThemeController@saveData')->name('admin.theme.save');
                    Route::post('preview', 'ThemeController@preview')->name('admin.theme.preview');
                    Route::post('savelayout', 'ThemeController@saveLayout')->name('admin.theme.savelayout');
                });
                //Menus
                Route::group(['prefix' => 'menus'], function () {
                    Route::get('/', 'MenuController@index')->name('admin.menu');
                    Route::post('list', 'MenuController@listMenu')->name('admin.menu.list');
                    Route::post('insert', 'MenuController@insert')->name('admin.menu.insert');
                    Route::post('update', 'MenuController@update')->name('admin.menu.update');
                    Route::post('delete', 'MenuController@delete')->name('admin.menu.delete');
                });
                //package
                //removed " Routeserver:shared"
                Route::group(['prefix' => 'package', 'middleware' => ['auth']], function () {
                    Route::get('/', 'PackageController@index')->name('package');
                    Route::post('store', 'PackageController@store')->name('package.store');
                    Route::get('packageForm/{id?}', 'PackageController@getForm')->name('package.form');
                    Route::get('packageList', 'PackageController@getList')->name('package.list');
                    Route::get('show/{type?}', 'PackageController@showPackages')->name('package.show');
                    Route::post('changeStatus', 'PackageController@changeStatus')->name('package.changeStatus');
                });
                //global config
                Route::group(['prefix' => 'global'], function () {
                    Route::get('/', 'GlobalController@index')->name('global.config');
                    Route::post('save', 'GlobalController@saveConfig')->name('global.config.save');
                });
                //Config fields
                Route::group(['prefix' => 'fields'], function () {
                    Route::get('/', 'ConfigFieldsController@index')->name('config.fields');
                    Route::any('fieldForm', 'ConfigFieldsController@fieldForm')->name('config.fieldForm');
                    Route::post('grouphandler', 'ConfigFieldsController@groupHandler')->name('config.group.handler');
                    Route::post('taghandler', 'ConfigFieldsController@tagHandler')->name('config.tag.handler');
                    Route::post('fieldhandler', 'ConfigFieldsController@fieldHandler')->name('config.field.handler');
                });
                //Easy Routes
                Route::group(['prefix' => 'easyroutes'], function () {
                    Route::get('/', 'EasyRoutesController@index')->name('easyroutes');
                    Route::post('save', 'EasyRoutesController@action')->name('easyroutes.action');
                });
                Route::group(['prefix' => 'currency'], function () {
                    Route::get('/', 'LocalisationController@manageCurrency')->name('manage.currency');
                    Route::get('getCurrencyTable', 'LocalisationController@getCurrencyTable')->name('currency.table');
                    Route::post('getCurrencyForm', 'LocalisationController@getCurrencyForm')->name('currency.Form');
                    Route::post('saveCurrency', 'LocalisationController@saveCurrency')->name('currency.save');
                    Route::post('disableCurrency', 'LocalisationController@disableCurrency')->name('currency.disable');
                    Route::post('enableCurrency', 'LocalisationController@enableCurrency')->name('currency.enable');

                });

                Route::group(['prefix' => 'localisation'], function () {
                    Route::get('/', 'LocalisationController@index')->name('localisation.settings');
                });

                Route::group(['prefix' => 'cron'], function () {
                    Route::get('/', 'CronController@index')->name('cron');
                    Route::get('jobList', 'CronController@cronJobs')->name('cron.jobList');
                    Route::get('form', 'CronController@form')->name('cron.form');
                    Route::post('getJob', 'CronController@getCronJob')->name('cron.getCronJob');
                    Route::post('deleteCronJob', 'CronController@deleteCronJob')->name('cron.deleteCronJob');
                    Route::get('info', 'CronController@info')->name('cron.info');
                    Route::post('updateCronEmail', 'CronController@updateCronEmail')->name('cron.email.update');
                    Route::post('save', 'CronController@saveForm')->name('cron.save');
                });
            });
            //Profile section
            Route::group(['namespace' => 'Profile', 'prefix' => 'profile'], function () {
                Route::get('/', 'ProfileController@index')->name('admin.profile');
                Route::post('update', 'ProfileController@update')->name('admin.profile.update');
                Route::get('user/{id}', 'ProfileController@userprofile');
                Route::post('user/saveProfilePicture', 'ProfileController@saveProfilePic')->name('admin.profile.saveProfileImage');

                Route::post('user/requestUnit', 'ProfileController@requestUnit')->name('admin.profile.requestUnit');
            });
            Route::group(['namespace' => 'Utils', 'prefix' => 'utils'], function () {
                Route::group(['prefix' => 'optimizer'], function () {
                    Route::get('cache', 'OptimizerController@cache')->name('optimizer.cache');
                    Route::post('clearCache', 'OptimizerController@clearCache')->name('optimizer.cache.clear');
                    Route::post('refreshCache', 'OptimizerController@refreshCache')->name('optimizer.cache.refresh');
                });
            });
            //Mail management
            Route::group(['namespace' => 'Mail', 'prefix' => 'mail'], function () {
                Route::get('/', 'MailController@index')->name('admin.mail');
                Route::get('mailbox/', 'MailController@mailBox')->name('admin.mail.mailbox');
                Route::post('viewer/{mail}', 'MailController@mailReader')
                    ->name('admin.mail.mailreader');
                Route::post('handle', 'MailController@handleMail')->name('admin.mail.handle');
                Route::post('attachment', 'MailController@attachment')
                    ->name('admin.mail.attachment');
                Route::get('test', 'MailController@testMail');
            }
            );


            //notification section
            Route::group(['namespace' => 'Notification', 'prefix' => 'notification'], function () {
                Route::get('/', 'NotificationController@index')->name('admin.notification');
                Route::any('notificationList', 'NotificationController@getNotificationList')->name("admin.notification.list");
                Route::get('send', 'NotificationController@sendNotificationIndex')->name("admin.notification.send.index");
                Route::post('sendNotification', 'NotificationController@sendNotification')->name("admin.notification.send");

            });

            Route::get('systemRefresh', 'RefreshController@systemRefresh')->name('admin.systemRefresh');
            Route::get('testRun/{operation?}', 'RefreshController@testRun');

            Route::get('setupDemo', 'PresetDemoController@setupDemo');
        });
    });

    Route::group(['namespace' => 'Employee', 'prefix' => 'employee', 'middleware' => ['CustomMiddlewares', 'lock', 'Routeserver:employee']], function () {
        Route::group(['middleware' => 'auth'], function () {
            Route::get('home', 'IndexController@index')->name('employee.home');
            Route::post('dashboardUnit', 'IndexController@requestUnit')->name('employee.dashboard.unit');
            // Management section
            Route::group(['namespace' => 'Management', 'prefix' => 'manage'], function () {
                // Member management
                Route::group(['prefix' => 'members'], function () {
                    Route::get('/{user?}', 'MemberController@index')->name('employee.management.members');
                    Route::post('/requestUnit', 'MemberController@requestUnit')->name('employee.management.members.unit');
                    Route::post('profileProfile', 'MemberController@profileProfile')->name('employee.management.members.profileProfile');
                    Route::post('profilePassword', 'MemberController@profilePassword')->name('employee.management.members.profilePassword');
                    Route::post('profileSocial', 'MemberController@profileSocial')->name('employee.management.members.profileSocial');
                    Route::post('profilePayout', 'MemberController@profilePayout')->name('employee.management.members.profilePayout');
                });

                Route::get('pendingRegistration', 'PendingRegistrationController@index')->name('employee.management.pendingRegistration');
                Route::post('pendingRegistrationList', 'PendingRegistrationController@getList')->name('employee.management.pendingRegistrationList');
                Route::post('pendingRegistrationDetails', 'PendingRegistrationController@getDetails')->name('employee.management.pendingRegistration.getDetails');
                Route::post('pendingRegistrationActivate', 'PendingRegistrationController@activate')->name('employee.management.pendingRegistrationActivate');
            });

            //Profile section
            Route::group(['namespace' => 'Profile', 'prefix' => 'profile'], function () {
                Route::get('/', 'ProfileController@index')->name('employee.profile');
                Route::post('update', 'ProfileController@update')->name('employee.profile.update');
                Route::get('user/{id}', 'ProfileController@userprofile');
                Route::post('user/saveProfilePicture', 'ProfileController@saveProfilePic')->name('employee.profile.saveProfileImage');
                Route::post('user/requestUnit', 'ProfileController@requestUnit')->name('employee.profile.requestUnit');
            });


            //Mail management
            Route::group(['namespace' => 'Mail', 'prefix' => 'mail'], function () {
                Route::get('/', 'MailController@index')->name('employee.mail');
                Route::get('mailbox/', 'MailController@mailBox')->name('employee.mail.mailbox');
                Route::post('viewer/{mail}', 'MailController@mailReader')
                    ->name('employee.mail.mailreader');
                Route::post('handle', 'MailController@handleMail')->name('employee.mail.handle');
                Route::post('attachment', 'MailController@attachment')
                    ->name('employee.mail.attachment');
                Route::get('test', 'MailController@testMail');
            });
        });
    });

    // User's routes
    Route::group(['namespace' => 'User', 'prefix' => 'user', 'middleware' => ['CustomMiddlewares', 'lock', 'CheckForMaintenanceMode', 'Routeserver:user']], function () {
        Route::group(['middleware' => 'auth'], function () {
            // Route::get('/', 'IndexController@index')->name('userIndex');
            Route::get('home', 'IndexController@index')->name('user.home');
            Route::post('transactionTable', 'IndexController@transactionTable')->name('user.transaction');
            Route::post('dashboardUnit', 'IndexController@requestUnit')->name('user.dashboard.unit');
            Route::post('dashboardauto','IndexController@change_autoplace')->name('user.dashboard.autoplace');
            //Mail management
            Route::group(['namespace' => 'Mail', 'prefix' => 'mail'], function () {
                Route::get('/', 'MailController@index')->name('user.mail');
                Route::get('mailbox/', 'MailController@mailBox')->name('user.mail.mailbox');
                Route::post('viewer/{mail}', 'MailController@mailReader')
                    ->name('user.mail.mailreader');
                Route::post('handle', 'MailController@handleMail')->name('user.mail.handle');
                Route::post('attachment', 'MailController@attachment')
                    ->name('user.mail.attachment');
                Route::get('test', 'MailController@testMail');
            });

            //XOOM section
            Route::group(['namespace' => 'Xoom', 'prefix' => 'xoom'], function () {
                Route::get('/', 'XoomController@index')->name('user.xoom.home');
            });

            //Profile section
            Route::group(['namespace' => 'Profile', 'prefix' => 'profile'], function () {
                Route::get('/', 'ProfileController@index')->name('user.profile');
                Route::get("referall/{id}",'ProfileController@referall');
                Route::post('update', 'ProfileController@update')->name('user.profile.update');
                Route::get('user/{id}', 'ProfileController@userprofile');
                Route::post('user/saveProfilePicture', 'ProfileController@saveProfilePic')->name('user.profile.saveProfileImage');
                Route::post('user/requestUnit', 'ProfileController@requestUnit')->name('user.profile.requestUnit');
            });


            Route::group(['namespace' => 'Profile', 'prefix' => 'personalinfo'], function () {
                Route::post('/update', 'ProfileController@update')->name('user.update');
                Route::any('/', 'ProfileController@personalinfo')->name('user.personalinfo');
                Route::any('/expirepayment','ProfileController@expirepayment')->name('user.expirepayment');

            });

            Route::group(['namespace'=>'Profile','prefix'=>'tool'],function(){
                Route::get('/','ProfileController@tool')->name('user.tool');
                Route::get('/report','ProfileController@report')->name('user.report');
                Route::get('/email','ProfileController@email')->name('user.email');
                Route::get('/wallet','ProfileController@wallet')->name('user.wallet');
                Route::get('/withdraw','ProfileController@withdraw')->name('user.withdraw');

            });
            //notification section
            Route::group(['namespace' => 'Notification', 'prefix' => 'notification'], function () {
                Route::get('/', 'NotificationController@index')->name('user.notification');
                Route::post('notificationList', 'NotificationController@getNotificationList')->name("user.notification.list");
                Route::post('delete', 'NotificationController@delete')->name("user.notification.delete");
            });


            //Tree
            Route::group(['namespace' => 'Tree', 'prefix' => 'tree'], function () {
                Route::get('diagram/{treetype}/{type}/{id?}', 'TreeController@treeRouter')->name('treeRouter');
                Route::get('list/{treetype}/{type}/{id?}/{level?}', 'TreeController@treeListRouter')->name('treeListRouter');
                Route::get('listPartial/{treetype}/{type}/{id?}/{level?}', 'TreeController@getList')->name('getTreeList');
            });
        });
    });

    //Order placement routes
    Route::group(['namespace' => 'Order', 'prefix' => 'order', 'middleware' => ['Routeserver:shared']], function () {
        Route::get('invoice', 'OrderController@invoice')->name('invoice');
        //Cart routes
        Route::group(['prefix' => 'cart'], function () {
            Route::get('', 'CartController@index')->name('cart');
            Route::get('summary', 'CartController@cartSummary')->name('cart.summary');
            Route::get("payment",'CartController@payment')->name('cart.payment');
            Route::post('add', 'CartController@add')->name('cart.add');
            Route::post('getCartTotal', 'CartController@getCartTotal')->name('cart.getCartTotal');
            Route::post('delete', 'CartController@delete')->name('cart.delete');
            Route::post('clear', 'CartController@clear')->name('cart.clear');
        });
        Route::get('invoice/{id}', 'OrderController@invoice')->name('invoice');
    });

    //Misc
    Route::group(['namespace' => 'Misc', 'prefix' => 'misc', 'middleware' => 'Routeserver:shared'], function () {
        Route::get('icons/font', 'IconsController@font');
        Route::get('icons/image', 'IconsController@image');
        Route::get('bookmarks/view', 'BookmarksController@bookmarksManagerView')->name('bookmarks.view');
        Route::post('bookmarks/add', 'BookmarksController@addBookmark')->name('bookmarks.add');
        Route::post('bookmarks/remove', 'BookmarksController@removeBookmark')->name('bookmarks.remove');
        Route::post('attachments/add', 'AttachmentController@insert')->name('attachment.add');
        Route::get('information/view/{page?}', 'InformationController@viewPage')->name('information.view');
        Route::post('information/download/{page?}', 'InformationController@downloadPage')->name('information.download');
        Route::post('information/print/{page?}', 'InformationController@printPage')->name('information.print');
    });
});
