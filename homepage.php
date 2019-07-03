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
                //question: unregistered users could still view the homepage (by rubrics)
                header("Location: loginpage.php");
            }
        ?>
        <h1>Simple News Site</h1>
        <h2><?php echo $user_id; ?>'s Dashboard: </h2>
        <form action="logout.php" method="POST">
            <input type="submit" name="logoutsubmit" value="Log out"/>
        </form>
        <form action="writestory.php" method="POST">
            <input type="submit" name="writestorysubmit" value="Write a new story"/>
        </form>
        <?php
           require 'database.php';
           //edits: limit 10 query that limits the number of stories displayed on homepage
           $stmt = $mysqli->prepare("select story_id, title, username, link from stories order by story_id limit 10");
           if(!$stmt){
               printf("Query Prep Failed: %s\n", $mysqli->error);
               exit;
           }
           
           $stmt->execute();
           
           $stmt->bind_result($story_id, $title_id, $username_id, $link_id);
           
           echo "<ul>\n";
           while($stmt->fetch()){
               printf("\t<li>%s %s %s %s</li>\n",
                   htmlspecialchars($story_id),               
                   htmlspecialchars($title_id),
                   htmlspecialchars($username_id),
                   htmlspecialchars($link_id) 
               );
           }
           echo "</ul>\n";
           
           $stmt->close();
    
        ?>

        
    </body>
</html>
