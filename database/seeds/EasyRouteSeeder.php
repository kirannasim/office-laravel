<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EasyRouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('easy_routes')->insert([
            [
                'id' => 1,
                'route_name' => 'login',
                'route_uri' => 'login',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\LoginController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 2,
                'route_name' => 'company.login',
                'route_uri' => 'company/login',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\LoginController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 3,
                'route_name' => 'admin.login',
                'route_uri' => 'admin/login',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\LoginController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 4,
                'route_name' => 'user.login',
                'route_uri' => 'user/login',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\LoginController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 5,
                'route_name' => 'employee.login',
                'route_uri' => 'employee/login',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\LoginController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 6,
                'route_name' => 'shared.login',
                'route_uri' => 'shared/login',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\LoginController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 7,
                'route_name' => 'admin.loginAsUser',
                'route_uri' => 'admin/loginAsUser',
                'route_controller' => 'App\\Http\\Controllers\\Misc\\LoginAsUserController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 8,
                'route_name' => 'register',
                'route_uri' => 'register',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\RegisterController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 9,
                'route_name' => 'company.register',
                'route_uri' => 'company/register',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\RegisterController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 10,
                'route_name' => 'company.register.preview',
                'route_uri' => 'company/register/preview/{id}',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\RegisterController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 11,
                'route_name' => 'company.register.gateways',
                'route_uri' => 'company/register/gateways',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\RegisterController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 12,
                'route_name' => 'company.register.packages',
                'route_uri' => 'company/register/packages/{style?}',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\RegisterController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 13,
                'route_name' => 'admin.register',
                'route_uri' => 'admin/register',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\RegisterController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 14,
                'route_name' => 'admin.register.preview',
                'route_uri' => 'admin/register/preview/{id}',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\RegisterController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 15,
                'route_name' => 'admin.register.gateways',
                'route_uri' => 'admin/register/gateways',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\RegisterController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 16,
                'route_name' => 'admin.register.packages',
                'route_uri' => 'admin/register/packages/{style?}',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\RegisterController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 17,
                'route_name' => 'user.register',
                'route_uri' => 'user/register',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\RegisterController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 18,
                'route_name' => 'user.register.preview',
                'route_uri' => 'user/register/preview/{id}',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\RegisterController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 19,
                'route_name' => 'user.register.gateways',
                'route_uri' => 'user/register/gateways',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\RegisterController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 20,
                'route_name' => 'user.register.packages',
                'route_uri' => 'user/register/packages/{style?}',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\RegisterController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 21,
                'route_name' => 'employee.register',
                'route_uri' => 'employee/register',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\RegisterController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 22,
                'route_name' => 'employee.register.preview',
                'route_uri' => 'employee/register/preview/{id}',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\RegisterController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 23,
                'route_name' => 'employee.register.gateways',
                'route_uri' => 'employee/register/gateways',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\RegisterController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 24,
                'route_name' => 'employee.register.packages',
                'route_uri' => 'employee/register/packages/{style?}',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\RegisterController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 25,
                'route_name' => 'shared.register',
                'route_uri' => 'shared/register',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\RegisterController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 26,
                'route_name' => 'shared.register.preview',
                'route_uri' => 'shared/register/preview/{id}',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\RegisterController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 27,
                'route_name' => 'shared.register.gateways',
                'route_uri' => 'shared/register/gateways',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\RegisterController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 28,
                'route_name' => 'shared.register.packages',
                'route_uri' => 'shared/register/packages/{style?}',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\RegisterController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 29,
                'route_name' => 'home',
                'route_uri' => 'home',
                'route_controller' => 'Closure',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 30,
                'route_name' => 'admin.home',
                'route_uri' => 'admin/home',
                'route_controller' => 'App\\Http\\Controllers\\Admin\\IndexController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 31,
                'route_name' => 'employee.home',
                'route_uri' => 'employee/home',
                'route_controller' => 'App\\Http\\Controllers\\Employee\\IndexController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 32,
                'route_name' => 'user.home',
                'route_uri' => 'user/home',
                'route_controller' => 'App\\Http\\Controllers\\User\\IndexController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 33,
                'route_name' => 'management.pendingRegistration',
                'route_uri' => 'admin/manage/pendingRegistration',
                'route_controller' => 'App\\Http\\Controllers\\Admin\\Management\\PendingRegistrationController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 34,
                'route_name' => 'employee.management.pendingRegistration',
                'route_uri' => 'employee/manage/pendingRegistration',
                'route_controller' => 'App\\Http\\Controllers\\Employee\\Management\\PendingRegistrationController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 35,
                'route_name' => 'company.logout',
                'route_uri' => 'company/logout',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\LoginController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 36,
                'route_name' => 'admin.logout',
                'route_uri' => 'admin/logout',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\LoginController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 37,
                'route_name' => 'user.logout',
                'route_uri' => 'user/logout',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\LoginController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 38,
                'route_name' => 'employee.logout',
                'route_uri' => 'employee/logout',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\LoginController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 39,
                'route_name' => 'shared.logout',
                'route_uri' => 'shared/logout',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\LoginController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 40,
                'route_name' => 'management.members',
                'route_uri' => 'admin/manage/members/{user?}',
                'route_controller' => 'App\\Http\\Controllers\\Admin\\Management\\MemberController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 41,
                'route_name' => 'employee.management.members',
                'route_uri' => 'employee/manage/members/{user?}',
                'route_controller' => 'App\\Http\\Controllers\\Employee\\Management\\MemberController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 42,
                'route_name' => 'admin.mail',
                'route_uri' => 'admin/mail',
                'route_controller' => 'App\\Http\\Controllers\\Admin\\Mail\\MailController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 43,
                'route_name' => 'admin.mail.mailbox',
                'route_uri' => 'admin/mail/mailbox',
                'route_controller' => 'App\\Http\\Controllers\\Admin\\Mail\\MailController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 44,
                'route_name' => 'employee.mail',
                'route_uri' => 'employee/mail',
                'route_controller' => 'App\\Http\\Controllers\\Employee\\Mail\\MailController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 45,
                'route_name' => 'employee.mail.mailbox',
                'route_uri' => 'employee/mail/mailbox',
                'route_controller' => 'App\\Http\\Controllers\\Employee\\Mail\\MailController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 46,
                'route_name' => 'user.mail',
                'route_uri' => 'user/mail',
                'route_controller' => 'App\\Http\\Controllers\\User\\Mail\\MailController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 47,
                'route_name' => 'user.mail.mailbox',
                'route_uri' => 'user/mail/mailbox',
                'route_controller' => 'App\\Http\\Controllers\\User\\Mail\\MailController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 48,
                'route_name' => 'admin.module.configure',
                'route_uri' => 'admin/settings/modules/{id}/configure',
                'route_controller' => 'App\\Http\\Controllers\\Admin\\Settings\\ModuleController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 49,
                'route_name' => 'admin.theme.configure',
                'route_uri' => 'admin/settings/themes/{id}/configure',
                'route_controller' => 'App\\Http\\Controllers\\Admin\\Settings\\ThemeController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 50,
                'route_name' => 'global.config',
                'route_uri' => 'admin/settings/global',
                'route_controller' => 'App\\Http\\Controllers\\Admin\\Settings\\GlobalController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 51,
                'route_name' => 'config.fields',
                'route_uri' => 'admin/settings/fields',
                'route_controller' => 'App\\Http\\Controllers\\Admin\\Settings\\ConfigFieldsController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 52,
                'route_name' => 'config.fieldForm',
                'route_uri' => 'admin/settings/fields/fieldForm',
                'route_controller' => 'App\\Http\\Controllers\\Admin\\Settings\\ConfigFieldsController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 53,
                'route_name' => 'password.request',
                'route_uri' => 'password/reset',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 54,
                'route_name' => 'password.reset',
                'route_uri' => 'password/reset/{token}',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 55,
                'route_name' => 'company.password.request',
                'route_uri' => 'company/password/reset',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\Auth\\ForgotPasswordController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 56,
                'route_name' => 'company.password.reset',
                'route_uri' => 'company/password/reset/{token}',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\Auth\\ResetPasswordController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 57,
                'route_name' => 'admin.password.request',
                'route_uri' => 'admin/password/reset',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\Auth\\ForgotPasswordController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 58,
                'route_name' => 'admin.password.reset',
                'route_uri' => 'admin/password/reset/{token}',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\Auth\\ResetPasswordController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 59,
                'route_name' => 'user.password.request',
                'route_uri' => 'user/password/reset',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\Auth\\ForgotPasswordController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 60,
                'route_name' => 'user.password.reset',
                'route_uri' => 'user/password/reset/{token}',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\Auth\\ResetPasswordController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 61,
                'route_name' => 'employee.password.request',
                'route_uri' => 'employee/password/reset',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\Auth\\ForgotPasswordController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 62,
                'route_name' => 'employee.password.reset',
                'route_uri' => 'employee/password/reset/{token}',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\Auth\\ResetPasswordController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 63,
                'route_name' => 'shared.password.request',
                'route_uri' => 'shared/password/reset',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\Auth\\ForgotPasswordController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 64,
                'route_name' => 'shared.password.reset',
                'route_uri' => 'shared/password/reset/{token}',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\Auth\\ResetPasswordController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 65,
                'route_name' => 'package',
                'route_uri' => 'admin/settings/package',
                'route_controller' => 'App\\Http\\Controllers\\Admin\\Settings\\PackageController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 66,
                'route_name' => 'package.form',
                'route_uri' => 'admin/settings/package/packageForm/{id?}',
                'route_controller' => 'App\\Http\\Controllers\\Admin\\Settings\\PackageController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 67,
                'route_name' => 'package.list',
                'route_uri' => 'admin/settings/package/packageList',
                'route_controller' => 'App\\Http\\Controllers\\Admin\\Settings\\PackageController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 68,
                'route_name' => 'package.show',
                'route_uri' => 'admin/settings/package/show/{type?}',
                'route_controller' => 'App\\Http\\Controllers\\Admin\\Settings\\PackageController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 69,
                'route_name' => 'cron',
                'route_uri' => 'admin/settings/cron',
                'route_controller' => 'App\\Http\\Controllers\\Admin\\Settings\\CronController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 70,
                'route_name' => 'cron.jobList',
                'route_uri' => 'admin/settings/cron/jobList',
                'route_controller' => 'App\\Http\\Controllers\\Admin\\Settings\\CronController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 71,
                'route_name' => 'cron.form',
                'route_uri' => 'admin/settings/cron/form',
                'route_controller' => 'App\\Http\\Controllers\\Admin\\Settings\\CronController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 72,
                'route_name' => 'cron.info',
                'route_uri' => 'admin/settings/cron/info',
                'route_controller' => 'App\\Http\\Controllers\\Admin\\Settings\\CronController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 73,
                'route_name' => 'unisharp.lfm.show',
                'route_uri' => 'filemanage',
                'route_controller' => '\\UniSharp\\LaravelFilemanager\\Controllers\\LfmController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 74,
                'route_name' => 'unisharp.lfm.getErrors',
                'route_uri' => 'filemanage/errors',
                'route_controller' => '\\UniSharp\\LaravelFilemanager\\Controllers\\LfmController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 75,
                'route_name' => 'unisharp.lfm.upload',
                'route_uri' => 'filemanage/upload',
                'route_controller' => '\\UniSharp\\LaravelFilemanager\\Controllers\\UploadController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 76,
                'route_name' => 'unisharp.lfm.getItems',
                'route_uri' => 'filemanage/jsonitems',
                'route_controller' => '\\UniSharp\\LaravelFilemanager\\Controllers\\ItemsController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 77,
                'route_name' => 'unisharp.lfm.getAddfolder',
                'route_uri' => 'filemanage/newfolder',
                'route_controller' => '\\UniSharp\\LaravelFilemanager\\Controllers\\FolderController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 78,
                'route_name' => 'unisharp.lfm.getDeletefolder',
                'route_uri' => 'filemanage/deletefolder',
                'route_controller' => '\\UniSharp\\LaravelFilemanager\\Controllers\\FolderController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 79,
                'route_name' => 'unisharp.lfm.getFolders',
                'route_uri' => 'filemanage/folders',
                'route_controller' => '\\UniSharp\\LaravelFilemanager\\Controllers\\FolderController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 80,
                'route_name' => 'unisharp.lfm.getCrop',
                'route_uri' => 'filemanage/crop',
                'route_controller' => '\\UniSharp\\LaravelFilemanager\\Controllers\\CropController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 81,
                'route_name' => 'unisharp.lfm.getCropimage',
                'route_uri' => 'filemanage/cropimage',
                'route_controller' => '\\UniSharp\\LaravelFilemanager\\Controllers\\CropController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 82,
                'route_name' => 'unisharp.lfm.getRename',
                'route_uri' => 'filemanage/rename',
                'route_controller' => '\\UniSharp\\LaravelFilemanager\\Controllers\\RenameController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 83,
                'route_name' => 'unisharp.lfm.getResize',
                'route_uri' => 'filemanage/resize',
                'route_controller' => '\\UniSharp\\LaravelFilemanager\\Controllers\\ResizeController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 84,
                'route_name' => 'unisharp.lfm.performResize',
                'route_uri' => 'filemanage/doresize',
                'route_controller' => '\\UniSharp\\LaravelFilemanager\\Controllers\\ResizeController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 85,
                'route_name' => 'unisharp.lfm.getDownload',
                'route_uri' => 'filemanage/download',
                'route_controller' => '\\UniSharp\\LaravelFilemanager\\Controllers\\DownloadController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 86,
                'route_name' => 'unisharp.lfm.getDelete',
                'route_uri' => 'filemanage/delete',
                'route_controller' => '\\UniSharp\\LaravelFilemanager\\Controllers\\DeleteController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 87,
                'route_name' => 'unisharp.lfm.',
                'route_uri' => 'filemanage/photos/{base_path}/{image_name}',
                'route_controller' => '\\UniSharp\\LaravelFilemanager\\Controllers\\RedirectController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 88,
                'route_name' => 'company.payment.callback',
                'route_uri' => 'company/payment/callBack',
                'route_controller' => 'App\\Http\\Controllers\\Payment\\PaymentController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 89,
                'route_name' => 'admin.payment.callback',
                'route_uri' => 'admin/payment/callBack',
                'route_controller' => 'App\\Http\\Controllers\\Payment\\PaymentController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 90,
                'route_name' => 'user.payment.callback',
                'route_uri' => 'user/payment/callBack',
                'route_controller' => 'App\\Http\\Controllers\\Payment\\PaymentController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 91,
                'route_name' => 'employee.payment.callback',
                'route_uri' => 'employee/payment/callBack',
                'route_controller' => 'App\\Http\\Controllers\\Payment\\PaymentController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 92,
                'route_name' => 'shared.payment.callback',
                'route_uri' => 'shared/payment/callBack',
                'route_controller' => 'App\\Http\\Controllers\\Payment\\PaymentController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 93,
                'route_name' => 'company.redirect',
                'route_uri' => 'company',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\LoginController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 94,
                'route_name' => 'company.getGateways',
                'route_uri' => 'company/payment/getGateways',
                'route_controller' => 'App\\Http\\Controllers\\Payment\\PaymentController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 95,
                'route_name' => 'admin.redirect',
                'route_uri' => 'admin',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\LoginController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 96,
                'route_name' => 'admin.getGateways',
                'route_uri' => 'admin/payment/getGateways',
                'route_controller' => 'App\\Http\\Controllers\\Payment\\PaymentController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 97,
                'route_name' => 'user.redirect',
                'route_uri' => 'user',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\LoginController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 98,
                'route_name' => 'user.getGateways',
                'route_uri' => 'user/payment/getGateways',
                'route_controller' => 'App\\Http\\Controllers\\Payment\\PaymentController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 99,
                'route_name' => 'employee.redirect',
                'route_uri' => 'employee',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\LoginController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 100,
                'route_name' => 'employee.getGateways',
                'route_uri' => 'employee/payment/getGateways',
                'route_controller' => 'App\\Http\\Controllers\\Payment\\PaymentController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 101,
                'route_name' => 'shared.redirect',
                'route_uri' => 'shared',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\LoginController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 102,
                'route_name' => 'shared.getGateways',
                'route_uri' => 'shared/payment/getGateways',
                'route_controller' => 'App\\Http\\Controllers\\Payment\\PaymentController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 103,
                'route_name' => 'company.lockScreen',
                'route_uri' => 'company/lockScreen',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\LockAccountController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 104,
                'route_name' => 'admin.lockScreen',
                'route_uri' => 'admin/lockScreen',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\LockAccountController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 105,
                'route_name' => 'user.lockScreen',
                'route_uri' => 'user/lockScreen',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\LockAccountController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 106,
                'route_name' => 'employee.lockScreen',
                'route_uri' => 'employee/lockScreen',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\LockAccountController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 107,
                'route_name' => 'shared.lockScreen',
                'route_uri' => 'shared/lockScreen',
                'route_controller' => 'App\\Http\\Controllers\\Auth\\LockAccountController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 108,
                'route_name' => 'admin.reset',
                'route_uri' => 'admin/settings/reset',
                'route_controller' => 'App\\Http\\Controllers\\Admin\\Settings\\ResetController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 109,
                'route_name' => 'admin.module',
                'route_uri' => 'admin/settings/modules',
                'route_controller' => 'App\\Http\\Controllers\\Admin\\Settings\\ModuleController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 110,
                'route_name' => 'admin.module.list',
                'route_uri' => 'admin/settings/modules/list',
                'route_controller' => 'App\\Http\\Controllers\\Admin\\Settings\\ModuleController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 111,
                'route_name' => 'admin.theme',
                'route_uri' => 'admin/settings/themes',
                'route_controller' => 'App\\Http\\Controllers\\Admin\\Settings\\ThemeController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 112,
                'route_name' => 'admin.menu',
                'route_uri' => 'admin/settings/menus',
                'route_controller' => 'App\\Http\\Controllers\\Admin\\Settings\\MenuController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 113,
                'route_name' => 'easyroutes',
                'route_uri' => 'admin/settings/easyroutes',
                'route_controller' => 'App\\Http\\Controllers\\Admin\\Settings\\EasyRoutesController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 114,
                'route_name' => 'manage.currency',
                'route_uri' => 'admin/settings/currency',
                'route_controller' => 'App\\Http\\Controllers\\Admin\\Settings\\LocalisationController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 115,
                'route_name' => 'currency.table',
                'route_uri' => 'admin/settings/currency/getCurrencyTable',
                'route_controller' => 'App\\Http\\Controllers\\Admin\\Settings\\LocalisationController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 116,
                'route_name' => 'admin.profile',
                'route_uri' => 'admin/profile',
                'route_controller' => 'App\\Http\\Controllers\\Admin\\Profile\\ProfileController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 117,
                'route_name' => 'optimizer.cache',
                'route_uri' => 'admin/utils/optimizer/cache',
                'route_controller' => 'App\\Http\\Controllers\\Admin\\Utils\\OptimizerController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 118,
                'route_name' => 'admin.systemRefresh',
                'route_uri' => 'admin/systemRefresh',
                'route_controller' => 'App\\Http\\Controllers\\Admin\\RefreshController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 119,
                'route_name' => 'employee.profile',
                'route_uri' => 'employee/profile',
                'route_controller' => 'App\\Http\\Controllers\\Employee\\Profile\\ProfileController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 120,
                'route_name' => 'user.profile',
                'route_uri' => 'user/profile',
                'route_controller' => 'App\\Http\\Controllers\\User\\Profile\\ProfileController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 121,
                'route_name' => 'treeRouter',
                'route_uri' => 'user/tree/diagram/{treetype}/{type}/{id?}',
                'route_controller' => 'App\\Http\\Controllers\\User\\Tree\\TreeController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => '[\"treetype\",\"type\",\"id\"]\'',
                'deleted_at' => NULL
            ],
            [
                'id' => 122,
                'route_name' => 'treeListRouter',
                'route_uri' => 'user/tree/list/{treetype}/{type}/{id?}/{level?}',
                'route_controller' => 'App\\Http\\Controllers\\User\\Tree\\TreeController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => '[\"treetype\",\"type\",\"id\",\"level\"]',
                'deleted_at' => NULL
            ],
            [
                'id' => 123,
                'route_name' => 'getTreeList',
                'route_uri' => 'user/tree/listPartial/{treetype}/{type}/{id?}/{level?}',
                'route_controller' => 'App\\Http\\Controllers\\User\\Tree\\TreeController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => '[\"treetype\",\"type\",\"id\",\"level\"]',
                'deleted_at' => NULL
            ],
            [
                'id' => 124,
                'route_name' => 'invoice',
                'route_uri' => 'order/invoice',
                'route_controller' => 'App\\Http\\Controllers\\Order\\OrderController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 125,
                'route_name' => 'cart',
                'route_uri' => 'order/cart',
                'route_controller' => 'App\\Http\\Controllers\\Order\\CartController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 126,
                'route_name' => 'cart.summary',
                'route_uri' => 'order/cart/summary',
                'route_controller' => 'App\\Http\\Controllers\\Order\\CartController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 127,
                'route_name' => 'invoice',
                'route_uri' => 'order/invoice/{id}',
                'route_controller' => 'App\\Http\\Controllers\\Order\\OrderController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => '[\"id\"]',
                'deleted_at' => NULL
            ],
            [
                'id' => 128,
                'route_name' => 'bookmarks.view',
                'route_uri' => 'misc/bookmarks/view',
                'route_controller' => 'App\\Http\\Controllers\\Misc\\BookmarksController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 129,
                'route_name' => 'information.view',
                'route_uri' => 'misc/information/view/{page?}',
                'route_controller' => 'App\\Http\\Controllers\\Misc\\InformationController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => '[\"page\"]',
                'deleted_at' => NULL
            ],
            [
                'id' => 130,
                'route_name' => 'privilages.show',
                'route_uri' => 'admin/settings/privileges/assign',
                'route_controller' => 'App\\Components\\Modules\\Security\\AdvancedPrivileges\\Controllers\\PrivilegeController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 131,
                'route_name' => 'privilages.assign.form',
                'route_uri' => 'admin/settings/privileges/assignForm',
                'route_controller' => 'App\\Components\\Modules\\Security\\AdvancedPrivileges\\Controllers\\PrivilegeController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 132,
                'route_name' => 'privilages.shortlist',
                'route_uri' => 'admin/settings/privileges/shortlist',
                'route_controller' => 'App\\Components\\Modules\\Security\\AdvancedPrivileges\\Controllers\\PrivilegeController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 133,
                'route_name' => 'user.personalinfo',
                'route_uri' => 'user/personalinfo',
                'route_controller' => 'App\\Http\\Components\\User\\Profile\\ProfileController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 134,
                'route_name' => 'user.tree.userRegister',
                'route_uri' => 'user/tree/registerUser/view',
                'route_controller' => 'App\\Components\\Modules\\Tree\\Controller\\GenealogyTreeController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 135,
                'route_name' => 'user.tool',
                'route_uri' => 'user/tool',
                'route_controller' => 'App\\Http\\Components\\User\\Profile\\ProfileController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 136,
                'route_name' => 'user.report',
                'route_uri' => 'user/tool/report',
                'route_controller' => 'App\\Http\\Components\\User\\Profile\\ProfileController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 137,
                'route_name' => 'user.email',
                'route_uri' => 'user/tool/email',
                'route_controller' => 'App\\Http\\Components\\User\\Profile\\ProfileController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ],
            [
                'id' => 139,
                'route_name' => 'user.wallet',
                'route_uri' => 'user/tool/wallet',
                'route_controller' => 'App\\Http\\Components\\User\\Profile\\ProfileController',
                'title' => NULL,
                'description' => NULL,
                'route_params' => NULL,
                'deleted_at' => NULL
            ]
        ]);
    }
}
