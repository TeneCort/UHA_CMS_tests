<?php

class administrationController extends Controller {
	
	public function index($id = "", $name = ""){

		$this->model('model');
		$this->model->newArticle();

		if (isset($_POST['delete'])) {
			$this->model->eraseArticle($_POST['id']);
		}
		if (isset($_POST['update'])) {
			$this->model->updateArticle($_POST['id'], $_POST['title'], $_POST['text'] );
		}
		$this->view('home' . DIRECTORY_SEPARATOR . 'index', [
			'id'       => $id,
			'name'     => $name,
			'articles' => $this->model->readAll()
		]);
		
		$this->view->render();
	}

	public function aboutUs($id = "", $name = ""){

		$this->view('home' . DIRECTORY_SEPARATOR . 'aboutUs');
		$this->view->render();
	}

	public function newArticle($id = "", $name = ""){

		$this->model('model');
		
		$this->view('home' . DIRECTORY_SEPARATOR . 'newarticle', [
			'id'   => $id,
			'name' => $name
		] );

		$this->view->render();
	}

	public function readArticle($id = "", $name = ""){

		$this->model('model');

		$this->view('home' . DIRECTORY_SEPARATOR . 'readarticle', [
			'article'     => $this->model->getArticle($_POST['articleID']),
			'id'          => $id,
			'name'        => $name
		] );

		$this->view->render();
	}

	public function modifyArticle($id = "", $name = ""){

		$this->model('model');

		$this->view('home' . DIRECTORY_SEPARATOR . 'modifyarticle', [
			'article'     => $this->model->getArticle($_POST['id']),
			'id'          => $id,
			'name'        => $name,
		] );

		$this->view->render();
	}
}

?>