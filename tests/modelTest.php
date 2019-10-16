<?php

require_once('init.php');

use PHPUnit\Framework\TestCase;

 class modelTests extends TestCase
 {

	private $model, $articles, $article, $testArticle, $lastID;

	protected function setUp() : void
	{
		$this->model = new Model();

		$this->articles = $this->model->readArticles();
		$this->article = $this->articles[1];

		$this->testArticle = new Article(
			'1',
			new TextElement('hello'),
			new TextElement('world'),
			new Category('1', new TextElement('category')),
			new Page('1', new TextElement('page'))
		);

	}

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
}
