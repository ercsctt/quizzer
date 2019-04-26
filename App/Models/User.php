<?php
declare(strict_types = 1);
namespace App\Models;

session_start();

use Core\Model;
use Core\Utilities;
use App\Flash;

class User extends Model {

	function isLoggedIn(){
		return isset($_SESSION['userid']);
	}

	function getUserId(){
		return $_SESSION['userid'];
	}

	function getUserById($userid){
		$query = "SELECT * FROM users WHERE user_id = :userid";
		return parent::getDB()->query($query, [
			":userid" => $userid
		])[0];
	}

	function getUserByEmail($email){
		$query = "SELECT * FROM users WHERE email = :email";
		return parent::getDB()->query($query, [
			":email" => $email
		])[0];
	}

	function createUser($firstName, $lastName, $email, $plainTextPassword, $permissionLevel = 1){
		$hashedPassword = Utilities::hashAndSalt($plainTextPassword);

		$query = "insert into users (firstname, lastname, email, password_hash, permission_level) values (:firstname, :lastname, :email, :password_hash, :permission_level)";

		return parent::getDB()->query($query, [
			":firstname" => $firstName,
			":lastname" => $lastName,
			":email" => $email,
			":password_hash" => $hashedPassword,
			":permission_level" => $permissionLevel
		]);
	}

	function attemptLogin($email, $plainTextPassword){
		$user = $this->getUserByEmail($email);

		$storedHash = $user['password_hash'];

		if(password_verify($plainTextPassword, $storedHash)){
			$_SESSION['userid'] = $user['user_id'];
			$_SESSION['permission_level'] = $user['permission_level'];

			parent::getDB()->query("UPDATE users SET last_login = now() WHERE user_id = :userid", [
				":userid" => $user['user_id']
			]);
			return true;
		}else{
			return false;
		}
	}

}
