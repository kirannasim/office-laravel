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

namespace App\Components\Modules\General\Feedback\Controllers;

use App\Components\Modules\General\Feedback\FeedbackIndex as Module;
use App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackForm;
use App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackOption;
use App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackQuestion;
use App\Components\Modules\General\Feedback\ModuleCore\Eloquents\User;
use App\Components\Modules\General\Feedback\ModuleCore\Services\FeedbackServices;
use App\Components\Modules\General\Feedback\ModuleCore\Traits\Validations;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class FeedbackController
 * @package App\Components\Modules\General\Feedback\Controllers
 */
class FeedbackController extends Controller
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
     * get all Feedback form view
     *
     * @param FeedbackServices $FeedbackServices
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function getFeedbackTable(FeedbackServices $FeedbackServices)
    {
        $data = [];
        $data['feedbackForms'] = $FeedbackServices->getFeedbackForms();
        $data['moduleId'] = $this->module->moduleId;

        return view('General.Feedback.Views.Partials.feedbackTable', $data);
    }

    /**
     * get Feedback add or edit form
     *
     * @param Request $request
     * @param FeedbackServices $FeedbackServices
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function getConfigForm(Request $request, FeedbackServices $FeedbackServices)
    {
        $data = [];
        $data['moduleId'] = $this->module->moduleId;
        if ($id = $request->input('FeedbackFormId')) {
            $data['edit_id'] = $id;
            $data['feedbackData'] = $FeedbackServices->getFeedbackFormById($id);
        }

        return view('General.Feedback.Views.Partials.configForm', $data);
    }

    /**
     * save or update Feedback form
     *
     * @param Request $request
     * @return mixed
     */
    function saveFeedbackForms(Request $request)
    {
        $validator = Validator::make($request->all(), ['name' => 'required', 'description' => 'required']);

        if ($validator->fails())
            return response()->json($validator->errors(), 422);

        if ($id = $request->input('feedbackFormId')) {
            $Feedback = FeedbackForm::find($id);
            $Feedback->name = $request->input('name');
            $Feedback->description = $request->input('description');
            $Feedback->save();
        } else {
            FeedbackForm::create($request->only(['name', 'description']));
        }
    }

    /**
     * delete Feedback form
     *
     * @param Request $request
     * @param FeedbackServices $FeedbackServices
     * @throws \Exception
     */
    function deleteFeedbackForm(Request $request, FeedbackServices $FeedbackServices)
    {
        return $FeedbackServices->deleteFeedbackForm($request->input('feedbackFormId'));
    }


    /**
     * manage feedback questions
     *
     * @param Request $request
     * @param FeedbackServices $FeedbackServices
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function manageFeedBackQuestions(Request $request, FeedbackServices $FeedbackServices)
    {
        $data = [];
        $data['moduleId'] = $this->module->moduleId;
        $data['feedbackFormId'] = $request->input('feedbackFormId');
        if ($questionId = $request->input('questionId')) {
            $data['edit_id'] = $questionId;
            $data['feedbackQuestionData'] = $FeedbackServices->getFeedbackQuestionById($questionId);
        }

        return view('General.Feedback.Views.Partials.questionConfigForm', $data);
    }


    /**
     * save questions
     *
     * @param Request $request
     * @return mixed
     */
    function saveQuestion(Request $request)
    {
        $validator = Validator::make($request->all(), ['question' => 'required']);

        if ($validator->fails())
            return response()->json($validator->errors(), 422);

        if ($questionId = $request->input('questionId')) {
            $Feedback = FeedbackQuestion::find($questionId);
            $Feedback->question = $request->input('question');
            $Feedback->save();
        } else {
            FeedbackQuestion::create($request->only(['question', 'form_id']));
        }
    }

    /**
     * delete question
     *
     * @param Request $request
     * @throws \Exception
     */
    public function deleteQuestion(Request $request)
    {
        FeedbackQuestion::find($request->input('questionId'))->delete();
    }


    /**
     * @param Request $request
     * @param FeedbackServices $FeedbackServices
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function manageFeedBackOptions(Request $request, FeedbackServices $FeedbackServices)
    {
        $data = [];
        $data['moduleId'] = $this->module->moduleId;
        $data['feedbackId'] = $request->input('FeedbackFormId');

        if ($request->input('optionId')) {
            $data['edit_id'] = $request->input('optionId');
            $data['feedbackOptionData'] = $FeedbackServices->getFeedbackOptionById($request->input('optionId'));
        }

        return view('General.Feedback.Views.Partials.optionConfigForm', $data);

    }

    /**
     * @param Request $request
     * @return mixed
     */
    function saveOption(Request $request)
    {
        $validator = Validator::make($request->all(), ['feedback_option' => 'required']);

        if ($validator->fails())
            return response()->json($validator->errors(), 422);

        if ($optionId = $request->input('optionId')) {
            $Feedback = FeedbackOption::find($optionId);
            $Feedback->feedback_option = $request->input('feedback_option');
            $Feedback->save();
        } else {
            FeedbackOption::create($request->only(['feedback_option', 'form_id']));
        }
    }

    /**
     * @param Request $request
     * @throws \Exception
     */
    public function deleteOption(Request $request)
    {
        FeedbackOption::find($request->input('optionId'))->delete();

    }

    /**
     * show the feedback form
     * @param $id
     * @param string $user_id
     * @param FeedbackServices $feedbackServices
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showFeedbackForm($id, $user_id = '', FeedbackServices $feedbackServices)
    {
        $data = [];
        $data['moduleId'] = $this->module->moduleId;
        $data['title'] = _mt($data['moduleId'], 'Feedback.Feedback_Form');
        $data['heading_text'] = _mt($data['moduleId'], 'Feedback.Feedback_Form');
        $data['breadcrumbs'] = [
            _t('index.home') => 'admin.home',
            _mt($data['moduleId'], 'Feedback.Tools') => '#',
            _mt($data['moduleId'], 'Feedback.User_Feedback') => '#',
        ];
        //http://github.com/antennaio/jquery-bar-rating
        $data['scripts'] = [
            asset('global/plugins/barrating/jquery.barrating.min.js'),
        ];
        $data['styles'] = [
            asset('global/plugins/barrating/css-stars.css'),
        ];

        $data['feedbackData'] = $feedbackServices->getUserFeedBackData($id, $user_id);
        $data['form_id'] = $id;

        return view('General.Feedback.Views.feedbackForm', $data);

    }

    /**
     * save answers from feedbackForm
     * @param Request $request
     * @return mixed
     */
    public function saveUserFeedback(Request $request)
    {
        $userId = loggedId();
        $validator = Validator::make($request->all(), ['form_id' => 'required']);
        if ($validator->fails())
            return response()->json($validator->errors());
        $request->merge(['user_id' => $userId]);
        if (!$request->input('options'))
            $request->merge(['options' => []]);

        User::find($userId)->feedBacks()->where('form_id', $request->input('form_id'))
            ->updateOrCreate($request->only(['form_id', 'user_id']), $request->only(['options', 'rating']));
    }

    /**
     * @param FeedbackServices $feedbackServices
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showUserFeedback(FeedbackServices $feedbackServices)
    {
        $data = [];

        $data['moduleId'] = $this->module->moduleId;

        $data['title'] = _mt($data['moduleId'], 'Feedback.User_Feedback');
        $data['heading_text'] = _mt($data['moduleId'], 'Feedback.User_Feedback');
        $data['breadcrumbs'] = [
            _t('index.home') => 'admin.home',
            _mt($data['moduleId'], 'Feedback.Tools') => '#',
            _mt($data['moduleId'], 'Feedback.User_Feedback') => 'feedback.userFeedback',
        ];

        $data['styles'] = [
            asset('global/plugins/select2/css/select2.min.css'),
            asset('global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css'),
            asset('global/plugins/select2/css/select2-bootstrap.min.css'),
            $this->module->getCssPath('style.css'),
        ];
        $data['scripts'] = [
            asset('global/plugins/select2/js/select2.full.min.js'),
            asset('global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'),
        ];
        $data['feedbackForms'] = $feedbackServices->getFeedbackForms();

        return view('General.Feedback.Views.UserFeedback', $data);
    }

    /**
     * @param FeedbackServices $feedbackServices
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function showUserFeedbackFilter(FeedbackServices $feedbackServices)
    {
        $data['moduleId'] = $this->module->moduleId;
        $data['feedbackForms'] = $feedbackServices->getFeedbackForms();

        return view('General.Feedback.Views.Partials.userFeedbackFilter', $data);
    }

    /**
     * @param Request $request
     * @param FeedbackServices $feedbackServices
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showUserFeedbackTable(Request $request, FeedbackServices $feedbackServices)
    {
        $data = [];
        $args = $request->input('filters');
        $data['userFeedbacks'] = $feedbackServices->getUserFeedbackList($args, $request->input('totalToShow', 10));
        $data['moduleId'] = $this->module->moduleId;


        return view('General.Feedback.Views.Partials.userFeedbackTable', $data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function manageFeedbackForm()
    {
        $data = [];
        $scripts = [
            asset('global/plugins/jquery-validation/js/jquery.validate.min.js'),
            asset('global/plugins/jquery-validation/js/additional-methods.min.js'),
            asset('global/plugins/summernote/summernote.min.js')
        ];
        $styles = array(
            asset('global/plugins/summernote/summernote.css')
        );

        $data['scripts'] = $scripts;
        $data['styles'] = $styles;
        $data['id'] = $this->module->moduleId;
        $data['FeedbackData'] = [];

        $data['title'] = _mt($this->module->moduleId, 'Feedback.Manage_Feedback_Form');
        $data['heading_text'] = _mt($this->module->moduleId, 'Feedback.Manage_Feedback_Form');
        $data['breadcrumbs'] = [
            _t('index.home') => 'admin.home',
            _mt($this->module->moduleId, 'Feedback.Tools') => '#',
            _mt($this->module->moduleId, 'Feedback.User_Feedback') => 'feedback.Manage_Feedback_Form',
        ];

        $data['FeedbackData']['data'] = [];

        return view('General.Feedback.Views.manageFeedbackForm', $data);
    }
}
