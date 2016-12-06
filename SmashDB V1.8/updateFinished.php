
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
		<br><br>
		<?php
			if($_POST["region"] == "")
			{
				echo "You did not fill in the region!<br><br>&emsp;";
						
				echo "<a href=\"updateFinalCompleted.php\">Go Back</a>";
			
			}
			else
			{
				$query = "INSERT INTO location
						VALUES ('".$_SESSION["citySearch"]."', '".$_SESSION["stateSearch"]."', '".$_POST["region"]."');";
				$result = mysqli_query($connect, $query);
			
				$query = "UPDATE is_from SET city = '".$_SESSION["citySearch"]."' WHERE player = '".$_SESSION['SelectSpecific']."';";
				$result = mysqli_query($connect, $query);
				
				$query = "UPDATE is_from SET state = '".$_SESSION["stateSearch"]."' WHERE player = '".$_SESSION['SelectSpecific']."';";
				$result = mysqli_query($connect, $query);
				
				echo "&emsp;updated where ".$_SESSION['SelectSpecific']." lives to ".$_SESSION['citySearch'].", ".$_SESSION['stateSearch']."<br>";
			}
		?>
	</body>
</html>