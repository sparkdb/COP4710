<!DOCTYPE HTML>
<html>
	<head>
		<title>Log In - SmashDB</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/header.css">
		<link rel="stylesheet" href="css/login.css">
		<link rel="icon" href="assets/favicon.png">
	</head>
	
	<body>
		<div class="header">
			<a href="index.php" id="home">Home</a>
			<a href="userResultPage.php">Result</a>
		</div>
		
		<div class="loginForm">
			<form action="afterlogin.php" method="post">
				<h1>Log in</h1>
				<p>
					<input type="text" name="username" id="email" placeholder="Username..."/>
				</p>
				<p>
					<input type="password" name="password" id="password" placeholder="Password..."/>
				</p>
				<input type="submit" value="Log In"><br><br>
			</form>
		</div>
		
	</body>
</html>
