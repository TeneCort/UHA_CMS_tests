<?php  

class User {

	protected $userID, $userNickname, $userPassword, $userFirstName, $userLastName;

    public function __construct(String $id, TextElement $nickName, String $password, TextElement $firstName, TextElement $lastName)
    {
        $this->userID        = $id;
        $this->userNickname  = $nickName;
        $this->userPassword  = $password;
        $this->userFirstName = $firstName;
        $this->userLastName  = $lastName;
    }

    public function getID(): String
    {
    	return $this->userID;
    }

    public function setID(String $id)
    {
    	$this->userID = $id;
    }

    public function getNickname(): TextElement
    {
    	return $this->userNickname;
    }

    public function setNickname(TextElement $newNickname)
    {
    	$this->userNickname = $newNickname;
    }

    public function getPassword(): String
    {
    	return $this->userPassword;
    }

    public function setPassword(String $newPassword)
    {
    	$this->userPassword = $newTextContent;
    }

    public function getFirstName(): TextElement
    {
        return $this->userFirstName;
    }

    public function setFirstName(TextElement $newFirstName)
    {
        $this->userFirstName = $newFirstName;
    }

    public function getLastName(): TextElement
    {
        return $this->userLastName;
    }

    public function setLastName(TextElement $newLastName)
    {
        $this->page = $userLastName;
    }

    /**
     *  Must add the rest of setters & getters
     */
}

?>