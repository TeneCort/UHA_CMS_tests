<?php
class Model {

    static $user, $pass, $name, $conn;
    protected $article, $articles;

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

    public function readArticle($articleID){

        $req = ("SELECT * FROM article WHERE `id` = '$articleID'");
        $res = $this::$conn->query($req);
        while ($row = $res->fetch(PDO::FETCH_OBJ)) { 

        $article = [
            "id"          => $row->id,
            "title"       => $row->title,
            "textContent" => $row->textContent
            ];
        }

        return $article;
    }

    public function readAll(){

        $req = ("SELECT * FROM article");
        $res = $this::$conn->query($req);
        $articles = [];

        while ($row = $res->fetch(PDO::FETCH_OBJ)) { 

            $article = [
                "id"          => $row->id,
                "title"       => $row->title,
                "textContent" => $row->textContent
            ];

            array_push($articles, $article);
        }

        return $articles;
    }

    public function createArticle($title, $textContent){

        $req = "INSERT INTO `article` (`title`, `textContent`) VALUES ('$title', '$textContent')";
        $this::$conn->exec($req);           
        echo "New record created successfully"; 
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
