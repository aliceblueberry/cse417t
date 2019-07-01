<?php
    require 'database.php';

    $newUser = $_POST['newUser'];
    $newPassword = $_POST['newPassword'];
    $pwd_hash = password_hash($newPassword, PASSWORD_BCRYPT);

    $checkuser = $mysqli->query("SELECT username FROM users WHERE username='newUser'");
    if(!$checkuser) {
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    }
    
    if($checkuser->num_rows > 0) {
        header("Location: createuserfail.php");

    }
    else {
        $stmt = $mysqli->prepare("insert into users (username, hashed_password) values (?, ?)");
        if(!$stmt){
            printf("Query Prep Failed: %s\n", $mysqli->error);
            exit;
        }

        $stmt->bind_param('ss', $newUser, $pwd_hash);

        $stmt->execute();

        $stmt->close();
        header("Location: createusersuccess.php");
    }

    $checkuser->close();
    
   
    
        
?>