<?php

if(!empty($_GET['Error']))
{
    echo $_GET['Error'];
}

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


<?php
    require ('./../admin/header.php');
    require ('navbar-organizaciones.php');
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="text-center">
                <br><br>
                <p style = "font-size:35px">Inscripción de organización</p>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="d-flex justify-content-center" style="-webkit-box-shadow: -1px 1px 9px 5px rgba(0,0,0,0.15); -moz-box-shadow: -1px 1px 9px 5px rgba(0,0,0,0.15); box-shadow: -1px 1px 9px 5px rgba(0,0,0,0.15); border-radius: 25px; height: 53rem; padding: 20px;">
                <form name="form_registro" action="/organizacion/crea_organizacion.php" onsubmit="return validate_form()" method="post">
                    <h2 class="text-center">Introduce los datos de tu organización</h2>
                    <div class="col-md-12">
                        <label for="nombre_organizacion">Nombre de organización:</label><br>
                        <input class= "form-control" type="text" id="nombre_organizacion" name="nombre_organizacion">
                        <span id="error_nombre_organizacion" style="color:red;"></span><br>
                        <label for="email_organizacion">Correo electrónico:</label><br>
                        <input class= "form-control" type="text" id="email_organizacion" name="email_organizacion">
                        <span id="error_email_organizacion" style="color:red;"></span><br>
                        <label for="pwd_organizacion">Contraseña:</label><br>
                        <input class= "form-control" type="password" id="pwd_organizacion" name="pwd_organizacion">
                        <span id="error_pwd_organizacion" style="color:red;"></span><br>
                        <label for="pwd_organizacion_verify">Repite tu contraseña:</label><br>
                        <input class= "form-control" type="password" id="pwd_organizacion_verify" name="pwd_organizacion_verify">
                        <span id="error_pwd_organizacion_verify" style="color:red;"></span><br><br>
                        <div class="col text-center">
                            <button type="submit" class="btn btn-success btn-block">Registrar</button>
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
    
</div>

<script>

function validate_form() {
    var formulario = document.forms['form_registro'];
    var validado = true;
    if (formulario['nombre_organizacion'].value == "") {
        document.getElementById('error_nombre_organizacion').innerHTML = "Debes introducir el nombre de tu organización."
        validado = false;
    } else {
        document.getElementById('error_nombre_organizacion').innerHTML = ""
    }
    if (formulario['email_organizacion'].value == "") {
        validado = false;
        document.getElementById('error_email_organizacion').innerHTML = "Debes introducir el email de tu organización."
    } else {
        document.getElementById('error_email_organizacion').innerHTML = ""
    }
    if (formulario['pwd_organizacion'].value == "") {
        validado = false;
        document.getElementById('error_pwd_organizacion').innerHTML = "Debes introducir una contraseña."
    } else {
        document.getElementById('error_pwd_organizacion').innerHTML = ""
    }
    if (formulario['pwd_organizacion_verify'].value == "") {
        validado = false;
        document.getElementById('error_pwd_organizacion_verify').innerHTML = "Debes verificar tu contraseña."
    } else {
        document.getElementById('error_pwd_organizacion_verify').innerHTML = ""
    }
    if (formulario['pwd_organizacion_verify'].value != formulario['pwd_organizacion'].value) {
        validado = false;
        document.getElementById('error_pwd_organizacion_verify').innerHTML = "Las contraseñas no coinciden."
    }
    return validado;
}

</script>

</body>
</html>