<?php  

class View{
	
	protected $viewFile;
	protected $viewData;
	protected $article;

	public function __construct($viewFile, $viewData){

		$this->viewFile = $viewFile;
		$this->viewData = $viewData;
	}

	public function render(){

		if (file_exists(VIEW . $this->viewFile . '.phtml')) {

			include VIEW . $this->viewFile . '.phtml';
			
		}else echo 'THERE IS A PROBLEM MATE!';
	}

	public function getAction(){
		return (explode('\\', $this->viewFile)[1]);
	}

	public function getArticles(){
		return $this->viewData['articles'];
	}

	public function getArticle(){
		return $this->viewData['article'];
	}

}


?>