<?php
require("dbConnect.php");

$courseId = htmlspecialchars($_GET["course_id"]);

$db = get_db();

$query = "SELECT name, number FROM course WHERE id =:id";
$query2 = "SELECT content, date FROM note WHERE course_id=$courseId";



$statement = $db->prepare($query);
$statement->bindValue(":id", $courseId);

$statement2 = $db->prepare($query2);

$statement->execute();
$statement2->execute();

$row = $statement->fetch();
$notes = $statement2->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Courses overview</title>
</head>
<body>
		<?php
		$number = $row["number"];
		$name = $row["name"];
		echo "<h2>Showing notes for: $number - $name</h1>";


		?>

		<form action="insertNote.php" method="POST">
			<input type="hidden" name="course_id" value="<?php echo $courseId; ?>">
			<input type="date" name="date"><br>
			<textarea name="content" placeholder="Any notes about the class?"></textarea>
			<br><br>
			<input type="submit" value="add note">
		</form>

			<ul>
			<?php
			foreach ($notes as $note)
			{
				echo "<li>";
				echo "<h3>" . $note["date"] . "</h3>";
				echo "<p>" . $note["content"] . "</p>";
				echo "</li>";
			}
			?>
			</ul>
</body>

</html>