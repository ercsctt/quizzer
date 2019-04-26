<?php
declare(strict_types = 1);
namespace App\Models;

use Core\Model;
use Core\Utilities;
use App\Flash;

class Answers extends Model {

	function deleteAll($quizId){

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

	function createQuestion($quizId, $content){
		parent::getDB()->query("INSERT INTO questions (quiz_id, contents) VALUES (:quiz_id, :contents)", [
			":quiz_id" => $quizId,
			":contents" => $content
		]);

		return parent::getDB()->getLastInsertId();
	}

	function createAnswer($questionId, $content){
		parent::getDB()->query("INSERT INTO answers (question_id, content) VALUES (:question_id, :contents)", [
			":question_id" => $questionId,
			":contents" => $content
		]);

		return parent::getDB()->getLastInsertId();
	}

}
