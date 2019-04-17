<?php  

class Menu {

	protected $pages = [];
	protected $color; 

	public function __construct(array $pages, NavBarColor $color){
		$this->pages = $pages;
		$this->color = $color;
	}

	public function show(): void{
		echo $this->navBarTemplate($this->pages);

	}

	public function navBarTemplate(array $pages): void{
		echo '
		<nav class="navbar navbar-expand-lg navbar-light ' . $this->color->getColor()->getTextContent() . '">
			<a class="navbar-brand" href="/home/index">Home</a>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">';

			foreach ($this->pages as $value) {
				echo '<ul class="navbar-nav mr-auto">' .
					$this->li($this->linkTag($value->getName()->getTextContent()))->getTextContent() .'
				</ul>'; 
			}

		echo '</div>'
		. $this->adminButton() .
		'</nav>';
	}

	public function li(TextElement $linkTag): TextElement{
		$listTagElement = new TextElement();
		$listTagElement->setTextContent('<li class="nav-item active">' . $linkTag->getTextContent() . '</li>');
		return $listTagElement;
	}

	public function linkTag(String $pageName): TextElement{
		$linkTagElement = new TextElement();
		$linkTagElement->setTextContent('<a class="nav-link" href="/home/ello/'. $pageName .'"> '. $pageName .' <span class="sr-only">(current)</span></a>');
		return $linkTagElement;
	}

	public function adminButton(){
		echo '<a class="btn btn-dark" href="/administration" role="button">Admin</a>';
	}

	public function getColor(): NavBarColor{
		return $this->color;
	}

	public function setColor(NavBarColor $color){
		$this->color = $color;
	}

}

?>