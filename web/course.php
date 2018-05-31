<?php

require_once("dbConnect.php");
$db = get_db();

if (!isset($db)) {
	die("Database not set");
}

$query = "SELECT id, name, number FROM course";
$statement = $db->prepare($query);
//bind any variables

$statement->execute();
$courses = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Courses overview</title>
</head>
<body>
	<h1> Courses </h1>
	<ul>
		<?php
		foreach ($courses as $course) {
			$name = $course["name"];
			$number = $course["number"];
			echo "<li><p>$number - $name</p></li>";
		}


		?>
	</ul>
</body>

</html>