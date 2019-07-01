<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Simple News Site</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
         <?php 
            session_start();
            $user_id = $_SESSION['user_id']; //creates a session username using the inputted username
            if ($user_id == null) {
                header("Location: loginpage.php");
            }
        ?>
        <h1>Simple News Site</h1>
        <h2><?php echo $user_id; ?>'s Dashboard: </h2>
        <form action="logout.php" method="POST">
            <input type="submit" name="logoutsubmit" value="Log out"/>
        </form>

        
    </body>
</html>
