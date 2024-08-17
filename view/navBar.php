<!DOCTYPE html>
<html>
<head>
	<title>Vertical Navigation Bar</title>
	<link rel="stylesheet" type="text/css" href="navBar.css">
</head>
<body>
	<div class="navbar">
	  <div class="menu" >
	    <ul id="myDIV">
	      <li><a href="setting.php" class="btn active">Edit Profile</a></li>
	      <li><a href="changePassword.php" class="btn">Change Password</a></li>
	      <li><a href="../controller/logout.php" class="btn">Logout</a></li>
	    </ul>
	  </div>
	</div>

	<script>
		var header = document.getElementById("myDIV");
		var btns = header.getElementsByClassName("btn");
		for (var i = 0; i < btns.length; i++) {
		  btns[i].addEventListener("click", function() {
		  var current = document.getElementsByClassName("active");
		  if (current.length > 0) { 
		    current[0].className = current[0].className.replace(" active", "");
		  }
		  this.className += " active";
		  });
		}
	</script>


</body>
</html>
