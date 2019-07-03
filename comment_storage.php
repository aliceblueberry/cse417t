<?php
require 'database.php';
$username = $_POST['user_id'];
$body = $_POST['response'];

$stmt = $mysqli->prepare("insert into comments (username, body, story) values ($username, $body)");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->bind_param('ss', $username, $body);

$stmt->execute();

$stmt->close();

?>