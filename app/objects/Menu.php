<?php  

class Menu {

	protected $pages = [];
	protected $color; 

	public function __construct(array $pages, NavBarColor $color){
		$this->pages = $pages;
		$this->color = $color;
	}

	public function show(): void{
		echo $this->newNavBar($this->pages);
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

	public function newNavBar(array $pages): void{
		echo '
		<nav class="navbar navbar-expand-lg navbar-dark ' . $this->color->getColor()->getTextContent() . '">
			<a class="navbar-brand" href="/home/index">Home</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarColor01">
				<ul class="navbar-nav mr-auto">';
				foreach ($this->pages as $value) {
				echo'<li class="nav-item active">' .
					$this->li($this->linkTag($value->getName()->getTextContent()))->getTextContent() . '
					</li>';
				}
				echo'<li class="nav-item">';
					echo $this->adminButton();
				echo'
					</li>
					
				</ul>
			</div>
		</nav>';

	}

	public function li(TextElement $linkTag): TextElement{
		$listTagElement = new TextElement('<li class="nav-item active">' . $linkTag->getTextContent() . '</li>');
		return $listTagElement;
	}

	public function linkTag(String $pageName): TextElement{
		$linkTagElement = new TextElement('<a class="nav-link" href="/home/pages/'. $pageName .'"> '. $pageName .' <span class="sr-only">(current)</span></a>');
		return $linkTagElement;
	}

	public function adminButton(){
		echo '<a class="nav-link" href="/administration">Admin</a>';
	}

	public function getColor(): NavBarColor{
		return $this->color;
	}

	public function setColor(NavBarColor $color){
		$this->color = $color;
	}
}
?>