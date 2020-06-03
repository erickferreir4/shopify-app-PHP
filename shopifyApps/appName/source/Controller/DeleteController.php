<?php

namespace source\Controller;

use source\Model\DeleteModel;

class DeleteController {

	public function __construct() {
			
		$shop = $_GET['shop'];

		DeleteModel::exec($shop);

	}
}






