<?php
	session_start();
?>

<!DOCTYPE HTML>

<html>
	<head>
		<?php
			include_once("mysql_connection_smashdb.php");
		?>
		<title>Deletion Page</title>
		
		<link rel="stylesheet" type="text/css" href="css/_styles.css" media="screen">
		
	</head>
	<body>
		<a href="home.php" id="logo">SmashDB</a>
		<form method = "post" action = "deleteSpecific.php">
			<select name = "SelectTable" style = "border-radius: 0.5em">
				<option value = "Select Table">Table</option>
				<option value = "Player">Player</option>
				<option value = "Tournament">Tournament</option>
			</select>
			<input type = "submit" style = "border-radius: 0.5em; border: 2px solid #4286f4; background-color: #4faf9e;">
		</form>
	</body>
</html>