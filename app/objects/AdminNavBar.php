<?php  

class AdminNavBar {
	public function navBar(): void{
		echo '
			<nav>
				<ul>
					<li><a href="/home/index">Site Index</a></li>
					<li><a href="/administration/index">Admin</a></li>
					<li><a href="/administration/">About Us</a></li>
					<li><a href="/administration/newarticle">New Article</a></li>
				</ul>
			</nav>
			';
	}
}


?>