<?php  

class Articlee{

	protected $articleID = '';
    protected $articleTitle = '';
    protected $articleTextContent = '';
    protected $articleDate = '';
    protected $articleTime = '';
    protected $articlePublisher = '';
    
    public function __construct(){

    }

    public function getID(){
    	return $this->articleID;
    }

    public function setID($id){
    	$this->articleID = $id;
    }

    public function getTitle(){
    	return $this->articleTitle;
    }

    public function setTitle($title){
    	$this->articleTitle = $title;
    }

    public function getTextContent(){
    	return $this->articleTextContent;
    }

    public function setTextContent($textContent){
    	$this->articleTextContent = $textContent;
    }
}

?>