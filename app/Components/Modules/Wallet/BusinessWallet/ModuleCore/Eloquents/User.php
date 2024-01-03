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

namespace App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Eloquents;

use App\Blueprint\Services\TransactionServices;
use App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Services\BusinessWalletServices;
use App\Eloquents\TransactionOperation;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class User
 *
 * @package App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Eloquents
 * @property int $id
 * @property string $customer_id
 * @property string $username
 * @property string $email
 * @property int $status
 * @property string $password
 * @property string $phone
 * @property string|null $deleted_at
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Eloquents\Attachment[] $attachments
 * @property-read int|null $attachments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Components\Modules\Commission\PerformanceFeeCommission\ModuleCore\Eloquents\InvestmentClient[] $investmentClients
 * @property-read int|null $investment_clients_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Eloquents\MailTransaction[] $mailTransactions
 * @property-read int|null $mail_transactions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Eloquents\Mail[] $mails
 * @property-read int|null $mails_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankUser $rank
 * @property-read \App\Eloquents\UserRole $role
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Eloquents\Transaction[] $transactions
 * @property-read int|null $transactions_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Eloquents\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Eloquents\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Eloquents\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Eloquents\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Eloquents\User whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Eloquents\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Eloquents\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Eloquents\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Eloquents\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Eloquents\User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Eloquents\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Eloquents\User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Eloquents\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Components\Modules\Wallet\BusinessWallet\ModuleCore\Eloquents\User whereUsername($value)
 * @mixin \Eloquent
 */
class User extends \App\Eloquents\User
{
    /**
     * Wallet Data
     *
     * @param array $data [description]
     * @return mixed
     */
    function walletData($data = [])
    {
        return !$data ? $this->hasOne(BusinessWallet::class)
            : ($this->walletData()->save(new BusinessWallet($data)));
    }

    /**
     * Get user transaction password
     *
     * @return string
     */
    function transactionPass()
    {
        return decrypt($this->walletData->transaction_password);
    }

    /**
     * get balance
     *
     * @param array $options
     * @return mixed
     */
    function balance($options = [])
    {
        return $this->credited($options, false) - $this->debited($options)->sum('amount');
    }

    /**
     * @param array $options
     * @param bool $returnBuilder
     * @return Builder|static
     */
    function credited($options = [], $returnBuilder = true)
    {
        /** @var BusinessWalletServices $businessWalletServices */
        $businessWalletServices = app(BusinessWalletServices::class);
        $defaults = collect([
            'wallet' => [null, $this->getWalletId()]
        ]);
        $extraIncome = $businessWalletServices->getExtraIncome(collect($options));

        $query = app(TransactionServices::class)->getTransactions($defaults->merge($options));

        return $returnBuilder ? $query : $query->sum('amount') + $extraIncome->sum('totalCharges') + $extraIncome->sum('cartTotalAmount');
    }

    /**
     * @return mixed
     */
    function getWalletId()
    {
        return callModule('Wallet-BusinessWallet')->moduleId;
    }

    /**
     * @param array $options
     * @return Builder|static
     */
    function debited($options = [])
    {
        $defaults = collect([
            'wallet' => [$this->getWalletId(), null],
            'operation' => [TransactionOperation::slugToId('deposit'), '<>']
        ]);

        return app(TransactionServices::class)
            ->getTransactions($defaults->merge($options));
    }
}