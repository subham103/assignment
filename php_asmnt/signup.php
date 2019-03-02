<?php 
	//Declaring variables to prevent errors
	$fname = ""; //First name
	$lname = ""; //Last name
	$uname = ""; //user name
	$em = ""; //email
	$password = ""; //password
	$password2 = ""; //password 2
	$date = ""; //Sign up date 
	$error_array = array(); //Holds error messages

	if(isset($_POST['signupbtn'])){

		//Registration form values

		//First name
		$fname = ppr($_POST['reg_fname']);
		// $fname = str_replace(' ', '', $fname); //remove spaces
		// $fname = ucfirst(strtolower($fname)); //Uppercase first letter
		$_SESSION['reg_fname'] = $fname; //Stores first name into session variable

		//Last name
		$lname = ppr($_POST['reg_lname']);
		// $lname = str_replace(' ', '', $lname); //remove spaces
		// $lname = ucfirst(strtolower($lname)); //Uppercase first letter
		$_SESSION['reg_lname'] = $lname; //Stores last name into session variable

		//Last name
		$uname = ppr($_POST['reg_uname']);
		// $lname = str_replace(' ', '', $lname); //remove spaces
		// $lname = ucfirst(strtolower($lname)); //Uppercase first letter
		$_SESSION['reg_uname'] = $uname; //Stores last name into session variable

		//email
		$em = strip_tags($_POST['reg_email']); //Remove html tags
		$em = str_replace(' ', '', $em); //remove spaces
		$em = ucfirst(strtolower($em)); //Uppercase first letter
		$_SESSION['reg_email'] = $em; //Stores email into session variable

		//Password
		$password = $_POST['reg_password'];
		$password2 = $_POST['reg_password2'];

		$date = date("Y-m-d H:i:s"); //Current date

			//Check if email is in valid format 
			if(filter_var($em, FILTER_VALIDATE_EMAIL)) {

				$em = filter_var($em, FILTER_VALIDATE_EMAIL);

				//Check if email already exists 
				$e_check = mysqli_query($con, "SELECT email FROM users_info WHERE email='$em'");

				//Count the number of rows returned
				$num_rows = mysqli_num_rows($e_check);

				if($num_rows > 0) {
					array_push($error_array, "Email already in use<br>");
				}

			}else {
				array_push($error_array, "Invalid email format<br>");
			}

		if($password != $password2) {
			array_push($error_array,  "Your passwords do not match<br>");
		}
		else {
			if(preg_match('/[^A-Za-z0-9]/', $password)) {
				array_push($error_array, "Your password can only contain english characters or numbers<br>");
			}
		}

		if(strlen($password > 30 || strlen($password) < 5)) {
			array_push($error_array, "Your password must be betwen 5 and 30 characters<br>");
		}

		if(preg_match('/[^A-Za-z0-9]/', $uname)) {
			array_push($error_array, "Your username can only contain english characters or numbers<br>");
		}else{
			// check if username already exists
			$uname = ppr($_POST['reg_uname']);
			// $lname = str_replace(' ', '', $lname); //remove spaces
			// $lname = ucfirst(strtolower($lname)); //Uppercase first letter
			$_SESSION['reg_uname'] = $uname; //Stores last name into session variable
			//Check if uname already exists 
			$e_check = mysqli_query($con, "SELECT username FROM users_info WHERE username='$uname'");

			//Count the number of rows returned
			$num_rows = mysqli_num_rows($e_check);

			if($num_rows > 0) {
				array_push($error_array, "username already in use<br>");
			}
		}

		if(empty($error_array)) {
			$password = md5($password); //Encrypt password before sending to database

			// $query="INSERT INTO ptb_users (id,user_id,first_name,last_name,email )VALUES('NULL','NULL','".$firstname."','".$lastname."','".$email."',MD5('".$password."'))";
			$query = "INSERT INTO `users_info` (`firstname`, `lastname`, `username`, `email`, `password`, `is_admin`, `no_ques_attempted`, `no_correct_ans`, `signup_date`) VALUES ('$fname', '$lname', '$uname', '$em', '$password', '1', '0', '0', '$date');";

			if (mysqli_query($con, $query)) {
				# code...
				echo "new record created succssesfully";
			}else{
				echo "Error: " . $query . "<br>" . mysqli_error($conn);
			}

			// array_push($error_array, "<span style='color: #14C800;'>You're all set! Goahead and login!</span><br>");

			//Clear session variables 
			$_SESSION['reg_fname'] = "";
			$_SESSION['reg_lname'] = "";
			$_SESSION['reg_email'] = "";
			$_SESSION['reg_email2'] = "";
			$_SESSION['reg_uname'] = "";
		}

	}

	function ppr($data) {
	  $data = strip_tags($data);
	  $data = str_replace(' ', '', $data);
	  $data = ucfirst(strtolower($data));
	  return $data;
	}

 ?>