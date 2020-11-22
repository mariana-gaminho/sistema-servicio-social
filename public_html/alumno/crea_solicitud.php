<?php
if (session_status() == PHP_SESSION_NONE ) {
    session_start();
}

require_once $_SERVER['DOCUMENT_ROOT']."/../private/model/Alumno.php";


$a = new Alumno();

if(!empty($_GET['id']))
{
    $Estado = $a -> CrearSolicitud($_GET['id'],$_SESSION['id_alumno']);
}

if($Estado)
{
    header('location:aplicaciones.php');
} else {
    header('location:aplicaciones.php?Error=Limite-de-aplicaciones');
}