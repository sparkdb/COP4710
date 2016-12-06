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
					$locationResult = $_SESSION["WhereIsThisPlayerFrom?"];
					$cityResult = strtok($locationResult,",");
					$stateResult = 	ltrim(strtok("\n"));
					
					$query = "INSERT INTO season
							VALUES ('".$_SESSION["SelectSeason"]."', '".$_SESSION["SelectYear"]."');";
					$result = mysqli_query($connect, $query);
					
					echo "Inserted ".$_SESSION['SelectSeason']." ".$_SESSION['SelectYear']." season<br><br>";	
					
					$query = "INSERT INTO player
							VALUES ('".$_SESSION["PlayerName"]."', '".$_SESSION["main"]."', '".$_SESSION["secondary"]."');";
					$result = mysqli_query($connect, $query);
					
					$query = "INSERT INTO is_from
							VALUES ('".$_SESSION["PlayerName"]."', '".$cityResult."', '".$stateResult."');";
					$result = mysqli_query($connect, $query);
					
					$query = "INSERT INTO playedduring
							VALUES ('".$_SESSION["PlayerName"]."', '".$_SESSION["SelectSeason"]."', '".$_SESSION["SelectYear"]."');";
					$result = mysqli_query($connect, $query);
					
					echo "Inserted ".$_SESSION['PlayerName']." from ".$_SESSION['WhereIsThisPlayerFrom?']." with main ".$_SESSION['main']." and secondary ".$_SESSION['secondary']." for season ".$_SESSION['SelectSeason']." ".$_SESSION['SelectYear']."";	
				}
				else if($_SESSION["SelectTable"] == "Tournament")
				{
					echo "Inserted ".$_SESSION["name"]." with ".$_SESSION["numberOfPlayers"]." participants, and ".$_SESSION["numberOfSets"]." sets";
					
					$query = "INSERT INTO tournaments
							VALUES ('".$_SESSION["name"]."', '".$_SESSION["numberOfPlayers"]."');";
					$result = mysqli_query($connect, $query);
					
					
					$query = "INSERT INTO happened_at
							VALUES ('".$_SESSION["name"]."', '".$_SESSION["city"]."', '".$_SESSION["state"]."');";
					$result = mysqli_query($connect, $query);
					
					$query = "INSERT INTO was_during
							VALUES ('".$_SESSION["name"]."', '".$_SESSION["SelectSeasonName"]."', '".$_SESSION["SelectSeasonYear"]."');";
					$result = mysqli_query($connect, $query);
					
					$query = "SELECT MAX(set_id) AS max
								FROM sets";
					$result = mysqli_query($connect, $query);
						
					while($tuple = mysqli_fetch_assoc($result))
					{
						$max = $tuple['max'];
					}
					
						
					$i = 1;
					while($i <= $_SESSION["numberOfPlayers"])
					{
						$query = "INSERT INTO attended
								VALUES ('".$_POST["player".$i.""]."', '".$_SESSION["name"]."');";
						$result = mysqli_query($connect, $query);
						$i++;
					}
					
						
					$i = 1;
					while($i <= $_SESSION["numberOfSets"])
					{
						$max++;
						
						$query = "INSERT INTO sets
								VALUES (".$max.", '".$_POST["setCount".$i."_1"]."', '".$_POST["setCount".$i."_2"]."');";
						$result = mysqli_query($connect, $query);
						
						
						$query = "INSERT INTO play_in
								VALUES ('".$_POST["set".$i."_1"]."', '".$_POST["set".$i."_2"]."', ".$max.");";
						$result = mysqli_query($connect, $query);
						
						
						$query = "INSERT INTO has
								VALUES ('".$_SESSION["name"]."', '".$max."');";
						$result = mysqli_query($connect, $query);
						
						
						$i++;
					}
				}
			}
			else if($_SESSION["SelectRelationship"] !== "Select Relationship")
			{						
					$query = "INSERT INTO season
							VALUES ('".$_SESSION["SelectSeasonName"]."', '".$_SESSION["SelectSeasonYear"]."');";
					$result = mysqli_query($connect, $query);
					
					echo "Inserted ".$_SESSION['SelectSeasonName']." ".$_SESSION['SelectSeasonYear']." season<br><br>";	
						
					$query = "INSERT INTO playedduring
							VALUES ('".$_SESSION["SelectPlayerName"]."', '".$_SESSION["SelectSeasonName"]."', '".$_SESSION["SelectSeasonYear"]."');";
					$result = mysqli_query($connect, $query);
					
					echo "Inserted ".$_SESSION['SelectPlayerName']." played during ".$_SESSION['SelectSeasonName']." ".$_SESSION['SelectSeasonYear']."";
			}
		?>
		
	</body>
</html>