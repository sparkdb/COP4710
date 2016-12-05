
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
		<?php
		
			$_SESSION['SelectSpecific'] = $_POST['SelectSpecific'];
			
			if($_SESSION['Table'] == "Player")
			{
				echo "deleted ".$_SESSION['SelectSpecific']."<br>";
				$query = "DELETE FROM is_from WHERE player = '".$_SESSION['SelectSpecific']."';";
				$result = mysqli_query($connect, $query);
				var_dump($result);
				$query = "DELETE FROM playedduring WHERE player = '".$_SESSION['SelectSpecific']."';";
				$result = mysqli_query($connect, $query);
				var_dump($result);
				$query = "DELETE FROM attended WHERE player = '".$_SESSION['SelectSpecific']."';";
				$result = mysqli_query($connect, $query);
				var_dump($result);
				$query = "DELETE FROM play_in WHERE player_one = '".$_SESSION['SelectSpecific']."' OR player_two = '".$_SESSION['SelectSpecific']."';";
				$result = mysqli_query($connect, $query);
				var_dump($result);
				$query = "DELETE FROM player WHERE name = '".$_SESSION['SelectSpecific']."';";
				$result = mysqli_query($connect, $query);
				var_dump($result);
			}
			
			if($_SESSION['Table'] == "Tournaments")
			{
				echo "deleted ".$_SESSION['SelectSpecific']."<br>";
				$query = "DELETE FROM happened_at WHERE name = '".$_SESSION['SelectSpecific']."';";
				$result = mysqli_query($connect, $query);
				var_dump($result);
				$query = "DELETE FROM was_during WHERE tournament_name = '".$_SESSION['SelectSpecific']."';";
				$result = mysqli_query($connect, $query);
				var_dump($result);
				$query = "DELETE FROM attended WHERE name = '".$_SESSION['SelectSpecific']."';";
				$result = mysqli_query($connect, $query);
				var_dump($result);
				$query = "DELETE FROM has WHERE tournament_name = '".$_SESSION['SelectSpecific']."';";
				$result = mysqli_query($connect, $query);
				var_dump($result);
				$query = "DELETE FROM tournaments WHERE name = '".$_SESSION['SelectSpecific']."';";
				$result = mysqli_query($connect, $query);
				var_dump($result);
			}	
	?>	
	</body>
</html>