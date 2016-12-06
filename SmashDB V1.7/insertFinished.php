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
		
		<?php
			if($_SESSION["SelectTable"] !== "Select Table")
			{			
				
				if($_SESSION["SelectTable"] == "Player")
				{
					$locationResult = $_SESSION["WhereIsThisPlayerFrom?"];
					$cityResult = strtok($locationResult,",");
					$stateResult = 	ltrim(strtok("\n"));
							
					$query = "INSERT INTO player
							VALUES ('".$_SESSION["PlayerName"]."', '".$_SESSION["main"]."', '".$_SESSION["secondary"]."');";
					$result = mysqli_query($connect, $query);
					$query = "INSERT INTO is_from
							VALUES ('".$_SESSION["PlayerName"]."', '".$cityResult."', '".$stateResult."');";
					
					$result = mysqli_query($connect, $query);
					
					$query = "INSERT INTO playedduring
							VALUES ('".$_SESSION["PlayerName"]."', '".$_SESSION["SelectSeason"]."', '".$_SESSION["SelectYear"]."');";
					$result = mysqli_query($connect, $query);
							
					$query1 = "SELECT *
							FROM playedduring
							WHERE player = '".$_SESSION["PlayerName"]."' 
								AND season_name = '".$_SESSION["SelectSeason"]."' 
								AND season_year = '".$_SESSION["SelectYear"]."';";
					$result1 = mysqli_query($connect, $query1);
						
					if($result == false && $result1 == false)
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
						echo "Inserted ".$_SESSION['PlayerName']." from ".$_SESSION['WhereIsThisPlayerFrom?']." with main ".$_SESSION['main']." and secondary ".$_SESSION['secondary']." for season ".$_SESSION['SelectSeason']." ".$_SESSION['SelectYear']."";
					}
						
				}
				else if($_SESSION["SelectTable"] == "Tournament")
				{
					echo "tournament";
				}
			}
			else if($_SESSION["SelectRelationship"] !== "Select Relationship")
			{	
				
			}
		?>
		
	</body>
</html>