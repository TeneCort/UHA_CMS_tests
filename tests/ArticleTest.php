<?php

require 'init.php';

use PHPUnit\Framework\TestCase;

 class ArticleTests extends TestCase
 {

	private $article, $textElement, $category, $page;

	protected function setUp() : void
	{
		$this->textElement = new TextElement('');
		$this->category    = new Category('1', $this->textElement);
		$this->page        = new Page('1', $this->textElement);	
		$this->article     = new Article('1', $this->textElement, $this->textElement, $this->category, $this->page);
	}

    public function testArticle()
	{
		$this->assertIsObject($this->article);
	}

	public function testIDAttribute()
	{
		$this->assertObjectHasAttribute('articleID', $this->article);
	}

	public function testTitleAttribute()
	{
		$this->assertObjectHasAttribute('articleTitle', $this->article);
	}

	public function testTextContentAttribute()
	{
		$this->assertObjectHasAttribute('articleTextContent', $this->article);
	}

	public function testCategoryAttribute()
	{
		$this->assertObjectHasAttribute('category', $this->article);
	}

	public function testPageAttribute()
	{
		$this->assertObjectHasAttribute('page', $this->article);
	}

	public function testArticleIDIsString()
	{
        $this->assertIsString('', $this->article->getID());
	}

	public function testArticleTitleIsObject()
	{
        $this->assertIsObject($this->article->getTitle());
	}

	public function testArticleTextContentIsObject()
	{
        $this->assertIsObject($this->article->getTextContent());
	}

	public function testArticleCategoryIsObject()
	{
        $this->assertIsObject($this->article->getCategory());
	}

	public function testArticlePageIsObject()
	{
        $this->assertIsObject($this->article->getPage());
	}

	public function testTitleIsTextElement()
	{
		$this->assertInstanceOf(TextElement::class, $this->article->getTitle());
	}

	public function testTextContentIsTextElement()
	{
		$this->assertInstanceOf(TextElement::class, $this->article->getTextContent());
	}

	public function testSetGetArticleID()
	{
		$this->article->setID('2');
		$this->assertEquals('2', $this->article->getID());
	}

	public function testSetGetArticleTitle()
	{
		$this->article->setTitle(new TextElement('Test'));
		$this->assertEquals('Test', $this->article->getTitle()->getTextContent());
	}

	public function testSetGetArticleTextContent()
	{
		$this->article->setTextContent(new TextElement('Test'));
		$this->assertEquals('Test', $this->article->getTextContent()->getTextContent());
	}

	public function testSetGetArticleCategory()
	{
		$this->article->setCategory(new Category('1', new TextElement('Test')));
		$this->assertEquals('Test', $this->article->getCategory()->getName()->getTextContent());
	}

	public function testSetGetArticlePage()
	{
		$this->article->setPage(new Page('1', new TextElement('Test')));
		$this->assertEquals('Test', $this->article->getPage()->getName()->getTextContent());
	}
}
