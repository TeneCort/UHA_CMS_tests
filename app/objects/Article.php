<?php  

class Article {

	protected $articleID;
    protected $articleTitle;
    protected $articleTextContent;
    protected $category;
    protected $page;

    /*
    protected $articleDate = '';
    protected $articleTime = '';
    protected $articlePublisher = '';
    */
    
    public function __construct(){

    }

    public function getID(): String{
    	return $this->articleID;
    }

    /**
     * Not really needed since the ID is set through the sql request
     */

    public function setID(String $id){
    	$this->articleID = $id;
    }

    public function getTitle(): TextElement{
    	return $this->articleTitle;
    }

    public function setTitle(TextElement $newTitle){
    	$this->articleTitle = $newTitle;
    }

    public function getTextContent(): TextElement{
    	return $this->articleTextContent;
    }

    public function setTextContent(TextElement $newTextContent){
    	$this->articleTextContent = $newTextContent;
    }

    public function getCategory(): Category{
        return $this->category;
    }

    public function setCategory(Category $newCategory){
        $this->category = $newCategory;
    }

    public function getPage(): Page{
        return $this->page;
    }

    public function setPage(Page $newPage){
        $this->page = $newPage;
    }

    /**
     *  Must add the rest of setters & getters
     */
}

?>