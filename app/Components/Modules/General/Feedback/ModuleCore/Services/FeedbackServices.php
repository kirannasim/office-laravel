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

/**
 * Created by PhpStorm.
 * User: Muhammed Fayis
 * Date: 1/11/2018
 * Time: 12:06 AM
 */

namespace App\Components\Modules\General\Feedback\ModuleCore\Services;

use App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackForm;
use App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackOption;
use App\Components\Modules\General\Feedback\ModuleCore\Eloquents\FeedbackQuestion;
use App\Components\Modules\General\Feedback\ModuleCore\Eloquents\UserFeedback;
use Illuminate\Database\Eloquent\Builder;


/**
 * Class FeedbackServices
 * @package App\Components\Modules\General\Feedback\ModuleCore\Services
 */
class FeedbackServices
{
    /**
     * Get all feedback forms
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    function getFeedbackForms()
    {
        return FeedbackForm::with('questions', 'options')->get();
    }

    /**
     * get feedback form data by id
     *
     * @param $id
     * @return mixed
     */
    function getFeedbackFormById($id)
    {
        return FeedbackForm::find($id);
    }

    /**
     * delete feedback form
     *
     * @param $id
     * @throws \Exception
     */
    function deleteFeedbackForm($id)
    {
        FeedbackForm::find($id)->delete();
    }

    /**
     * get feed back question from question id
     *
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    function getFeedbackQuestionById($id)
    {
        return FeedbackQuestion::find($id);
    }

    /**
     * get feedback option by id
     *
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    function getFeedbackOptionById($id)
    {
        return FeedbackOption::find($id);
    }


    /**
     * get user feedback data
     *
     * @param $id
     * @param $userId
     * @return FeedbackForm|FeedbackForm[]|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    function getUserFeedBackData($id, $userId = '')
    {
        $userId = $userId ?: loggedId();

        return FeedbackForm::with('questions', 'options')
            ->with(['userFeed' => function ($query) use ($userId) {
                /** @var Builder $query */
                $query->where('user_id', $userId);
            }])->find($id);
    }


    /**
     * get user feedback list
     *
     * @param $args
     * @param null $pages
     * @return mixed
     */
    public function getUserFeedbackList($args, $pages = null)
    {
        $method = $pages ? 'paginate' : 'get';

        return UserFeedback::with('feedBckForm')
            ->when(isset($args['form_id']), function ($query) use ($args) {
                $query->where('form_id', $args['form_id']);
            })
            ->when(isset($args['fromDate']), function ($query) use ($args) {
                $query->where('created_at', '>=', $args['fromDate']);
            })
            ->when(isset($args['toDate']), function ($query) use ($args) {
                $query->where('created_at', '<=', $args['toDate']);
            })
            ->when(isset($args['user_id']), function ($query) use ($args) {
                $query->where('user_id', $args['user_id']);
            })
            ->{$method}($pages);
    }
}
