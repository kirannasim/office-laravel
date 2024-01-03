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

namespace App\Http\Controllers\User\Mail;

use App\Blueprint\Facades\MailServer;
use App\Blueprint\Services\MailServices;
use App\Eloquents\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class MailController
 * @package App\Http\Controllers\Admin\Mail
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
        $styles = [
            asset('global/plugins/summernote/summernote.css'),
        ];
        $scripts = [
            asset('global/plugins/summernote/summernote.min.js'),
            asset('global/plugins/dropzone/dropzone.min.js'),
        ];
        $data['styles'] = $styles;
        $data['scripts'] = $scripts;

        return view('User.Mail.index', $data);
    }

    /**
     * MailBox Partial
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function mailBox(Request $request)
    {
        $data['inbox'] = MailServer::getInbox();
        $data['sentMails'] = MailServer::getSentMails();
        $data['drafts'] = MailServer::getDrafts();
        $data['starredMails'] = MailServer::getStarredMails();
        $data['trashedMails'] = MailServer::getTrashedMails();
        $data['email'] = explode('@', $request->user()->email);

        return view('User.Mail.Partial.mailBox', $data);
    }

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

        return view('User.Mail.Partial.mailReader', $data);
    }

    function attachment(Request $request, MailServices $mailServices)
    {
        if (!$attachmentType = $request->input('type') || !$request->hasFile('attachment'))
            return response()->json(['status' => false, 'message' => 'invalid attachments'], 403);

        $this->validate($request, $this->attachmentRules($attachmentType));

        return response()->json(['status' => true, 'file' => $mailServices->handleAttachment($request)]);
    }

    /**
     * Manage Mails
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
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
