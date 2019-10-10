<?php

require_once('init.php');

use PHPUnit\Framework\TestCase;

 class modelTests extends TestCase
 {

	private $model, $articles, $article;

	protected function setUp() : void
	{
		$this->model = new Model();
		$this->articles = $this->model->readArticles();
		$this->article = $this->articles[1];
	}

	public function testReadArticlesReturnsArray()
	{
		$this->assertIsArray($this->articles);
	}

	public function testReadArticlesArrayContainsArticle()
	{
		$this->assertInstanceOf(Article::class, $this->article);
		
	}

    /*public function testConnection()
	{
		$this->assertIsObject($this::$conn);
	}*/

	public function testReadArticleID()
	{
        $this->assertSame('1', $this->article->getID()); 
    }

	/*public function testReadArticleTitle()
	{
        $this->assertSame("hello", $this->article->getTitle()); 
    }*/

	/*public function testReadArticleTextContent()
	{
        $this->assertSame('world', $this->article->a_textContent); 
    }

    public function testReadArticleCategoryID()
	{
        $this->assertSame('1', $this->article->a_category); 
    }

    public function testReadArticlePageID()
	{
        $this->assertSame('1', $this->article->a_page); 
    }

    public function testReadCategoryName()
	{
        $this->assertSame('category', $this->article->c_name); 
    }

    public function testReadCategoryID()
	{
        $this->assertSame('1', $this->article->a_id); 
    }

    public function testReadPageName()
	{
        $this->assertSame('page', $this->article->p_name); 
    }

    public function testReadPageID()
	{
        $this->assertSame('1', $this->article->p_id);
    }*/
}
