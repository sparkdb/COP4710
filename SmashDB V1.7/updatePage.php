<?php
	session_start();
?>

<!DOCTYPE HTML>

<html>
	<head>
		<?php
			include_once("mysql_connection_smashdb.php");
		?>
		<title>Update Page</title>
		
		<link rel="stylesheet" type="text/css" href="css/_styles.css" media="screen">
		
	</head>
	<body>
		<a href="home.php" id="logo">SmashDB</a>	
		<form method = "post" action = "updateSpecific.php">
			<select name = "Table" style = "border-radius: 0.5em">
				<option value = "Select Table">Select Table</option>
				<option value = "Player Name">Player Name</option>
				<option value = "Player Main">Player Main</option>
				<option value = "Player Secondary">Player Secondary</option>
				<option value = "Where a Player is From">Where a Player is From</option>
			</select>
			<input name = "submit" type = "submit" style = "border-radius: 0.5em; border: 2px solid #4286f4; background-color: #4faf9e;">
		</form>
	</body>
</html>