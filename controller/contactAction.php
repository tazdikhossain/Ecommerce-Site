
<?php

include "../model/connection.php";


$getMesg = mysqli_real_escape_string($conn, $_POST['text']);


$check_data = "SELECT messages FROM chat_messages WHERE queries LIKE '%$getMesg%'";
$run_query = mysqli_query($conn, $check_data) or die("Error");

if(mysqli_num_rows($run_query) > 0){

    $fetch_data = mysqli_fetch_assoc($run_query);
    
    $replay = $fetch_data['messages'];
    echo $replay;
}else{
    echo "Sorry can't be able to understand you!";
}

?>