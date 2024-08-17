<?php 
session_start();
require "../model/connection.php";

if(isset($_FILES['image']['name'])){
    $username = $_SESSION['username'];
    $Image_name = $_FILES['image']['name'];
    $Image_size = $_FILES['image']['size'];
    $tem_name = $_FILES['image']['tmp_name'];

    $validImageExtensions = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $Image_name);
    $imageExtension = strtolower(end($imageExtension));

    if(!in_array($imageExtension, $validImageExtensions)){
        echo "
            <script>
                alert('Invalid Image Extension');
                document.location.href = '../view/profile.php';
            </script>";
    }
    elseif($Image_size > 12000000){
        echo "
            <script>
                alert('Image size is too long');
                document.location.href = '../view/profile.php';
            </script>";
    }else{
        $new_img_name = "img-".date("Y.m.d")."-".date("h.i.sa");
        $new_img_name.=".".$imageExtension;
        $sql = "UPDATE userinfo SET userPic = ? WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $new_img_name, $username);
        $stmt->execute();
        $stmt->close();
        move_uploaded_file($tem_name, '../controlar/uploads/'.$new_img_name );
        echo "
            <script>
                document.location.href = '../view/profile.php';
            </script>";
    }
}

$conn->close();
?>
