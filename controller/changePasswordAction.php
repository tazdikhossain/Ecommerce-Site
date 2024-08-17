<?php
// Start a session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
  // Redirect to login page
  header("Location: login.php");
  exit();
}

require "../model/connection.php";

// Prepare the SQL statement to fetch the current password
$stmt = $conn->prepare("SELECT password FROM userinfo WHERE username = ?");
$stmt->bind_param("s", $_SESSION['username']);

// Execute the prepared statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Check if the result contains a row
if ($result->num_rows == 0) {
  die("User not found.");
}

// Fetch the password from the result
$row = $result->fetch_assoc();
$password = $row['password'];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === "POST") {
  // Get the current password, new password, and confirm password from the form
  $current_password = $_POST['currentPassword'];
  $new_password = $_POST['newPassword'];
  $confirm_password = $_POST['confirmPassword'];
  if(isset($current_password) && isset($new_password) && isset($confirm_password)){

  // Check if the current password is correct
  if ($current_password != $password) {
    $_SESSION['currentPass'] = "Current password do not match.";
  } elseif ($new_password != $confirm_password) {
    $_SESSION['notSame'] = "New password and confirm password do not match.";
  } else {
    // Prepare the SQL statement to update the password
    $stmt = $conn->prepare("UPDATE userinfo SET password = ? WHERE username = ?");
    $stmt->bind_param("ss", $new_password, $_SESSION['username']);

    // Execute the prepared statement
    if ($stmt->execute()) {
      $_SESSION['currentPass'] = "";
      $_SESSION['notSame'] = "";
      $_SESSION['passwordChanged'] = true;
      header("Location: ../index.php");
      exit();
    } else {
      die("Error updating password: " . $stmt->error);
    }
  }
}else{
  header("Location: ../view/changePassword.php");
}
}

// Close the prepared statement
$stmt->close();

?>
