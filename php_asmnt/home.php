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
    <title>Welcome | Quizee</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- <script src="../../../home/subham/Desktop/bootstrap/bootstrap.js"></script> -->

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
            <a href="/logout.php">
                <i class="fa fa-sign-out fa-lg"></i>
            </a>
        </nav>
    </div>

    <div class="wrapper">
        <div class="user_info column">
            <a href="<?php echo $userLoggedIn; ?>">
                <img src="defaults/<?php echo $user['profile_pic']; ?>" alt="profile picture">

            </a>

            <div class="user_info_right">
                <a href="<?php echo $userLoggedIn; ?>">
                    <?php 
                        echo $user['first_name'] . " " . $user['last_name'];
                     ?>
                </a>
                <br>
                <?php 
                    echo "Posts: " . $user['num_posts'] . "<br>";
                    echo "Likes: " . $user['num_likes'] . "<br>";
                 ?>
            </div>
        </div>

        <div class="main_column column">
            <form action="./index1.php" class="post_form" method="POST">
                <textarea name="post_text" id="post_text" placeholder="Wanna post something?"></textarea>
                <input type="text" name="post" required>
                <input type="text" name="post" required>
                <input type="text" name="post" required>
                <input type="text" name="post" required>
                <!-- <input type="submit" name="post" id="post_btn"> -->
                <hr>
            </form>
        </div>
            <?php 
                // if (isset($_POST['post'])) {
                //      $ques = $_POST['post_text'];


                //     $check_database_query = mysqli_query($con, "INSERT INTO `questions` (`question`, `option_a`, `option_b`, `option_c`, `option_d`, `difficulty_level`, `admin_id`) VALUES ( '$', 'value', 'variable', 'verbos', 'views', 'EASY', '1');");
                    

                // }

             ?>
        
        
        
    </div>
</body>
</html>