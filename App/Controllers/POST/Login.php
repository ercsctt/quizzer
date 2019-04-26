<?php

declare(strict_types = 1);

namespace App\Controllers\POST;

use Core\Utilities;
use Core\View;
use Core\Controller;

use App\Models\User;
use App\Flash;


class Login extends Controller {

	private $INVALID_CREDENTIALS = "Invalid credentials provided.";

	public function runAction() {
		$user = new User();

		if($user->isLoggedIn()){
			header("Location: /");
			return;
		}

		if(Utilities::isEmpty($_POST['email']) || Utilities::isEmpty($_POST['password'])){
			Flash::addMessage($this->INVALID_CREDENTIALS, "warning");
			header("Location: /login");
			return;
		}

		$email = $_POST['email'];
		$password = $_POST['password'];

		if($user->attemptLogin($email, $password)){
			Flash::addMessage("You are now logged in.");
			header("Location: /");
		}else{
			Flash::addMessage($this->INVALID_CREDENTIALS, "warning");
			header("Location: /login");
		}

	}
}
