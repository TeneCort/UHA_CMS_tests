<?php
class Model {

    static protected $user, $pass, $name, $conn;

    protected $article;

    public function __construct() {
        $this->dbConfig();
        $this->connection();
    }

    public function connection() {
        try {
            $this::$conn = new PDO(
                'mysql:host=localhost;dbname=' . $this::$name, $this::$user, $this::$pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );
        }
        catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function dbConfig() {

        $db = parse_ini_file("db.ini");

        $this::$user = $db['user'];
        $this::$pass = $db['pass'];
        $this::$name = $db['name'];
    }

    public function getArticle($aID){
        $this->articleu = new Article();
        $this->articleu = $this->readArticle($aID);
        return $this->articleu;
    }

    public function readArticle($articleID){

        $req = ("SELECT * FROM article WHERE `id` = '$articleID'");
        $res = $this::$conn->query($req);
        while ($row = $res->fetch(PDO::FETCH_OBJ)) { 

            $this->article = new Article(); 
            $this->article->setID($row->id);
            $this->article->setTitle($row->title);  
            $this->article->setTextContent($row->textContent); 
        }
        return $this->article;
    }

    public function readAll(){

        $req = ("SELECT * FROM article");
        $res = $this::$conn->query($req);
        $articles = [];

        while ($row = $res->fetch(PDO::FETCH_OBJ)) { 

            $this->article = new Article(); 
            $this->article->setID($row->id);
            $this->article->setTitle($row->title);  
            $this->article->setTextContent($row->textContent);
            array_push($articles, $this->article);
        }

        return $articles;
    }

    public function newArticle(){
        if (isset($_POST['create'])) {
            $articleTitle = $_POST['title'];
            $articleTextContent = $_POST['text'];
            $this->createArticle($articleTitle, $articleTextContent);        
        }
    }

    public function createArticle($title, $textContent){
        $req = "INSERT INTO `article` (`title`, `textContent`) VALUES ('$title', '$textContent')";
        $this::$conn->exec($req);           
        echo "New record created successfully"; 
    }

    public function eraseArticle($aID){
        if (isset($_POST['delete'])) {
            $this->deleteArticle($aID);    
        }
    }

    public function deleteArticle($articleID){
        $req = "DELETE  FROM `article` WHERE `id` = '$articleID'";
        $this::$conn->exec($req);         
        echo "Article deleted successfully"; 
    }

    public function updateArticle($articleID, $articleTitle, $textContent){
        $req = "UPDATE `article` 
        SET `title` = '$articleTitle', `textContent` = '$textContent'
        WHERE `id` = '$articleID'";
        $this::$conn->exec($req);         
        echo "Article updated successfully"; 
    }
}
