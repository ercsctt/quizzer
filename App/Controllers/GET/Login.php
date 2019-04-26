<?php

declare(strict_types = 1);

namespace App\Controllers\GET;

use Core\Utilities;
use Core\View;
use Core\Controller;

use App\Models\User;
use App\Flash;


class Login extends Controller {
	/**
	 * Show the Login page
	 *
	 * @return void
	 */
	public function runAction() {
		$user = new User();

		if($user->isLoggedIn()){
			header("Location: /");
			return;
		}

		View::renderTemplate('Home/login.twig');
	}
}
