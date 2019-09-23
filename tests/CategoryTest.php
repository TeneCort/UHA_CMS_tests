<?php

require 'init.php';

use PHPUnit\Framework\TestCase;

 class TextElementTest extends TestCase
 {

	protected $textElement, $category;

	protected function setUp() : void
	{
		$this->textElement = new TextElement('');
		$this->category    = new Category('1', $this->textElement);
	}

    public function testCategory()
	{	
        $this->assertIsObject($this->category);
	}

	public function testCategoryIDAttribute()
	{
        $this->assertObjectHasAttribute('categoryID', $this->category);
	}

	public function testCategoryNameAttribute()
	{
        $this->assertObjectHasAttribute('categoryName', $this->category);
	}

	public function testCategorySubCategoriesAttribute()
	{
        $this->assertObjectHasAttribute('subCategories', $this->category);
	}

	public function testCategoryIDIsString()
	{
        $this->assertIsString('', $this->category->getID());
	}

	public function testCategoryNameIsObject()
	{
        $this->assertIsObject($this->category->getName());
	}

	public function testSetGetCategoryID()
	{
		$this->category->setID('2');
		$this->assertEquals('2', $this->category->getID());
	}

	public function testSetGetCategoryName()
	{
		$this->category->setName(new TextElement('Test'));
		$this->assertEquals('Test', $this->category->getName()->getTextContent());
	}
}
