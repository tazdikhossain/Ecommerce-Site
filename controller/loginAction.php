<?php
session_start();

include "../model/connection.php";

$username = $_POST["username"];
$password = $_POST["password"];


require "../model/userDB.php";

$flag = login($username, $password);

if($flag === true){
    echo "success";
}
else{
    echo "Incorrect password!";
}

?>