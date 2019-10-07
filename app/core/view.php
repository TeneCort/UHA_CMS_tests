<?php  

class View{
	
	protected $viewFile, $viewData;

	public function __construct($viewFile, $viewData)
	{

		$this->viewFile = $viewFile;
		$this->viewData = $viewData;
	}

	public function render(): void
	{
		if (file_exists(VIEW . $this->viewFile . '.phtml'))
		{
			include VIEW . $this->viewFile . '.phtml';
			
		}
		else
		{
			echo 'THERE IS A PROBLEM MATE! View';
		} 
	}

	public function getAction()
	{
		return (explode('\\', $this->viewFile)[1]);
	}

	public function getArticles(): array
	{
		return $this->viewData['articles'];
	}

	public function getArticle(): Article
	{
		return $this->viewData['article'];
	}

	public function showAdminNavBar(): AdminNavBar
	{
		return $this->viewData['navBar'];
	}

	public function showMenuBar(): Menu
	{
		return $this->viewData['menu'];
	}

	public function getCategories(): array
	{
		return $this->viewData['categories'];
	}

	public function getCategory(): Category
	{
		return $this->viewData['category'];
	}

	public function getPages(): array
	{
		return $this->viewData['pages'];
	}

	public function getPage(): Page
	{
		return $this->viewData['page'];
	}

	public function getNavBarColors(): array
	{
		return $this->viewData['colors'];
	}

	public function getPageID(): String
	{
		return $this->viewData['id'][3];
	}

	public function getBgImage()
	{
		return $this->viewData['img'];
	}

	public function getTests()
	{
		return $this->viewData['ello'];
	}
}
?>