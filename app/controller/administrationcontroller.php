<?php

class administrationController extends Controller {
	
	public function index(String $id = "", String $name = ""): void{

		$this->model('administration');

		if (isset($_POST['createArticle'])) {
			$this->model->createArticle($_POST['title'], $_POST['text'], $_POST['category'], $_POST['page']);
		}
		if (isset($_POST['updateArticle'])) {
			$this->model->updateArticle($_POST['id'], $_POST['title'], $_POST['text'], $_POST['category'], $_POST['page'] );
		}
		if (isset($_POST['deleteArticle'])) {
			$this->model->deleteArticle($_POST['id']);
		}
		if (isset($_POST['createCategory'])) {
			$this->model->createCategory($_POST['name']);
		}		
		if (isset($_POST['updateCategory'])) {
			$this->model->updateCategory($_POST['name'], $_POST['id']);
		}
		if (isset($_POST['deleteCategory'])) {
			$this->model->deleteCategory($_POST['id']);
		}
		if (isset($_POST['createPage'])) {
			$this->model->createPage($_POST['name']);
		}
		if (isset($_POST['updatePage'])) {
			$this->model->updatePage($_POST['name'], $_POST['id']);
		}
		if (isset($_POST['deletePage'])) {
			$this->model->deletePage($_POST['id']);
		}
		if (isset($_POST['updateNavBarColor'])) {
			$this->model->updateNavBarColor($_POST['colorID']);
		}
		if (isset($_POST['setBackgroundImage'])) {
			$this->model->imageUpload();
		}
		$this->view('administration' . DIRECTORY_SEPARATOR . 'index', [
			'id'         => $id,
			'name'       => $name,
			'navBar'     => $this->model->adminNavBar(),
			'articles'   => $this->model->readArticles(),
			'categories' => $this->model->readCategories(),			
			'menu'       => $this->model->Menu(),
			'pages'	     => $this->model->readPages(),
			'colors'	 => $this->model->readNavBarColors()
		]);
		
		$this->view->render();
	}

	public function aboutUs(String $id = "", String $name = ""): void{

		$this->model('administration');

		$this->view('administration' . DIRECTORY_SEPARATOR . 'aboutUs');
		$this->view->render();
	}

	public function newArticle(String $id = "", String $name = ""): void{

		$this->model('administration');
		
		$this->view('administration' . DIRECTORY_SEPARATOR . 'newarticle', [
			'id'         => $id,
			'name'       => $name,
			'navBar'     => $this->model->adminNavBar()
		] );

		$this->view->render();
	}

	public function readArticle(String $id = "", String $name = ""): void{

		$this->model('administration');

		$this->view('administration' . DIRECTORY_SEPARATOR . 'readarticle', [
			'article'    => $this->model->readArticles()[$_POST['articleID']],
			'id'         => $id,
			'name'       => $name,
			'navBar'     => $this->model->adminNavBar()
		] );

		$this->view->render();
	}

	public function modifyArticle(String $id = "", String $name = ""): void{

		$this->model('administration');

		$this->view('administration' . DIRECTORY_SEPARATOR . 'modifyarticle', [
			'id'         => $id,
			'name'       => $name,
			'article'    => $this->model->readArticles()[$_POST['id']],
			'navBar'     => $this->model->adminNavBar(),
			'categories' => $this->model->readCategories(),
			'pages'		 => $this->model->readPages()
		] );

		$this->view->render();
	}

	public function modifyCategory(String $id = "", String $name = ""): void{

		$this->model('administration');

		$this->view('administration' . DIRECTORY_SEPARATOR . 'modifycategory', [
			'id'          => $id,
			'name'        => $name,
			'navBar'      => $this->model->adminNavBar(),
			'category'    => $this->model->readCategories()[$_POST['categoryID']]
		] );

		$this->view->render();
	}

	public function modifyPage(String $id = "", String $name = ""): void{

		$this->model('administration');

		$this->view('administration' . DIRECTORY_SEPARATOR . 'modifypage', [
			'id'          => $id,
			'name'        => $name,
			'navBar'      => $this->model->adminNavBar(),
			'page'        => $this->model->readPages()[$_POST['pageID']]
		] );

		$this->view->render();
	}
}

?>