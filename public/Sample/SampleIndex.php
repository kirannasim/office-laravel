<?php

namespace App\Components\Modules\General\Sample;

use App\Blueprint\Interfaces\Module\ModuleBasicInterface as BasicContract;

class SampleIndex implements BasicContract{

	/**
	 * give modules registry informations
	 */

	function registry(){

		$registry = file_exists( __dir__ . '/ModuleRegistry.php')?require('ModuleRegistry.php'):[];
		return $registry;
	}

	/**
	 * handle module installations
	 */
	
	function install(){
		
	}

	/**
	 * handle module uninstallation
	 */
	
	function uninstall(){

	}

}