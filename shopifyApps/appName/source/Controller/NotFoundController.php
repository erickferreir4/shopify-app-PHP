<?php

namespace source\Controller;

class NotFoundController {

	public function __construct() {
		require_once __DIR__ . '/../View/_includes/_header.php';
		require_once __DIR__ . '/../View/notFound/NotFoundView.php';
		require_once __DIR__ . '/../View/_includes/_footer.php';
	}
}

