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

namespace App\Components\Modules\General\Faq\Controllers;

use App\Components\Modules\General\Faq\FaqIndex as Module;
use App\Components\Modules\General\Faq\ModuleCore\Eloquents\Faq;
use App\Components\Modules\General\Faq\ModuleCore\Eloquents\FaqCategory;
use App\Components\Modules\General\Faq\ModuleCore\Traits\Validations;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

/**
 * Class FaqController
 * @package App\Components\Modules\General\Faq\Controllers
 */
class FaqController extends Controller
{
    use Validations;

    /**
     * __construct function
     */
    function __construct()
    {
        parent::__construct();
        $this->module = app()->make(Module::class);
    }

    /**
     * @return Factory|View
     */
    function index()
    {
        $scope = session('theScope') ?: 'user';
        $data['title'] = _mt($this->module->moduleId, 'Faq.faq');
        $data['heading_text'] = _mt($this->module->moduleId, 'Faq.faq');
        $data['breadcrumbs'] = [
            _t('index.home') => 'admin.home',
            _mt($this->module->moduleId, 'Faq.faq') => $scope . '.faq'
        ];
        $data['styles'] = array(
            asset('global/plugins/select2/css/select2.min.css'),
            asset('global/plugins/select2/css/select2-bootstrap.min.css'),
            $this->module->getCssPath() . 'style.css',
        );
        $data['scripts'] = [];
        $data['categories'] = FaqCategory::with('faqs')->orderBy('sort_order')->get();
        $data['faqs'] = Faq::orderBy('sort_order')->get();
        $data['moduleId'] = $this->module->moduleId;

        return view('General.Faq.Views.index', $data);
    }


    /**
     * get category list
     *
     * @return Factory|View
     */
    function categoryList()
    {
        $data = [
            'moduleId' => $this->module->moduleId,
            'categories' => FaqCategory::get()
        ];

        return view('General.Faq.Views.Partials.categoryList', $data);
    }

    /**
     * get category form add or edit
     *
     * @param Request $request
     * @return Factory|View
     */
    function categoryForm(Request $request)
    {
        $data = [
            'moduleId' => $this->module->moduleId,
            'categoryData' => collect([])
        ];

        if ($id = $request->input('id'))
            $data['categoryData'] = collect(FaqCategory::find($id));


        return view('General.Faq.Views.Partials.categoryForm', $data);
    }

    /**
     * save category
     *
     * @param Request $request
     * @return JsonResponse
     */
    function saveCategory(Request $request)
    {
        $validator = Validator::make($request->all(), $this->categoryValidationRules(), $this->categoryValidationMessages(), $this->categoryValidationAttributes());

        if ($validator->fails())
            return response()->json($validator->errors(), 422);

        if ($request->input('id'))
            FaqCategory::find($request->input('id'))->update($request->only(['title', 'sort_order']));
        else
            FaqCategory::create($request->only(['title', 'sort_order']));

    }

    /**
     * delete category
     *
     * @param Request $request
     * @throws Exception
     */
    function deleteCategory(Request $request)
    {
        $this->validate($request, ['id' => 'required']);

        FaqCategory::find($request->input('id'))->delete();
    }

    /**
     * faq add or edit form
     *
     * @param Request $request
     * @return Factory|View
     */
    public function faqForm(Request $request)
    {
        $data = [
            'moduleId' => $this->module->moduleId,
            'faqData' => collect([])
        ];
        if ($id = $request->input('id'))
            $data['faqData'] = collect(Faq::find($id));
        $data['categories'] = FaqCategory::get();

        return view('General.Faq.Views.Partials.faqForm', $data);
    }

    /**
     * save faq
     *
     * @param Request $request
     * @return JsonResponse
     */
    function saveFaq(Request $request)
    {
        $validator = Validator::make($request->all(), $this->faqValidationRules(), $this->faqValidationMessages(), $this->faqValidationAttributes());

        if ($validator->fails())
            return response()->json($validator->errors(), 422);

        if ($request->input('id'))
            Faq::find($request->input('id'))->update($request->only(['title', 'content', 'category', 'sort_order']));
        else
            Faq::create($request->only(['title', 'content', 'category', 'sort_order']));

    }

    /**
     * faq list
     *
     * @return Factory|View
     */
    function faqList()
    {
        $data = [
            'moduleId' => $this->module->moduleId,
            'faqs' => Faq::with('faqCategory')->get()
        ];

        return view('General.Faq.Views.Partials.faqList', $data);
    }

    /**
     * delete faq
     *
     * @param Request $request
     * @throws Exception
     */
    function deleteFaq(Request $request)
    {
        $this->validate($request, ['id' => 'required']);

        Faq::find($request->input('id'))->delete();
    }

    /**
     * @return Factory|View
     */
    function manageFaq()
    {
        $data = [
            'title' => _mt($this->module->moduleId, 'Faq.faq_management'),
            'heading_text' => _mt($this->module->moduleId, 'Faq.faq_management'),
            'breadcrumbs' => [
                _t('index.home') => getScope() . '.home',
                _mt($this->module->moduleId, 'Faq.tools') => getScope() . '.home',
                _mt($this->module->moduleId, 'Faq.faq_management') => getScope() . '.faq.manage'
            ],
            'moduleId' => $this->module->moduleId
        ];

        return view('General.Faq.Views.manageFaq', $data);
    }
}
