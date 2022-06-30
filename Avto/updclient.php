<?php
include("db.php"); // Клиент машину сдал
$id = $_POST['iduser'];
$sql = "SELECT * FROM `client` WHERE id = '$id';";
$result = mysqli_query($db, $sql);
while($myrow= mysqli_fetch_array($result)){
$fact = $myrow['dateFactVoz'];
}
$today = date("Y-m-d");
$query = "UPDATE `client` SET dateFactVoz = '$today' WHERE id = '$id'";
$result = mysqli_query($db, $query);

echo"<script> document.location.href = 'manager.php'</script>";
?>