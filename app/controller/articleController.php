<?php

class articleController extends Controller{
	
	public function index($id = "", $name = ""){

		$this->model('article');
		$this->model->newArticle();

		if (isset($_POST['delete'])) {
			$this->model->eraseArticle($_POST['id']);
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
		
		$this->view('article' . DIRECTORY_SEPARATOR . 'newArticle', [
			'id'   => $id,
			'name' => $name
		] );

		$this->view->render();
	}

	public function readArticle($id = "", $name = ""){

		$this->model('article');

		$this->view('article' . DIRECTORY_SEPARATOR . 'readArticle', [
			'id'          => $this->model->getID($_POST['articleID']),
			'name'        => $name,
			'title'       => $this->model->getTitle($_POST['articleID']),
			'textContent' => $this->model->getTextContent($_POST['articleID'])
		] );

		$this->view->render();
	}
}

?>