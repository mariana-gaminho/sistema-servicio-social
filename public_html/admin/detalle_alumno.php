<?php
require_once $_SERVER['DOCUMENT_ROOT']."/../private/model/Admin.php";
// require_once $_SERVER['DOCUMENT_ROOT']."/nanosoft_web/private/model/Admin.php";

if (session_status() == PHP_SESSION_NONE ) {
    session_start();
}

if (isset($_GET['id']) && isset($_SESSION['login_admin']) && $_SESSION['login_admin']) {
    $id_alumno = $_GET['id'];
    $a = new Admin();
} else {
    header('Location:/admin/resumen_alumnos.php');
}

$alumno = $a->get_alumno($id_alumno);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Detalles Alumno</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>

<div class="row">
    <div class="col-xs-12 col-md-5" id="informacion_organizacion">
        <p>INFORMACIÓN</p>
            <div>
                Nombre: <?php echo $alumno['nombre']; ?>
            </div>
            <div>
                Email: <?php echo $alumno['email']; ?>
            </div>
            <div>
                Semestre: <?php echo $alumno['semestre']; ?>
            </div>
            <div>
                Horas: <?php echo $alumno['horas']; ?>
            </div>
            <div>
                Cedula: <?php echo $alumno['cedula']; ?>
            </div>
    </div>
</div>