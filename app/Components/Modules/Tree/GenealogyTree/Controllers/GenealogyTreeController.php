<?php
/**
 *  -------------------------------------------------
 *  Hybrid MLM  Copyright (c) 2018 All Rights Reserved
 *  -------------------------------------------------
 *
 * @author Acemero Technologies Pvt Ltd
 * @link https://www.acemero.com
 * @see https://www.hybridmlm.io
 * @version 1.00
 * @api Laravel 5.4
 */

namespace App\Components\Modules\Tree\GenealogyTree\Controllers;

use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Blueprint\Services\CartServices;
use App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankUser;
use App\Components\Modules\Tree\GenealogyTree\GenealogyTreeIndex as Module;
use App\Components\Modules\Tree\GenealogyTree\view;
use App\Eloquents\User;
use App\Eloquents\UserRepo;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Throwable;
use Illuminate\Support\Facades\Cookie;

/**
 * Class GenealogyTreeController
 * @package App\Components\Modules\Tree\GenealogyTree\Controllers
 */
class GenealogyTreeController extends Controller
{

    /**
     * @var $module ModuleBasicAbstract
     */
    public $module;

    public $moduleConfig;

    public $treeType;

    protected $level = 7;

    protected $activePlan;

    /**
     * PayoutController constructor.
     */
    function __construct()
    {
        parent::__construct();
        $this->module = app(Module::class);
        $this->moduleConfig = $this->module->getModuleData(true);
        $this->activePlan = getModule((int)getConfig('plan_configuration', 'default_plan'));
    }

    /**
     * @param $type
     * @param null $userId
     * @param Request $request
     * @return Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View|string
     * @throws Throwable
     */
    function index(Request $request, $type = 'placement', $userId = null)
    {
        if (!$this->activePlan)
            dd('You cant able to access this page, Because no mlm plan found');

        $data = [
            'scripts' => [
                asset('global/plugins/panzoom/dist/jquery.panzoom.min.js'),
            ],
            'styles' => [
                $this->module->getCssPath() . 'hierarchy-view.css',
                $this->module->getCssPath() . 'main.css',
            ],
            'title' => _mt($this->module->moduleId, 'GenealogyTree.genealogy_tree'),
            'heading_text' => _mt($this->module->moduleId, 'GenealogyTree.genealogy_tree'),
            'breadcrumbs' => [
                _t('index.home') => 'admin.home',
                _mt($this->module->moduleId, 'GenealogyTree.Tree') => "admin.tree.genealogyTree",
                _mt($this->module->moduleId, 'GenealogyTree.genealogy_tree') => "admin.tree.genealogyTree",
            ]
        ];

        /* prevent showing other users tree except downline */
        if ($userId) {
            $uplineUsers = UserRepo::getDescendantsOf(loggedId(), $type)->pluck('user_id');

            if (!$uplineUsers->contains($userId)) $user_id = null;
        }

        $userId = !$userId ? loggedId() : $userId;
        $option['level'] = 2;
        $option['type'] = $data['type'] = $type;
        $option['parent'] = $userId;
        $data['content'] = $this->renderTree($option);
        $data['moduleId'] = $this->module->moduleId;
        $data['moduleData'] = $this->module->getModuleData(true);
        $iconRepresentation = $data['moduleData']['tree_avatar'];
        switch ($data['moduleData']['tree_avatar']) {
            case 'default_icon':
                $iconRepresentation = 'System Default';
                $iconList = [
                    ['icon' => 'photos/maleUser.jpg', 'title' => _mt($this->module->moduleId, 'GenealogyTree.male')],
                    ['icon' => 'photos/femaleUser.jpg', 'title' => _mt($this->module->moduleId, 'GenealogyTree.female')]
                ];
                break;
            case 'avatar':
                $iconRepresentation = 'Profile Picture';
            default:
                $iconList = [];
                break;
        }
        $data['moduleData']['icon_representation'] = $iconRepresentation;
        $data['iconList'] = $iconList;
        $data['ajaxRequest'] = $request->ajax() ? true : false;

        return view('Tree.GenealogyTree.Views.genealogyTree', $data);
    }

    function newenrollee(Request $request, CartServices $cartServices)
    {
        $data['title'] = _t('register.register_new_user');
        $data['heading_text'] = _t('register.register_new_user');
        $data['breadcrumbs'] = [_t('index.home') => 'admin.home', _t('register.register_new_user') => 'register'];
        $scope = getScope();
        $scripts = [
            asset('global/plugins/select2/js/select2.full.min.js'),
            asset('global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'),
            asset('global/plugins/jquery-validation/js/jquery.validate.js'),
            asset('global/plugins/jquery-validation/js/additional-methods.min.js'),
            asset('global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js'),
            asset('pages/scripts/form-wizard.js'),
            asset('js/register.js'),
            asset('global/plugins/jQuery-Mask-Plugin-master/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js'),
            asset('js/printThis.js'),
        ];
        $styles = [
            asset('global/plugins/animate/animate.css'),
            asset('global/plugins/select2/css/select2.min.css'),
            asset('global/plugins/select2/css/select2-bootstrap.min.css'),
            asset('global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css'),
            asset('css/welcome_style.css'),
            asset('css/admin/registration.css'),
            asset('css/admin/newenrollee.css')
        ];

        $jsVars = [
            'sessionKey' => session('advFieldName'),
            'localApi' => route('local.api'),
            'cartAddRoute' => route('cart.add'),
            'cartSummary' => route('cart.summary'),
            'cartGetTotalRoute' => route('cart.getCartTotal'),
            'lang_you_have_added' => _t('register.you_have_added'),
            'lang_to_cart' => _t('register.to_cart'),
            'preview' => scopeRoute('register.preview', ['id' => '']),
            'gateways' => route('cart.payment'),
            //'gateways' => route('getGateways'),
            'packages' => scopeRoute('register.packages'),
            'isLogged' => loggedUser() ? true : false,
            'lang_err_enter_username' => _t('register.err_username_required'),
            'lang_err_enter_sponsor' => _t('register.err_sponsor_required'),
            'lang_err_enter_package' => _t('register.err_package_required'),
            'lang_err_enter_password' => _t('register.err_password_required'),
            'lang_err_enter_confirm_password' => _t('register.err_confirm_password_required'),
            'lang_err_confirm_password_missmatch' => _t('register.err_confirm_password_missmatch'),
            'lang_err_enter_firstname' => _t('register.err_firstname_required'),
            'lang_err_enter_lastname' => _t('register.err_lastname_required'),
            'lang_err_enter_email' => _t('register.err_email_required'),
            'lang_err_enter_phone' => _t('register.err_phone_required'),
            'lang_err_enter_gender' => _t('register.err_gender_required'),
            'lang_err_enter_address' => _t('register.err_address_required'),
            'lang_err_enter_city' => _t('register.err_city_required'),
            'lang_err_enter_country' => _t('register.err_country_required'),
            'lang_err_enter_state' => _t('register.err_state_required'),
            'lang_err_enter_pin' => _t('register.err_enter_pin'),
            'lang_err_enter_dob' => _t('register.err_enter_dob'),
            'lang_err_enter_atleast_5_character' => _t('register.err_atleast_5_character'),
            'lang_err_enter_atleast_6_character' => _t('register.err_atleast_6_character'),
            'lang_err_enter_type_of_document' => _t('register.err_enter_type_of_document'),
            'lang_err_enter_nationality' => _t('register.err_enter_nationality'),
            'lang_err_enter_place_of_birth' => _t('register.err_enter_place_of_birth'),
            'lang_err_enter_date_of_passport_issuance' => _t('register.err_enter_date_of_passport_issuance'),
            'lang_err_enter_country_of_passport_issuance' => _t('register.err_enter_country_of_passport_issuance'),
            'lang_err_enter_passport_expirition_date' => _t('register.err_enter_passport_expirition_date'),
            'lang_err_enter_street_name' => _t('register.err_enter_street_name'),
            'lang_err_enter_house_no' => _t('register.err_enter_house_no'),
            'lang_err_enter_postcode' => _t('register.err_enter_postcode'),
            'lang_err_enter_address_country' => _t('register.err_enter_address_country'),
        ];

        $data['jsVariables'] = array_merge($this->jsVars, $jsVars);
        $data['styles'] = $styles;
        $data['scripts'] = $scripts;
        $data['doneAlready'] = $request->input('registered');
        $data['orderId'] = $request->input('orderId');

        $sponsor = null;

        if ($request->input('sponsor') && User::where('username', $request->input('sponsor'))->exists())
            $sponsor = $request->input('sponsor');
        elseif ($request->user())
            $sponsor = $request->user()->username;

        $sponsor_set_by_cookie = false;
        //Sponsor based on cookie / affiliation referral middelware
        if (!$sponsor && $affiliationCookie = Cookie::get('affiliation_code')) {
            $sponsor_user = User::where('customer_id', $affiliationCookie)->first();
            if ($sponsor_user) {
                $sponsor = $sponsor_user->username;
                $sponsor_set_by_cookie = true;
            }
        }


        $placement = null;
        if ($request->input('placement')) $placement = $request->input('placement');

        $data['sponsor_set_by_cookie'] = $sponsor_set_by_cookie;
        $data['sponsor'] = $sponsor;
        $data['placement'] = $placement;
        $data['countries'] = getCountries()->toArray();
        $data['layoutPrefix'] = loggedUser() ? ucfirst(loggedUser()->userType->title) . '.' : 'Guest';
        $data['cartTotal'] = prettyCurrency($cartServices->cartTotal()->get('total'));

        return view('Tree.GenealogyTree.Views.newenrollee',$data);
    }

    function testregister(Request $request, CartServices $cartServices)
    {
        $data['title'] = _t('register.register_new_user');
        $data['heading_text'] = _t('register.register_new_user');
        $data['breadcrumbs'] = [_t('index.home') => 'admin.home', _t('register.register_new_user') => 'register'];
        $scope = getScope();
        $scripts = [
            asset('global/plugins/select2/js/select2.full.min.js'),
            asset('global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'),
            asset('global/plugins/jquery-validation/js/jquery.validate.js'),
            asset('global/plugins/jquery-validation/js/additional-methods.min.js'),
            asset('global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js'),
            asset('pages/scripts/form-wizard.js'),
            asset('js/register.js'),
            asset('global/plugins/jQuery-Mask-Plugin-master/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js'),
            asset('js/printThis.js'),
        ];
        $styles = [
            asset('global/plugins/animate/animate.css'),
            asset('global/plugins/select2/css/select2.min.css'),
            asset('global/plugins/select2/css/select2-bootstrap.min.css'),
            asset('global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css'),
            asset('css/welcome_style.css'),
            asset('css/admin/registration.css'),
            asset('css/admin/newenrollee.css')
        ];

        $jsVars = [
            'sessionKey' => session('advFieldName'),
            'localApi' => route('local.api'),
            'cartAddRoute' => route('cart.add'),
            'cartSummary' => route('cart.summary'),
            'cartGetTotalRoute' => route('cart.getCartTotal'),
            'lang_you_have_added' => _t('register.you_have_added'),
            'lang_to_cart' => _t('register.to_cart'),
            'preview' => scopeRoute('register.preview', ['id' => '']),
            'gateways' => route('cart.payment'),
            //'gateways' => route('getGateways'),
            'packages' => scopeRoute('register.packages'),
            'isLogged' => loggedUser() ? true : false,
            'lang_err_enter_username' => _t('register.err_username_required'),
            'lang_err_enter_sponsor' => _t('register.err_sponsor_required'),
            'lang_err_enter_package' => _t('register.err_package_required'),
            'lang_err_enter_password' => _t('register.err_password_required'),
            'lang_err_enter_confirm_password' => _t('register.err_confirm_password_required'),
            'lang_err_confirm_password_missmatch' => _t('register.err_confirm_password_missmatch'),
            'lang_err_enter_firstname' => _t('register.err_firstname_required'),
            'lang_err_enter_lastname' => _t('register.err_lastname_required'),
            'lang_err_enter_email' => _t('register.err_email_required'),
            'lang_err_enter_phone' => _t('register.err_phone_required'),
            'lang_err_enter_gender' => _t('register.err_gender_required'),
            'lang_err_enter_address' => _t('register.err_address_required'),
            'lang_err_enter_city' => _t('register.err_city_required'),
            'lang_err_enter_country' => _t('register.err_country_required'),
            'lang_err_enter_state' => _t('register.err_state_required'),
            'lang_err_enter_pin' => _t('register.err_enter_pin'),
            'lang_err_enter_dob' => _t('register.err_enter_dob'),
            'lang_err_enter_atleast_5_character' => _t('register.err_atleast_5_character'),
            'lang_err_enter_atleast_6_character' => _t('register.err_atleast_6_character'),
            'lang_err_enter_type_of_document' => _t('register.err_enter_type_of_document'),
            'lang_err_enter_nationality' => _t('register.err_enter_nationality'),
            'lang_err_enter_place_of_birth' => _t('register.err_enter_place_of_birth'),
            'lang_err_enter_date_of_passport_issuance' => _t('register.err_enter_date_of_passport_issuance'),
            'lang_err_enter_country_of_passport_issuance' => _t('register.err_enter_country_of_passport_issuance'),
            'lang_err_enter_passport_expirition_date' => _t('register.err_enter_passport_expirition_date'),
            'lang_err_enter_street_name' => _t('register.err_enter_street_name'),
            'lang_err_enter_house_no' => _t('register.err_enter_house_no'),
            'lang_err_enter_postcode' => _t('register.err_enter_postcode'),
            'lang_err_enter_address_country' => _t('register.err_enter_address_country'),
        ];

        $data['jsVariables'] = array_merge($this->jsVars, $jsVars);
        $data['styles'] = $styles;
        $data['scripts'] = $scripts;
        $data['doneAlready'] = $request->input('registered');
        $data['orderId'] = $request->input('orderId');

        $sponsor = null;

        if ($request->input('sponsor') && User::where('username', $request->input('sponsor'))->exists())
            $sponsor = $request->input('sponsor');
        elseif ($request->user())
            $sponsor = $request->user()->username;

        $sponsor_set_by_cookie = false;
        //Sponsor based on cookie / affiliation referral middelware
        if (!$sponsor && $affiliationCookie = Cookie::get('affiliation_code')) {
            $sponsor_user = User::where('customer_id', $affiliationCookie)->first();
            if ($sponsor_user) {
                $sponsor = $sponsor_user->username;
                $sponsor_set_by_cookie = true;
            }
        }


        $placement = null;
        if ($request->input('placement')) $placement = $request->input('placement');

        $data['sponsor_set_by_cookie'] = $sponsor_set_by_cookie;
        $data['sponsor'] = $sponsor;
        $data['placement'] = $placement;
        $data['countries'] = getCountries()->toArray();
        $data['layoutPrefix'] = loggedUser() ? ucfirst(loggedUser()->userType->title) . '.' : 'Guest';
        $data['cartTotal'] = prettyCurrency($cartServices->cartTotal()->get('total'));

        return view('Auth.testregister',$data);
    }

    function testregistersimple(Request $request, CartServices $cartServices)
    {
        $data['title'] = _t('register.register_new_user');
        $data['heading_text'] = _t('register.register_new_user');
        $data['breadcrumbs'] = [_t('index.home') => 'admin.home', _t('register.register_new_user') => 'register'];
        $scope = getScope();
        $scripts = [
            asset('global/plugins/select2/js/select2.full.min.js'),
            asset('global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'),
            asset('global/plugins/jquery-validation/js/jquery.validate.js'),
            asset('global/plugins/jquery-validation/js/additional-methods.min.js'),
            asset('global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js'),
            asset('pages/scripts/form-wizard.js'),
            asset('js/register.js'),
            asset('global/plugins/jQuery-Mask-Plugin-master/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js'),
            asset('js/printThis.js'),
        ];
        $styles = [
            asset('global/plugins/animate/animate.css'),
            asset('global/plugins/select2/css/select2.min.css'),
            asset('global/plugins/select2/css/select2-bootstrap.min.css'),
            asset('global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css'),
            asset('css/welcome_style.css'),
            asset('css/admin/registration.css'),
            asset('css/admin/newenrollee.css')
        ];

        $jsVars = [
            'sessionKey' => session('advFieldName'),
            'localApi' => route('local.api'),
            'cartAddRoute' => route('cart.add'),
            'cartSummary' => route('cart.summary'),
            'cartGetTotalRoute' => route('cart.getCartTotal'),
            'lang_you_have_added' => _t('register.you_have_added'),
            'lang_to_cart' => _t('register.to_cart'),
            'preview' => scopeRoute('register.preview', ['id' => '']),
            'gateways' => route('cart.payment'),
            //'gateways' => route('getGateways'),
            'packages' => scopeRoute('register.packages'),
            'isLogged' => loggedUser() ? true : false,
            'lang_err_enter_username' => _t('register.err_username_required'),
            'lang_err_enter_sponsor' => _t('register.err_sponsor_required'),
            'lang_err_enter_package' => _t('register.err_package_required'),
            'lang_err_enter_password' => _t('register.err_password_required'),
            'lang_err_enter_confirm_password' => _t('register.err_confirm_password_required'),
            'lang_err_confirm_password_missmatch' => _t('register.err_confirm_password_missmatch'),
            'lang_err_enter_firstname' => _t('register.err_firstname_required'),
            'lang_err_enter_lastname' => _t('register.err_lastname_required'),
            'lang_err_enter_email' => _t('register.err_email_required'),
            'lang_err_enter_phone' => _t('register.err_phone_required'),
            'lang_err_enter_gender' => _t('register.err_gender_required'),
            'lang_err_enter_address' => _t('register.err_address_required'),
            'lang_err_enter_city' => _t('register.err_city_required'),
            'lang_err_enter_country' => _t('register.err_country_required'),
            'lang_err_enter_state' => _t('register.err_state_required'),
            'lang_err_enter_pin' => _t('register.err_enter_pin'),
            'lang_err_enter_dob' => _t('register.err_enter_dob'),
            'lang_err_enter_atleast_5_character' => _t('register.err_atleast_5_character'),
            'lang_err_enter_atleast_6_character' => _t('register.err_atleast_6_character'),
            'lang_err_enter_type_of_document' => _t('register.err_enter_type_of_document'),
            'lang_err_enter_nationality' => _t('register.err_enter_nationality'),
            'lang_err_enter_place_of_birth' => _t('register.err_enter_place_of_birth'),
            'lang_err_enter_date_of_passport_issuance' => _t('register.err_enter_date_of_passport_issuance'),
            'lang_err_enter_country_of_passport_issuance' => _t('register.err_enter_country_of_passport_issuance'),
            'lang_err_enter_passport_expirition_date' => _t('register.err_enter_passport_expirition_date'),
            'lang_err_enter_street_name' => _t('register.err_enter_street_name'),
            'lang_err_enter_house_no' => _t('register.err_enter_house_no'),
            'lang_err_enter_postcode' => _t('register.err_enter_postcode'),
            'lang_err_enter_address_country' => _t('register.err_enter_address_country'),
        ];

        $data['jsVariables'] = array_merge($this->jsVars, $jsVars);
        $data['styles'] = $styles;
        $data['scripts'] = $scripts;
        $data['doneAlready'] = $request->input('registered');
        $data['orderId'] = $request->input('orderId');

        $sponsor = null;

        if ($request->input('sponsor') && User::where('username', $request->input('sponsor'))->exists())
            $sponsor = $request->input('sponsor');
        elseif ($request->user())
            $sponsor = $request->user()->username;

        $sponsor_set_by_cookie = false;
        //Sponsor based on cookie / affiliation referral middelware
        if (!$sponsor && $affiliationCookie = Cookie::get('affiliation_code')) {
            $sponsor_user = User::where('customer_id', $affiliationCookie)->first();
            if ($sponsor_user) {
                $sponsor = $sponsor_user->username;
                $sponsor_set_by_cookie = true;
            }
        }


        $placement = null;
        if ($request->input('placement')) $placement = $request->input('placement');

        $data['sponsor_set_by_cookie'] = $sponsor_set_by_cookie;
        $data['sponsor'] = $sponsor;
        $data['placement'] = $placement;
        $data['countries'] = getCountries()->toArray();
        $data['layoutPrefix'] = loggedUser() ? ucfirst(loggedUser()->userType->title) . '.' : 'Guest';
        $data['cartTotal'] = prettyCurrency($cartServices->cartTotal()->get('total'));

        return view('Auth.testRegisterSimple',$data);
    }
    /**
     * RenderTree view
     *
     * @param array $options array of tree data
     * @return \App\Blueprint\Interfaces\Module\view|string
     * @throws Throwable
     */
    function renderTree($options)
    {
        $data = $dispatch = [];
        $dispatch['type'] = $data['type'] = $this->treeType = $options['type'];
        $dispatch['parentId'] = $options['parent'];
        $data['downLines'] = $downLines = $this->getData(collect($dispatch));
        $data['moduleData'] = $this->module->getModuleData(true);

        if (isset($options['markupOnly']) && $options['markupOnly']) return $downLines;

        return view('Tree.GenealogyTree.Views.treeView', $data);
    }

    /**
     * Get Data from tree module
     *
     * @param Collection $options tree rendering options
     * @return string
     */
    function getData(Collection $options)
    {
        /** @var UserRepo $parent */
        $parent = UserRepo::withDepth('level')->with('user')->find($options->get('parentId'));
        $this->level += $parent->level;
        $nodes = $parent->descendantsQuery($treeType = $options->get('type'), true)
            ->withDepth('level')
            ->having('level', '<=', $this->level)
            ->get()
            ->toTree();
        $output = '';
        $goUp = '<div class="hv-item-up">
                    <button class="data-up btn btn-outline" data-id="' . $parent->parent_id . '">
                    <i class="fa fa-angle-up"></i></button>
                </div>';

        foreach ($nodes as $key => $node)
            $output .= $this->setHtml($node, ($parent->parent_id && $key == 0 && ($options->get('parentId') != loggedId())) ? $goUp : '');

        return $output;
    }

    /**
     * Set html for node
     *
     * @param UserRepo $node
     * @param null $customHtml
     * @param bool $append
     * @return string
     */
    function setHtml(UserRepo $node, $customHtml = null, $append = false)
    {
        //set tree avatar
        switch ($this->moduleConfig->get('tree_avatar')) {
            case 'default_icon':
                $treeAvatar = $this->getSystemDefaultAvatar($node->user);
                break;
            case 'avatar':
                $treeAvatar = getProfilePic($node->user);
                break;
            default:
                $treeAvatar = $this->getSystemDefaultAvatar($node->user);
        }

        $parentClass = !$node->children->count() ? 'noChildren' : '';
        $collapser = !$parentClass ? '<span class="childCollapse"><i class="fa fa-minus-square-o"></i></span>' : '';
        if ($node->children->count() || (!$node->children->count()))
            $parentClass .= ' hv-item-parent ';
        $html = '<div class="hv-item" data-level="' . $node->level . '">
                    ' . (!$append ? $customHtml : "") . '      
                    <div class="' . $parentClass . '">
                        <div class="person">
                            <img data-id="' . $node->user_id . '" src="' . $treeAvatar . '" alt="">
                            <p class="name">' . $node->user->username . '</p>' . $collapser . '
                        </div>
                    </div>';
        if ($node->children->count()) {
            if ($node->level >= $this->level)
                $html .= $this->setNodeExpandable($node);
            else
                $html .= $this->setChildNode($node);
        } else
            $html .= $this->setEmptyNode($node);
        $html .= $append ? $customHtml : '';
        $html .= '</div>';

        return $html;
    }

    /**
     * @param User $user
     * @return string
     */
    function getSystemDefaultAvatar(User $user)
    {
        return asset($user->metaData && $user->metaData->gender == 'M' ? 'photos/maleUser.png' : 'photos/femaleUser.png');
    }

    /**
     * @param $node
     * @return string
     */
    function setNodeExpandable($node)
    {
        return '<button data-parent="' . $node->user->id . '" class="btn btn-outline expandNode">
                    <i class="fa fa-level-down"></i>
                </button>';
    }

    /**
     * @param UserRepo $node
     * @return string
     */
    function setChildNode(UserRepo $node)
    {
        $width = isset($this->activePlan->getModuleData()['width']) ? $this->activePlan->getModuleData()['width'] : 'unlimited';
        $html = '<div class="hv-item-children">';
        if ($this->activePlan->getRegistry()['key'] == 'Binary' && $node->children[0]['position'] == 2)
            $html .= ($width == 'unlimited' || count($node->children) < $width) ? $this->setEmptyNode($node) : '';
        foreach ($node->children as $child) {
            $html .= '<div class="hv-item-child">';
            $html .= $this->setHtml($child);
            $html .= '</div>';
        }

        if (($this->activePlan->getRegistry()['key'] == 'Binary' && $node->children[0]['position'] == 1) || $this->activePlan->getRegistry()['key'] != 'Binary')
            $html .= ($width == 'unlimited' || count($node->children) < $width) ? $this->setEmptyNode($node) : '';

        $html .= '</div>';

        return $html;
    }

    /**
     * @param UserRepo $node
     * @return string
     */
    function setEmptyNode(UserRepo $node)
    {
        if ($this->moduleConfig->get('tree_registration'))
            $emptyNode = '<div class="hv-item-child emptyNode">
                    <div class="hv-item">' . $this->setNodeRegisterButton($node) . '</div>                        
                 </div>';
        else
            $emptyNode = '<div class="hv-item-child emptyNode">
                            <div class="hv-item">
                                <button data-placement="' . $node->user->id . '" class="btn btn-outline"><i class="fa fa-plus"></i></button>
                            </div>
                          </div>';

        return $emptyNode;
    }

    /**
     * @param UserRepo $node
     * @return string
     */
    function setNodeRegisterButton(UserRepo $node)
    {
        return '<a href="' . scopeRoute('register') . '?placement=' . $node->user->username . '"><button data-placement="' . $node->user->id . '" class="btn btn-outline registerNode">
                    <i class="fa fa-plus"></i>
                </button></a>';
    }

    /**
     * @param int $parent
     * @param Request $request
     * @return \App\Blueprint\Interfaces\Module\view|view|string
     * @throws Throwable
     */
    function reload($parent = null, Request $request)
    {
        $defaults = [
            'parent' => $parent ?: loggedId(),
            'type' => 'placement',
        ];
        $data = array_merge($defaults, $request->all());

        /* prevent showing other users tree except downline */
        if ($data['parent']) {
            $uplineUsers = UserRepo::getDescendantsOf(loggedId(), $data['type'])->pluck('user_id');
            if (!$uplineUsers->contains($data['parent'])) $data['parent'] = loggedId();
        }

        return $this->renderTree($data);
    }

    /**
     * @param null $id
     * @return string
     * @throws Throwable
     */
    function tooltip($id = null)
    {
        $data = [
            'profile' => User::with(['metaData', 'repoData', 'rank'])->find($id),
            'moduleId' => $this->module->moduleId,
            'moduleData' => $this->module->getModuleData(true),
        ];

        $data['sponsor'] = User::where('id','=',UserRepo::where('user_id','=',$data['profile']->id)->first()->sponsor_id)->first();
        return view('Tree.GenealogyTree.Views.tooltip', $data);
    }
}
