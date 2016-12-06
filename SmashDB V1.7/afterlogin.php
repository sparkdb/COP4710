<?php
	include "base.php";
	session_start();
?>

<!DOCTYPE HTML>
<html>
	<body>
		<?php
			
			if($_SERVER["REQUEST_METHOD"] == "POST")
			{
				$myusername = $_POST['username'];
				$mypassword = $_POST['password'];
				
				$sql = "SELECT * FROM users WHERE Username = '".$myusername."' AND Password = '".$mypassword."';";
				$result = mysqli_query($db, $sql);
				
				$logged_in = false;
				while($row = mysqli_fetch_assoc($result))
				{
					$logged_in = true;
				}
				
				if($logged_in)
				{
					header("location: home.php");
				}
				else
				{
					echo "Invalid log in";
					
					echo "<br><br>&emsp;";
						
					echo "<a href=\"login.php\">Try Again</a>";
					
				}
			}
		?>
	</body>
</html>
