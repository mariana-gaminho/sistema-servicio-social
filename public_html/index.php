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
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
div.one {
  border-style: solid;
  border-color: black;
  border-radius: 25px;
  padding: 20px;
}
</style>

</head>
<body>


<h3 style="padding:12px 5px; color:#FFFFFF;vertical-align: middle; height: 50px; background-color: #0E5184">Servicio Social</h3>


<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="text-center">
                <br><br>
                <p style = "font-size:35px">Bienvenido al Servicio Social</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="one d-flex justify-content-center">
                <form action="/alumno/login_alumno.php" method="post">
                    <h2 class="text-center" >Alumno</h2>
                    <div class="col-md-12">
                        <img src="./img/students.jpeg" class="img-responsive img-rounded"><br><br>
                    </div>
                    <div class="col-md-12">
                        <label for="email_alumno">Correo electrónico:</label><br>
                        <input class= "form-control" type="text" id="email_alumno" name="email_alumno"><br>
                        <label for="pwd_alumno">Contraseña:</label><br>
                        <input class= "form-control" type="password" id="pwd_alumno" name="pwd_alumno"><br><br>
                        <div class="col text-center">
                            <button type="submit" class="btn btn-success btn-block">Login</button>
                        </div>
                    </div>
                </form>
            </div>  
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class=" one d-flex justify-content-center">
                <form action="/organizacion/login_organizacion.php" method="post">
                    <h2 class="text-center">Organización</h2>
                    <div class="col-md-12">
                        <img src="./img/organization.jpg" class="img-responsive img-rounded"><br><br>
                    </div>
                    <div class="col-md-12">
                        <label for="email_organizacion">Correo electrónico:</label><br>
                        <input class= "form-control" type="text" id="email_organizacion" name="email_organizacion"><br>
                        <label for="pwd_organizacion">Contraseña:</label><br>
                        <input class= "form-control" type="password" id="pwd_organizacion" name="pwd_organizacion"> <br><br>
                        <div class="col text-center">
                            <button type="submit" class="btn btn-success btn-block">Login</button> 
                        </div> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<br><br>
<div class="clearfix">
</div>
<br><br>

<div  style="padding-top:15px; height: 100px; color:#FFFFFF; background-color:#0E5184; overflow:auto; display:block; border-radius:5px;">
    <div class="col-md-3">
        <p>
            Derechos Reservados<br>
            CENTROS CULTURALES DE MEXICO A.C.<br>
            Aviso de privacidad<br>
        </p>
    </div>
    <div class="col-md-3">
        <p>
            Derechos Reservados<br>
            CENTROS CULTURALES DE MEXICO A.C.<br>
            Aviso de privacidad<br>
        </p>
    </div>
    <div class="col-md-3">
        <p>
            Derechos Reservados<br>
            CENTROS CULTURALES DE MEXICO A.C.<br>
            Aviso de privacidad<br>
        </p>
    </div>
    <div class="col-md-3">
        <p>
            Derechos Reservados<br>
            CENTROS CULTURALES DE MEXICO A.C.<br>
            Aviso de privacidad<br>
        </p>
    </div>
</div>


</body>
</html>