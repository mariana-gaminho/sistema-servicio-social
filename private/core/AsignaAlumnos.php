<?php

require_once $_SERVER['DOCUMENT_ROOT']."/../private/model/Asignacion.php";
// require_once $_SERVER['DOCUMENT_ROOT']."/nanosoft_web/private/model/Asignacion.php";

$obj = new Asignacion();

//Esta función regresa todos los alumnos que tienen aplicaciones activas
//En el orden establecido
$alumnos = $obj->getAlumnos();

foreach ($alumnos as $alumno) {
    $aplicaciones = $obj->getAplicaciones($alumno['alumno_id']);
    $asignado = 0;
    foreach ($aplicaciones as $aplicacion) {
        if ($asignado == 0) {
            $proyecto_id = $aplicacion['proyecto_id'];
            $cupo_disponible = $obj->getCupoDisponible($proyecto_id);
            if ($cupo_disponible > 0) {
                //Esta función debe marcar el estatus de la aplicación como ACEPTADA y agregar el id del proyecto al alumno
                $obj->aceptarAplicacion($aplicacion['aplicacion_id'], $proyecto_id, $alumno['alumno_id']);
                $asignado = 1; 
            } else {
                //Esta función debe marcar el estatus de la aplicación como RECHAZADA
                $obj->rechazarAplicacion($aplicacion['aplicacion_id']);
            }
        } else {
            //Esta función debe marcar el estatus de la aplicación como RECHAZADA
            $obj->rechazarAplicacion($aplicacion['aplicacion_id']);
        }
    }
}

?>