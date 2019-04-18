<?php
class Model {

    static protected $user, $pass, $name, $conn;

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

        while ($row = $res->fetch(PDO::FETCH_OBJ)) { 

            $this->article = new Article(
                $row->a_id, 
                new TextElement($row->a_title),
                new TextElement($row->a_textContent),
                new Category   ($row->c_id, new TextElement($row->c_name)),
                new Page       ($row->p_id, new TextElement($row->p_name))
            );

            $articles[$row->a_id] = $this->article;
        }
        return $articles;
    }

    public function deleteArticle(String $articleID): void{
        $req = "DELETE  FROM `article` WHERE `id` = '$articleID'";
        $this::$conn->exec($req);         
        echo "Article deleted successfully"; 
    }

    public function updateArticle(String $articleID, String $articleTitle, String $textContent, String $categoryID, String $pageID): void{
        $req = 
        "UPDATE 
            `article` 
        SET 
            `title`       = '$articleTitle', 
            `textContent` = '$textContent',
            `category`    = '$categoryID',
            `page`        = '$pageID'
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
        while ($row = $res->fetch(PDO::FETCH_OBJ)) { 
            $categories[$row->id] = new Category($row->id, new TextElement($row->name));
        }
        return $categories;
    }

    public function updateCategory(String $categoryName, String $categoryID): void{
        $req = "UPDATE `category` SET `name` = '$categoryName' WHERE `id` = '$categoryID'";
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
        echo "New page created successfully"; 
    }

    public function readPages(): array{
        $req = ("SELECT * FROM page");
        $res = $this::$conn->query($req);
        while ($row = $res->fetch(PDO::FETCH_OBJ)) {
            $pages[$row->id] = new Page($row->id, new TextElement($row->name));
        }
        return $pages;
    }
    
    public function updatePage(String $pageName, String $pageID): void{
        $req = "UPDATE `page` SET `name` = '$pageName' WHERE `id`   = '$pageID'";
        $this::$conn->exec($req);   
        echo "Page updated successfully";
    }

    public function deletePage(String $pageID): void{
        $req = "DELETE  FROM `page` WHERE `id` = '$pageID'";
        $this::$conn->exec($req);       
        echo "Page deleted successfully"; 
    }

    public function Menu(): Menu{
        return new Menu($this->readPages(), $this->readnavBarColor());;
    }

    public function readNavBarColors(): array{
        $req = ("SELECT * FROM navbar_color");
        $res = $this::$conn->query($req);
        while ($row = $res->fetch(PDO::FETCH_OBJ)) {             
            $colors[$row->id] = new NavBarColor($row->id, new TextElement($row->color));
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
        while ($row = $res->fetch(PDO::FETCH_OBJ)) { 
            $navColor = new NavBarColor($row->c_id, new TextElement($row->c_color));
        }
        return $navColor;
    }

    public function updateNavBarColor(String $color){
        $req = ("UPDATE `navBar` SET `color` = '$color'");
        $this::$conn->exec($req);   
        echo "NavBar color updated successfully";
    }
}
