
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
 include("db.php"); // Просто вывод выбранной машины
 $idCar = $_POST['idCar'];
 $sql = "SELECT * FROM `avto` WHERE idCar = '$idCar';";
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
  $price = $myrow['price'];
   echo"<div class = 'col-sm-12 col-md-6 col-lg-6' >
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
  
 </section>
 </section>
 </div>
   ";
 };
 ?>
 <div class = 'col-sm-12 col-md-6 col-lg-6' >
 <?php // Форма для заполнения информации клиента
 echo"
 <form method='POST'>
 <section class='activity-tracker__menu'>
 <div class='activity-tracker__owner'>
   <img src='./img/profile/image-jeremy.png' alt='' class='activity-tracker__owner-img'>
   <div class='activity-tracker__owner-container'>
     <h1 class='activity-tracker__owner-name'>Оформление проката</h1>
     <label for='' class='lab'>Фамилия</label>
     <input type='text' class='labinpt' name='Lastname'/>
     <label for='' class='lab'>Имя</label>
     <input type='text' class='labinpt' name='Firstname'/>
     <label for='' class='lab'>Отчество</label>
     <input type='text' class='labinpt' name='Fathername'/>
     <label for='' class='lab'>Номер паспорта</label>
     <input type='text' class='labinpt' name='Passport'/>
     <label for='' class='lab' >Номер водительских прав</label>
     <input type='text' class='labinpt' name='Avtopassport'/>
     <label for='' class='lab'>Сведетельство</label>
     <input type='text' class='labinpt' name='SvedProkat'/>
     <label for='' class='lab'>Количество дней</label>
     <input type='text' class='labinpt' name='day'/>
   </div>
   <div class='activity-tracker__options'>
   <input type='hidden' name='price' value='$price'/>
   <input type='hidden' name='idCar' value='$idCar'/>
   <button type='submit' formaction='processing.php' class='activity-tracker__option' data-option='monthly'>
     Оформить
   </button>
   </div>
 </div>
</section>
</form>";
 ?>
 </div>

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