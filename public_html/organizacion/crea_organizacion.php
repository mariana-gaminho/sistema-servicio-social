<?php

require_once $_SERVER['DOCUMENT_ROOT']."/../private/model/Organizacion.php";
//require_once $_SERVER['DOCUMENT_ROOT']."/sistema-servicio-social/private/model/Organizacion.php";

if (session_status() == PHP_SESSION_NONE ) {
    session_start();
}

$nombre = $_POST['nombre_organizacion'];
$email = $_POST['email_organizacion'];
$pwd = $_POST['pwd_organizacion'];

$o = new Organizacion();
$o->registra_organizacion($nombre, $email, $pwd);

if($_SESSION['login_organizacion'])
{
    header('location:/organizacion');
} else {
    header('location:/organizacion/inscripcion.php?Error=ErrorAlCrearOrganizacion');
}

?>