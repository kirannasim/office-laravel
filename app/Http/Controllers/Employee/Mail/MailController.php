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

namespace App\Http\Controllers\Employee\Mail;

use App\Blueprint\Services\MailServices;
use App\Eloquents\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class MailController
 * @package App\Http\Controllers\Employee\Mail
 */
class MailController extends Controller
{
    /**
     * [index description]
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function index(Request $request)
    {
        $data['styles'] = [
            asset('global/plugins/summernote/summernote.css'),
            asset('global/plugins/dropzone/dropzone.min.css'),
        ];
        $data['scripts'] = [
            asset('global/plugins/summernote/summernote.min.js'),
            asset('global/plugins/dropzone/dropzone.min.js'),
        ];
        $scope = session('theScope') ?: 'user';
        $data['title'] = _t('mail.Mail_Management');
        $data['heading_text'] = _t('mail.Mail_Management');
        $data['breadcrumbs'] = [
            _t('index.home') => "$scope.home",
            _t('mail.Mail_Management') => 'mail'
        ];

        return view('Employee.Mail.index', $data);
    }

    /**
     * MailBox Partial
     * @param Request $request
     * @param MailServices $mailServices
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function mailBox(Request $request, MailServices $mailServices)
    {
        $data['inbox'] = $mailServices->getInbox();
        $data['sentMails'] = $mailServices->getSentMails();
        $data['drafts'] = $mailServices->getDrafts();
        $data['starredMails'] = $mailServices->getStarredMails();
        $data['trashedMails'] = $mailServices->getTrashedMails();
        $data['email'] = explode('@', $request->user()->email);

        return view('Employee.Mail.Partial.mailBox', $data);
    }

    /**
     * render the mail
     *
     * MailReader Partial
     *
     * @param Request $request
     * @param Mail $mail
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function mailReader(Request $request, Mail $mail)
    {
        $mail->load('transactions', 'replies');
        $data['mail'] = $mail;

        return view('Employee.Mail.Partial.mailReader', $data);
    }

    /**
     * Manage Mails
     *
     * @param Request $request
     * @param MailServices $mailServices
     * @return \Illuminate\Http\JsonResponse
     */
    function handleMail(Request $request, MailServices $mailServices)
    {
        switch ($request->action) {
            case 'compose':
                return response()->json(['status' => true, 'mail' => $mailServices->addMail($request)]);
                break;

            case 'draft':
            case 'update':
                return response()->json(['status' => true, 'info' => $mailServices->updateMail($request)]);
                break;

            case 'updateStatus':
                return response()->json(['status' => true, 'info' => $mailServices->updateStatus($request)]);
                break;

            case 'send':
                $this->validate($request, [
                    'recipient' => 'required|exists:users,id',
                    'content' => 'required|min:2',
                ]);
                return response()->json(['status' => true, 'mail' => $mailServices->sendMail($request)]);
                break;

            case 'delete':
                return response()->json(['status' => true, 'mail' => $mailServices->deleteMail($request)]);
                break;

            default:
                return response()->json(['error' => 'This action is not permitted !'], 422);
                break;
        }
    }

    /**
     * @param Request $request
     * @param MailServices $mailServices
     * @return array|\Illuminate\Http\JsonResponse
     */
    function attachment(Request $request, MailServices $mailServices)
    {
        if (!$attachmentType = $request->input('type') || !$request->hasFile('attachment'))
            return response()->json(['status' => false, 'message' => 'invalid attachments'], 403);

        $this->validate($request, $this->attachmentRules($attachmentType));

        return response()->json(['status' => true, 'file' => $mailServices->handleAttachment($request)]);
    }

    /**
     * @param string $attachmentType
     * @return array
     */
    function attachmentRules($attachmentType = 'file')
    {
        switch ($attachmentType) {
            case 'file':
                return [
                    'file' => 'bail|file|size:1024|mimes:pdf,ai,psd,doc,docx'
                ];
                break;
            case 'image':
                return ['image' => 'bail|file|image|size:1024|mimes:jpeg,bmp,png,gif,jpg'];
                break;
        }
    }
}
