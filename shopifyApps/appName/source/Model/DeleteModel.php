<?php

namespace source\Model;

use PDO;

/**
 * Delete DB
 */
class DeleteModel {

	public static function exec($shop) {

		$conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS ); 

		$sql = "DELETE FROM " . APP_NAME . " WHERE shop = :shop";

		$query = $conn->prepare($sql);

		$query->bindValue(':shop', $shop);

		if ( $query->execute() ) {
			unset($conn);
			return true;
		}
	}
}






