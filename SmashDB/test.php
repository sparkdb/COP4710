<!DOCTYPE HTML>
<html>	
	<body>
		<?php
			require ("headerFooter.html");
			require_once ("headerFooter.html");
			include ("headerFooter.html");
			include_once ("headerFooter.html");	
		?>

		<!-- Log In Form -->
		<div class="loginForm">
			<form action="">
				<h1>Log in</h1>
				<p>
					<input type="email" id="email" placeholder="E-mail..."/>
				</p>
				<p>
					<input type="password" id="password" placeholder="Password..."/>
				</p>
				<input type="submit" value="Log In"><br><br>
				<a href="passwordReset.html">Forgot Password?</a><br>
				<a href="signUp.html">Sign Up</a><br>
			</form>
		</div>
		<!-- End of Log In Form -->
		
	</body>
</html>