<?php 
	$servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "gore_gore";

    // Create connection
    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
    // Check connection
    if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
?>