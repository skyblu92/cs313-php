<?php
require("../dbConnect.php");

$gameId = htmlspecialchars($_GET["game_id"]);

$db = get_db();

$query = "SELECT name, system_name FROM games WHERE id =:id";
$query2 = "SELECT * FROM users_games WHERE gameID=$gameId";
$query3 = "SELECT * FROM users u FULL JOIN users_games ug ON u.id = ug.userID WHERE ug.gameID = $gameId";



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

		<form action="insertNote.php" method="POST">
			<input type="hidden" name="game_id" value="<?php echo $gameId; ?>">
			<input type="text" name="firstname"><br>
			<input type="text" name="gtag"><br>
			<textarea name="content" placeholder="Any notes about this game? Times you like to play, strategies, etc."></textarea>
			<br><br>
			<input type="submit" value="add gamertag">
		</form>

			<ul>
			<?php

			foreach ($users as $usr)
			{
				
				echo "<li>";
				echo "<h3>studentName: " . $usr["firstname"] . "</h3>";
				echo "<h4>Gamertag: " . $usr["gamertag"] . "</h4>";
				echo "<p> notes: " . $usr["notes"] . "</p>";
				echo "</li>";
			}
			?>
			</ul>
</body>

</html>