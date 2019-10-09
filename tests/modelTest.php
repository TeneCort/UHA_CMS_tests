<?php

require_once('init.php');

use PHPUnit\Framework\TestCase;

 class ModelTests extends TestCase
 {

	static protected $host, $user, $pass, $name, $conn;

	private $article;

	protected function setUp() : void
	{

        $this::$host = '0.0.0.0';
        $this::$user = 'root';
        $this::$pass = 'example';
        $this::$name = 'cms';

		try 
		{
	        $this::$conn = new PDO(
	            'mysql:host=' . $this::$host . ';port=3307;dbname=' . $this::$name, $this::$user, $this::$pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
	        	);
        }
        catch (PDOException $e) 
        {
            die('Erreur : ' . $e->getMessage());
        }

        $req = ("SELECT 
                    a.id          AS a_id, 
                    a.title       AS a_title, 
                    a.textContent AS a_textContent, 
                    a.category    AS a_category, 
                    a.page        AS a_page,
                    c.name        AS c_name,
                    c.id          AS c_id,
                    p.name        AS p_name,
                    p.id          AS p_id

                FROM 
                    article a,
                    category c,
                    page p
                WHERE
                    c.id = a.category
                AND
                    p.id = a.page    
                ");

        $res = $this::$conn->query($req);

        while ($row = $res->fetch(PDO::FETCH_OBJ)) { 
        	$this->article = $row;
        }     
	}

    public function testConnection()
	{
		$this->assertIsObject($this::$conn);
	}

	public function testReadArticleID()
	{
        $this->assertSame('1', $this->article->a_id); 
    }

	public function testReadArticleTitle()
	{
        $this->assertSame('hello', $this->article->a_title); 
    }

	public function testReadArticleTextContent()
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
    }
}
