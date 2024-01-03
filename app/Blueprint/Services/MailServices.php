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

namespace App\Blueprint\Services;

use App\Blueprint\Facades\UserServer;
use App\Eloquents\Attachment;
use App\Eloquents\Mail;
use App\Eloquents\MailTags;
use App\Eloquents\MailTransaction;
use App\Eloquents\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Blueprint\Services\ExternalMailServices;

/**
 * Class MailServices
 * @package App\Blueprint\Services
 */
class MailServices
{
    /**
     * Allowed Field for Mail Transaction table
     *
     * @return array
     */
    function allowedTransactionFields()
    {
        return ['mail_id', 'recipient', 'starred', 'is_read', 'tag'];
    }

    /**
     * Send mail
     *
     * @param $request
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    function sendMail($request)
    {
        $mail = $request->input('mailId') ? Mail::find($request->mailId) : $this->addMail($request);

        $mail->transactions()->create(['user_id' => loggedId(), 'role' => 'sender']);

        $types = $request->input('type');
        foreach ($request->input('recipient') as $key => $value)
        {
            if($types[$key] == 'user')
            {
                $mail->transactions()->create([
                    'role' => 'recipient',
                    'user_id' => $value,
                    'mail_id' => $mail->id
                ]);
            }

            $content = $request->input('content');
            $subject = $request->input('subject');
            $mail_service = new ExternalMailServices();

            try{
                $mail_service->sendMail(collect([
                    'recipient'=>$value,
                    'mailBody'=>$content,
                    'subject'=>$subject,
                    'from'=>User::find(loggedId()),
                    'attachment'=>null
                ]));    
            }
            catch(Exception $e)
            {
                //
            }
        }


        $mail->update(['status' => 2]);

        return $mail;
    }

    /**
     * Save new mail
     *
     * @param $request
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    function addMail($request)
    {
        return Mail::create($request->only($this->allowedFields()));
    }

    /**
     * Allowed Fields for Mail table
     *
     * @return array
     */
    function allowedFields()
    {
        return ['subject', 'content', 'reply_to'];
    }

    /**
     * Update mail
     *
     * @param $request
     * @return bool
     */
    function updateMail(Request $request)
    {
        $values = collect($request->all())->filter(function ($value, $key) {
            return in_array($key, $this->allowedFields());
        })->all();

        return Mail::find($request->mailId)->update($values);
    }

    /**
     * Update mail status
     * @param Request $request
     * @return null
     */
    function updateStatus(Request $request)
    {
        $values = collect($request->all())->filter(function ($value, $key) {
            return in_array($key, $this->allowedStatus());
        })->all();

        loggedUser()->mails()->updateExistingPivot($request->mail_id, $values);

        switch ($request->input('info')) {
            case 'starred':
                return $this->getStarredMails()->count();
                break;

            default:
                return null;
                break;
        }
    }

    /**
     * Allowed mail statuses
     *
     * @return array
     */
    function allowedStatus()
    {
        return ['is_read', 'starred'];
    }

    /**
     * Get starred mails
     *
     * @param array $options
     * @return mixed
     */
    function getStarredMails($options = [])
    {
        return loggedUser()->mails()->with('transactions', 'replies')
            ->where(array_merge([['reply_to', 0]], $options))
            ->withPivot('is_read', 'starred')
            ->wherePivot('starred', 1)
            ->wherePivot('role', 'recipient')->get();
    }

    /**
     * Mark Tag
     *
     * @param $options
     * @return bool
     */
    function markTag($options)
    {
        if ($options->type == 'sender')
            return Mail::where('id', $options->id)->update('tag', $options->tag_id);
        else
            return MailTransaction::where('id', $options->id)->update('tag', $options->tag_id);
    }

    /**
     * get all tags
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    function getTags()
    {
        return MailTags::get();
    }

    /**
     * get mails in inbox
     *
     * @param array $options
     * @return static
     */
    function getInbox($options = [])
    {
        $sent = $this->getSentMails($options, true)->map(function ($value) {
            $value->created_at = $value->replies->first()->created_at;
            return $value;
        });

        $mails = $this->getReceivedMails($options)->merge($sent)->sortByDesc('created_at');

        return $mails;
    }

    /**
     * get all send mails
     *
     * @param array $options
     * @param bool $hasReplies
     * @return mixed
     */
    function getSentMails($options = [], $hasReplies = false)
    {
        $options = collect([
            'fromDate' => (new MailTransaction)->min('created_at'),
            'toDate' => date('Y-m-d H:i:s'),
        ])->merge($options);
        $transactionTable = (new MailTransaction)->getTable();

        return User::find($options->get('userId', loggedId()))
            ->mails()->with('transactions.user', 'replies')
            ->withPivot('is_read', 'starred')
            ->wherePivot('role', 'sender')
            ->when($hasReplies, function ($query) {
                /** @var Builder $query */
                $query->has('replies');
            })
            ->whereHas('transactions', function ($query) use ($options) {
                /** @var Builder $query */
                $query->where('user_id', $options->get('userId', loggedId()))
                    ->whereBetween('created_at', [$options->get('fromDate'), $options->get('toDate')]);
            })
            ->where(array_merge([['status', 2], ['reply_to', 0]], $options->get('wheres', [])))
            ->when($options->get('groupBy'), function ($query) use ($options) {
                $this->groupBy($query, $options->get('groupBy'));
            })
            ->orderBy("$transactionTable.created_at", 'DESC')->get();
    }

    /**
     * @param Builder $query
     * @param string $groupBy
     * @return Builder
     */
    function groupBy(Builder &$query, $groupBy = 'month')
    {
        $table = (new MailTransaction)->getTable();

        switch ($groupBy) {
            case 'month':
            case 'year':
            case 'day':
            case 'hour':
                /** @var Builder $query */
                $query->groupBy(DB::raw("$groupBy($table.created_at)"))
                    ->selectRaw("*, MONTH($table.created_at) month,YEAR($table.created_at) year, DAY($table.created_at) day, COUNT(1) total");
                break;
            default:
                /** @var Builder $query */
                $query->groupBy($groupBy);
                break;
        }

        return $query;
    }

    /**
     * @param array $options
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    function getReceivedMails($options = [])
    {
        $options = collect([
            'fromDate' => (new MailTransaction)->min('created_at'),
            'toDate' => date('Y-m-d H:i:s'),
        ])->merge($options);

        return User::find($options->get('userId', loggedId()))
            ->mails()->with('transactions', 'replies')
            ->where(array_merge([['status', 2], ['reply_to', 0]], $options->get('wheres', [])))
            ->wherePivot('role', 'recipient')
            ->withPivot('is_read', 'starred')
            ->whereHas('transactions', function ($query) use ($options) {
                /** @var Builder $query */
                $query->where('user_id', $options->get('userId', loggedId()))
                    ->whereBetween('created_at', [$options->get('fromDate'), $options->get('toDate')]);
            })
            ->when($options->get('groupBy'), function ($query) use ($options) {
                $this->groupBy($query, $options->get('groupBy'));
            })->get();
    }

    /**
     * get all Drafts
     *
     * @param array $options
     * @return \Illuminate\Database\Eloquent\Collection
     */
    function getDrafts($options = [])
    {
        $options = collect([
            'fromDate' => (new Mail)->min('created_at'),
            'toDate' => date('Y-m-d H:i:s'),
        ])->merge($options);
        $table = (new Mail)->getTable();

        return User::find($options->get('userId', loggedId()))
            ->mails()->with('transactions.user')
            ->wherePivot('role', 'sender')
            ->where(array_merge([['status', 1]], $options->get('wheres', [])))
            ->when($options->get('groupBy'), function ($query) use ($options) {
                $this->groupBy($query, $options->get('groupBy'));
            })
            ->whereBetween("$table.created_at", [$options->get('fromDate'), $options->get('toDate')])
            ->orderBy("$table.created_at", 'DESC')->get();
    }

    /**
     * get trashed mails
     *
     * @param array $options
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    function getTrashedMails($options = [])
    {
        $options = collect([])->merge($options);

        return User::find($options->get('userId', loggedId()))
            ->mails()
            ->where($options->get('wheres', []))
            ->wherePivot('role', 'recipient')
            ->with('transactions', 'replies')
            ->doesntHave('transactions')
            ->when($options->get('groupBy'), function ($query) use ($options) {
                $this->groupBy($query, $options->get('groupBy'));
            })->get();
    }

    /**
     * Delete Mail
     *
     * @param $request
     * @return bool
     */
    function deleteMail($request)
    {
        foreach ($request->mail_ids as $key => $id)
            loggedUser()->mailTransactions()->where('mail_id', $id)->delete();

        return true;
    }

    /**
     * Replace letter body With Dynamic content
     *
     * @param $id
     * @param $content
     * @return mixed
     */
    function replaceLetterBody($id, $content)
    {
        $profile_data = UserServer::getProfileData($id);
        $content = str_replace("#username", $profile_data->username, $content);
        $content = str_replace("#sponsorname", $profile_data->sponsor_name, $content);
        $content = str_replace("#placementname", $profile_data->placement_name, $content);

        return $content;
    }

    /**
     * get unread mails in inbox
     *
     * @param array $options
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    function getUnreadInbox($options = [])
    {
        $options = collect($options);

        return User::find($options->get('userId', loggedId()))
            ->mails()
            ->where(array_merge([['reply_to', 0]], $options->get('wheres', [])))
            ->wherePivot('role', 'recipient')
            ->whereHas('transactions', function ($query) {
                /** @var Builder $query */
                $query->where('user_id', loggedId())
                    ->where('is_read', 0);
            })
            ->when($options->get('groupBy'), function ($query) use ($options) {
                $this->groupBy($query, $options->get('groupBy'));
            })->get();
    }

    /**
     * @param Request $request
     * @return array
     */
    function handleAttachment(Request $request)
    {
        return loggedUser()->attachments()->save(new Attachment([
            'uri' => $file = $request->file('attachment')->store("attachments/mail/{$request->user()->id}"),
            'size' => File::size($filePath = storage_path("app/public/$file")),
            'type' => File::type($filePath),
            'mime' => File::mimeType($filePath),
            'context' => 'mail',
        ]));
    }
}
