<?php 
	require 'configuration.php';
	// require 'signup.php';
	require 'login.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="reg_style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
	<form action="./login1.php" method="POST" id="form">
		<div class="container">
			<h3>Log In</h3>
			<hr>
			<input type="text" name="log_email" placeholder="Email" value="<?php 
			if(isset($_SESSION['log_email'])) {
				echo $_SESSION['log_email'];
			} 
			?>" required>
			<br>
			
			<?php 

			 ?>

			<input type="password" name="log_password" placeholder="Password" required>
			<br>

			<div class="clearfix">
				<input type="submit" name="login_btn" class="signupbtn" value="Login">
			</div>
			
			<?php 
				if (in_array("Email or password was incorrect<br>", $error_array)) {
					echo "Email or password was incorrect<br>";
				}
			 ?>
			<br>
		</div>

		<div class="login">
			<a href="./register1.php">Sign Up?</a>
		</div>
	</form>
</body>
</html>