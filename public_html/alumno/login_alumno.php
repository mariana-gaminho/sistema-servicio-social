<?php

require_once $_SERVER['DOCUMENT_ROOT']."/../private/model/Alumno.php";

$a = new Alumno();
$a->login_alumno();

if($_SESSION['login_alumno'])
{
    header('location:/alumno');
} else {
    header('location:/?Error=CredencialesIncorrectas');
}

?>