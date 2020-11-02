<?php 
/**
 * 
 */

namespace App\controllers;
use PDO;
use League\Plates\Engine;
use JasonGrimes\Paginator;
use App\models\QueryBuilder;

class BlogControllers
{
	private $templates;
	private $query;
	private $pdo;

	function __construct(QueryBuilder $query, Engine $engine)
	{
		$this->templates = $engine;
		$this->query = $query;
	}

	public function posts(){
		$totalItems = $this->query->getAll('posts');


		$posts = $this->query->getPagination('posts', 4);  



		$itemsPerPage = 3;
		$currentPage = $_GET['page'] ?? 1;
		$urlPattern = '?page=(:num)';

		$paginator = new Paginator(count($totalItems), $itemsPerPage, $currentPage, $urlPattern);




		echo $this->templates->render('indexBlog', [
			'posts' => $posts,
			'paginator' => $paginator
		]);
	}

	public function post($id){
		$posts = $this->query->getPagination('posts', 4);
		$post = $this->query->getOne($id, 'posts');
		echo $this->templates->render('post',[
			'post' => $post,
			'posts' => $posts
		]);
	}

	public function sea(){
		if (isset($_POST['btn'])) {
			$search = explode(" ", $_POST['search']);
			$count = count($search);
			$array = [];
			$i = 0;

			foreach ($search as $key) {
				$i++;
				if ($i < $count) {
					$array[] = "CONCAT (`title`,`text`) LIKE '%".$key."%' OR";
				} else {
					$array[] = "CONCAT (`title`,`text`) LIKE '%".$key."%'"; 
				}
				$sql = "SELECT * FROM `posts` WHERE ".implode("", $array);
				$sth = $this->query->queryPdo()->prepare($sql);

				$sth->execute();

				$result = $sth->fetchAll(PDO::FETCH_OBJ);
				$counrRes = count($result);
			}
		}

		$posts = $this->query->getPagination('posts', 4);

		echo $this->templates->render('result',[
				'result' => $result,
				'counrRes' => $counrRes,
				'posts' => $posts
			]);
	}
}