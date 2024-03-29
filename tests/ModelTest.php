<?php

require_once('init.php');

use PHPUnit\Framework\TestCase;

 class modelTests extends TestCase
 {

	private $model, $articles, $article, $categories, $category, $testCategory, $testArticle, $lastID;
	private $pages, $page, $testPage;

	protected function setUp() : void
	{
		$this->model = new Model();

		$this->articles = $this->model->readArticles();
		$this->article = $this->articles[1];

		$this->categories = $this->model->readCategories();
		$this->category = $this->categories[1];

		$this->pages = $this->model->readPages();
		$this->page = $this->pages[1];

		$this->testArticle = new Article(
			'1',
			new TextElement('hello'),
			new TextElement('world'),
			new Category('1', new TextElement('category')),
			new Page('1', new TextElement('page'))
		);

		$this->testCategory = new Category('1', new TextElement('category'));

        $this->testPage = new Page('1', new TextElement('page'));
        $this->testPage->addArticle('1');

	}

	/* --------  ARTICLE -------- */

	public function testReadArticlesReturnsArray()
	{
		
		$this->assertIsArray($this->articles);
	}

	public function testReadArticlesArrayContainsArticle()
	{
		$this->assertInstanceOf(Article::class, $this->article);
	}

    public function testReadArticle()
    {
    	$this->assertEquals($this->article, $this->testArticle);
    }

    public function testCreateArticle()
    {
    	$this->model->createArticle(
    		'foo',
			'bazz',
			'1',
			'1'
    	);

    	$this->articles = $this->model->readArticles();
    	$this->assertInstanceOf(Article::class, $this->articles[$this->model->getLastID()]);
    }

    public function testUpdateArticle()
    {
    	$this->model->updateArticle(
    		end($this->articles)->getID(),
			'hello',
			'world',
			'1',
			'1'
    	);

    	$this->articles = $this->model->readArticles();
    	$this->assertInstanceOf(Article::class, $this->articles[end($this->articles)->getID()]);
    }

    public function testDeleteArticle()
    {
    	$this->model->deleteArticle(end($this->articles)->getID());
    	$this->articles = $this->model->readArticles();
    	$this->assertSame(1, count($this->articles));
    }

    /* --------  CATEGORY -------- */

    public function testReadCategoriesReturnsArray()
	{
		$this->assertIsArray($this->categories);
	}

	public function testReadCategoriesArrayContainsCategory()
	{
		$this->assertInstanceOf(Category::class, $this->category);
	}

    public function testReadCategory()
    {
    	$this->assertEquals($this->category, $this->testCategory);
    }

    public function testCreateCategory()
    {
    	$this->model->createCategory('foo');

    	$this->categories = $this->model->readCategories();
    	$this->assertInstanceOf(Category::class, $this->categories[$this->model->getLastID()]);
    }

    public function testUpdateCategory()
    {
    	$this->categories = $this->model->readCategories();
    	$this->model->updateCategory(
    		'hello',
    		end($this->categories)->getID()
    	);
    	$this->categories = $this->model->readCategories();
    	$this->category = $this->categories[end($this->categories)->getID()];

    	$this->assertSame('hello', $this->category->getName()->getTextContent());
    }

    public function testDeleteCategory()
    {
    	$this->model->deleteCategory(end($this->categories)->getID());
    	$this->categories = $this->model->readCategories();
    	$this->assertSame(1, count($this->categories));
    }

    /* --------  PAGE -------- */

    public function testReadPagesReturnsArray()
	{
		$this->assertIsArray($this->pages);
	}

	public function testReadPagesArrayContainsPage()
	{
		$this->assertInstanceOf(Page::class, $this->page);
	}

    public function testReadPage()
    {
    	$this->assertEquals($this->page, $this->testPage);
    }
/*
    public function testCreatePage()
    {
    	$this->model->createPage('foo');

    	$this->pages = $this->model->readPages();
        var_dump($this->pages);
    	$this->assertInstanceOf(Page::class, $this->pages[$this->model->getLastID()]);
    }

    public function testUpdateCategory()
    {
    	$this->categories = $this->model->readCategories();
    	$this->model->updateCategory(
    		'hello',
    		end($this->categories)->getID()
    	);
    	$this->categories = $this->model->readCategories();
    	$this->category = $this->categories[end($this->categories)->getID()];

    	$this->assertSame('hello', $this->category->getName()->getTextContent());
    }

    public function testDeleteCategory()
    {
    	$this->model->deleteCategory(end($this->categories)->getID());
    	$this->categories = $this->model->readCategories();
    	$this->assertSame(1, count($this->categories));
    }*/
}
