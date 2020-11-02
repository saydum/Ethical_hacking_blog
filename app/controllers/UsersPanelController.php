<?php 

/**
 * 
 */
namespace App\controllers;

use PDO;
use League;
use App\models\Authenticator;
use App\models\Connection;

class UsersPanelController
{
	private $templates;
	private $auth;

	public function	__construct(){
		$this->templates = new League\Plates\Engine('../app/views/users');
		$config = include '../config/config.php';
		$pdo = Connection::make($config['connect']);
		$this->auth = new Authenticator($pdo);
	}


	public function newAdmin(){
		try {
			$userId = $this->auth->admin()->createUser('saydumg41@gmail.com', 'RA01+xGO99_rrP@#', 'Saydum');

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
	}
	public function login(){

		echo $this->templates->render('login');

	}

	public function registration(){

		echo $this->templates->render('registration');

		// $this->auth->registration($_POST);
	}

	public function save(){
		$this->auth->registration($_POST);
	}

	public function loginIn(){
		$data = [
			'email' => $_POST['email'],
			'password' => $_POST['password']
		];
		$this->auth->login($data);
		header("Location: /admin");




	}

	public function logout(){
		$this->auth->logout();
		header("Location: /login");
		return $this;
	}


}
