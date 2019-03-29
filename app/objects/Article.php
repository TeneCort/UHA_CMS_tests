<?php  

class Article{

	protected $articleID = '';
    protected $articleTitle = '';
    protected $articleTextContent = '';
    /*protected $articleDate = '';
    protected $articleTime = '';
    protected $articlePublisher = '';
    protected $category;*/
    
    public function __construct(){

    }

    public function getID(){
    	return $this->articleID;
    }

    /**
     * Not really needed since the ID is set through the sql request
     */

    public function setID($id){
    	$this->articleID = $id;
    }

    public function getTitle(){
    	return $this->articleTitle;
    }

    public function setTitle($newTitle){
    	$this->articleTitle = $newTitle;
    }

    public function getTextContent(){
    	return $this->articleTextContent;
    }

    public function setTextContent($newTextContent){
    	$this->articleTextContent = $newTextContent;
    }

    /**
     *  Must add the rest of setters & getters
     */
}

?>