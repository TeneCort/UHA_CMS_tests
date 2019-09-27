<?php

require_once ('init.php');

use PHPUnit\Framework\TestCase;

 class TextElementTest extends TestCase
 {

	protected $textElement;

	protected function setUp() : void
	{
		$this->textElement = new TextElement('');
	}

    public function testTextElement()
	{
        $this->assertIsObject($this->textElement);
	}

	public function testTextContentAttribute()
	{
        $this->assertObjectHasAttribute('textContent', new TextElement(''));
	}

	public function testTextContentIsString()
	{
        $this->assertIsString('', $this->textElement->getTextContent());
	}

	public function testSetTextContent()
	{
		$result = $this->textElement->setTextContent('Test');
		$this->assertEquals('Test', $this->textElement->getTextContent('Test'));
	}
}
