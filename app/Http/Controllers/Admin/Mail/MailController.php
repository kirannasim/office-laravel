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

namespace App\Http\Controllers\Admin\Mail;

use App\Blueprint\Services\MailServices;
use App\Eloquents\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Blueprint\Facades\MailServer;

/**
 * Class MailController
 * @package App\Http\Controllers\Admin\Mail
 */
class MailController extends Controller
{
    /**
     * [index description]
     * @return Factory|View
     */
    function index()
    {
        $scope = session('theScope') ?: 'user';
        $data = [
            'scripts' => [
                asset('global/plugins/summernote/summernote.min.js'),
                asset('global/plugins/dropzone/dropzone.min.js'),
            ],
            'styles' => [
                asset('global/plugins/summernote/summernote.css'),
                asset('global/plugins/dropzone/dropzone.min.css'),
            ],
            'title' => _t('mail.Mail_Management'),
            'heading_text' => _t('mail.Mail_Management'),
            'breadcrumbs' => [
                _t('index.home') => "$scope.home",
                _t('mail.Mail_Management') => "$scope.mail"
            ],
        ];

        return view('Admin.Mail.index', $data);
    }

    /**
     * MailBox Partial
     * @param Request $request
     * @param MailServices $mailServices
     * @return Factory|View
     */
    function mailBox(Request $request, MailServices $mailServices)
    {
        $data = [
            'inbox' => $mailServices->getInbox(),
            'sentMails' => $mailServices->getSentMails(),
            'drafts' => $mailServices->getDrafts(),
            'starredMails' => $mailServices->getStarredMails(),
            'trashedMails' => $mailServices->getTrashedMails(),
            'email' => explode('@', $request->user()->email),
        ];

        return view('Admin.Mail.Partial.mailBox', $data);
    }

    /**
     * render the mail
     *
     * MailReader Partial
     *
     * @param Request $request
     * @param Mail $mail
     * @return Factory|View
     */
    function mailReader(Request $request, Mail $mail)
    {
        $mail->load('transactions', 'replies');
        $data['mail'] = $mail;

        return view('Admin.Mail.Partial.mailReader', $data);
    }

    /**
     * @param Request $request
     * @param MailServices $mailServices
     * @return array|JsonResponse
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

    /**
     * Manage Mails
     *
     * @param Request $request
     * @param MailServices $mailServices
     * @return JsonResponse
     */
    function handleMail(Request $request)
    {
        switch ($request->action) {
            case 'compose':
                return response()->json(['status' => true, 'mail' => MailServer::addmail($request)]);
                break;

            case 'draft':
            case 'update':
                return response()->json(['status' => true, 'info' => MailServer::updateMail($request)]);
                break;

            case 'updateStatus':
                return response()->json(['status' => true, 'info' => MailServer::updateStatus($request)]);
                break;

            case 'send':
                $this->validate($request, [
                    'recipient' => 'required',
                    'content' => 'required|min:2',
                ]);
                return response()->json(['status' => true, 'mail' => MailServer::sendMail($request)]);
                break;

            case 'delete':
                return response()->json(['status' => true, 'mail' => MailServer::deleteMail($request)]);
                break;

            default:
                return response()->json(['error' => 'This action is not permitted !'], 422);
                break;
        }
    }
}