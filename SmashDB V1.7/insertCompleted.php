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
		<br><br>
		<?php
			if($_SESSION["SelectTable"] !== "Select Table")
			{			
				if($_SESSION["SelectTable"] == "Player")
				{
					
					$_SESSION['PlayerName'] = $_POST['PlayerName'];
					$_SESSION['main'] = $_POST['main'];
					$_SESSION['secondary'] = $_POST['secondary'];
					$_SESSION['WhereIsThisPlayerFrom?'] = $_POST['WhereIsThisPlayerFrom?'];
					$_SESSION['SelectSeason'] = $_POST['SelectSeason'];
					$_SESSION['SelectYear'] = $_POST['SelectYear'];			
					
					if($_SESSION['PlayerName'] != "" &&
						$_SESSION['main'] != "" &&
						$_SESSION['secondary'] != "" &&
						$_SESSION['WhereIsThisPlayerFrom?'] != "Where is this player from?" &&
						$_SESSION['SelectSeason'] != "Select Season" &&
						$_SESSION['SelectYear'] != "Select Year")
					{
						
						$locationResult = $_SESSION["WhereIsThisPlayerFrom?"];
						$cityResult = strtok($locationResult,",");
						$stateResult = 	ltrim(strtok("\n"));
						
						$query = "INSERT INTO player
								VALUES ('".$_SESSION["PlayerName"]."', '".$_SESSION["main"]."', '".$_SESSION["secondary"]."');";
						$result = mysqli_query($connect, $query);
						
						if($result == false)
						{
							
							echo "That player name already exsists!<br><br>&emsp;";
							
							echo "<a href=\"insertSpecific.php\">Go Back</a>";
					
						}
						else
						{
							
							$query = "INSERT INTO is_from
								VALUES ('".$_SESSION["PlayerName"]."', '".$cityResult."', '".$stateResult."');";
							$result = mysqli_query($connect, $query);
							
							$query1 = "SELECT *
									FROM playedduring
									WHERE player = '".$_SESSION["PlayerName"]."'
										AND season_name = '".$_SESSION["SelectSeason"]."' 
										AND season_year = '".$_SESSION["SelectYear"]."';";
							$result1 = mysqli_query($connect, $query1);
							
							$found = false;
							while($tuple = mysqli_fetch_assoc($result1))
							{
								$found = true;
							}
							
							$query = "INSERT INTO playedduring
									VALUES ('".$_SESSION["PlayerName"]."', '".$_SESSION["SelectSeason"]."', '".$_SESSION["SelectYear"]."');";
							$result = mysqli_query($connect, $query);
							
							var_dump($result);
							var_dump($result1);
							
							if($result == false && $found == false)
							{
								$query = "DELETE FROM is_from
									WHERE player = '".$_SESSION["PlayerName"]."' AND city = '".$cityResult."' AND state = '".$stateResult."';";
								$result = mysqli_query($connect, $query);
								
								$query = "DELETE FROM player
									WHERE name = '".$_SESSION["PlayerName"]."' AND main = '".$_SESSION["main"]."' AND secondary = '".$_SESSION["secondary"]."';";
								$result = mysqli_query($connect, $query);
								
								echo "That season is not in the database! Add it now and finish insert?<br><br>&emsp;";
								
								echo "<form method = \"post\" action = \"insertFinalCompleted.php\">";		
								echo "<input name = \"Yes1\" value = \"Yes\" type = \"submit\" style = \"border-radius: 0.5em; border: 2px solid #4286f4; background-color: #4faf9e;\">";
								echo "</form>";
								
								echo "<form method = \"post\" action = \"home.php\">";		
								echo "<input name = \"No\" value = \"No\" type = \"submit\" style = \"border-radius: 0.5em; border: 2px solid #4286f4; background-color: #4faf9e;\">";
								echo "</form>";	
							}
							else
							{								
								var_dump($_SESSION['WhereIsThisPlayerFrom?']);
								echo "<br><br>";
								var_dump($cityResult);
								echo "<br><br>";
								var_dump($stateResult);
								echo "<br><br>";
								
								echo "Inserted ".$_SESSION['PlayerName']." from ".$_SESSION['WhereIsThisPlayerFrom?']." with main ".$_SESSION['main']." and secondary ".$_SESSION['secondary']." for season ".$_SESSION['SelectSeason']." ".$_SESSION['SelectYear']."";
							}
						}
					}
					else
					{
						echo "You did not fill out all required data!<br><br>&emsp;";
						
						echo "<a href=\"insertSpecific.php\">Go Back</a>";
					}
				}
				else if($_SESSION["SelectTable"] == "Tournament")
				{
					$_SESSION['name'] = $_POST['name'];
					$_SESSION['numberOfPlayers'] = $_POST['numberOfPlayers'];
					$_SESSION['numberOfSets'] = $_POST['numberOfSets'];
					$_SESSION['city'] = $_POST['city'];
					$_SESSION['state'] = $_POST['state'];
					$_SESSION['SelectSeasonName'] = $_POST['SelectSeasonName'];
					$_SESSION['SelectSeasonYear'] = $_POST['SelectSeasonYear'];
					
					if($_SESSION['name'] != "" &&
					$_SESSION['numberOfPlayers'] != "" &&
					$_SESSION['numberOfSets'] != "" &&
					$_SESSION['city'] != "" &&
					$_SESSION['state'] != "" &&
					$_SESSION['SelectSeasonName'] != "Select Season Name" &&
					$_SESSION['SelectSeasonYear'] != "Select Season Year")
					{
						
						
						
						
					}
					else
					{
						echo "You did not fill out all required data!<br><br>&emsp;";
							
						echo "<a href=\"insertSpecific.php\">Go Back</a>";
					}
				}
				else if($_SESSION["SelectTable"] == "Location")
				{
					$_SESSION['city'] = $_POST['city'];
					$_SESSION['state'] = $_POST['state'];
					$_SESSION['region'] = $_POST['region'];
				
					if($_SESSION['city'] != "" &&
						$_SESSION['state'] != "" &&
						$_SESSION['region'] != "")
					{
						$query1 = "SELECT *
								FROM location
								WHERE city = '".$_SESSION["city"]."' 
									AND state = '".$_SESSION["state"]."';";
						$result1 = mysqli_query($connect, $query1);
						
						$found = false;
						while($tuple = mysqli_fetch_assoc($result1))
						{
							$found = true;
						}
						
						$query = "INSERT INTO location
								VALUES ('".$_SESSION['city']."', '".$_SESSION['state']."', '".$_SESSION['region']."');";
						$result = mysqli_query($connect, $query);
							
						if($result == false && $found == true)
						{
							echo "That city and state already exsists!<br><br>&emsp;";
							
							echo "<a href=\"insertSpecific.php\">Go Back</a>";
						}
						else
						{
							echo "".$_SESSION['city'].", ".$_SESSION['state']." of ".$_SESSION['region']." region was added to the database!";
						}
					}
					else
					{
						echo "You did not fill out all required data!<br><br>&emsp;";
						
						echo "<a href=\"insertSpecific.php\">Go Back</a>";
					}
						
					
				}
			}
			else if($_SESSION["SelectRelationship"] !== "Select Relationship")
			{	
				if($_SESSION["SelectRelationship"] == "a player has played during a new season")
				{
					$_SESSION['SelectPlayerName'] = $_POST['SelectPlayerName'];
					$_SESSION['SelectSeasonName'] = $_POST['SelectSeasonName'];
					$_SESSION['SelectSeasonYear'] = $_POST['SelectSeasonYear'];
					
					if($_SESSION['SelectPlayerName'] != "Select Player" &&
						$_SESSION['SelectSeasonName'] != "Select Season Name" &&
						$_SESSION['SelectSeasonYear'] != "Select Season Year")
					{
						$query1 = "SELECT *
								FROM playedduring
								WHERE player = '".$_SESSION["SelectPlayerName"]."' 
									AND season_name = '".$_SESSION["SelectSeasonName"]."' 
									AND season_year = '".$_SESSION["SelectSeasonYear"]."';";
						$result1 = mysqli_query($connect, $query1);
						
						$found = false;
						while($tuple = mysqli_fetch_assoc($result1))
						{
							$found = true;
						}
						
						$query = "INSERT INTO playedduring
								VALUES ('".$_SESSION['SelectPlayerName']."', '".$_SESSION['SelectSeasonName']."', '".$_SESSION['SelectSeasonYear']."');";
						$result = mysqli_query($connect, $query);
						
						if($result == false && $found == false)
						{
							
							echo "That season is not in the database! Add it now and finish insert?<br><br>&emsp;";
								
							echo "<form method = \"post\" action = \"insertFinalCompleted.php\">";		
							echo "<input name = \"Yes2\" value = \"Yes\" type = \"submit\" style = \"border-radius: 0.5em; border: 2px solid #4286f4; background-color: #4faf9e;\">";
							echo "</form>";
							
							echo "<form method = \"post\" action = \"home.php\">";		
							echo "<input name = \"No\" value = \"No\" type = \"submit\" style = \"border-radius: 0.5em; border: 2px solid #4286f4; background-color: #4faf9e;\">";
							echo "</form>";	
						}
						else
						{
							echo "Inserted ".$_SESSION['SelectSeasonName']." ".$_SESSION['SelectSeasonYear']." season for ".$_SESSION['SelectPlayerName']."";
						}
					}
					else
					{
						echo "You did not fill out all required data!<br><br>&emsp;";
						
						echo "<a href=\"insertSpecific.php\">Go Back</a>";
					}
					
				}
			}
		?>
		
	</body>
</html>