<?php

$gameId = htmlspecialchars($_POST["game_id"]);
$firstname = htmlspecialchars($_POST["firstname"]);
$gtag = htmlspecialchars($_POST["gtag"]);
$notes = htmlspecialchars($_POST["content"]);

echo "user: $firstname\n";
echo "gamertag: $gtag\n";
echo "notes: $notes\n";

require("../dbConnect.php");

$db = get_db();
$query = "INSERT INTO users (firstname, notes) VALUES (:fname :notes)";


$statement = $db->prepare($query);
$statement->bindValue(":fname", $firstname, PDO::PARAM_INT);
$statement->bindValue(":notes", $notes, PDO::PARAM_STR);

$statement->execute();

$newId = $db->lastInsertId("users_id_seq");

$query2 = "INSERT INTO users_games (userID, gameID, gamertag)
				VALUES(:uId, $gameId, :gtag)";

$statement2 = $db->prepare($query2);
//$statement2 bind values
$statement2->bindValue(":uId", $newId, PDO::PARAM_INT);
$statement2->bindValue(":gtag", $gtag, PDO::PARAM_STR);

$statement2->execute();
header("Location: https://peaceful-hamlet-32303.herokuapp.com/project/gamesList.php?game_id=);$gameId");


?>