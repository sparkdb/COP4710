<?php
	$username = "root"; 
	$password = "dantemendez2013"; 
	$host = "localhost";
	$dbname = "smashdb";
	
	$connect = @mysqli_connect($host, $username, $password, $dbname) or die ("Could not connect to SmashDB! We have been NERFED... like Greninja!!!"); 
?>