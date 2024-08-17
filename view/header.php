<?php
//session_start(); 

if (isset($_SESSION["username"])) {
	$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="header.css">
</head>
<body>
	
	<a href="../index.php"><img src="../picture/logo.png" id="logo"></a>
	<header>

		<div class="container">
			
			<nav>
				<ul>
					<li><a href="../index.php" >Home</a></li>
					<li><a href="showCart.php" >Cart</a></li>
					<li><a href="about.php" >About Us</a></li>
					<li><a href="contact.php" >Contact Us</a></li>
					<li>
						<div class="search-container">
						  <form method="GET" action="product.php" >
						  	<ul>
						    	<li><input type="text" placeholder="Search.." name="search"></li>
						    	<li><button type="submit" id="search">Submit</button></li>
						    </ul>
						  </form>
						</div>
					</li>
				</ul>
				
			</nav>

			
			
			<div class="profile-pic" onclick="showDropdown()" align="right">
				<?php
					require "../model/connection.php";
					$result = $conn->query("SELECT userPic FROM userinfo WHERE username= '$username'");
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							if(!empty($row['userPic'])){
			        ?>
			        <img src="../controller/uploads/<?php echo $row['userPic'];?>" alt="Profile Picture">
			        <?php 
			          }
			        else{
			        ?>
			        <img src="../picture/userpicture.jpg" alt="Profile Picture">
			        <?php
			            }
			          }
			      }
				?>
			</div>
			
			<div id="dropdown" class="dropdown">
				<a href="profile.php">View Profile</a>
				<a href="setting.php">Settings</a>
			</div>
			<script>
				function showDropdown() {
					// Get the dropdown menu element
					var dropdown = document.getElementById("dropdown");
					
					// Toggle the display property of the dropdown menu
					if (dropdown.style.display === "block") {
						dropdown.style.display = "none";
					} else {
						dropdown.style.display = "block";
					}
				}
			</script>
		</div>
	</header>

</body>
</html>

<?php
} else {
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="header.css">
</head>
<body>
	
	<a href="../index.php"><img src="../picture/logo.png" id="logo"></a>
	<header>

		<div class="container">
			
			<nav>
				<ul>
					<li><a href="../index.php">Home</a></li>
					<li><a href="showCart.php">Cart</a></li>
					<li><a href="about.php">About Us</a></li>
					<li><a href="contact.php">Contact Us</a></li>
					<li><a href="login.php" class="cta">Sign In</a></li>
					<li><a href="registration.php" class="cta">Sign Up</a></li>
					<li>
						<div class="search-container">
						  <form method="GET" action="product.php" >
						    <ul>
						    	<li><input type="text" placeholder="Search.." name="search"></li>
						    	<li><button type="submit" id="search">Submit</button></li>
						    </ul>
						  </form>
						</div>
					</li>
				</ul>
			</nav>

			
			
			<div class="profile-pic" onclick="showDropdown()" align="right">
				
				<img src="../picture/userpicture.jpg" alt="Profile Picture">
			
			</div>
			
			
			<div id="dropdown" class="dropdown">
				<a href="profile.php">View Profile</a>
				
			</div>
			<script>
				function showDropdown() {
					// Get the dropdown menu element
					var dropdown = document.getElementById("dropdown");
					
					// Toggle the display property of the dropdown menu
					if (dropdown.style.display === "block") {
						dropdown.style.display = "none";
					} else {
						dropdown.style.display = "block";
					}
				}
			</script>
		</div>
	</header>

</body>
</html>
<?php
}
?>
