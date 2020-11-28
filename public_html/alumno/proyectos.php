<?php
if (session_status() == PHP_SESSION_NONE ) {
    session_start();
}

require_once $_SERVER['DOCUMENT_ROOT']."/../private/model/Alumno.php";
//require_once $_SERVER['DOCUMENT_ROOT']."/sistema-servicio-social/private/model/Alumno.php";
//require_once $_SERVER['DOCUMENT_ROOT']."/nanosoft_web/private/model/Alumno.php";

$a = new Alumno();

$proyectos = $a -> ver_proyecto();

?>

<!DOCTYPE html>
<html>
<head>
<title>Proyectos</title>
<meta charset="UTF-8">
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->

<style>
div.one {
  border-style: solid;
  border-color: black;
  border-radius: 25px;
  
}
</style>

</head>
<body>

<?php
    require ('./../admin/header.php');
    require ('navbar.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title> Detalles Proyecto</title>
    <link rel="shortcut icon" href="../img/icono-up.png" />
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin-style.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style-responsive.css">
</head>

<body>
<div class="container-fluid">
        <div class="text-center">
            <p style="padding-top:12px 5px; color:#9a171f; height: 50px; font-size: 24px;" >PROYECTOS ACTIVOS</p>
    
    <!-- Aquí se imprimen los alumnos en proyectos de la organización -->
    <?php
        if ($proyectos == 0) {
            //No hay alumnos
            echo 'No hay proyectos activos';
        } else {
        foreach ($proyectos as $proyecto) {
            echo '
            <div class="row justify-content-center" style="padding-bottom:15px;">
                <div class="card col-xs-12 col-md-5 ">
                    <div class="justify-content-center">
                        <div class="row">
                            <div class="col text-center">
                                <h3>'.$proyecto['Proyecto'] .'</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <p>Dias</p>
                                <p>'.$proyecto['dias'].'</p>
                            </div>
                            <div class="col-sm-2">
                                <p>Horas</p>
                                <p>'.$proyecto['horas'].'</p>
                            </div>
                            <div class="col-sm-3">
                                <p>Fechas</p>
                                <p>'.$proyecto['fechas'].'</p>
                            </div>
                            <div class="col-sm-4">
                                <p><b>Organización: </b>'.$proyecto['organizacion'].'</p>
                                <p><b>Correo: </b>'.$proyecto['email'].'</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <a href=crea_solicitud.php? id='.$proyecto['proyecto_id'].' class="btn btn-red btn-block">Solicitar</a>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            ';
            }
        }
    ?>
    </div>
</div>
</body>
</html>


<!--<h1>Hola</h1>
<h3>Los proyectos ativos son los siguientes</h3> -->



