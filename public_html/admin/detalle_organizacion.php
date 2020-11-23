<?php
require_once $_SERVER['DOCUMENT_ROOT']."/../private/model/Admin.php";

if (session_status() == PHP_SESSION_NONE ) {
    session_start();
}

if (isset($_GET['id']) && isset($_SESSION['login_admin']) && $_SESSION['login_admin']) {
    $id_organizacion = $_GET['id'];
    $o = new Admin();
} else {
    header('Location:/admin/resumen_organizaciones.php');
}

$org = $o->get_organizacion($id_organizacion);
$proy = $o->get_proyectos($id_organizacion);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Detalles Organizacion</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>

<div class="row">
    <div class="col-xs-12 col-md-5" id="informacion_organizacion">
        <p>INFORMACIÓN</p>
            <div>
                Organización: <?php echo $org['nombre']; ?>
            </div>
            <div>
                Email: <?php echo $org['email']; ?>
            </div>
        <p>PROYECTOS</p>
            <?php
            if ($proy == 0) {
                echo 'No hay proyectos registrados';
            } else {
                foreach ($proy as $proyecto) {
                    echo '
                    <div style="border-style: solid; min-height:50px">
                        ' . $proyecto['nombre'] . '
                        <a href="/admin/detalle_proyecto.php?id='. $proyecto['proyecto_id'] .'">
                        <input type="button" class="btn btn-success" style="float:right; margin:3px" value="Detalles">
                        </a>
                    </div>
                    ';
                }
            }
            ?>
    </div>
</div>
</body>