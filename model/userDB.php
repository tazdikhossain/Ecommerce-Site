<?php 

function showUserInfo(){
    require "../model/connection.php";
    $sql = "SELECT firstname,lastname,gender,email,phone,address,dob,userPic,password FROM userinfo where username=?";
    $stmt = $conn -> prepare($sql);
    $stmt->bind_param("s", $_SESSION['username']);
    if($stmt -> execute() > 0){
        $stmt->bind_result($first_name, $last_name, $gender, $email, $phone, $address, $dob, $new_img_name, $password);
        $rows = array();
        while ($stmt->fetch()) {

            $rows[] = array('firstname' => $first_name, 'lastname' => $last_name, 'gender' => $gender, 'email' => $email, 'phone' => $phone, 'address' => $address, 'dob' => $dob, 'userPic' => $new_img_name, 'password' => $password);
        }
        $_SESSION['userInfo'] = $rows;
        $stmt->close(); 
        return true;
    }else{
        return false;
    }
}

//---------------------------------------------------------------------------
//---------------------------------------------------------------------------

function updateUserInfo($first_name, $last_name, $phone, $address, $username){
    require "../model/connection.php";
    $stmt = $conn->prepare("UPDATE userinfo SET firstname = ?, lastname = ?, phone = ?, address = ? WHERE username = ?");
    $stmt->bind_param("sssss", $first_name, $last_name, $phone, $address, $username);
    if ($stmt->execute()){
        $_SESSION['msg'] = "Profile updated successfully!";
        return true;
    }else{
        $_SESSION['msg'] = "Failed to update profile!";
        return false;
    }
    $stmt->close();
    $conn->close();
}

//---------------------------------------------------------------------------
//---------------------------------------------------------------------------

function login($username, $password){
    require "../model/connection.php";
    $sql = "SELECT password FROM userinfo WHERE username = ?";

    $stmt = $conn -> prepare($sql);
    $stmt->bind_param("s", $username);

    if ($stmt -> execute() > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        if ($password === $hashed_password) {
            // Successful login, set session variable
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            return true;
            // header("Location: ../index.php");
        } else {
            // Incorrect password
            return false;
            // echo "Incorrect password!";
        }
        
    } else {
        // Incorrect username
        return false;
        // echo "Incorrect username!";
    }
    $stmt->close();
    $conn->close();
}


//---------------------------------------------------------------------------
//---------------------------------------------------------------------------

function registration($firstname, $lastname, $gender, $email, $phone, $dob, $address, $username, $password, $userPic){
    require "../model/connection.php";
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    $sql = "INSERT INTO userinfo (firstname, lastname, gender, email, phone, dob, address, username, password, userPic)
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssss", $firstname, $lastname, $gender, $email, $phone, $dob, $address, $username, $password, $userPic);

    if ($stmt -> execute() > 0){
        // $_SESSION['msg'] = "Profile updated successfully!";
        $stmt->close();
        $conn->close();
        return true;
    }else{
        // $_SESSION['msg'] = "Failed to update profile!";
        $stmt->close();
        $conn->close();
        return false;
    }
}


?>