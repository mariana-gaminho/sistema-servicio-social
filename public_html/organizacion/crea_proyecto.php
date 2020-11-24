<?php

require_once $_SERVER['DOCUMENT_ROOT']."/../private/model/Proyecto.php";
//require_once $_SERVER['DOCUMENT_ROOT']."/sistema-servicio-social/private/model/Proyecto.php";


if (session_status() == PHP_SESSION_NONE ) {
    session_start();
}

$nombre = $_POST['nombre_proyecto'];
$horas = $_POST['horas_proyecto'];
$dias = $_POST['dias_proyecto'];
$fechas = $_POST['fechas_proyecto'];
$descripcion = $_POST['descripcion_proyecto'];
$capacidad = $_POST['capacidad_proyecto'];

$p = new Proyecto();
$new_id = $p->registra_proyecto($nombre, $horas, $dias, $fechas, $descripcion, $capacidad);

if($new_id !== 0)
{
    header('location:/organizacion/detalle_proyecto.php?id='.$new_id);
}

?>