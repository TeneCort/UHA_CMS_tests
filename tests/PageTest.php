<?php

require 'init.php';

use PHPUnit\Framework\TestCase;

 class PageTests extends TestCase
 {

	private $article, $textElement, $category, $page, $articles;

	protected function setUp() : void
	{
		$this->textElement = new TextElement('');
		$this->page        = new Page('1', $this->textElement);	
		$this->articles    = array();
	}

    public function testPage()
	{
		$this->assertIsObject($this->page);
	}

	public function testIDAttribute()
	{
		$this->assertObjectHasAttribute('pageID', $this->page);
	}

	public function testNameAttribute()
	{
		$this->assertObjectHasAttribute('pageName', $this->page);
	}

	public function testArticlesAttribute()
	{
		$this->assertObjectHasAttribute('articles', $this->page);
	}

	public function testPageIDIsString()
	{
        $this->assertIsString('', $this->page->getID());
	}

	public function testArticlesIsArray()
	{
        $this->assertIsArray($this->page->getArticles());
	}

	public function testSetGetPageID()
	{
		$this->page->setID('2');
		$this->assertEquals('2', $this->page->getID());
	}

	public function testSetGetPageName()
	{
		$this->page->setName(new TextElement('Test'));
		$this->assertEquals('Test', $this->page->getName()->getTextContent());
	}

	public function testSetGetPageArticles()
	{	
		$this->page->setArticles(array('1', '2', '3'));
		$this->assertEquals(array('1', '2', '3'), $this->page->getArticles());
	}

	/*public function testSetGetArticleCategory()
	{
		$this->article->setCategory(new Category('1', new TextElement('Test')));
		$this->assertEquals('Test', $this->article->getCategory()->getName()->getTextContent());
	}

	/*public function testSetGetArticlePage()
	{
		$this->article->setPage(new Page('1', new TextElement('Test')));
		$this->assertEquals('Test', $this->article->getPage()->getName()->getTextContent());
	}*/
}
