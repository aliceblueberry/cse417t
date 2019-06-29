<?php
//connects to users database
$mysqli = new mysqli('localhost', 'rachanaereddy', 'warren99', 'databasename');
 
if($mysqli->connect_errno) {
	printf("Connection Failed: %s\n", $mysqli->connect_error);
	exit;
}
?>