<?php
        session_start();
        session_destroy(); //destroys existing session
        header("Location: loginpage.php");
        exit;
?>
