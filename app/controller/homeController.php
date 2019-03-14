<?php

class homeController extends Controller{
	
	public function index($id = "", $name = ""){
		
		//echo 'I am in ' . __CLASS__ . ', method : ' . __METHOD__ . "<br>";

		$this->view('home' . DIRECTORY_SEPARATOR . 'index', [
			'id' => $id,
			'name' => $name
		] );

		$this->view->render();
	}

	public function aboutUs($id = "", $name = ""){

		$this->view('home' . DIRECTORY_SEPARATOR . 'aboutUs');
		$this->view->render();
	}
}

?>