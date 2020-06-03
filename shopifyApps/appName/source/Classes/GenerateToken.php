<?php

namespace source\Classes;

use source\Model\InsertModel;
use source\Classes\ShopifyCall;

/**
 * Generate Token 
 * generate token when installed
 * create webHooks when installed
 * webHooks = remove db shop when uninstall 
 *
 * code by = https://github.com/nyalex/shopify-generating-api-token-guide
 */
class GenerateToken {

	public static function exec() {

		$params = $_GET; // Retrieve all request parameters
		$hmac = $_GET['hmac']; // Retrieve HMAC request parameter
		
		$params = array_diff_key($params, array('hmac' => '')); // Remove hmac from params
		ksort($params); // Sort params lexographically

		$computed_hmac = hash_hmac('sha256', http_build_query($params), SECRET_KEY);

		// Use hmac data to check that the response is from Shopify or not
		if (hash_equals($hmac, $computed_hmac)) {

			// Set variables for our request
			$query = array(
				"client_id" => API_KEY, // Your API key
				"client_secret" => SECRET_KEY, // Your app credentials (secret key)
				"code" => $params['code'] // Grab the access key from the URL
			);

			// Generate access token URL
			$access_token_url = "https://" . $params['shop'] . "/admin/oauth/access_token";

			// Configure curl client and execute request
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_URL, $access_token_url);
			curl_setopt($ch, CURLOPT_POST, count($query));
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($query));
			$result = curl_exec($ch);
			curl_close($ch);

			// Store the access token
			$result = json_decode($result, true);
			$access_token = $result['access_token'];

			// Show the access token (don't do this in production!)
			//echo $access_token;

			//SAVE TOKEN IN BD
			if ( InsertModel::exec( $access_token, $params['shop'] ) ) {

				$array = array(
					'webhook' => array(
						'topic' => 'app/uninstalled', 
						'address' => BASE_URL .'/shopifyApps/'. APP_NAME .'/source/delete.php?shop=' . $params['shop'],
						'format' => 'json'
					)
				);

				$shopName = explode('.', $params['shop'])[0];
				$webhook = ShopifyCall::exec($access_token, $shopName, "/admin/api/". VERSION_API ."/webhooks.json", $array, 'POST');
				//$webhook = json_decode($webhook['response'], JSON_PRETTY_PRINT);


				$redirectUrl = 'https://' . $params['shop'] . '/admin/apps';
				header("Location: " . $redirectUrl);
			}
		}

	   	else {
			// Someone is trying to be shady!
			die('This request is NOT from Shopify!');
		}
	}
}


