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
<link rel="shortcut icon" href="../img/icono-up.png" />
<link rel="stylesheet" href="../css/admin-style.css">
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
                <p style = "font-size:35px">Registrar nuevo proyecto</p>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-6 justify-content-center">
            <div class="d-flex justify-content-center" style="-webkit-box-shadow: -1px 1px 9px 5px rgba(0,0,0,0.15); -moz-box-shadow: -1px 1px 9px 5px rgba(0,0,0,0.15); box-shadow: -1px 1px 9px 5px rgba(0,0,0,0.15); border-radius: 25px; height: 60rem; padding: 20px;">
                <form name="form_registro_proyecto" action="/organizacion/crea_proyecto.php" onsubmit="return validate_form()" method="post">
                    <h2 class="text-center" >Introduce los datos de tu proyecto</h2>
                    <div class="col-md-12">
                        <label for="nombre_proyecto">Nombre del proyecto:</label><br>
                        <input class= "form-control" type="text" id="nombre_proyecto" name="nombre_proyecto">

                        <label for="horas_proyecto">Horas que da el proyecto:</label><br>
                        <input class= "form-control" type="text" id="horas_proyecto" name="horas_proyecto">

                        <label for="dias_proyecto">Días del proyecto:</label><br>
                        <input class= "form-control" type="text" id="dias_proyecto" name="dias_proyecto">

                        <label for="fechas_proyecto">Fechas del proyecto:</label><br>
                        <input class= "form-control" type="text" id="fechas_proyecto" name="fechas_proyecto">

                        <label for="descripcion_proyecto">Descripción del proyecto:</label><br>
                        <input class= "form-control" type="text" id="descripcion_proyecto" name="descripcion_proyecto">

                        <label for="capacidad_proyecto">Capacidad del proyecto:</label><br>
                        <input class= "form-control" type="text" id="capacidad_proyecto" name="capacidad_proyecto">

                        <br><span id="error_form" style="color:red;"></span><br><br>
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
    var formulario = document.forms['form_registro_proyecto'];
    var validado = true;
    if (formulario['nombre_proyecto'].value == "" ||
        formulario['horas_proyecto'].value == "" ||
        formulario['dias_proyecto'].value == "" ||
        formulario['fechas_proyecto'].value == "" ||
        formulario['fechas_proyecto'].value == "" ||
        formulario['capacidad_proyecto'].value == "") {
        document.getElementById('error_form').innerHTML = "Rellena todos los datos."
        validado = false;
    } 
    return validado;
}

</script>

</body>
</html>