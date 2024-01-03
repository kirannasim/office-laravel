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

use Illuminate\Support\Facades\Cache;

/**
 * Class LanguageHelper
 * @package App\Blueprint\Services
 */
class LanguageHelper
{

    private $languageDir;

    private $languages;

    function __construct()
    {
        $this->languageDir = themePath('Languages');
        $this->languages = $this->setLanguageFolders();
    }

    /**
     * Detect a language folders and save in to cache
     *
     * @return Boolean status
     */

    function setLanguageFolders()
    {
        if (Cache::get('languageDirs')) {
            return Cache::get('languageDirs');
        } else {
            $folders = listFolders($this->languageDir);
            $this->languageDirs = tap($folders, function ($folders) {
                Cache::forever('languageDirs', $folders);
            });
        }
    }

    /**
     * Detect a language folder exist
     *
     * @param null $slug
     * @return bool status
     */

    function checkLanguageDir($slug = null)
    {
        return in_array($slug, (array)$this->languages) ? true : false;
    }

}
