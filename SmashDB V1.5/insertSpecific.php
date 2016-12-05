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
			echo "<br><br>";
			
			$_SESSION["submit1"] = isset($_POST["submit1"]);
			$_SESSION["submit2"] = isset($_POST["submit2"]);
			
			var_dump($_SESSION["submit1"]);
			var_dump($_SESSION["submit2"]);
			
			if($_SESSION["submit1"])
			{
				$_SESSION["SelectTable"] = $_POST["SelectTable"];
				$_SESSION["SelectRelationship"] = "Select Relationship";
			}
			else if($_SESSION["submit2"])
			{
				$_SESSION["SelectRelationship"] = $_POST["SelectRelationship"];
				$_SESSION["SelectTable"] = "Select Table";
			}
		?>
		
		<form method = "post" action = "insertCompleted.php">
			<?php
				var_dump($_SESSION["submit1"]);
				var_dump($_SESSION["submit2"]);
				
				
				echo "Selected table was ".$_SESSION["SelectTable"]."";
				echo "Selected relationship was ".$_SESSION["SelectRelationship"]."";
				
				if($_SESSION["SelectTable"] !== "Select Table")
				{
					if($_SESSION["SelectTable"] == "Player")
					{
						echo "name:<br>";
						echo "<input type = \"text\" name = \"PlayerName\"><br><br>";
						echo "main:<br>";
						echo "<input type = \"text\" name = \"main\"><br><br>";
						echo "secondary:<br>";
						echo "<input type = \"text\" name = \"secondary\"><br><br>";
						
						echo "Location:<br>";
						
						echo "<select name = \"WhereIsThisPlayerFrom?\" style = \"border-radius: 0.5em\">";
						echo "<option value = 'Where is this player from?'>Where is this player from?</option>";
				
						$query = "SELECT DISTINCT city, state FROM location";
						$result = mysqli_query($connect, $query);
						
						while($mytuple = mysqli_fetch_assoc($result))
						{
							echo "<option value = '".$mytuple['city'].", ".$mytuple['state']."'>".$mytuple['city'].", ".$mytuple['state']."</option>";
						}
				
						echo "</select><br><br>";
						
						echo "Season:<br>";
						
						echo "<select name = \"SelectSeason\" style = \"border-radius: 0.5em\">";
						echo "<option value = 'Select Season'>Select Season</option>";
						
						echo "<option value = 'fall'>fall</option>";
						echo "<option value = 'spring'>spring</option>";
						echo "<option value = 'summer'>summer</option>";
						
						echo "</select><br><br>";
						
						echo "Year:<br>";
						
						echo "<select name = \"SelectYear\" style = \"border-radius: 0.5em\">";
						echo "<option value = 'Select Year'>Select Year</option>";
						
						$i = 2017;
						while($i >= 2000)
						{
							echo "<option value = '$i'>$i</option>";
							$i--;
						}
						
						echo "</select><br><br>";
						
						
						echo "<input name = \"submit\" type = \"submit\" style = \"border-radius: 0.5em; border: 2px solid #4286f4; background-color: #4faf9e;\">";
					
					}
					else if($_SESSION["SelectTable"] == "Tournament")
					{
						
					}
					else if($_SESSION["SelectTable"] == "Location")
					{
						echo "city:<br>";
						echo "<input type = \"text\" name = \"city\"><br>";
						echo "state:<br>";
						echo "<input type = \"text\" name = \"state\"><br>";
						echo "region:<br>";
						echo "<input type = \"text\" name = \"region\"><br><br>";

						echo "<input name = \"submit\" type = \"submit\" style = \"border-radius: 0.5em; border: 2px solid #4286f4; background-color: #4faf9e;\">";
					}
					else
					{
						echo "You did not click on a table name!<br><br>&emsp;";
						
						echo "<a href=\"insertionPage.php\">Go Back</a>";
					
					}
				}
				else if($_SESSION["SelectRelationship"] !== "Select Relationship")
				{	
					if($_SESSION["SelectRelationship"] == "a player has played during a new season")
					{
						
						echo "<br><br>Player Name:<br>";
						
						echo "<select name = \"SelectPlayerName\" style = \"border-radius: 0.5em\">";
				
						echo "<option value = \"Select Player\">Select Player</option>";
						
						$query = "SELECT name FROM player";
						$result = mysqli_query($connect, $query);
						
						while($tuple = mysqli_fetch_assoc($result))
						{
							echo "<option value = '".$tuple['name']."'>".$tuple['name']."</option>";
						}
				
						echo "</select><br><br>";
						
						
						echo "Season:<br>";
						
						echo "<select name = \"SelectSeasonName\" style = \"border-radius: 0.5em\">";
						echo "<option value = 'Select Season Name'>Select Season Name</option>";
						
						echo "<option value = 'fall'>fall</option>";
						echo "<option value = 'spring'>spring</option>";
						echo "<option value = 'summer'>summer</option>";
						
						echo "</select><br><br>";
						
						echo "Year:<br>";
						
						echo "<select name = \"SelectSeasonYear\" style = \"border-radius: 0.5em\">";
						echo "<option value = 'Select Season Year'>Select Season Year</option>";
						
						$i = 2017;
						while($i >= 2000)
						{
							echo "<option value = '$i'>$i</option>";
							$i--;
						}
						
						echo "</select><br><br>";
								
						echo "<input name = \"submit\" type = \"submit\" style = \"border-radius: 0.5em; border: 2px solid #4286f4; background-color: #4faf9e;\">";
		
					}
					else
					{
						echo "You did not click on a relationship!<br><br>&emsp;";
						
						echo "<a href=\"insertionPage.php\">Go Back</a>";
					}
				}
		
			?>
		</form>	
	</body>
</html>