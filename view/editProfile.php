<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Profile</title>
	<link rel="stylesheet" type="text/css" href="editProfile.css">
</head>
<body>
	<?php
		
        require "../model/userDB.php";
          
         $flag = showUserInfo();
                if($flag === true){
          
                    // shob gula review array theke niye dekhabo 
                    $userInfo = $_SESSION['userInfo'];
                    // Loop through the array and display the data
                    foreach ($userInfo as $rowAgain) {
                      $first_name = $rowAgain['firstname'];
                      $last_name = $rowAgain['lastname'];
                      
                      $phone = $rowAgain['phone'];
                      $address = $rowAgain['address'];
	                }
	            }
                      
         ?>
	<div class="editProfile">
		<h1 align="center">Edit Profile</h1>
		<form action="../controller/editProfileAction.php" method="post">
		  <label for="fname">First Name:</label>
		    <input type="text" id="fname" name="fname" value="<?php echo $first_name; ?>">
		    
		    <label for="lname">Last Name:</label>
		    <input type="text" id="lname" name="lname" value="<?php echo $last_name; ?>">
		    
		    <label for="phone">Phone/Mobile:</label>
		    <input type="number" id="phone" name="phone" value="<?php echo $phone; ?>">
		    
		    <label for="address">Present Address:</label>
		    <input type="text" id="address" name="address" value="<?php echo $address; ?>">
		    
		    <input type="submit" value="Update">
	    </form>
	</div>


</body>
</html>