<?php

class Application {	

	protected $controller = 'homecontroller';
	protected $action = 'index';
	protected $param = [];
	protected $webPage;

	public function __construct() {
		
		$this->prepareURL();	

		if (file_exists(CONTROLLER . $this->controller . '.php')) {

			$this->controller = new $this->controller;

			if (method_exists($this->controller, $this->action)) {

				 call_user_func_array([$this->controller, $this->action], $this->param);
			}
		}else echo 'THERE IS A PROBLEM MATE! Application';
	}

	protected function prepareURL() {

		$request = trim($_SERVER['REQUEST_URI'], '/');
		if (!empty($request)) {
			$url = explode('/', $request);
			$this->controller = isset($url[0]) ? $url[0].'controller' : 'homecontroller';
			$this->action = isset($url[1]) ? $url[1] : 'index'; 	
			unset($url[0], $url[1]);
			$this->param = !empty($url) ? array_values($url) : [];			
		}
	}
}

?>