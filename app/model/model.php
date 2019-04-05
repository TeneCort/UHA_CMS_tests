<?php
class Model {

    static protected $user, $pass, $name, $conn;

    protected $article, $articleTitle, $articleTextContent;
    protected $articleCategory, $categoryName;

    public function __construct() {
        $this->dbConfig();
        $this->connection();
    }

    public function connection(): void{
        try {
            $this::$conn = new PDO(
                'mysql:host=localhost;dbname=' . $this::$name, $this::$user, $this::$pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );
        }
        catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function dbConfig(): void{
        $db = parse_ini_file("db.ini");
        $this::$user = $db['user'];
        $this::$pass = $db['pass'];
        $this::$name = $db['name'];
    }

    public function createArticle(String $title, String $textContent, String $category): void{
        $req = "INSERT `article` (`title`, `textContent`, `category`) VALUES ('$title', '$textContent', '$category')";
        $this::$conn->exec($req);           
        echo "New record created successfully"; 
    }

    public function getArticle(String $aID): Article{
        return $this->readArticle($aID);
    }

    public function readArticle(String $articleID): Article{
        $req = ("SELECT 
                    a.id          AS a_id, 
                    a.title       AS a_title, 
                    a.textContent AS a_textContent, 
                    a.category    AS a_category, 
                    c.name        AS c_name,
                    c.id          AS c_id
                FROM 
                    article a,
                    category c
                WHERE
                    a.id = '$articleID'
                AND 
                    c.id = a.category
                    ");

        $res = $this::$conn->query($req);
        
        while ($row = $res->fetch(PDO::FETCH_OBJ)) { 

            $this->article = new Article();

            $this->articleTitle = new TextElement();
            $this->articleTitle->setTextContent($row->a_title);
            $this->article->setTitle($this->articleTitle);

            $this->articleTextContent = new TextElement();
            $this->articleTextContent->setTextContent($row->a_textContent);
            $this->article->setTextContent($this->articleTextContent);

            $this->articleCategory = new Category();
            $this->categoryName = new TextElement();
            $this->categoryName->setTextContent($row->c_name);
            $this->articleCategory->setName($this->categoryName);
            $this->articleCategory->setID($row->c_id);
            $this->article->setCategory($this->articleCategory);


            $this->article->setID($row->a_id);
        }
        return $this->article;
    }

    public function readAllArticles(): array{
        $req = ("SELECT * FROM article");
        $res = $this::$conn->query($req);
        $articles = [];

        while ($row = $res->fetch(PDO::FETCH_OBJ)) { 

            $this->article = new Article();

            $this->articleTitle = new TextElement();
            $this->articleTitle->setTextContent($row->title);
            $this->article->setTitle($this->articleTitle);

            $this->articleTextContent = new TextElement();
            $this->articleTextContent->setTextContent($row->textContent);
            $this->article->setTextContent($this->articleTextContent);

            $this->article->setID($row->id);

            array_push($articles, $this->article);
        }
        return $articles;
    }

    public function deleteArticle(String $articleID): void{
        $req = "DELETE  FROM `article` WHERE `id` = '$articleID'";
        $this::$conn->exec($req);         
        echo "Article deleted successfully"; 
    }

    public function updateArticle(String $articleID, String $articleTitle, String $textContent, String $categoryID): void{
        $req = 
        "UPDATE 
            `article` 
        SET 
            `title` = '$articleTitle', 
            `textContent` = '$textContent',
            `category` = '$categoryID'
        WHERE 
            `id` = '$articleID'";
        $this::$conn->exec($req);         
        echo "Article updated successfully"; 
    }

    public function createCategory($categoryName): void{
        $req = "INSERT `category` (`name`) VALUES ('$categoryName')";
        $this::$conn->exec($req);   
        echo "New category created successfully"; 
    }

    public function readCategories(): array{
        $req = ("SELECT * FROM category");
        $res = $this::$conn->query($req);
        $categories = [];

        while ($row = $res->fetch(PDO::FETCH_OBJ)) { 

            $this->category = new Category();

            $this->categoryName = new TextElement();
            $this->categoryName->setTextContent($row->name);
            $this->category->setName($this->categoryName);

            $this->category->setID($row->id);

            array_push($categories, $this->category);
        }
        return $categories;
    }

    public function readCategory(): Category{

    }

    public function updateCategory(): void{

    }

    public function deleteCategory(): void{

    }

    public function adminNavBar(): AdminNavBar{
        $adminNavBar = new AdminNavBar();
        return $adminNavBar;
    }
}
