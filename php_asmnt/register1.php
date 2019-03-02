<?php
	require 'configuration.php';
	require 'signup.php';
	require 'login.php';
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sign Up</title>
	<link rel="stylesheet" href="reg_style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>

	<form action="./register1.php" method="POST" id="form">
		
		<div class="container">
			<h3>Sign Up</h3>
			<hr>
			<input type="text" name="reg_fname" placeholder="First Name" value="<?php 
			if(isset($_SESSION['reg_fname'])) {
				echo $_SESSION['reg_fname'];
			} 
			?>" required>
			<br>
			
			<input type="text" name="reg_lname" placeholder="Last Name" value="<?php 
			if(isset($_SESSION['reg_lname'])) {
				echo $_SESSION['reg_lname'];
			} 
			?>" required>
			<br>
			
			<input type="text" name="reg_uname" placeholder="User Name" value="<?php 
			if(isset($_SESSION['reg_uname'])) {
				echo $_SESSION['reg_uname'];
			} 
			?>" required>
			<br>

			<?php if(in_array("Your username can only contain english characters or numbers<br>", $error_array))  echo "Your username can only contain english characters or numbers<br>";
			else if(in_array("username already in use<br>", $error_array)) echo "username already in use<br>"; 
			?>

			<input type="text" name="reg_email" placeholder="Email" value="<?php 
			if(isset($_SESSION['reg_email'])) {
				echo $_SESSION['reg_email'];
			} 
			?>" required>
			<br>

			<?php if(in_array("Email already in use<br>", $error_array)) echo "Email already in use<br>"; 
			else if(in_array("Invalid email format<br>", $error_array)) echo "Invalid email format<br>";
			?>

			<input type="password" name="reg_password" placeholder="Password" required>
			<br>
			<input type="password" name="reg_password2" placeholder="Confirm Password" required>
			<br>
			<?php if(in_array("Your passwords do not match<br>", $error_array)) echo "Your passwords do not match<br>"; 
			else if(in_array("Your password can only contain english characters or numbers<br>", $error_array)) echo "Your password can only contain english characters or numbers<br>";
			else if(in_array("Your password must be betwen 5 and 30 characters<br>", $error_array)) echo "Your password must be betwen 5 and 30 characters<br>"; ?>

			<div class="clearfix">
				<input type="submit" name="signupbtn" class="signupbtn" value="Register">
			</div>
			
			<br>
		</div>

		<?php if(in_array("<span style='color: #14C800;'>You're all set! Goahead and login!</span><br>", $error_array)) echo "<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>"; ?>
		
		<div class="login">
			<a href="./login1.php">Sign In?</a>
		</div>

	</form>
	
	
</body>
</html>