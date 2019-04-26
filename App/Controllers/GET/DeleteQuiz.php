<?php

declare(strict_types = 1);

namespace App\Controllers\GET;

use Core\Utilities;
use Core\View;
use Core\Controller;

use App\Models\User;
use App\Models\Quiz;
use App\Flash;


class DeleteQuiz extends Controller {

	private $id;

	function __construct($vars){
		$this->id = $vars['id'];
	}

	public function runAction() {
		$user = new User();

		if(!$user->isLoggedIn()){
			Flash::addMessage("Your session has expired, please relog.", "warning");
			header("Location: /login");
			return;
		}

		if(Utilities::isEmpty($this->id)){
			Flash::addMessage("An error occurred while deleting the quiz, please retry.", "warning");
			header("Location: /");
			return;
		}

		$quiz = new Quiz();

		$id = $this->id;

		if(!$quiz->exists($id)){
			Flash::addMessage("That quiz doesn't exist!", "warning");
			header("Location: /");
			return;
		}

		if($quiz->deleteQuiz($id)){
			Flash::addMessage("That quiz has successfully been deleted.");
			header("Location: /");
			return;
		}else{
			Flash::addMessage("An error occurred while deleting the quiz.", "warning");
			header("Location: /");
			return;
		}

	}
}
