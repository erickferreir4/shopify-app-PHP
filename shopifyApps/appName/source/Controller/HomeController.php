<?php

namespace source\Controller;

use source\Model\SelectModel;
use source\Classes\Install;

class HomeController {

	public $title = 'Home';

	public function __construct() {

		$this->checkInstall();

		require_once __DIR__ . '/../View/_includes/_header.php';
		require_once __DIR__ . '/../View/home/HomeView.php';
		require_once __DIR__ . '/../View/_includes/_footer.php';
	}


	public function checkInstall() {

		$shop = $_GET['shop'];
		$result = SelectModel::exec($shop);

		if ( count($result) === 0 ) {
			Install::exec();
		}
	}

}
