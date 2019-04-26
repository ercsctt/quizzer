<?php
declare(strict_types = 1);
namespace App\Models;

use Core\Model;
use Core\Utilities;
use App\Flash;

class Quiz extends Model {

	function exists($id){
		$query = "SELECT * FROM quizzes WHERE quiz_id = :quiz_id";
		return count(parent::getDB()->query($query, [":quiz_id" => $id]));
	}

	function updateQuiz($quizId, $name, $description){
		print "SETTING NAME TO $name";
		return parent::getDB()->query("UPDATE quizzes SET name = :name, description = :description WHERE quiz_id = :quiz_id", [
			":name" => $name,
			":description" => $description,
			":quiz_id" => $quizId
		]);
	}

	function createQuiz($userId, $name, $description){
		$query = "INSERT INTO quizzes (created_by, name, description) VALUES (:created_by, :name, :description)";
		parent::getDB()->query($query, [
			":created_by" => $userId,
			":name" => $name,
			":description" => $description
		]);
		return parent::getDB()->getLastInsertId();
	}

	function deleteQuiz($quizId){

		parent::getDB()->query("DELETE FROM quizzes WHERE quiz_id = :quiz_id", [
			":quiz_id" => $quizId
		]);

		$questions = parent::getDB()->query("SELECT * FROM questions WHERE quiz_id = :quiz_id", [
			":quiz_id" => $quizId
		]);

		foreach($questions as $question){
			parent::getDB()->query("DELETE FROM answers WHERE question_id = :question_id", [
				":question_id" => $question['question_id']
			]);
		}

		parent::getDB()->query("DELETE FROM questions WHERE quiz_id = :quiz_id", [
			":quiz_id" => $quizId
		]);

		return 1;
	}

	function getQuiz($quizId){
		$query = "SELECT *, @questions:=(select count(question_id) as q from questions where quiz_id = :quiz_id) as questions FROM quizzes WHERE quiz_id = :quiz_id";
		return parent::getDB()->query($query, [
			":quiz_id" => $quizId
		])[0];
	}

	function getAllQuizzes(){
		$quizzes = [];
		$query = "SELECT * FROM quizzes";

		foreach(parent::getDB()->query($query) as $index => $quiz){
			$quizzes[$quiz['quiz_id']] = [
				'quiz_id' => $quiz['quiz_id'],
				'created_by' => $quiz['created_by'],
				'created_when' => $quiz['created_when'],
				'name' => Utilities::purifyOutput($quiz['name']),
				'description' => Utilities::purifyOutput($quiz['description']),
				'questions' => $this->getQuiz($quiz['quiz_id'])['questions']
			];
		}

		return $quizzes;
	}

	function getQuestions($quizId){
		$query = "SELECT * FROM questions WHERE quiz_id = :quiz_id";

		$questions = parent::getDB()->query($query, [
			":quiz_id" => $quizId
		]);

		$toReturn = [];

		foreach($questions as $index => $question){
			$answers = parent::getDB()->query("SELECT * FROM answers WHERE question_id = :question_id", [
				":question_id" => $question['question_id']
			]);
			$toReturn[] = [
				"contents" => $question['contents'],
				"answers" => $answers
			];
		}

		return $toReturn;
	}

}
