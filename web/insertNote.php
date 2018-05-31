<?php

$courseId = htmlspecialchars($_POST["course_id"]);
$date = htmlspecialchars($_POST["date"]);
$content = htmlspecialchars($_POST["content"]);

echo "course: $courseId\n";
echo "date: $date\n";
echo "note: $content\n";

require("dbConnect.php");

$db = get_db();
$query = "INSERT INTO note (course_id, content, date)
				VALUES(:courseId, :content, :date)";

$statement = $db->prepare($query);
$statement->bindValue(":courseId", $courseId, PDO::PARAM_INT);
$statement->bindValue(":content", $date, PDO::PARAM_STR);
$statement->bindValue(":date", $date, PDO::PARAM_STR);

$statement->execute();



?>