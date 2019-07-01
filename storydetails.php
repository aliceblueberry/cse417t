<?php
require 'database.php';
//post the details of a story selected by link_id

//redirect to the story page, based on link_id(or link?)
$stmt = $mysqli->prepare("SELECT story_id, title, body, link_id, link FROM stories WHERE link_id = ??");
if(!stmt){
    printf("Query Prep Failed: %s\n", $mysqli->error);
    exit;
}

$stmt->execute();

$stmt->bind_result($story_id, $title, $body, $link_id, $link);
$stmt->fetch();

echo "<ul>\n";
while($stmt->fetch()){
	printf("\t<li>%s %s</li>\n",
		htmlspecialchars($story_id),
        htmlspecialchars($title),
        htmlspecialchars($body),
        htmlspecialchars($link_id),
        htmlspecialchars($link)

	);
}
echo "</ul>\n";

$stmt->close();

?>