<?php
session_start();
?>

<!DOCTYPE html>


<?php
$iName = $_POST["itemName"];
$iPrice = $_POST["itemPrice"];
$_SESSION["itemName"] = $iName;
$_SESSION["itemPrice"] = $iName;
echo "Adding item... ";

echo '<meta http-equiv="refresh" content="1; URL=session.php" />';

?>
</html>