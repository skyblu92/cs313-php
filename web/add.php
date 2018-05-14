<?php
session_start();
?>

<!DOCTYPE html>


<?php
$iName = $_POST["itemName"];
$iPrice = $_POST["itemPrice"];
array_push($_SESSION["itemName"], $iName);
array_push($_SESSION["itemPrice"], $iPrice);
// $_SESSION["itemName"] = $iName;
// $_SESSION["itemPrice"] = $iName;
echo "Adding item... ";
print_r($_SESSION["itemName"]);

echo '<meta http-equiv="refresh" content="1; URL=session.php" />';

?>
</html>