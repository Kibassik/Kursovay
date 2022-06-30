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
        <a class="nav-link" href="buhalter.php">Автомобили<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="otchet.php">Отчеты<span class="sr-only">(current)</span></a>
      </li>
      
    </ul>
  </div>
</nav>
<table class='table'>
    <thead>
      <tr>
      <th scope='col'>id</th>
        <th scope='col'>Класс</th>
        <th scope='col'>Марка</th>
        <th scope='col'>Модель</th>
        <th scope='col'>Госномера</th>
        <th scope='col'>Начальная стоимость</th>
        <th scope='col'>Пробег</th>

        <th scope='col'>Кол-во мест</th>
        <th scope='col'>Кол-во дверей</th>
        <th scope='col'>Кондиционер</th>
        <th scope='col'>Коробка передач</th>
        <th scope='col'>Залог</th>
        <th scope='col'></th>

        
      </tr>
    </thead>
    <tbody>
<?php 
include("db.php");

$sql = "SELECT * FROM `avto`;"; // Вывод всех машин для бухгалтера
 $result = mysqli_query($db, $sql);
 while($myrow= mysqli_fetch_array($result)){
  $idCar = $myrow['idCar'];
  $mark = $myrow['mark'];
  $model = $myrow['model'];
  $class = $myrow['class'];
  $number = $myrow['number'];
  $probeg = $myrow['probeg'];
  $zalog = $myrow['zalog'];
  $placeCount = $myrow['placeCount'];
  $doorCount = $myrow['doorCount'];
  $condic = $myrow['condic'];
  $box = $myrow['box'];
  $price = $myrow['price'];
    echo"
      <tr>
        <td> $idCar</td>
        <td> $class</td>
        <td> $mark</td>
        <td> $model</td>
        <td> $number</td>
        <td> $price</td>
        <td> $probeg</td>
        <td> $placeCount</td>
        <td> $doorCount</td>
        <td> $condic</td>
        <td> $box</td>
        <td> $zalog</td>
        ";
        $query = "SELECT * FROM `avto` WHERE idCar = '$idCar'";
        $res = mysqli_query($db, $query);
         
 }
 echo"<td>  ";
    ?>
    </tr>
     </tbody>
     <form  method="post">
     <tfoot>
     <td> <input type="text" name="idCar" id=""></td>
    <td> <input type="text" name="class" id=""></td>
    <td> <input type="text" name="mark" id=""></td>
    <td> <input type="text" name="model" id=""></td>
    <td> <input type="text" name="number" id=""></td>
    <td> <input type="text" name="price" id=""></td>
    <td> <input type="text" name="probeg" id=""></td>
    <td> <input type="text" name="placeCount" id=""></td>
    <td> <input type="text" name="doorCount" id=""></td>
    <td> <input type="text" name="condic" id=""></td>
    <td> <input type="text" name="box" id=""></td>
    <td> <input type="text" name="zalog" id=""></td>
    <td><button type="submit" name="sub" class="btn bn-primary">Добавить</button></td>
     </tfoot>
</form>
  </table>
<?php
if(ISSET($_POST['sub'])){ //Добавление новых машин
    include("db.php");
    
    $idCar = $_POST['idCar'];
    $mark = $_POST['mark'];
    $model = $_POST['model'];
    $class = $_POST['class'];
    $number = $_POST['number'];
    $probeg = $_POST['probeg'];
    $zalog = $_POST['zalog'];
    $placeCount = $_POST['placeCount'];
    $doorCount = $_POST['doorCount'];
    $condic = $_POST['condic'];
    $box = $_POST['box'];
    $price = $_POST['price'];

    $query = "INSERT INTO `avto`(`idCar`, `mark`, `model`, `class`, `placeCount`, `doorCount`, `number`, `condic`, `box`, `price`, `zalog`, `probeg`) VALUES ('$idCar', '$mark', '$model', '$class', '$placeCount', '$doorCount', '$number', '$condic', '$box', '$price', '$zalog', '$probeg')"; 
    $result = mysqli_query($db, $query);
    if($result == TRUE){
        echo"<script> document.location.href = 'buhalter.php'</script>";
    }
}
   
?>
</body>
</html>