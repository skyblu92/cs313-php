<?php

$gameId = htmlspecialchars($_POST["game_id"]);
$firstname = htmlspecialchars($_POST["firstname"]);
$gtag = htmlspecialchars($_POST["gtag"]);
$notes = htmlspecialchars($_POST["content"]);


require("../dbConnect.php");

$db = get_db();
$query = "INSERT INTO users (firstName, notes) VALUES (:fname :notes)";

echo "test1";


$statement = $db->prepare($query);
$statement->bindValue(":fname", $firstname);
$statement->bindValue(":notes", $notes, PDO::PARAM_STR);

$statement->execute();

echo "test2";

$newId = $db->lastInsertId("users_id_seq");

$query2 = "INSERT INTO users_games (userID, gameID, gamertag)
				VALUES(:uId, $gameId, :gtag)";

echo "test3";

$statement2 = $db->prepare($query2);
//$statement2 bind values
$statement2->bindValue(":uId", $newId, PDO::PARAM_INT);
$statement2->bindValue(":gtag", $gtag, PDO::PARAM_STR);

$statement2->execute();

echo "test4";


header("Location: https://peaceful-hamlet-32303.herokuapp.com/project/gamesList.php?game_id=$gameId");


?>