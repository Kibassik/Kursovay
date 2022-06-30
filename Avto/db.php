<?php
$servername = "localhost";
$database = "avtoprokat";
$user = "root";
$password = "root";

//Соединение
$db = mysqli_connect($servername,$user,$password,$database);
if(!$db){
    die("Connection failed" . mysqli_connect_error());
}
?>