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

use App\Blueprint\Interfaces\Module\CommissionModuleInterface;
use App\Blueprint\Interfaces\Module\ModuleBasicAbstract;
use App\Eloquents\TransactionOperation;
use Illuminate\Database\Eloquent\Builder;


/**
 * Class CommissionServices
 * @package App\Blueprint\Services
 */
class CommissionServices
{
    /**
     * @param CommissionModuleInterface|ModuleBasicAbstract|null $module
     * @param array $options
     * @param null $model
     * @return mixed
     */
    function getTransactions(CommissionModuleInterface $module = null, $options = [], $model = null)
    {
        /** @var TransactionServices $transactionServices */
        $transactionServices = app(TransactionServices::class);
        $args = array_merge([
            'operation' => $operation = TransactionOperation::slugToId('commission')
        ], $options);

        return $transactionServices->getTransactions(collect($args), $model)
            ->with('commission')
            ->when($module, function ($query) use ($module) {
                /** @var Builder $query */
                $query->whereHas('commission', function ($query) use ($module) {
                    /** @var Builder $query */
                    $query->where('module_id', $module->moduleId);
                });
            });
    }
}
