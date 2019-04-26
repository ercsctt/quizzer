<?php

declare(strict_types = 1);

namespace App\Controllers\GET;

use Core\Utilities;
use Core\View;
use Core\Controller;

use App\Models\User;
use App\Models\Quiz;
use App\Flash;


class EditQuiz extends Controller {

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

		if($user->getUserById($user->getUserId())['permission_level'] <= 2){
			Flash::addMessage("You don't have permission to edit.", "warning");
			header("Location: /");
			return;
		}

		if(Utilities::isEmpty($this->id)){
			Flash::addMessage("That quiz doesn't exist.", "warning");
			header("Location: /");
			return;
		}

		$quiz = new Quiz();

		if(!$quiz->exists($this->id)){
			Flash::addMessage("That quiz doesn't exist.", "warning");
			header("Location: /");
			return;
		}

		View::renderTemplate('Home/edit.twig', [
			'quiz' => $quiz->getQuiz($this->id),
			'questions' => $quiz->getQuestions($this->id)
		]);

	}
}
