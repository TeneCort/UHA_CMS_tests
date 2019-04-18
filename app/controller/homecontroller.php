<?php

class homeController extends Controller{

	public function getUrl(): array{
		$request = $_SERVER['REQUEST_URI'];
		$id      = explode('/', $request);
		return $id;
	}
	
	public function index(String $id = "", String $name = ""): void{

		$this->model('home');

		$this->view('home' . DIRECTORY_SEPARATOR . 'index', [
			'id'       => $this->getUrl(),
			'name'     => $name,
			'menu'     => $this->model->Menu(),
			'pages'    => $this->model->readPages(),
			'articles' => $this->model->readArticles(),
			'colors'   => $this->model->readNavBarColors()
		]);
		$this->view->render();
	}

	public function ello(String $id = "", String $name = ""): void{

		$this->model('home');

		$this->view('home' . DIRECTORY_SEPARATOR . 'ello', [
			'id'       => $this->getUrl(),
			'name'     => $name,
			'menu'     => $this->model->Menu(),
			'pages'    => $this->model->readPages(),
			'articles' => $this->model->readArticles(),
			'colors'   => $this->model->readNavBarColors()
		]);
		$this->view->render();
	}
}
?>