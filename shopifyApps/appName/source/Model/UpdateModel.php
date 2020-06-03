<?php

namespace source\Model;

use PDO;

/**
 * Update DB
 */
class UpdateModel {

	public static function exec($token, $script) {
		$conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS ); 

		$sql = "UPDATE ". APP_NAME ." SET script =:script WHERE token =:token";

		$query = $conn->prepare($sql);
		$query->bindValue('script', $script);
		$query->bindValue('token', $token);

		if ( $query->execute() ) {
			unset($conn);
			return true;
		}

	}
}
