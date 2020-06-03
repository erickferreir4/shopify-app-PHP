<?php

namespace source\Model;

use PDO;

/**
 * Select DB
 */
class SelectModel {

	public static function exec($shop) {
		$conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS ); 

		$sql = "SELECT * FROM ". APP_NAME ." WHERE shop = :shop";

		$query = $conn->prepare($sql);
		$query->bindValue(':shop', $shop);
		$query->execute();

		$result = $query->fetchall(PDO::FETCH_ASSOC);

		unset($conn);
		return $result;
	}
}

