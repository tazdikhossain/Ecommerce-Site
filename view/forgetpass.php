<?php
	include 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forget Password Page</title>
	<link rel="stylesheet" type="text/css" href="forgetpass.css">
</head>
<body>
	<div class="forget-container">
		<form method="post" action="../controller/forgetpassAction.php" onsubmit="return validateForm();" novalidate>

		    <h1>Forget Password:</h1>
		    <p id="forgetpass"></p>
		    <label for="email">Email:</label>
			<input type="email" id="email" name="email">
			<input type="submit" value="Submit">
	  	
	  	</form>
  	</div>
  	<script src="forgetpass.js"></script>
</body>
</html>

<?php
	include 'footer.php';
?>
