<!DOCTYPE html>
<html>
  <head>
    <title>Registration Form</title>
    <link rel="stylesheet" type="text/css" href="registration.css">
    <link rel="stylesheet" href="css/all.css">
    
  </head>
  <body>
    <?php include('header.php'); ?>
    <div class="form-container">
      <h1 align="center">Registration Form</h1>
      
      <form method="post" action="../controller/registrationAction.php" enctype="multipart/form-data" id="registrationForm" onsubmit="return registrationForm();" novalidate>
        <p id="Registration"></p>

        <div class="form-group">
          <label for="first_name">First Name</label>
          <input type="text" id="first_name" name="first_name">
        </div>
        <div class="form-group">
          <label for="last_name">Last Name</label>
          <input type="text" id="last_name" name="last_name">
        </div>
        <div class="form-group">
          <label for="gender">Gender</label>
          <select name="gender">
            <option value="">Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email">
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="tel" id="phone" name="phone">
        </div>
        <div class="form-group">
          <label for="dob">Date of Birth</label>
          <input type="date" id="dob" name="dob">
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <textarea name="address" id="address"></textarea>
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
        </div>
        <div >
          <label class="switch">
            <input type="checkbox" id="showpassword" onclick="myFunction()">
            <span class="slider round"></span>
          </label>
          <p>Show Password</p>
        </div>
        <div class="image">
          <label for="image">Profile Picture</label>
          <label for="image"><i class="fa fa-camera"></i></label>
          <input type="file" name="image" id="image">
        </div>
          <button type="submit" name="submit" >Register</button>
      </form>
    </div>
    <script src="registration.js"></script>
    <?php include('footer.php'); ?>
  </body>
</html>
