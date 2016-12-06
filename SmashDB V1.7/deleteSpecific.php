
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
			$_SESSION["submit"] = isset($_POST["submit"]);
			
			if($_SESSION["submit"])
			{
				$_SESSION["Table"] = $_POST["Table"];
			}
		?>
		<?php
			if($_SESSION["Table"] != "Table")
			{
				echo "<form method = \"post\" action = \"deleteCompleted.php\">
				<select name = \"SelectSpecific\" style = \"border-radius: 0.5em\">";
						
				echo "<option value = \"Select ".$_SESSION["Table"]." to Delete\">Select ".$_SESSION["Table"]." to Delete</option>";
							
				$query = "SELECT name FROM ".$_SESSION["Table"]."";
				$result = mysqli_query($connect, $query);
				while($mytuple = mysqli_fetch_assoc($result))
				{
					echo "<option value = '".$mytuple['name']."'>".$mytuple['name']."</option>";
				}
						
				echo"</select>
					<input type = \"submit\" style = \"border-radius: 0.5em; border: 2px solid #4286f4; background-color: #4faf9e;\">
					</form>";
			}
			else
			{
					echo "<br><br>You did not click on a Table!<br><br>&emsp;";
						
					echo "<a href=\"deletionPage.php\">Go Back</a>";
			}
		?>
		
		
	</body>
</html>