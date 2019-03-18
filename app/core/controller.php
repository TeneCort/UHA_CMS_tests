<?php

class Controller{

	protected $view;
	protected $model;

	function view($viewName, $URL_data = []){
		
		$this->view = new View($viewName, $URL_data);
		return $this->view;
	}

	function model($viewName, $URL_data = []){

		if(file_exists(MODEL . $viewName . '.php')){

			require MODEL . $viewName . '.php';
			$this->model = new $viewName();
		}
	}
}

?>