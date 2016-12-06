
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
		<form method = "post" action = "updateFinished.php">
		<br><br>
		<?php
			echo "What region is ".$_SESSION['citySearch'].", ".$_SESSION['stateSearch']." in?";
			echo "<input type = \"text\" name = \"region\"><br><br>";

			echo "<input name = \"submit\" type = \"submit\" style = \"border-radius: 0.5em; border: 2px solid #4286f4; background-color: #4faf9e;\">";
		?>
		</form>
	</body>
</html>