<?php
if (session_status() == PHP_SESSION_NONE ) {
    session_start();
}

require_once $_SERVER['DOCUMENT_ROOT']."/../private/model/Alumno.php";
//require_once $_SERVER['DOCUMENT_ROOT']."/sistema-servicio-social/private/model/Alumno.php";
// require_once $_SERVER['DOCUMENT_ROOT']."/nanosoft_web/private/model/Alumno.php";

$a = new Alumno();

if(!empty($_GET['Error']))
{
    //$a -> echo 'Error'
}
$alumno = $a -> ver_aplicacion($_SESSION['id_alumno']);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Aplicaciones</title>
    <link rel="shortcut icon" href="../img/icono-up.png" />
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="./../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/admin-style.css">
    <style>
        div.one {
        border-style: solid;
        border-color: black;
        border-radius: 25px;
        
        }
        </style>
</head>

<?php
    require ('./../admin/header.php');
?>
<?php
    require ('navbar.php');
?>

<body>
<div class="container-fluid">
        <div class="text-center">
            <p style="padding-top:12px 5px; color:#9a171f; height: 50px; font-size: 24px;" >STATUS DE TUS APLICACIONES</p>
<!--$alumno !== null && count($alumno)>0 -->
<?php

if($alumno !== null && count($alumno)>0)
{
    foreach ($alumno as $alumnos)
    {
        echo '
        <div class="row justify-content-center" style="padding-bottom:15px;">
                <div class="card col-xs-12 col-md-5 ">
                    <div class="justify-content-center">
                        <div class="row">
                            <div class="col text-center">
                                <h3>'.$alumnos['Proyecto'] .'</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <i class="fa fa-sitemap" style="color:#9a171f; font-size: 6em;"></i> <br>
                                <strong style="color:#7d7f81; font-size: 18px;">'.$alumnos['Organizacion'].'</strong>
                                <p style="font-size: 12px;">Organizacion</p>
                            </div>
                            <div class="col-sm-3">
                                <i class="fa fa-clock-o" style="color:#9a171f; font-size: 6em;"></i><br>
                                <strong style="color:#7d7f81; font-size: 18px;">'.$alumnos['horas'].'</strong>
                                <p style="font-size: 12px;">Horas</p>
                            </div>
                            <div class="col-sm-3">
                                <i class="fa fa-calendar" style="color:#9a171f; font-size: 6em;"></i><br>
                                <strong style="color:#7d7f81; font-size: 18px;">'.$alumnos['fechas'].'</strong>
                                <p style="font-size: 12px;">Fechas</p>
                            </div>
                            <div class="col-sm-3">
                                <i class="fa fa-sun-o" style="color:#9a171f; font-size: 6em;"></i><br>
                                <strong style="color:#7d7f81; font-size: 18px;">'.$alumnos['dias'].'</strong>
                                <p style="font-size: 12px;">Dias</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p><b>Status:</b></p>
                                <p style="color:#FFFFFF; background-color: #9a171f; height: 40px; font-size: 24px;"> '.$alumnos['estatus'].'</p>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ';
    }
}
else{
    $alumno = $a -> get_nombre();
    echo '
    <div class="text-center">
        <i class="fa fa-frown-o" aria-hidden="true" style="font-size: 25em;"></i>
        <h1>¡ '.$alumno[0]['nombre'].' !</h1>
        <h3>Parece que no tienes solicitudes activas, ve a proyectos para hacer una solicitud</h3>

        <div class="row">
            <div class="col">
                <a href=proyectos.php>Ir a Proyectos</a>
                <br>
            </div>
        </div>

    </div>
    ';
}
?>

</div>
</div>
</body>
<html>