<?php
	session_start();
	
	session_unset();
	session_destroy();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>User Home - SmashDB</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/home.css">
		<link rel="stylesheet" href="css/header.css">
		<link rel="icon" href="assets/favicon.png">

	</head>
	<body>	
		<div class="header">
			<a href="userResultPage.php">Result</a>
			<a href="login.php" id="login">Log In</a>
		</div>
		<br><br>
		<div class="SmashBros">
			<div id="SmashColumnOne">
				<a href="https://en.wikipedia.org/wiki/Super_Smash_Bros._for_Nintendo_3DS_and_Wii_U"><img src="assets/smash4.png" title="Super Smash Bros 4" alt="Super Smash Bros 4" height="200px" width="300px"/></a>
				<a href="https://en.wikipedia.org/wiki/Super_Smash_Bros._Melee"><img src="assets/smashMelee.png" title="Super Smash Bros Melee" alt="Super Smash Bros Melee" height="200px" width="300px"/></a>
			</div>
			<div id="SmashColumnTwo">
				<a href="https://en.wikipedia.org/wiki/Project_M_(video_game)"><img src="assets/smashPM.jpg" title="Super Smash Bros Project M" alt="Super Smash Bros Project M" height="200px" width="300px"/></a>
				<a href="https://en.wikipedia.org/wiki/Super_Smash_Bros._(video_game)"><img src="assets/smash64.jpg" title="Super Smash Bros 64" alt="Super Smash Bros 64" height="200px" width="300px"/></a>
				<a href="https://en.wikipedia.org/wiki/Super_Smash_Bros._Brawl"><img src="assets/smashBrawl.jpg" title="Super Smash Bros Brawl" alt="Super Smash Bros Brawl" height="200px" width="300px"/></a>
			</div>
		</div> 
</body>
</html>