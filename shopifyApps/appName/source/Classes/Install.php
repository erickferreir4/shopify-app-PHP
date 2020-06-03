<?php

namespace source\Classes;

/**
 * Install app
 */
class Install {
	public static function exec() {

		$shop = $_GET['shop'];

		// Build install/approval URL to redirect to
		$install_url = "https://" . $shop . "/admin/oauth/authorize?client_id=" . API_KEY . "&scope=" . SCOPES . "&redirect_uri=" . urlencode(REDIRECT_URI);

		//Redirect
		header("Location: " . $install_url);
		die();
	}
}
