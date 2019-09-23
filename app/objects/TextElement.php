<?php 
class TextElement{

	protected $textContent;		

	function __construct(String $text)
	{
		$this->textContent = $text;
	}

	function getTextContent(): String
	{
		return $this->textContent;
	}

	function setTextContent(String $newText)
	{
		$this->textContent = $newText;
	}
}
?>