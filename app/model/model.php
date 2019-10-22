<?php
class Model {

    static protected $host, $user, $pass, $name, $conn;

    protected $article, $page, $lastID;

    public function __construct() {
        $this->dbConfig();
        $this->connection();
    }

    public function connection(): void{
        try {
            $this::$conn = new PDO(
                'mysql:host=' . $this::$host . ';port=3307;dbname=' . $this::$name, $this::$user, $this::$pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );
        }
        catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function dbConfig(): void{
        $db = parse_ini_file("db.ini");
        $this::$host = $db['host'];
        $this::$user = $db['user'];
        $this::$pass = $db['pass'];
        $this::$name = $db['name'];
    }

    public function createArticle(String $title, String $textContent, String $category, String $page): void{
        $req = "INSERT `article` (`title`, `textContent`, `category`, `page`) VALUES ('$title', '$textContent', '$category', '$page')";
        $this::$conn->exec($req);           
        $this->lastID = $this::$conn->lastInsertId();
    }

    public function getLastID(): string
    {
        return $this->lastID;
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
    }

    public function updateArticle(String $articleID, String $articleTitle, String $textContent, String $categoryID, String $pageID): void{
        $req = "
        UPDATE 
            `article` 
        SET 
            `title`       = '$articleTitle', 
            `textContent` = '$textContent',
            `category`    = '$categoryID',
            `page`        = '$pageID'
        WHERE 
            `id`          = '$articleID'";
        $this::$conn->exec($req); 
    }

    public function createCategory($categoryName): void{
        $req = "INSERT `category` (`name`) VALUES ('$categoryName')";
        $this::$conn->exec($req);  
        $this->lastID = $this::$conn->lastInsertId(); 
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
    }

    public function deleteCategory(String $categoryID): void{
        $req = "DELETE  FROM `category` WHERE `id` = '$categoryID'";
        $this::$conn->exec($req);
    }

    public function createPage(String $pageName): void{
        $req = "INSERT `page` (`name`) VALUES ('$pageName')";
        $this::$conn->exec($req); 
    }

    public function readPages(): array{

        $req = ("
            SELECT
                p.id   AS p_id,
                p.name AS p_name,
                a.page AS a_page,
                a.id   AS a_id
            FROM 
                article a,
                page p
            WHERE
                p.id = a.page
        ");

        $res = $this::$conn->query($req);

        while ($row = $res->fetch(PDO::FETCH_OBJ))
        {

            /*if ($pages[$row->p_id] == null)
            {
                $pages[$row->p_id] = new Page($row->p_id, new TextElement($row->p_name));
            }*/
           
            $pages[$row->p_id] = new Page($row->p_id, new TextElement($row->p_name));
            $pages[$row->p_id]->addArticle($row->a_id);

        }
        return $pages;
    }
    
    public function updatePageName(String $pageName, String $pageID): void{
        $req = "UPDATE `page` SET `name` = '$pageName' WHERE `id`   = '$pageID'";
        $this::$conn->exec($req);
    }

    public function deletePage(String $pageID): void{
        $req = "DELETE  FROM `page` WHERE `id` = '$pageID'";
        $this::$conn->exec($req);; 
    }

    public function Menu(): Menu{
        return new Menu($this->readPages(), $this->readnavBarColor());
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
    }

    public function imageUpload(){

        //echo $_FILES["fileToUpload"]["name"];

        $target_dir = ROOT . 'public' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR;

        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

        $uploadOk = 1;

        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file(strip_tags($_FILES["fileToUpload"]["tmp_name"]), $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    public function imgTest(){
        $img = new BackgroundImage();
        return $img;
    }
}
