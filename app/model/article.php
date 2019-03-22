<?php

include OBJECTS . 'article.php';

class article extends Model{
    
    protected $articleID = '';
    protected $articleTitle = '';
    protected $articleTextContent = '';
    protected $articleDate = '';
    protected $articleTime = '';
    protected $articlePublisher = '';
    
    protected $articleu;

    public function __construct(){
        parent:: __construct();
                
    }

    public function getArticle($aID){
        $this->articleID = $aID;
        $this->articleTitle = $this->readArticle($this->articleID)['title'];
        $this->articleTextContent = $this->readArticle($this->articleID)['textContent'];
        return $this;
    }

    public function getTitle($aID){
        return $this->getArticle($aID)->articleTitle;
    }

    public function getID($aID){
        return $this->getArticle($aID)->articleID;
    }

    public function getTextContent($aID){
        return $this->getArticle($aID)->articleTextContent;
    }

    public function newArticle(){

        if (isset($_POST['create'])) {

            $articleTitle = $_POST['title'];
            $articleTextContent = $_POST['text'];
            $this->createArticle($articleTitle, $articleTextContent);        
        }
    }

    public function eraseArticle($aID){

        if (isset($_POST['delete'])) {

            $this->deleteArticle($aID);    
        }
    }
}