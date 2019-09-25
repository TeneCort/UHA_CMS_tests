<?php
class Page {

	protected $pageID, $pageName;

	protected $articles = array();
	
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

	public function addArticle(String $addedArticleID) : void
	{
		array_push($this->articles, $addedArticleID);
	}

	public function removeArticle(Article $removedArticleID) : void
	{
		$valueToDelete = array_search($removedArticleID, $articles);
		array_slice($articles, $valueToDelete, 1);
	}
}
?>