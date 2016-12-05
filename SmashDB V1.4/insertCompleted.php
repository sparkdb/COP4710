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
			if($_SESSION["submit1"])
			{			
				if($_SESSION["SelectTable"] == "Player")
				{
					echo "<br><br>";
					
					$_SESSION['PlayerName'] = $_POST['PlayerName'];
					$_SESSION["main"] = $_POST["main"];
					$_SESSION["secondary"] = $_POST["secondary"];
					$_SESSION["WhereIsThisPlayerFrom?"] = $_POST["WhereIsThisPlayerFrom?"];
					$_SESSION["SelectSeason"] = $_POST["SelectSeason"];
					$_SESSION["SelectYear"] = $_POST["SelectYear"];			
				
					echo "Inserted ".$_SESSION['PlayerName']." from ".$_SESSION['WhereIsThisPlayerFrom?']." with main ".$_SESSION['main']." and secondary ".$_SESSION['secondary']." for season ".$_SESSION['SelectSeason']." ".$_SESSION['SelectYear']."";
				
					$locationResult = $_SESSION["WhereIsThisPlayerFrom?"];
					$cityResult = strtok($locationResult,", ");
					$stateResult = 	ltrim(strtok("\n"));
						
					$query = "INSERT INTO player
							VALUES ('".$_SESSION["PlayerName"]."', '".$_SESSION["main"]."', '".$_SESSION["secondary"]."');";
					$result = mysqli_query($connect, $query);
					var_dump($result);
					$query = "INSERT INTO is_from
							VALUES ('".$_SESSION["PlayerName"]."', '".$cityResult."', '".$stateResult."');";
					$result = mysqli_query($connect, $query);
					var_dump($result);
					$query = "INSERT INTO playedduring
							VALUES ('".$_SESSION["PlayerName"]."', '".$_SESSION["SelectSeason"]."', '".$_SESSION["SelectYear"]."');";
					$result = mysqli_query($connect, $query);
					var_dump($result);
				}
				else if($_SESSION["SelectTable"] == "Tournament")
				{
					echo "tournament";
				}
				else if($_SESSION["SelectTable"] == "Location")
				{
					echo "location";
				}
				
			}
			else if($_SESSION["submit2"])
			{	
				if($_SESSION["SelectRelationship"] == "a player has played during a new season")
				{
					echo "relationship";
				}
			}
		?>
		
	</body>
</html>