<?php

//include CORE . DIRECTORY_SEPARATOR . 'Application.php';

class homeController extends Controller{
	public function index(String $id = "", String $name = ""): void{
		$this->model('model');
		$this->view('home' . DIRECTORY_SEPARATOR . 'index', [
			'id' => $id,
			'name' => $name
		]);
		$this->view->render();
	}
}

?>