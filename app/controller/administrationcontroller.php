<?php

class administrationController extends Controller {
	
	public function index(String $id = "", String $name = ""): void{

		$this->model('model');

		if (isset($_POST['createArticle'])) {
			$this->model->createArticle($_POST['title'], $_POST['text'], $_POST['category']);
		}
		if (isset($_POST['deleteArticle'])) {
			$this->model->deleteArticle($_POST['id']);
		}
		if (isset($_POST['updateArticle'])) {
			$this->model->updateArticle($_POST['id'], $_POST['title'], $_POST['text'], $_POST['category'] );
		}
		if (isset($_POST['createCategory'])) {
			$this->model->createCategory($_POST['name']);
		}
		$this->view('administration' . DIRECTORY_SEPARATOR . 'index', [
			'id'         => $id,
			'name'       => $name,
			'articles'   => $this->model->readAllArticles(),
			'categories' => $this->model->readCategories(),
			'navBar'     => $this->model->adminNavBar()
		]);
		
		$this->view->render();
	}

	public function aboutUs(String $id = "", String $name = ""): void{

		$this->view('administration' . DIRECTORY_SEPARATOR . 'aboutUs');
		$this->view->render();
	}

	public function newArticle(String $id = "", String $name = ""): void{

		$this->model('model');
		
		$this->view('administration' . DIRECTORY_SEPARATOR . 'newarticle', [
			'id'   => $id,
			'name' => $name,
			'navBar'   => $this->model->adminNavBar()
		] );

		$this->view->render();
	}

	public function readArticle(String $id = "", String $name = ""): void{

		$this->model('model');

		$this->view('administration' . DIRECTORY_SEPARATOR . 'readarticle', [
			'article'    => $this->model->readArticle($_POST['articleID']),
			'id'         => $id,
			'name'       => $name,
			'navBar'     => $this->model->adminNavBar()
		] );

		$this->view->render();
	}

	public function modifyArticle(String $id = "", String $name = ""): void{

		$this->model('model');

		$this->view('administration' . DIRECTORY_SEPARATOR . 'modifyarticle', [
			'article'     => $this->model->readArticle($_POST['id']),
			'id'          => $id,
			'name'        => $name,
			'navBar'   => $this->model->adminNavBar(),
			'categories' => $this->model->readCategories()
		] );

		$this->view->render();
	}
}

?>