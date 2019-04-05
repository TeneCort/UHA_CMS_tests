<?php  

class View{
	
	protected $viewFile;
	protected $viewData;
	protected $article;

	public function __construct($viewFile, $viewData){

		$this->viewFile = $viewFile;
		$this->viewData = $viewData;
	}

	public function render(): void{

		if (file_exists(VIEW . $this->viewFile . '.phtml')) {

			include VIEW . $this->viewFile . '.phtml';
			
		}else echo 'THERE IS A PROBLEM MATE!';
	}

	public function getAction(){
		return (explode('\\', $this->viewFile)[1]);
	}

	public function getArticles(): array{
		return $this->viewData['articles'];
	}

	public function getArticle(): Article{
		return $this->viewData['article'];
	}

	public function showAdminNavBar(): AdminNavBar{
		return $this->viewData['navBar'];
	}

	public function getCategories(): array{
		return $this->viewData['categories'];
	}

}


?>