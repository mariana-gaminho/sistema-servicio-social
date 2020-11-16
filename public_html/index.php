<?php
//require_once "../private/model/Alumno.php";
if(!empty($_GET['Error']))//Quiere entrar un alumno
{
    echo $_GET['Error'];
}



//echo "Hello!";

//$a = new Alumno();

//$a -> print_alumnos();

?>

<!DOCTYPE html>
<html>
<head>
<title>Servicio social</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>

<h4>Ingrese al sitio que pertenece</h4>
<div class="row">
    <div class="col-6">
        <form action="/alumno/login_alumno.php" method="post">
            <h2>Alumno</h2>
            <label for="email_alumno">Correo electrónico:</label><br>
            <input type="text" id="email_alumno" name="email_alumno"><br>
            <label for="pwd_alumno">Contraseña:</label><br>
            <input type="password" id="pwd_alumno" name="pwd_alumno">
            <button type="submit" class="btn btn-success">Login</button>
        </form>    
    </div>
    <div class="col-6">
        <form action="/organizacion/login_organizacion.php" method="post">
            <h2>Organización</h2>
            <label for="email_organizacion">Correo electrónico:</label><br>
            <input type="text" id="email_organizacion" name="email_organizacion"><br>
            <label for="pwd_organizacion">Contraseña:</label><br>
            <input type="password" id="pwd_organizacion" name="pwd_organizacion"> 
            <button type="submit" class="btn btn-success">Login</button> 
        </form>   
    </div>
  </div>

</body>
</html>