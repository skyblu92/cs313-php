<?php
require("../dbConnect.php");

$gameId = htmlspecialchars($_GET["game_id"]);

$db = get_db();

$query = "SELECT name, system_name FROM games WHERE id =:id";
$query2 = "SELECT * FROM users_games WHERE gameID=$gameId";
$query3 = "SELECT u.firstName, u.notes, ug.gamertag FROM users u INNER JOIN users_games ug ON u.id = ug.userID WHERE ug.gameID = $gameId";



$statement = $db->prepare($query);
$statement->bindValue(":id", $gameId);

$statement2 = $db->prepare($query2);

$statement3 = $db->prepare($query3);


$statement->execute();
$statement2->execute();
$statement3->execute();


$row = $statement->fetch();
$u_g = $statement2->fetchAll(PDO::FETCH_ASSOC);
$users = $statement3->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Games overview</title>
</head>
<body>
		<?php
		$name = $row["name"];
		$system = $row["system_name"];
		echo "<h2>Showing notes for: $name - $system</h2>";


		?>
<!--
		<form action="insertUser.php" method="POST">
			<input type="hidden" name="course_id" value="<?php echo $courseId; ?>">
			<input type="date" name="date"><br>
			<textarea name="content" placeholder="Any notes about the class?"></textarea>
			<br><br>
			<input type="submit" value="add note">
		</form> -->

			<ul>
			<?php
			foreach ($users as $usr)
			{
				echo "<li>";
				echo "<h3>studentName " . $usr["firstName"] . "</h3>";
				echo "<h4>Gamertag " . $usr["gamertag"] . "</h4>";
				echo "<p> notes " . $usr["notes"] . "</p>";
				echo "</li>";
			}
			?>
			</ul>
</body>

</html>