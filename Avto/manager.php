<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Админ-панель</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Договоры<span class="sr-only">(current)</span></a>
      </li>
      
    </ul>
  </div>
</nav>
<form action="" method="post">
<input type="text" name="lastnameSearch" value="">
<button type="submit" name="search" class="btn btn-primary">Поиск</button>
<button type="submit" name="all" class="btn btn-primary"> Показать все</button>
</form>
<table class='table'>
    <thead>
      <tr>
        <th scope='col'>Номер договора</th>
        <th scope='col'>Фамилия</th>
        <th scope='col'>Имя</th>
        <th scope='col'>Отчество</th>
        <th scope='col'>Дата выдачи</th>
        <th scope='col'>Дата возврата</th>
        
        <th scope='col'>Арендная плата</th>
        <th scope='col'>Марка</th>
        <th scope='col'>Модель</th>
        <th scope='col'>Госномера</th>
        <th scope='col'>Залог</th>
        <th scope='col'>Фактический возврат</th>
      </tr>
    </thead>
    <tbody>
<?php 

if(ISSET($_POST['all'])){
include("db.php");

 $sql = "SELECT * FROM `client`"; // Вывод всех договоров
 $result = mysqli_query($db, $sql);
 while($myrow= mysqli_fetch_array($result)){
    $id = $myrow['id'];
    $idCar = $myrow['idCar'];
    $Lastname = $myrow['Lastname'];
    $Firstname = $myrow['Firstname'];
    $Fathername = $myrow['Fathername'];
    $Passport = $myrow['Passport'];
    $Avtopassport = $myrow['Avtopassport'];
    $Sved = $myrow['svedProkat'];
    $dayprice = $myrow['price'];
    $DateVid = $myrow['DateVid']; 
    $DateVoz = $myrow['DateVoz']; 
    $dayVozFact = $myrow['dateFactVoz']; 
    echo"
      <tr>
        <td> $id</td>
        <td> $Lastname</td>
        <td> $Firstname</td>
        <td> $Fathername</td>
        <td> $DateVid</td>
        <td> $DateVoz</td>
        <td> $dayprice</td>
        ";
        $query = "SELECT * FROM `avto` WHERE idCar = '$idCar'";
        $res = mysqli_query($db, $query);
     while($myrowTwo= mysqli_fetch_array($res)){
        $mark = $myrowTwo['mark'];
        $class = $myrowTwo['model'];
        $number = $myrowTwo['number'];
        $zalog = $myrowTwo['zalog'];
            echo"
            <td> $mark</td>
            <td> $class</td>
            <td> $number</td>
            <td> $zalog</td>
            ";
           
         
 }
 echo"<td>";
 if($dayVozFact == ''){
  echo" <form action='updclient.php' method='post'>
  <input type='hidden' name='iduser' value='$id'>
  <button type='submit'>Закрыть сделку</button>
  </form>";
 }
 else{
     echo"$dayVozFact";
 }
echo"</td></tr>";
}
}
if(ISSET($_POST['search'])){ //Вывод людей по фамилии
    include("db.php");
    $lastSearch = $_POST['lastnameSearch'];
    
 $sqlName = "SELECT * FROM `client` WHERE Lastname = '$lastSearch'";
 $resultSearch = mysqli_query($db, $sqlName);
 while($myrow = mysqli_fetch_array($resultSearch)){
    $id = $myrow['id'];
    $idCar = $myrow['idCar'];
    $Lastname = $myrow['Lastname'];
    $Firstname = $myrow['Firstname'];
    $Fathername = $myrow['Fathername'];
    $Passport = $myrow['Passport'];
    $Avtopassport = $myrow['Avtopassport'];
    $Sved = $myrow['svedProkat'];
    $dayprice = $myrow['price'];
    $DateVid = $myrow['DateVid']; 
    $DateVoz = $myrow['DateVoz']; 
    $dayVozFact = $myrow['dateFactVoz']; 
    echo"
      <tr>
        <td> $id</td>
        <td> $Lastname</td>
        <td> $Firstname</td>
        <td> $Fathername</td>
        <td> $DateVid</td>
        <td> $DateVoz</td>
        <td> $dayprice</td>
        ";
        $query = "SELECT * FROM `avto` WHERE idCar = '$idCar'";
        $res = mysqli_query($db, $query);
     while($myrowTwo= mysqli_fetch_array($res)){
        $mark = $myrowTwo['mark'];
        $class = $myrowTwo['model'];
        $number = $myrowTwo['number'];
        $zalog = $myrowTwo['zalog'];
            echo"
            <td> $mark</td>
            <td> $class</td>
            <td> $number</td>
            <td> $zalog</td>
            ";
           
         
 }
 echo"<td>";
 if($dayVozFact == ''){
  echo" <form action='updclient.php' method='post'>
  <input type='hidden' name='iduser' value='$id'>
  <button type='submit'>Закрыть сделку</button>
  </form>";
 }
 else{
     echo"$dayVozFact";
 }
echo"</td></tr>";
}}


  
 
    ?>
    
     </tbody>
  </table>
</body>
</html>