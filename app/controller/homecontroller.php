<?php

class HomeController extends Controller
{

	public function getUrl(): array
	{
		$request = strip_tags($_SERVER['REQUEST_URI']);
		$id      = explode('/', $request);
		return $id;
	}
	
	public function index(String $id = "", String $name = ""): void
	{

		$this->model('home');

		$this->view('home' . DIRECTORY_SEPARATOR . 'index', [
			'id'       => $this->getUrl(),
			'name'     => $name,
			'menu'     => $this->model->Menu(),
			'pages'    => $this->model->readPages(),
			'articles' => $this->model->readArticles(),
			'colors'   => $this->model->readNavBarColors(),
			'img'      => $this->model->imgTest()
		]);
		$this->view->render();
	}

	public function pages(String $id = "", String $name = ""): void
	{

		$this->model('home');

		$this->view('home' . DIRECTORY_SEPARATOR . 'pages', [
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