<?php  

class AdminNavBar {
	public function show(): void{
		echo '
			<nav>
				<ul>
					<li><a href="/home/index">Site Index</a></li>
					<li><a href="/administration/index">Admin</a></li>
					<li><a href="/administration/">About Us</a></li>
				</ul>
			</nav>
			';
	}
}


?>