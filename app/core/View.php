<?php  

class View{
	
	protected $viewFile;
	protected $viewData;

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
		
		$aID = $this->viewData['id'];
		$aTitle = $this->viewData['title'];
		$aTextContent = $this->viewData['textContent'];
		$article = [
			'id'          => $aID,
			'title'       => $aTitle,
			'textContent' => $aTextContent
		];

		return $article;
	}

}


?>