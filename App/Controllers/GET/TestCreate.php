<?php

declare(strict_types = 1);

namespace App\Controllers\GET;

use Core\Utilities;
use Core\View;
use Core\Controller;

use App\Models\User;
use App\Flash;

class TestCreate extends Controller {

	public function runAction() {
		$user = new User();

		if($user->createUser("John", "Smith", "john@example.com", "password")){
			print "Created!";
		}else{
			print "ERROR!";
		}
	}

}
