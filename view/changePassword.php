<?php 
  session_start(); 
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Change Password</title>
    <link rel="stylesheet" type="text/css" href="changePassword.css">
  </head>
  <body>
    <?php 
      include('header.php'); 
      include('navBar.php');
    ?>
    <div class="form-container">
      <h1 align="center">Change Password</h1>
      <form method="post" action="../controller/changePasswordAction.php" novalidate id="changePassword" onsubmit="return changePassword();">
        <p id="Pass"></p>
        <div class="form-group">
          <label for="currentPassword">Old Password</label>
          <input type="password" id="currentPassword" name="currentPassword">
        </div>
        <div class="form-group">
          <label for="new_password">New Password</label>
          <input type="password" id="new_password" name="newPassword">
        </div>
        <div class="form-group">
          <label for="confirm_password">Confirm Password</label>
          <input type="password" id="confirm_password" name="confirmPassword">
        </div>
        <input type="submit" value="Change Password">
      </form>
    </div>
    <script src="changePassword.js"></script>
    <?php include('footer.php'); ?>
  </body>
</html>
