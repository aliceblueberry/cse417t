<?php
        //echo "debug";

        // This is a *good* example of how you can implement password-based user authentication in your web application.

        //require 'database.php';

        // Use a prepared statement
        $stmt = $mysqli->prepare("SELECT COUNT(*), username, hashed_password FROM users WHERE username=?");

        // Bind the parameter
        $stmt->bind_param('s', $user);
        $user = $_POST['username'];
        $stmt->execute();
        

        // Bind the results
        $stmt->bind_result($cnt, $user_id, $pwd_hash);
        $stmt->fetch();
        $inputpassword = $_POST['password'];
        $inputhashpassword = password_hash($inputpassword, PASSWORD_BCRYPT);
        
        // Compare the submitted password to the actual password hash

        if($cnt == 1 && password_verify($inputhashpassword, $pwd_hash)){
            // Login succeeded!
            $_SESSION['user_id'] = $user_id;
            header("Location: homepage.php");
        } else{
            header("Location: login.php");
        }
?>