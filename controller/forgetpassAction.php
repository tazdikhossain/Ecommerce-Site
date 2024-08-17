<?php 
	session_start();

	if($_SERVER['REQUEST_METHOD'] === "POST"){

		$email= $_POST['email'];
		$flag=true;

      if($flag === true){
			include "../model/connection.php";

			$sql = "SELECT password FROM userinfo WHERE email = ?";
			$stmt = mysqli_prepare($conn, $sql);
			mysqli_stmt_bind_param($stmt, "s", $email);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);

			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					$password = $row['password'];
					$to      = $email;
					$subject = 'Forget password';
					$message = "Your password is: ".$password;
					$headers = 'From: sssshishir1290@gmail.com' . "\r\n" .
					    'Reply-To: sssshishir1290@gmail.com' . "\r\n" .
					    'X-Mailer: PHP/' . phpversion();


					if(mail($to, $subject, $message, $headers)){
					// header("Location: ../view/login.php"); 
					echo '<script src="../view/login.php">alert("Check your email for your password")</script>';
					header("Location: ../view/login.php");

					}
				}
				
			} 
			else {
			  header("Location: forgetPass.php?msg1="."Submit your email id!");
			}

			mysqli_stmt_close($stmt);
			mysqli_close($conn);
		}

	}
    		
?>