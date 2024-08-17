<?php 
session_start();
require "../model/userDB.php";

if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['phone']) && isset($_POST['address'])){
    $username = $_SESSION['username'];
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    if(updateUserInfo($first_name, $last_name, $phone, $address, $username)){
        header('Location: ../view/profile.php');
    }else{
        header('Location: ../view/editProfile.php');
    }
}
?>
