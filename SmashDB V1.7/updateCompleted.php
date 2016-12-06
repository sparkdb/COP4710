
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
			if($_SESSION['Table'] == "Where a Player is From")
			{
				$_SESSION['SelectSpecific'] = $_POST['SelectSpecific'];
				$_SESSION['citySearch'] = $_POST['citySearch'];
				$_SESSION['stateSearch'] = $_POST['stateSearch'];
				if($_SESSION['citySearch'] != "" && $_SESSION['stateSearch'] != "")
				{
					$_SESSION['search'] = " ";
				}
				else
				{
					$_SESSION['search'] = "";
				}
				
			}
			else
			{
				$_SESSION['SelectSpecific'] = $_POST['SelectSpecific'];
				$_SESSION['search'] = $_POST['search'];
			}
			
			if(($_SESSION['SelectSpecific'] == "Select Player to Update") || ($_SESSION['search'] == ""))
			{
				echo "You did not fill out all required data!<br><br>&emsp;";
						
				echo "<a href=\"updateSpecific.php\">Go Back</a>";
			}
			else
			{
				if($_SESSION['Table'] == "Player Name")
				{
					echo "&emsp;updated the name of ".$_SESSION['SelectSpecific']." to ".$_SESSION['search']."<br>";
					$query = "UPDATE player SET name = '".$_SESSION['search']."' WHERE name = '".$_SESSION['SelectSpecific']."';";
					$result = mysqli_query($connect, $query);
					$query = "UPDATE is_from SET player = '".$_SESSION['search']."' WHERE player = '".$_SESSION['SelectSpecific']."';";
					$result = mysqli_query($connect, $query);
					$query = "UPDATE playedduring SET player = '".$_SESSION['search']."' WHERE player = '".$_SESSION['SelectSpecific']."';";
					$result = mysqli_query($connect, $query);
					$query = "UPDATE attended SET player = '".$_SESSION['search']."' WHERE player =  '".$_SESSION['SelectSpecific']."';";
					$result = mysqli_query($connect, $query);
					$query = "UPDATE play_in SET player_one = '".$_SESSION['search']."' WHERE player_one = '".$_SESSION['SelectSpecific']."';";
					$result = mysqli_query($connect, $query);
					$query = "UPDATE play_in SET player_two = '".$_SESSION['search']."' WHERE player_two = '".$_SESSION['SelectSpecific']."';";
					$result = mysqli_query($connect, $query);
				}
				else if($_SESSION['Table'] == "Player Main")
				{
					echo "&emsp;updated the main of ".$_SESSION['SelectSpecific']." to ".$_SESSION['search']."<br>";
					$query = "UPDATE player SET main = '".$_SESSION['search']."' WHERE name = '".$_SESSION['SelectSpecific']."';";
					$result = mysqli_query($connect, $query);
				}
				else if($_SESSION['Table'] == "Player Secondary")
				{
					echo "&emsp;updated the secondary of ".$_SESSION['SelectSpecific']." to ".$_SESSION['search']."<br>";
					$query = "UPDATE player SET secondary = '".$_SESSION['search']."' WHERE name = '".$_SESSION['SelectSpecific']."';";
					$result = mysqli_query($connect, $query);
				}
				else if($_SESSION['Table'] == "Where a Player is From")
				{
					$cityResult = $_SESSION['citySearch'];
					$stateResult = $_SESSION['stateSearch'];
					
					$query = "SELECT * FROM location WHERE city = '".$cityResult."' AND state = '".$stateResult."';";
					$result = mysqli_query($connect, $query);
					
					$found = false;
					while($mytuple = mysqli_fetch_assoc($result))
					{
						$found = true;
					}
					
					if($found)
					{
						echo "&emsp;updated where ".$_SESSION['SelectSpecific']." lives to ".$_SESSION['citySearch'].", ".$_SESSION['stateSearch']."<br>";
						
						$query = "UPDATE is_from SET city = '".$cityResult."' WHERE player = '".$_SESSION['SelectSpecific']."';";
						$result = mysqli_query($connect, $query);
				
						$query = "UPDATE is_from SET state = '".$stateResult."' WHERE player = '".$_SESSION['SelectSpecific']."';";
						$result = mysqli_query($connect, $query);
					}
					else
					{
						echo "That location is not in the database! Add it now and finish update?<br><br>&emsp;";
						
						echo "<form method = \"post\" action = \"updateFinalCompleted.php\">";		
						echo "<input name = \"Yes3\" value = \"Yes\" type = \"submit\" style = \"border-radius: 0.5em; border: 2px solid #4286f4; background-color: #4faf9e;\">";
						echo "</form>";
								
						echo "<form method = \"post\" action = \"home.php\">";		
						echo "<input name = \"No\" value = \"No\" type = \"submit\" style = \"border-radius: 0.5em; border: 2px solid #4286f4; background-color: #4faf9e;\">";
						echo "</form>";		
					}
				}
			}
			
		?>
	</body>
</html>