
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
			$_SESSION["submit"] = isset($_POST["submit"]);
			
			if($_SESSION["submit"])
			{
				$_SESSION["Table"] = $_POST["Table"];
			}
		?>
		<?php
				
					if($_SESSION["Table"] == "Select Table")
					{
						echo "<br><br>You did not click on a Table!<br><br>&emsp;";
						
						echo "<a href=\"updatePage.php\">Go Back</a>";
					
					}	
					else
					{
						echo "<form method = \"post\" action = \"updateCompleted.php\">
							<select name = \"SelectSpecific\" style = \"border-radius: 0.5em\">
							<option value = \"Select Player to Update\">Select Player to Update</option>";
							
							$query = "SELECT name FROM player";
							$result = mysqli_query($connect, $query);
							while($mytuple = mysqli_fetch_assoc($result))
							{
								echo "<option value = '".$mytuple['name']."'>".$mytuple['name']."</option>";
							}
						
						echo "</select>";
					
						if($_SESSION["Table"] == "Player Name")
						{	
							echo "<input type = \"search\" name = \"search\" placeholder = \"Enter Player's New Name\">
								<input type = \"submit\" style = \"border-radius: 0.5em; border: 2px solid #4286f4; background-color: #4faf9e;\">";
						}
						else if($_SESSION["Table"] == "Player Main")
						{
							echo "<input type = \"search\" name = \"search\" placeholder = \"Enter Player's New Main\">
								<input type = \"submit\" style = \"border-radius: 0.5em; border: 2px solid #4286f4; background-color: #4faf9e;\">";
						}
						else if($_SESSION["Table"] == "Player Secondary")
						{	
							echo "<input type = \"search\" name = \"search\" placeholder = \"Enter Player's New Secondary\">
								<input type = \"submit\" style = \"border-radius: 0.5em; border: 2px solid #4286f4; background-color: #4faf9e;\">";
						}
						else if($_SESSION["Table"] == "Where a Player is From")
						{
							echo "<input type = \"search\" name = \"citySearch\" placeholder = \"Enter City\">
								<input type = \"search\" name = \"stateSearch\" placeholder = \"Enter State\">
								<input type = \"submit\" style = \"border-radius: 0.5em; border: 2px solid #4286f4; background-color: #4faf9e;\">";
						}
					}
				?>
		</form>
	</body>
</html>