<?php 
    require 'configuration.php';

    if (isset($_SESSION['username'])) {
        $userLoggedIn = $_SESSION['username'];
        $user_query = mysqli_query($con, "SELECT * FROM users_info WHERE username='$userLoggedIn'");
        $user = mysqli_fetch_array($user_query);
        //session_destroy();
    }else{
        header("Location: ./login1.php");
    }

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<div class="topbar">
		
		<div class="logo">
			<a href="index1.php">Home!</a>
		</div>

		<nav>
			<a href="profile.php">
				<?php echo $user['first_name']; ?>
			</a>
			<a href="index1.php">
				<i class="fa fa-home fa-lg"></i>
			</a>
			<a href="#">
				<i class="fa fa-envelope fa-lg"></i>
			</a>
			<a href="#">
				<i class="fa fa-bell fa-lg"></i>
			</a>
			<a href="#">
				<i class="fa fa-users fa-lg"></i>
			</a>
			<a href="#">
				<i class="fa fa-cog fa-lg"></i>
			</a>
			<a href="./logout.php">
				<i class="fa fa-sign-out fa-lg"></i>
			</a>
		</nav>
	</div>

	<div class="wrapper">