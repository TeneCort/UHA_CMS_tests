<?php
class Page {

	protected $pageID, $pageName;

	protected $articles = array(1,2,3);
	
	public function __construct(String $id, TextElement $name)
	{
		$this->pageID   = $id;
		$this->pageName = $name;
	}

	public function getID(): String
	{
		return $this->pageID;
	}

	public function setID(String $id): void
	{
		$this->pageID = $id;
	}

	public function getName(): TextElement
	{
		return $this->pageName;
	}

	public function setName(TextElement $newName): void
	{
		$this->pageName = $newName;
	}

	public function getArticles(): array
	{
		return $this->articles;
	}

	public function setArticles(array $articles)
	{
		$this->articles = $articles;
	}

	public function addArticle(Article $addedArticle) : void
	{
		array_push($this->articles, $addedArticle->getID());
	}

	public function removeArticle(Article $removedArticle) : void
	{
		
	}

	public function arrayToLongString() : String
	{
		$arrayToString = implode(",", $this->articles);
		return $arrayToString;
	}

	public function longStringToArray() : array
	{
		$stringToArray = explode(',', $stringToArray);
		return $stringToArray;
	}
}
?>