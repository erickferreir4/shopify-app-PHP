<?php

namespace source\Model;

use PDO;

/**
 * Insert DB
 */
class InsertModel {

	public static function exec($token, $shop) {
		$conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS ); 

		$sql = "INSERT INTO ". APP_NAME ." (token, shop) VALUES( :token, :shop )";

		$query = $conn->prepare($sql);
		$query->bindValue(':token', $token);
		$query->bindValue(':shop', $shop);

		if ( $query->execute() ) {
			unset($conn);
			return true;
		}
	}
}





