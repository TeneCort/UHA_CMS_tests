<?php

require_once ('init.php');

use PHPUnit\Framework\TestCase;

 class UserTests extends TestCase
 {

	private $user, $textElement, $articles;

	protected function setUp() : void
	{
		$this->textElement = new TextElement('');
		$this->user        = new User('1', $this->textElement, '' ,$this->textElement, $this->textElement);	
		$this->articles    = array();
	}

    public function testUser()
	{
		$this->assertIsObject($this->user);
	}

	public function testIDAttribute()
	{
		$this->assertObjectHasAttribute('userID', $this->user);
	}

	public function testNicknameAttribute()
	{
		$this->assertObjectHasAttribute('userNickname', $this->user);
	}

	public function testPasswordAttribute()
	{
		$this->assertObjectHasAttribute('userPassword', $this->user);
	}

	public function testFirstNameAttribute()
	{
		$this->assertObjectHasAttribute('userFirstName', $this->user);
	}

	public function testLastNameAttribute()
	{
		$this->assertObjectHasAttribute('userLastName', $this->user);
	}

	public function testUserIDIsString()
	{
        $this->assertIsString('', $this->user->getID());
	}

	public function testNicknameIsTextElement()
	{
        $this->assertInstanceOf(TextElement::class, $this->user->getNickname());
	}

	/*public function testSetGetUserID()
	{
		$this->User->setID('2');
		$this->assertEquals('2', $this->User->getID());
	}

	public function testSetGetUserName()
	{
		$this->User->setName(new TextElement('Test'));
		$this->assertEquals('Test', $this->User->getName()->getTextContent());
	}

	public function testSetGetUserArticles()
	{	
		$this->User->setArticles(array('1', '2', '3'));
		$this->assertEquals(array('1', '2', '3'), $this->User->getArticles());
	}

	public function testAddArticle()
	{
		$this->User->setArticles(array('1'));
		$this->User->addArticle('2');
		$this->assertEquals(array('1', '2'), $this->User->getArticles());
	}

	public function testRemoveArticle()
	{
		$this->User->setArticles(array('1', '2'));
		$this->User->removeArticle('2');
		$this->assertEquals(array('1'), $this->User->getArticles());
	}*/
}
