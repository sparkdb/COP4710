<?php
	session_start();
	
	session_unset();
	session_destroy();
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>SmashDB</title>
		<meta name="description" content="Florida State University Database (COP4710) 
			Fall 2016 group project with Dr.Zhao."> 
		<meta name="keywords" content="FSU, Florida State University, Database, COP4710, 
			Games, Video Games, Smash Brothers, Smash Bros, Smash Bro, Nintendo, Wii U">
		<link rel="stylesheet" href="css/headerFooter.css">
		<link rel="stylesheet" href="css/home.css">
		<link rel="icon" href="assets/favicon.png">
		
	</head>
	
	<body>
		
		<div class="homeHeader">
			<!-- <a href="home.html"><img src="assets/logo.png" alt="logo" id="log"></a> -->
			<a href="home.php" id="logo">SmashDB</a>
			<input type="text" id="search" placeholder="Search tournaments...">
			<a href="login.html" id="login">Login</a>
			<a href="signup.html" id="signup">Sign Up</a>
			<a href="resultpage.php" id="resultpage">Result Page</a>
			<a href="insertionPage.php" id="insertionPage">Insertion Page</a>
			<a href="deletionPage.php" id="deletionPage">Deletion Page</a>
			<a href="updatePage.php" id="updatePage">Update Page</a>
		</div> <!-- end of homeHeader -->

		<br>
		
		<div class="SmashBros">
			<div id="SmashColumnOne">
				<a href="https://en.wikipedia.org/wiki/Super_Smash_Bros._for_Nintendo_3DS_and_Wii_U"><img src="assets/smash4.png" title="Super Smash Bros 4" alt="Super Smash Bros 4" height="200px" width="300px"/></a>
				<a href="https://en.wikipedia.org/wiki/Super_Smash_Bros._Melee"><img src="assets/smashMelee.png" title="Super Smash Bros Melle" alt="Super Smash Bros Melee" height="200px" width="300px"/></a>
			</div>
			<br>
			<div id="SmashColumnTwo">
				<a href="https://en.wikipedia.org/wiki/Project_M_(video_game)"><img src="assets/smashPM.jpg" title="Super Smash Bros Project M" alt="Super Smash Bros Project M" height="200px" width="300px"/></a>
				<a href="https://en.wikipedia.org/wiki/Super_Smash_Bros._(video_game)"><img src="assets/smash64.jpg" title="Super Smash Bros 64" alt="Super Smash Bros 64" height="200px" width="300px"/></a>
				<a href="https://en.wikipedia.org/wiki/Super_Smash_Bros._Brawl"><img src="assets/smashBrawl.jpg" title="Super Smash Bros Brawl" alt="Super Smash Bros Brawl" height="200px" width="300px"/></a>
			</div>
		</div> <!-- end of SmashBros -->
		
		<div class="homeFooter">
			<a href="about.html">About</a>
			<a href="contact.html">Contact</a>
			<a href="privacy.html">Privacy</a>
			<a href="api.html">API</a>
			<br>
			<div id="socialMedia">
				<a href=""><img src="assets/1.png" alt="facebook" height="30px" width="30px"/></a>
				<a href=""><img src="assets/2.png" alt="twitter" height="30px" width="30px"/></a>
				<a href=""><img src="assets/3.png" alt="google plus" height="30px" width="30px"/></a>
				<a href=""><img src="assets/4.png" alt="youtube" height="30px" width="30px"/></a>
			</div>
			&copy 2016 Florida State Univeristy
		</div> <!-- end of homeFooter -->
	</body>
</html>