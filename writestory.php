<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Simple News Site</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <?php
            $user_id = $_SESSION['user_id'];
        ?>
        <h1>Simple News Site</h1>
            <h2>Story Editor</h2>
            <form action="storyupload.php" method="POST"> <!-- goes to story upload php code. -->
                Title: <input type="text" name="title"><br>
                Story: <input type="text" name="story">
                <!-- Link: <input type="text" name="username"> -->
                <input type="submit" name="storysubmit" value="Publish">
            </form> 
        <?php
            if (isset($_POST['storysubmit'])) {
                header("Location: homepage.php");
            }
        ?>
        

        
    </body>
</html>
