<?php
	$dbhost = "localhost"; // this will ususally be 'localhost', but can sometimes differ
	$dbname = "webmaster"; // the name of the database that you are going to use for this project
	$dbuser = "root"; // the username that you created, or were given, to access your database
	$dbpass = "dantemendez2013"; // the password that you created, or were given, to access your database
	 
	$db = @mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("MySQL Error");
?>