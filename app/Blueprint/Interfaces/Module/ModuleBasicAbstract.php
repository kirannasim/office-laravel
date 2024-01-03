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

namespace App\Blueprint\Interfaces\Module;

use App\Blueprint\Interfaces\Core\ComponentAbstract;
use App\Blueprint\Interfaces\Module\ModuleBasicInterface as BasicContract;
use App\Blueprint\Services\UtilityServices;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

/**
 * Class ModuleBasicAbstract
 * @package App\Blueprint\Interfaces\Module
 */
abstract class ModuleBasicAbstract extends ComponentAbstract implements BasicContract
{
    public $moduleId;

    public $configPageType = 'async';

    public $configRelation = 'config';

    public $componentType = 'module';

    /**
     * Set Module ID
     *
     * @param integer $id
     */
    public function setModuleId($id)
    {
        $this->moduleId = $id;
    }

    /**
     * Get module Data
     *
     * @param bool $returnCollection
     * @return array|Collection module data
     */
    function getModuleData($returnCollection = false)
    {
        $data = isset($this->getComponentData()->module_data) ? $this->getComponentData()->module_data : [];

        return $returnCollection ? collect($data) : $data;
    }

    /**
     * @param array $moduleData
     * @return mixed
     */
    function preProcessModuleData($moduleData = [])
    {
        return $moduleData;
    }

    /**
     * Save module Data
     *
     * @param Request $request
     * @param UtilityServices $utilityServices
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function saveData(Request $request, UtilityServices $utilityServices)
    {
        $validator = Validator::make($request->all(), $this->moduleDataValidationRules(), $this->moduleDataValidationMessages(), $this->moduleDataValidationAttributes());

        if ($validator->fails())
            return response()->json($validator->errors(), 422);

        $this->setModuleData(app()->call([$this, 'preProcessModuleData'], ['moduleData' => $request->input('module_data')]));

        app()->call([$utilityServices, 'setActivityHistory'], ['operation' => 'module_config_updated', 'data' => [
            'module' => getModule((int)$request->input('module_id'))->getRegistry(),
            'data' => $request->input('module_data'),
            'on_user_id'=>loggedId()
        ]]);
    }

    /**
     * Module Data Validation Rules
     *
     * @return array rules
     */
    function moduleDataValidationRules()
    {
        return [];
    }

    /**
     * Module Data Validation Messages
     *
     * @return array
     */
    function moduleDataValidationMessages()
    {

        return [];
    }

    /**
     * Module Data Validation Attributes
     *
     * @return array
     */
    function moduleDataValidationAttributes()
    {

        return [];
    }

    /**
     * Set module Data
     *
     * @param $data
     * @return bool status of action
     */
    function setModuleData($data)
    {
        $this->setComponentData(['module_data' => $data]);

        return true;
    }

    /**
     * @return string
     */
    function getConfigRoute()
    {
        return route('admin.module.configure', [$this->moduleId]);
    }

    /**
     * @return string
     */
    public function getConfigPageType()
    {
        return $this->configPageType;
    }

    /**
     * @param string $configPageType
     * @return ModuleBasicAbstract
     */
    public function setConfigPageType($configPageType)
    {
        $this->configPageType = $configPageType;

        return $this;
    }

    /**
     * Translate the given message.
     *
     * @param string $key
     * @param array $replace
     * @param string $locale
     * @return \Illuminate\Contracts\Translation\Translator|string
     */
    function translate($key = null, $replace = [], $locale = null)
    {
        return __(Str::camel($this->registry['slug']) . '::' . $key, $replace, $locale);
    }
}
