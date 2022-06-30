<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <title>Login</title>
</head>
<body>
<nav class="navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="color: #A714ED;"> 
    <span>C</span>arserving
    </a>
  </div>
</nav>

<form method="POST" class="d-flex justify-content-center container">
<div class="card-body">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" name="nameIn" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="passIn" id="exampleInputPassword1" placeholder="Password">
  </div>
 
  <button type="submit" name="signin" class="btn btn-primary">Вход</button>
</div>

</form>

<script src="js/alert.js"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular.min.js'></script>

    
</html>
<?php 
if(ISSET($_POST['signin'])){ // скрипт авторизации
        $name = $_POST['nameIn'];
        $passw = $_POST['passIn'];
     
        if(empty($name) or empty($passw)){
            exit("Вы ввели не всю информацию");
        }
        include("db.php");
  $query = "SELECT * FROM `users` WHERE username='$name'";
  $result = mysqli_query($db, $query);
  $myrow = mysqli_fetch_array($result);
  var_dump($passw);
  if(empty($myrow['username'])){
      exit("Извините, пользователь с таким логином/email не зарегистрирован");
  }
  else{
      if ($myrow['password']==$passw){
          $_SESSION['username'] =$myrow['username'];
          $_SESSION['id'] =$myrow['id'];

          if($name == "manager"){
            echo"<script> document.location.href = 'manager.php'</script>";
          }
          else{
            echo"<script> document.location.href = 'buhalter.php'</script>";
          }
         
      }
      else{
          exit("Пароль неверный");
      }
  }
}
?>



