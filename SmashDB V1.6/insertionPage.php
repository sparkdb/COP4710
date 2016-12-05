<?php
	session_start();
?>

<!DOCTYPE HTML>

<html>
	<head>
		<?php
			include_once("mysql_connection_smashdb.php");
		?>
		<title>Insertion Page</title>
		
		<link rel="stylesheet" type="text/css" href="css/_styles.css" media="screen">
		
	</head>
	<body>
		<a href="home.php" id="logo">SmashDB</a>	
		<form method = "post" action = "insertSpecific.php">
			<select name = "SelectTable" style = "border-radius: 0.5em">
				<option value = "Select Table to Insert Into">Select Table to Insert Into</option>
				<option value = "Player">Player</option>
				<option value = "Tournament">Tournament</option>
				<option value = "Location">Location</option>
			</select>
			<input name = "submit1" type = "submit" style = "border-radius: 0.5em; border: 2px solid #4286f4; background-color: #4faf9e;">
		</form>
		<br>OR<br><br>
		<form method = "post" action = "insertSpecific.php">
			<select name = "SelectRelationship" style = "border-radius: 0.5em">
				<option value = "Select Relationship to Insert Into">Select Relationship to Insert Into</option>
				<option value = "a player has played during a new season">a player has played during a new season</option>
			</select>
			<input name = "submit2" type = "submit" style = "border-radius: 0.5em; border: 2px solid #4286f4; background-color: #4faf9e;">
		</form>	
	</body>
</html>