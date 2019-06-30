<?php
    require 'database.php';

    $newUser = $_POST['newUser'];
    $newPassword = $_POST['newPassword'];
    $pwd_hash = password_hash($newPassword, PASSWORD_BCRYPT);

    $stmt = $mysqli->prepare("insert into users (username, hashed_password) values (?, ?)");
    if(!$stmt){
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    }

    $stmt->bind_param('ss', $newUser, $pwd_hash);

    $stmt->execute();

    $stmt->close();

    ?>