<?php

declare(strict_types = 1);

namespace App\Controllers\POST;

use Core\Utilities;
use Core\View;
use Core\Controller;

use App\Models\User;
use App\Models\Quiz;
use App\Models\Answers;
use App\Flash;


class SaveQuiz extends Controller {

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

		$quiz = new Quiz();

		if(!$quiz->exists($this->id)){
			Flash::addMessage("That quiz doesn't exist.", "warning");
			header("Location: /");
			return;
		}

		$quiz->updateQuiz($this->id, $_POST['name'], $_POST['description']);

		$answers = new Answers();

		$answers->deleteAll($this->id);

		foreach($_POST['question'] as $index=>$question){
			$questionId = $answers->createQuestion($this->id, $question['question']);

			foreach($question['answers'] as $index=>$answer){
				$answers->createAnswer($questionId, $answer);
			}
		}

		Flash::addMessage("Quiz has been updated.");
		header("Location: /");

	}
}
