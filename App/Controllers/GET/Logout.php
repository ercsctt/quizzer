<?php

declare(strict_types = 1);

namespace App\Controllers\GET;

session_start();

use Core\Utilities;
use Core\View;
use Core\Controller;

use App\Models\User;
use App\Flash;


class Logout extends Controller {

	public function runAction() {
		unset($_SESSION['userid']);
		Flash::addMessage("You are now logged out.");
		header("Location: /login");
	}

}
