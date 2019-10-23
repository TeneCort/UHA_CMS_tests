<?php

class Application {	

	protected $controller = 'homecontroller';
	protected $action = 'index';
	protected $param = [];
	protected $webPage;

	public function __construct() 
	{
		
		$this->prepareURL();	

		if (file_exists(CONTROLLER . $this->controller . '.php')) 
		{

			$this->controller = new $this->controller;

			if (method_exists($this->controller, $this->action)) 
			{
				//$host = "http://" . $_SERVER["REMOTE_ADDR"] . ":" . $_SERVER["SERVER_PORT"] . "/";
				//var_dump($host);	
				//echo($_SERVER["REMOTE_ADDR"] . ":" . $_SERVER["SERVER_PORT"]);
				call_user_func_array([$this->controller, $this->action], $this->param);
			}

			else 
			{
				echo 'THERE IS A PROBLEM MATE! Controller. ';
				echo 'Action : ' . $this->action;
				echo 'Controller : ' . $this->controller;
				echo 'Param : ' . $this->param;
				echo 'WebPage : ' . $this->webPage;
			}
		}
		else
		{
			header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
		} 
	}

	protected function prepareURL() 
	{

		$request = trim($_SERVER['REQUEST_URI'], '/');
		
		if (!empty($request)) 
		{
			$url = explode('/', $request);
			$this->controller = isset($url[0]) ? $url[0].'controller' : 'homecontroller';
			$this->action = isset($url[1]) ? $url[1] : 'index'; 	
			unset($url[0], $url[1]);
			$this->param = !empty($url) ? array_values($url) : [];			
		}
	}
}

?>