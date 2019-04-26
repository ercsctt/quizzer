<?php

declare(strict_types = 1);

namespace App\Controllers\POST;

use Core\Utilities;
use Core\View;
use Core\Controller;

use App\Models\User;
use App\Models\Quiz;
use App\Flash;


class CreateQuiz extends Controller {

	public function runAction() {
		$user = new User();

		if(!$user->isLoggedIn()){
			Flash::addMessage("Your session has expired, please relog.", "warning");
			header("Location: /login");
			return;
		}

		if(Utilities::isEmpty($_POST['name']) || Utilities::isEmpty($_POST['description'])){
			Flash::addMessage("You must specify the name and description for the quiz.", "warning");
			header("Location: /");
			return;
		}

		$quiz = new Quiz();

		$name = $_POST['name'];
		$description = $_POST['description'];

		$quizId = $quiz->createQuiz($user->getUserId(), $name, $description);
		Flash::addMessage("Quiz '{$name}' has been created.");
		header("Location: /quiz/{$quizId}/edit");
		return;

	}
}
