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
 * Date: 4/16/2018
 * Time: 11:59 AM
 */

namespace App\Blueprint\Traits;


/**
 * Interface Validators
 * @package App\Blueprint\Traits
 */
trait Validators
{
    /**
     * @return mixed
     */
    function validatorRules()
    {
        return [
            'required' => [
                'name' => 'Required',
            ],
            'required_if' => [
                'name' => 'Required if',
                'paramType' => 'text'
            ],
            'different' => [
                'name' => 'Different',
                'paramType' => 'text'
            ],
            'email' => [
                'name' => 'E-mail',
            ],
            'min' => [
                'name' => 'Minimum',
                'paramType' => 'text'
            ],
            'max' => [
                'name' => 'Maximum',
                'paramType' => 'text'
            ],
            'nullable' => [
                'name' => 'Allow null value',
            ],
            'exists' => [
                'name' => 'Exists',
            ],
            'numeric' => [
                'name' => 'Numeric',
            ],
            'integer' => [
                'name' => 'Integer',
            ],
            'digits' => [
                'name' => 'Digits',
            ],
            'boolean' => [
                'name' => 'Boolean',
            ],
            'alpha' => [
                'name' => 'Alpha numeric',
            ],
            'json' => [
                'name' => 'JSON',
            ],
            'image' => [
                'name' => 'Image',
            ],
            'date' => [
                'name' => 'Date',
            ],
            'before' => [
                'name' => 'Before date',
                'paramType' => 'date'
            ],
            'after' => [
                'name' => 'After date',
                'paramType' => 'date'
            ],
            'accepted' => [
                'name' => 'Accepted',
            ],
            'dimensions' => [
                'name' => 'Dimensions',
            ],
            'distinct' => [
                'name' => 'Distinct',
            ],
            'active_url' => [
                'name' => 'Active URL',
            ],
            'ip' => [
                'name' => 'IP',
            ],
            'between' => [
                'name' => 'Between',
                'paramType' => 'text'
            ],
            'regex' => [
                'name' => 'Regex match',
                'paramType' => 'text'
            ]
        ];
    }
}
