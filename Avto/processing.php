<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/Oform.css">
    <title>Принято</title>
</head>
<body>
    
    <?php
    $idCar = $_POST['idCar']; // Обработка заказа, Внесение заказа и клиента в бд
    $Lastname = $_POST['Lastname'];
    $Firstname = $_POST['Firstname'];
    $Fathername = $_POST['Fathername'];
    $Passport = $_POST['Passport'];
    $Avtopassport = $_POST['Avtopassport'];
    $Sved = $_POST['SvedProkat'];
    $dayprice = $_POST['price'];
    $day = $_POST['day'];
    $price = $dayprice*$day;

    $DateVid = date("Y-m-d");

    $DateVoz = date("Y-m-d", time() + (86400 * intval($day)));
   

    include("db.php");
    $query = "INSERT INTO  `client` (idCar,Lastname,Firstname,Fathername,Passport,AvtoPassport,svedProkat,DateVid,DateVoz,price) VALUES ('$idCar', '$Lastname', '$Firstname', '$Fathername','$Passport', '$Avtopassport','$Sved', '$DateVid', '$DateVoz', '$price')"; 
    $result = mysqli_query($db, $query);
    if($result == TRUE){
      echo "
      <div class='oformCont'>
        <h1>Принято</h1>
        <p>
            Приезжайте на адресс:<br/>Михалковская 63
        </p>
        <p>
            Забирайте свою машину
        </p>
    </div>
      ";
    }
    else{
    
  }
    ?>
    
</body>
</html>