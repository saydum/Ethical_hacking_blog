<?php 
/**
 * 
 */
namespace App\models;

use \Delight\Auth\Auth;
use PDO;

class Authenticator
{
	private $auth;
	
	function __construct($pdo)
	{	
		$this->auth = new \Delight\Auth\Auth($pdo);
	}

	public function registration($data){
		try {
			$userId = $this->auth->register($data['email'], $data['password'], $data['username'],

				function ($selector, $token) {
				// отправить с помошью компонента майл
					echo 'Send ' . $selector . ' and ' . $token . ' to the user (e.g. via email)';
				});

			echo 'We have signed up a new user with the ID ' . $userId;
		}
		catch (\Delight\Auth\InvalidEmailException $e) {
			die('Invalid email address');
		}
		catch (\Delight\Auth\InvalidPasswordException $e) {
			die('Invalid password');
		}
		catch (\Delight\Auth\UserAlreadyExistsException $e) {
			die('User already exists');
		}
		catch (\Delight\Auth\TooManyRequestsException $e) {
			die('Too many requests');
		}
		return $this;
	}

	public function login($data){
		try {
			$this->auth->login($data['email'], $data['password']);

			echo 'User is logged in';
		}
		catch (\Delight\Auth\InvalidEmailException $e) {
			die('Wrong email address');
		}
		catch (\Delight\Auth\InvalidPasswordException $e) {
			die('Wrong password');
		}
		catch (\Delight\Auth\EmailNotVerifiedException $e) {
			die('Email not verified');
		}
		catch (\Delight\Auth\TooManyRequestsException $e) {
			die('Too many requests');
		}
		return $this;
	}

	public function logout(){
		return $this->auth->logOut();
	}

}
