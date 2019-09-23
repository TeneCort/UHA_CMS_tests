<?php
class Page {

	protected $pageID, $pageName, $articles;
	
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

	public function addArticle(Article $addedArticle) : void
	{
		//$this->articles
	}

	public function removeArticle(Article $removedArticle) : void
	{

	}
}
?>