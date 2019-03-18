<?php

class articleController extends Controller{
	
	public function index($id = "", $name = ""){

		$this->model('article');
		$this->model->newArticle();

		if (isset($_POST['delete'])) {
			$this->model->eraseArticle($_POST['id']);
		}
		if (isset($_POST['update'])) {
			$this->model->updateArticle($_POST['id']);
		}
		
		$this->view('article' . DIRECTORY_SEPARATOR . 'index', [
			'id'       => $id,
			'name'     => $name,
			'articles' => $this->model->readAll()
		]);
		
		$this->view->render();
	}

	public function newArticle($id = "", $name = ""){

		$this->model('article');
		
		$this->view('article' . DIRECTORY_SEPARATOR . 'newarticle', [
			'id'   => $id,
			'name' => $name
		] );

		$this->view->render();
	}

	public function readArticle($id = "", $name = ""){

		$this->model('article');

		$this->view('article' . DIRECTORY_SEPARATOR . 'readarticle', [
			'id'          => $this->model->getID($_POST['articleID']),
			'name'        => $name,
			'title'       => $this->model->getTitle($_POST['articleID']),
			'textContent' => $this->model->getTextContent($_POST['articleID'])
		] );

		$this->view->render();
	}

	public function modifyArticle($id = "", $name = ""){

		$this->model('article');

		$this->view('article' . DIRECTORY_SEPARATOR . 'modifyarticle', [
			'id'          => $this->model->getID($_POST['articleID']),
			'name'        => $name,
			'title'       => $this->model->getTitle($_POST['articleID']),
			'textContent' => $this->model->getTextContent($_POST['articleID'])
		] );

		var_dump($_POST['articleID']);

		$this->view->render($_POST['articleID']);
	}
}

?>