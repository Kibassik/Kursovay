
<?php
session_start();
?>
<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <link rel='icon' type='img/png' sizes='32x32' href='./img/profile/favicon-32x32.png'>
  <link rel='stylesheet' href='css/reset.css'>
  <link rel='stylesheet' href='assets/css/teams.css'>
  <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='assets/css/bootstrap.css'>
  <title>Автомобили</title>
</head>

<body>

<div class='container'>
  <div class='row'>



<?php
 include("db.php");

 $sql = "SELECT * FROM `avto`;"; // Вывод всех машин из БД
 $result = mysqli_query($db, $sql);
 while($myrow= mysqli_fetch_array($result)){
  $idCar = $myrow['idCar'];
  $mark = $myrow['mark'];
  $model = $myrow['model'];
  $class = $myrow['class'];
  $placeCount = $myrow['placeCount'];
  $doorCount = $myrow['doorCount'];
  $condic = $myrow['condic'];
  $box = $myrow['box'];
  $price = $myrow['price']; //Форма стилизованная в teams.css
   echo"<div class = 'col-sm-12 col-md-4 col-lg-4' > 
   <section class='activity-tracker__menu'>
   <div class='activity-tracker__owner'>
     <img src='./img/profile/image-jeremy.png' alt='' class='activity-tracker__owner-img'>
     <div class='activity-tracker__owner-container'>
       <h1 class='activity-tracker__owner-name'>Марка: $mark</h1>
       <p class='activity-tracker__owner-for'>Модель: $model</p>
       <p class='activity-tracker__owner-for'>Класс: $class</p>
       <p class='activity-tracker__owner-for'>Количество мест: $placeCount</p>
       <p class='activity-tracker__owner-for'>Кол-во дверей: $doorCount</p>
       <p class='activity-tracker__owner-for'>Кондиционер: $condic</p>
       <p class='activity-tracker__owner-for'>Коробка: $box</p>
       <p class='activity-tracker__owner-for'>Цена в день: $price руб</p>
     </div>
   </div>
   <div class='activity-tracker__options'>
   <form method='post'>
     <button type='submit' formaction='Oform.php' class='activity-tracker__option' data-option='monthly'>
       Арендовать
     </button>
     <input type='hidden' name='idCar' value='".$myrow['idCar']."'></form>
   </div>
 </section>
 </section>
 </div>
   ";
 };
 ?>

</div>
</div>




</div>
</div>


    
    



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->

 </body>

</html>