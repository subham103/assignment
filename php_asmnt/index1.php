<?php 
include("header.php");
include("configuration.php");

// if(isset($_POST['post'])){
// 	$post = new Post($con, $userLoggedIn);
// 	$post->submitPost($_POST['post_text'], 'none');
// }

?>

		<div class="user_info">
			<div class="user_info_right">
				<span>
					<?php 
						echo $user['username'];
					 ?>
				</span>
				<br>
				<?php 
					echo "points  " . $user['no_correct_ans'];
				 ?>
			</div>
		</div>

		<div class="main_column">
			<span>Latest Problems</span>
			<hr>
			<br>
			<?php 
				$query = 'SELECT * FROM questions';
				$ques_print = mysqli_query($con, $query);
				$num_rows = mysqli_num_rows($ques_print);
				// var_dump(mysqli_fetch_array($ques_print));
				// die();
				// $row = mysqli_fetch_array($ques_print);
				if($num_rows > 0) {
					$loop = $num_rows;
					for ($i=1; $i <= $loop ; $i++) { 
					 	$query_pnt = "SELECT * FROM questions WHERE id='$i'";
					 	$row_pnt = mysqli_query($con, $query_pnt);
						$row = mysqli_fetch_array($row_pnt);
					
					 	echo $i . ") " . $row['question'] . "<br>" . "a) " . $row['option_a'] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . "b) " . $row['option_b'] . "<br>" . "c) " . $row['option_c'] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . "d) " . $row['option_d'] . "<br>" . "<form action='./index1.php' class='post_form1' method='POST'><input type='text' name='answer" . $i . "' class='ans' required><br><input type='submit' name='post_ans" . $i . "' id='post_btn'><br></form>" . "<hr>";
					 }
				}
				if($user['is_admin'] == 1) {
					echo "<form action='./index1.php' class='post_form' method='POST'><textarea name='post_text' id='post_text' placeholder='Post New Questions?'></textarea><input type='submit' name='post' id='post_btn'><br><span>a)</span><input type='text' name='post_a' class='ans' required><span>b)</span><input type='text' name='post_b' class='ans' required><br><span>c)</span><input type='text' name='post_c' class='ans' required><span>d)</span><input type='text' name='post_d' class='ans' required><br><span>what is the dificulti level of the questions?</span><br><input type='text' name='post_ans' class='ans' required><br><span>what is the answer of the questions?</span><br><input type='text' name='post_right' class='ans' required><br></form>";
				}
				// <input type="text" name="post" required>
			 ?>
			  
			
		</div>
		 <!-- <div class="main_column">
			<?php 
				// if($user['is_admin'] == 1) {
				// 	echo "<form action='./index1.php' class='post_form' method='POST'><textarea name='post_text' id='post_text' placeholder='Post New Questions?'></textarea><input type='submit' name='post' id='post_btn'><hr></form>";
				// }

			 ?>
		</div> -->
		
		 
	</div>

	 <?php 
	 			$query = 'SELECT * FROM questions';
				$ques_print = mysqli_query($con, $query);
				$num_rows = mysqli_num_rows($ques_print);
				$loop = $num_rows;
				if($user['is_admin'] == 1){
					if (isset($_POST['post'])) {
                      $ques = $_POST['post_text'];
                      $option_a = $_POST['post_a'];
                      $option_b = $_POST['post_b'];
                      $option_c = $_POST['post_c'];
                      $option_d = $_POST['post_d'];
                      $option_dif = $_POST['post_dif'];
                      $option_right = $_POST['post_right'];


                     $insert_database_query = mysqli_query($con, "INSERT INTO `questions` (`question`, `option_a`, `option_b`, `option_c`, `option_d`, `difficulty_level`, `admin_id`, `answer`) VALUES ( '$ques', '$option_a', '$option_b', '$option_c', '$option_d', '$option_dif', '1', '$option_right');");
                     // $insert_query = mysqli_query($con, "INSERT INTO `user_question` (`answer`) VALUES ('$option_right');");
                    

                }
				}
				
                for ($j=1; $j <= $loop ; $j++) { 
                	$post_query = 'post_ans' . $j;
                	if (isset($_POST[$post_query])) {
                		$answer_query = 'answer' . $j;
			 		 $ans_given = $_POST[$answer_query];

                      $user_id = $user['id'];
                     $insert_query = mysqli_query($con, "INSERT INTO `users_ans_latest` (`user_id`, `ques_id`, `ans`) VALUES ('$user_id', '$j', '$ans_given');");
                     $correct_ans_query = mysqli_query($con, "SELECT * FROM questions WHERE id='$j';");
                     $correct_ans = mysqli_fetch_array($correct_ans_query);
                     // var_dump($correct_ans);
                     // die();
                    // $_SESSION['correct'] = $correct_ans;
                    if ($correct_ans['answer'] == $ans_given){
                    	// echo "haah";
                    	$insert1 = mysqli_query($con, "SELECT * FROM `users_ans_latest` WHERE `user_id` = '$user_id';");
                    	$insert2 = mysqli_fetch_array($insert1);
                    	$points = $insert2['points'];
                    	$points++;
                    	$insert = mysqli_query($con, "UPDATE `users_ans_latest` SET `points` = '$points' WHERE `user_id` = '$user_id';");
                    }
                	}
                }
                $user_id = $user['id'];
                $insert_1 = mysqli_query($con, "SELECT * FROM `users_ans_latest` WHERE `user_id` = '$user_id';");
                $insert_2 = mysqli_fetch_array($insert_1);
                $points_up = $insert_2['points'];
				$point_query=mysqli_query($con, "UPDATE `users_info` SET `no_correct_ans` = '$points_up' WHERE `id` = '$user_id';");
                
	?> 
	<div class="usr_info" id="leader">
			<div class="usr_info_right">
				<span>
					#LeaderBoard#
				</span>
				<br>
				<br>
				<?php 
					// echo$user['no_correct_ans'] 
					echo "username &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; points <br><hr>";

					$correct_ans_query_final = mysqli_query($con, "SELECT * FROM users_info ;");
                     $correct_ans_final = mysqli_fetch_array($correct_ans_query_final);
                     // var_dump($correct_ans_final);
                     // die();
                     $num_rows_final = mysqli_num_rows($correct_ans_query_final);
                     // var_dump($num_rows_final);
                     // die();
                     for ($q=1; $q<=$num_rows_final  ; $q++) { 
                     	$correct_ans_query_final = mysqli_query($con, "SELECT * FROM users_info WHERE id='$q' ORDER BY no_correct_ans DESC;");
                     	$correct_ans_final = mysqli_fetch_array($correct_ans_query_final);
                     	echo $correct_ans_final['username'] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#" . $correct_ans_final['no_correct_ans'] . "<br>";
                     }
				 ?>
			</div>
		</div>
	 
</body>
</html>