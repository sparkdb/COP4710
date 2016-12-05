
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
		<?php
			$_SESSION['SelectSpecific'] = $_POST['SelectSpecific'];
			$_SESSION['search'] = $_POST['search'];
		
			
			if($_SESSION['Table'] == "Player Name")
			{
				echo "updated the name of ".$_SESSION['SelectSpecific']." to ".$_SESSION['search']."<br>";
				$query = "UPDATE player SET name = '".$_SESSION['search']."' WHERE name = '".$_SESSION['SelectSpecific']."';";
				$result = mysqli_query($connect, $query);
				var_dump($result);
				$query = "UPDATE is_from SET player = '".$_SESSION['search']."' WHERE player = '".$_SESSION['SelectSpecific']."';";
				$result = mysqli_query($connect, $query);
				var_dump($result);
				$query = "UPDATE playedduring SET player = '".$_SESSION['search']."' WHERE player = '".$_SESSION['SelectSpecific']."';";
				$result = mysqli_query($connect, $query);
				var_dump($result);
				$query = "UPDATE attended SET player = '".$_SESSION['search']."' WHERE player =  '".$_SESSION['SelectSpecific']."';";
				$result = mysqli_query($connect, $query);
				var_dump($result);
				$query = "UPDATE play_in SET player_one = '".$_SESSION['search']."' WHERE player_one = '".$_SESSION['SelectSpecific']."';";
				$result = mysqli_query($connect, $query);
				var_dump($result);
				$query = "UPDATE play_in SET player_two = '".$_SESSION['search']."' WHERE player_two = '".$_SESSION['SelectSpecific']."';";
				$result = mysqli_query($connect, $query);
				var_dump($result);
			}
			
			if($_SESSION['Table'] == "Player Main")
			{
				echo "updated the main of ".$_SESSION['SelectSpecific']." to ".$_SESSION['search']."<br>";
				$query = "UPDATE player SET main = '".$_SESSION['search']."' WHERE name = '".$_SESSION['SelectSpecific']."';";
				$result = mysqli_query($connect, $query);
				var_dump($result);
			}
			
			if($_SESSION['Table'] == "Player Secondary")
			{
				echo "updated the secondary of ".$_SESSION['SelectSpecific']." to ".$_SESSION['search']."<br>";
				$query = "UPDATE player SET secondary = '".$_SESSION['search']."' WHERE name = '".$_SESSION['SelectSpecific']."';";
				$result = mysqli_query($connect, $query);
				var_dump($result);
			}
			
			if($_SESSION['Table'] == "Where a Player is From")
			{
				echo "updated where ".$_SESSION['SelectSpecific']." lives to ".$_SESSION['search']."<br>";
				$locationResult = $_SESSION['search'];
				$cityResult = strtok($locationResult,", ");
				$stateResult = 	ltrim(strtok("\n"));
					
				$query = "UPDATE is_from SET city = '".$cityResult."' WHERE player = '".$_SESSION['SelectSpecific']."';";
				$result = mysqli_query($connect, $query);
				var_dump($result);
			
				$query = "UPDATE is_from SET state = '".$stateResult."' WHERE player = '".$_SESSION['SelectSpecific']."';";
				$result = mysqli_query($connect, $query);
				var_dump($result);
			}
			
		?>
	</body>
</html>