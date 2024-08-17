<?php
session_start();

if (isset($_SESSION["username"])) {
  $username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Profile Page</title>
    <link rel="stylesheet" type="text/css" href="profile.css">
    <link rel="stylesheet" href="css/all.css">
  </head>
  <body>
    <?php include('header.php'); ?>
    <div class="profile-container">
      <div class="profile-image">
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
                      $gender = $rowAgain['gender'];
                      $email = $rowAgain['email'];
                      $phone = $rowAgain['phone'];
                      $address = $rowAgain['address'];
                      $dob = $rowAgain['dob'];
                      
                      $img_name = $rowAgain['userPic'];
              if(!empty($img_name)){
            ?>
                <img src="../controller/uploads/<?php echo $img_name;?>" alt="Profile Picture">
                <form method="post" enctype="multipart/form-data" action="../model/image_update.php" id="form">
                <div class="camera-button">
                  <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
                  <input type="file" id="image" name="image" accept=".jpg, .jprg, .png">
                  <i class="fa fa-camera"></i>
                </div>
              </form>
              <script type="text/javascript">
                document.getElementById("image").onchange = function(){
                  document.getElementById("form").submit();
                }
              </script>

            <?php 
              }
            else{
            ?>
                <img src="../picture/userpicture.jpg" alt="Profile Picture">
                <form method="post" enctype="multipart/form-data" action="../model/image_update.php" id="form">
                <div class="camera-button">
                  <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
                  <input type="file" id="image" name="image" accept=".jpg, .jprg, .png">
                  <i class="fa fa-camera"></i>
                </div>
              </form>

              <script type="text/javascript">
                document.getElementById("image").onchange = function(){
                  document.getElementById("form").submit();
                }
              </script>
            <?php
                }
              }
            }
            ?>
      </div>
      <div class="profile-details">
        <h2><?php echo $first_name . ' ' . $last_name; ?></h2>
        <p><?php echo $address; ?></p>
        <p><?php echo $email; ?></p>
        <p><?php echo $phone; ?></p>
        <!-- <p><?php echo $gender; ?></p> -->
        <p><?php echo $dob; ?></p>
      </div>
    </div>
    <?php include('footer.php'); ?>
  </body>
</html>

<?php
  } else {
    header("Location: login.php");
  }
?>
