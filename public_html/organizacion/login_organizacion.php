<?php

require_once $_SERVER['DOCUMENT_ROOT']."/../private/model/Organizacion.php";
//require_once $_SERVER['DOCUMENT_ROOT']."/sistema-servicio-social/private/model/Organizacion.php";

if (session_status() == PHP_SESSION_NONE ) {
    session_start();
}

$o = new Organizacion();
$o->login_organizacion();

if($_SESSION['login_organizacion'])
{
    header('location:/organizacion');
} else {
    header('location:/?Error=CredencialesIncorrectas');
}

?>