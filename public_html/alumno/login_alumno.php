<?php

require_once $_SERVER['DOCUMENT_ROOT']."/../private/model/Alumno.php";
//require_once $_SERVER['DOCUMENT_ROOT']."/sistema-servicio-social/private/model/Alumno.php";
// require_once $_SERVER['DOCUMENT_ROOT']."/nanosoft_web/private/model/Alumno.php";

if (session_status() == PHP_SESSION_NONE ) {
    session_start();
}

$a = new Alumno();
$a->login_alumno();

if($_SESSION['login_alumno'])
{
    header('location:/alumno/aplicaciones.php');
} else {
    header('location:/?Error=CredencialesIncorrectas');
}

?>