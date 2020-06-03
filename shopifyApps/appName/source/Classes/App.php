<?php

namespace source\Classes;

/**
 * friendly routes
 */
class App {

	public $rootControll;

	public function __construct() {

		$this->rootControll = $this->getUrl();
		new $this->rootControll();
	}

	public function getUrl() {

		$path = $_SERVER['REQUEST_URI'];
		$path = trim($path, '/'); 
		$path = explode("?", $path)[0];


		if ( $path == "shopifyApps/" . APP_NAME . "/source/" || $path == "shopifyApps/". APP_NAME ."/source/index.php" ) {
			return 'source\Controller\HomeController';
		} 

		$file = __DIR__ . "/../Controller/" . $path . "Controller.php";

		if ( file_exists($file) ) {
			return 'source\Controller\\' . $path . 'Controller';  
		}

		return 'source\Controller\NotFoundController';
	}
}

