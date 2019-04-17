<?php

class homeController extends Controller{
	
	public function index(String $id = "", String $name = ""): void{
		$request = $_SERVER['REQUEST_URI'];
		$id     = explode('/', $request);
		
		$this->model('home');

		$this->view('home' . DIRECTORY_SEPARATOR . 'index', [
			'id'       => $id,
			'name'     => $name,
			'menu'     => $this->model->Menu(),
			'pages'    => $this->model->readPages(),
			'articles' => $this->model->readArticles(),
			'colors'   => $this->model->readNavBarColors()
		]);
		$this->view->render();
	}

	public function ello(String $id = "", String $name = ""): void{

		$request = $_SERVER['REQUEST_URI'];
		$id     = explode('/', $request);
		$this->model('home');

		$this->view('home' . DIRECTORY_SEPARATOR . 'ello', [
			'id'       => $id,
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