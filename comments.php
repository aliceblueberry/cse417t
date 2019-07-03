<!DOCTYPE hytml>
<html lang="en">

<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php 
            session_start();
            $user_id = $_SESSION['user_id']; //creates a session username using the inputted username
            if ($user_id == null) {
            //problem: unregistered users could still view the homepage (by rubrics)
            header("Location: loginpage.php");
            }
?>


<h2>Make A New Comment</h2>
<form action="commen_storage.php" method="POST"> <!-- goes to comment upload php code. -->
        What do you think?<input type="text" name="response"><br>
      <input type="submit" name="storysubmit" value="Publish">
</form> 

<!--display all comments--->

<?php
require 'database.php';
$stmt = $mysqli->prepare("SELECT comment_id, body, username FROM comments Order by comment_id");


if(!stmt){
    printf("Query Prep Failed: %s\n", $mysqli->error);
    exit;
}

$stmt->execute();

$stmt->bind_result($comment_id, $body, $username);
$stmt->fetch();

echo "<ul>\n";
while($stmt->fetch()){
	printf("\t<li>%s %s</li>\n",
		htmlspecialchars($body),
        htmlspecialchars($username)

	);
}

echo "</ul>\n";

$stmt->close();
?>
<body>
<html>