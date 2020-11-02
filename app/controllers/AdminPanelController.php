<?php 

/**
 * Маршурутизатор админ панели
 */
namespace App\controllers;
use PDO;
use League;
use \Delight\Auth;
use App\models\Connection;
use App\models\UploadImage;
use App\models\QueryBuilder;
// use App\models\Authenticator;



class AdminPanelController
{
	private $templates;
	private $auth;
	private $query;

	public function	__construct(QueryBuilder $query){
		$this->templates = new League\Plates\Engine('../app/views/admin');
		$this->query = $query;
		$db = $query->queryPdo();
		$this->auth = new \Delight\Auth\Auth($db);
	}

	public function index(){
		if ($this->auth->isLoggedIn()) {
			echo $this->templates->render('indexAdminPanel');
		}
		else {
			echo 'Доступ запрешен ! ';

			echo 'Ваш ip ' . $_SERVER['SERVER_ADDR'];


		}

		

	}

	public function getAll(){


		$posts = $this->query->getAll('posts');
		echo $this->templates->render('getAllPost', ['posts' => $posts]);
	}

	public function getOne($id){
		
		//роутер передает id в массиве 

		$post = $this->query->getOne($id,'posts');

		echo $this->templates->render('getOne', ['post' => $post]);
	}


	public function addPost(){

		echo $this->templates->render('addPost',['name' => 'Добавить посты']);

		

	}

	public function updatePost($id){

		$post = $this->query->getOne($id,'posts');

		
		echo $this->templates->render('updatePost', ['post' => $post]);

			// $this->query->update($id['id'],'posts', $data);
			// header("Location: /admin/updatePost/{$id['id']}");
		// if (isset($_POST['btn'])) {
		// }
	}

	public function update($id){
		$data = [
			'title' => $_POST['title'],
			'date' => $_POST['date'],
			'about' => $_POST['about'],
			'description' => $_POST['description'],
			'text' => $_POST['text'],
			'img' => 'uploads/'.$_FILES['img']['name']

		];

		$this->query->update($id,'posts', $data);
		$img = UploadImage::make($_FILES['img']);
		if (isset($_POST['btn'])) {
			header("Location: /admin/posts");
		}
	}

	public function deletePost($id){
		$this->query->delete($id, 'posts');
		header("Location: /admin/posts");
	}

	public function script(){

		$data = [
			'title' => $_POST['title'],
			'date' => $_POST['date'],
			'about' => $_POST['about'],
			'description' => $_POST['description'],
			'text' => $_POST['text'],
			'img' => 'uploads/'.$_FILES['img']['name']

		];

		$this->query->insert('posts', $data);
		$img = UploadImage::make($_FILES['img']);

		if (isset($_POST['btn'])) {
			header("Location: /admin/posts");
		}


	}

	public function allUsers(){


		$users = $this->query->getAll('users');

		echo $this->templates->render('users', ['users' => $users]);

	}

	public function userInfo($id){

		$user = $this->query->getOne($id, 'users');

		echo $this->templates->render('userinfo', ['user' => $user]);

	}

	public function userDelite($id){
		$user = $this->query->delete($id, 'users');

		header("Location: /admin/users");
	}


}