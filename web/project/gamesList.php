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
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/uikit.css" />
		<link rel="stylesheet" href="css/card.css" />
        <script src="js/uikit.min.js"></script>
        <script src="js/uikit-icons.min.js"></script>
</head>
<body>
		<?php
		$name = $row["name"];
		$system = $row["system_name"];
		echo "<h2>Showing notes for: $name - $system</h2>";


		?>
<!--
		<form class= "uk-form-width-large" action="insertgamer.php" method="POST">
			<input type="hidden" name="game_id" value="<?php echo $gameId; ?>">
			<input class="uk-input" type="text" name="firstname"><br>
			<input class="uk-input" type="text" name="lastname"><br>
			<input class="uk-input" type="text" name="gtag"><br>
			<textarea class= "uk-textarea" name="content" placeholder="Any notes about this game? Times you like to play, strategies, etc."></textarea>
			<br><br>
			<input type="submit" value="add gamertag">
		</form>
-->


<form action="insertgamer.php" method="POST">
    <fieldset class="uk-fieldset">

        <legend class="uk-legend">Insert info</legend>

		<input type="hidden" name="game_id" value="<?php echo $gameId; ?>">
        <div class="uk-margin">
            <input class="uk-input" type="text" name="firstname" placeholder="First name">
		</div>
        <div class="uk-margin">
            <input class="uk-input" type="text" name="lastname" placeholder="Last name">
		</div>
        <div class="uk-margin">
            <input class="uk-input" type="text" name="gtag" placeholder="Gamertag">
        </div>

        <div class="uk-margin">
			<textarea class="uk-textarea" rows="5" name="content" placeholder="Any notes/comments (what ranking you are, 
			what hours you play, favorite characters, etc."></textarea>
		</div>
		
		<input type="submit" value="add gamertag">
    </fieldset>
</form>
				<div class="row">
			<?php

			foreach ($users as $usr)
			{
				$firstname = $usr["firstname"]; 
				$lastname = $usr["lastname"];
				$gamertag = $usr["gamertag"];
				$notes = $usr["notes"];


				echo '	<div class="card">
						<div class="wrapper">
						<div class="data">
						<div class="content">';
				echo "	<span class='author'>$firstname $lastname </span>";
				echo "	<h1 class='title'>$gamertag</h1>";
				echo "	<p class='text'>$notes</p>";
				echo '	</div></div></div></div>';
				
			}
			?>
		</div>
</body>

</html>