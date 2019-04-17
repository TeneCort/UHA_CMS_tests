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
        public function createArticle(String $title, String $textContent, String $category, String $page): void{
        $req = "INSERT `article` (`title`, `textContent`, `category`, `page`) VALUES ('$title', '$textContent', '$category', '$page')";
        $this::$conn->exec($req);           
        echo "New record created successfully"; 
    }

    public function readArticles(): array{

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

        $articles = [];

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

            $this->articlePage = new Page();
            $this->pageName = new TextElement();
            $this->pageName->setTextContent($row->p_name);
            $this->articlePage->setName($this->pageName);
            $this->articlePage->setID($row->p_id);
            $this->article->setPage($this->articlePage);

            $this->article->setID($row->a_id);

            $articles[$row->a_id] = $this->article;

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
            `title`       = '$articleTitle', 
            `textContent` = '$textContent',
            `category`    = '$categoryID'
        WHERE 
            `id`          = '$articleID'";
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

            $categories[$row->id] = $this->category;
        }
        return $categories;
    }

    public function updateCategory(String $categoryName, String $categoryID): void{
        $req = 
        "UPDATE 
            `category` 
        SET 
            `name` = '$categoryName'
        WHERE 
            `id`   = '$categoryID'";

        $this::$conn->exec($req);   

        echo "Category updated successfully";
    }

    public function deleteCategory(String $categoryID): void{
        $req = "DELETE  FROM `category` WHERE `id` = '$categoryID'";
        $this::$conn->exec($req);       
        echo "Category deleted successfully"; 
    }

    public function createPage(String $pageName): void{
        $req = "INSERT `page` (`name`) VALUES ('$pageName')";
        $this::$conn->exec($req);           
        echo "New record created successfully"; 
    }

    public function readPages(): array{
        $req = ("SELECT * FROM page");
        $res = $this::$conn->query($req);           

        $pages = [];

        while ($row = $res->fetch(PDO::FETCH_OBJ)) { 

            $this->page = new Page();
            $this->pageName = new TextElement();
            $this->pageName->setTextContent($row->name);
            $this->page->setName($this->pageName);
            $this->page->setID($row->id);

            array_push($pages, $this->page);
        }
        return $pages;
    }
    
    public function Menu(): Menu{
        $pages = $this->readPages();
        $color = $this->readnavBarColor();
        $menu = new Menu($pages, $color);
        return $menu;
    }

    public function readNavBarColors(): array{
        $req = ("SELECT * FROM navbar_color");
        $res = $this::$conn->query($req);  

        $colors = [];

        while ($row = $res->fetch(PDO::FETCH_OBJ)) { 

            $this->color = new NavBarColor();
            $this->colorName = new TextElement();
            $this->colorName->setTextContent($row->color);
            $this->color->setColor($this->colorName);
            $this->color->setID($row->id);
            
            array_push($colors, $this->color);
        }

        return $colors;
    }
    
    public function readNavBarColor(): NavBarColor{
        $req = ("
            SELECT n.id    AS n_id,
                   n.color AS n_color,
                   c.id    AS c_id,
                   c.color AS c_color 
            FROM   
                   navBar n,
                   navbar_color c
            WHERE  
                   n.color = c.id
            ");

        $res = $this::$conn->query($req);  
        $navColor = new NavBarColor();
        while ($row = $res->fetch(PDO::FETCH_OBJ)) { 
            $color = new TextElement();
            $color->setTextContent($row->c_color);
            $navColor->setColor($color);
            $navColor->setID($row->c_id);
        }
        return $navColor;
    }

    public function updateNavBarColor(String $color){
        $req = ("UPDATE `navBar` SET `color` = '$color'");

        $this::$conn->exec($req);   

        echo "NavBar color updated successfully";

    }
}
