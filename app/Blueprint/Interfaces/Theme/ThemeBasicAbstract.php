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

namespace App\Blueprint\Interfaces\Theme;

use App\Blueprint\Interfaces\Core\ComponentAbstract;
use App\Blueprint\Interfaces\Theme\ThemeBasicInterface as BasicContract;
use Illuminate\Support\Facades\Validator;

/**
 * Class ThemeBasicAbstract
 * @package App\Blueprint\Interfaces\Theme
 */
abstract class ThemeBasicAbstract extends ComponentAbstract implements BasicContract
{
    public $templatePath;

    public $themeId;

    public $configRelation = 'config';

    public $componentType = 'theme';

    /**
     * Set Theme ID
     *
     * @param integer $id
     */
    public function setThemeId($id)
    {
        $this->themeId = $id;
    }

    /**
     * Get theme Data
     *
     * @return array theme data
     */
    function getThemeData()
    {
        return $this->getComponentData();
    }

    /**
     * Save theme Data
     *
     * @param $request
     * @return \Illuminate\Http\JsonResponse [type] [description]
     */
    public function saveData($request)
    {
        $validator = Validator::make($request->all(), $this->themeDataValidationRules());

        if ($validator->fails())
            return response()->json($validator->errors(), 422);

        $this->setThemeData($request->input('theme_data'));
    }

    /**
     * Theme Data Validation Rules
     * @return array rules
     */
    function themeDataValidationRules()
    {
        return [];
    }

    /**
     * Set theme Data
     *
     * @param $data
     * @return boolean status of action
     */
    function setThemeData($data)
    {
        $this->setComponentData(['theme_data' => $data]);

        return true;
    }

    /**
     * @return mixed
     */
    public function getTemplatePath()
    {
        return $this->templatePath;
    }

    /**
     * @param mixed $templatePath
     */
    public function setTemplatePath($templatePath)
    {
        $this->templatePath = $templatePath;
    }
}
