<?php

$gameId = htmlspecialchars($_POST["game_id"]);
$firstname = htmlspecialchars($_POST["firstname"]);
$lastname = htmlspecialchars($_POST["lastname"]);
$gtag = htmlspecialchars($_POST["gtag"]);
$notes = htmlspecialchars($_POST["content"]);


require("../dbConnect.php");

$db = get_db();
$query = "INSERT INTO users (firstName, lastname, notes) VALUES (:fname, :lname, :note)";

echo "test1";


$statement = $db->prepare($query);
$statement->bindValue(":fname", $firstname, PDO::PARAM_STR);
$statement->bindValue(":lname", $lastname, PDO::PARAM_STR);
$statement->bindValue(":note", $notes, PDO::PARAM_STR);

$statement->execute();

echo "test2";

$newId = $db->lastInsertId("users_id_seq");

$query2 = "INSERT INTO users_games (userID, gameID, gamertag)
				VALUES(:uId, $gameId, :gmtag)";

echo "test3";

$statement2 = $db->prepare($query2);
//$statement2 bind values
$statement2->bindValue(":uId", $newId, PDO::PARAM_INT);
$statement2->bindValue(":gmtag", $gtag, PDO::PARAM_STR);

$statement2->execute();



header("Location: https://peaceful-hamlet-32303.herokuapp.com/project/gamesList.php?game_id=$gameId");


?>