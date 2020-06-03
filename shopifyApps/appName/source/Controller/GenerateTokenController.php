<?php

namespace source\Controller;

use source\Classes\GenerateToken;

class GenerateTokenController {

	public function __construct() {
		GenerateToken::exec();
	}

}

