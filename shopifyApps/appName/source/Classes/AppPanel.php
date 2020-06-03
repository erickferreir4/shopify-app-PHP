<?php

namespace source\Classes;

use source\Model\SelectModel;
use source\Model\UpdateModel;

use source\Classes\ShopifyCall;


/**
 * panel config in shopify
 * create config app in this class
 */
class AppPanel {

	public function __construct() {

		if ( isset($_GET['shop']) ) {
			$shop = $_GET['shop'] . '.myshopify.com';
		}
		else {
			die();
		}

		if ( isset($_GET['active']) && json_decode($_GET['active']) == true ) {
			self::enable($shop);
		}
		else if ( isset($_GET['active']) ) {
	  		self::disable($shop);
		}

		else if ( isset($_GET['script']) ) {
			self::getScript($shop);
		}
	}

	/**
	 * basic enable app
	 * append script in shop
	 */
	private function enable($shop) {

		$result = SelectModel::exec($shop);
		$token = $result[0]['token'];

		$shop = $_GET['shop'];

		$scriptArray = [
			'script_tag' => [
				'event' => 'onload',
				'src' => BASE_URL .'/shopifyApps/'. APP_NAME .'/source/assets/js/script.js'
			]
		];

		$scriptTag = ShopifyCall::exec($token, $shop, "/admin/api/". VERSION_API ."/script_tags.json", $scriptArray , 'POST');


		$scriptTag = (array) json_decode($scriptTag['response']);
		$scriptId = $scriptTag["script_tag"]->id;

		if( UpdateModel::exec($token, $scriptId) ) {
			echo json_encode($scriptId);
		}
	}

	/**
	 * basic disable app
	 * remove script in shop
	 */
	private function disable($shop) {

		$result = SelectModel::exec($shop);
		$token = $result[0]['token'];

		$shop = $_GET['shop'];

		$scriptTag = ShopifyCall::exec($token, $shop, "/admin/api/". VERSION_API ."/script_tags/" . $result[0]['script'] . ".json", [] , 'DELETE');

		if( UpdateModel::exec($token, null) ) {
			echo json_encode($scriptTag);
		}

	}

	/**
	 * basic check enabled script in shop
	 */
	private function getScript($shop) {

		$result = SelectModel::exec($shop);

		if ( count($result[0]['script']) ) {
			 echo json_encode(true);
			 return;
		}
		echo json_encode(false);
	}

}
