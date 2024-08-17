<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<?php include('header.php'); ?>
	<div class="login-container">
		<h1>Login</h1>
		
		<form action="../controller/loginAction.php" method="post" novalidate id="loginform" onsubmit="return validateForm();">
			<p id="login1">
				<?php
					if(isset($_GET['message'])){
					  $message = $_GET['message'];
					  // do something with the message, such as display it in a <p> tag
					}
				?>
			</p>
			<label for="username">Username</label>
			<input type="text" id="username" name="username">
			<label for="password">Password</label>
			<input type="password" id="password" name="password">
			<div >
				<label class="switch">
				  <input type="checkbox" id="showpassword" onclick="myFunction()">
				  <span class="slider round"></span>
				</label>
				<p>Show Password</p>
			</div>
			<!-- <button type="button" id="showpassword" onclick="myFunction()">Show</button> -->
			<input type="submit" value="Login" >

		</form>
		<div class="forgot-password">
			<br><br><a href="forgetpass.php" style="text-decoration:none;">Forgot Password?</a>
		</div>
	</div>
	<script src="login.js"></script>
	<?php include('footer.php'); ?>
</body>
</html>
