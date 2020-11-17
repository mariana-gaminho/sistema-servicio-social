<?php
require_once $_SERVER['DOCUMENT_ROOT']."/../private/model/Organizacion.php";

if (session_status() == PHP_SESSION_NONE ) {
    session_start();
}

if (null === $_SESSION['login_organizacion'] || !$_SESSION['login_organizacion']) {
    header('Location:/');
}

$o = new Organizacion();
$proyectos = $o->get_proyectos($_SESSION['id_organizacion']);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Proyectos de <?php echo $_SESSION['nombre_organizacion']; ?></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>

<h4>Proyectos</h4>

<div class="row">
    <div class="col-12" id="proyectos_organizacion">
        <p>PROYECTOS</p>
        <div style="border-style: solid; min-height: 300px">
            <!-- Aquí se imprimen los proyectos de la organización -->
            <?php
            if ($proyectos == 0) {
                //No hay proyectos
                echo 'No hay proyectos registrados';
            } else {
                
                foreach ($proyectos as $proyecto) {
                    echo '
                        <div class="row" style="border-style: solid;">
                            <div class="col-xs-12 col-md-4">
                            ' . $proyecto['nombre'] . '
                            </div>
                            <div class="col-xs-6 col-md-2">
                            ' . $proyecto['horas'] . ' horas
                            </div>
                            <div class="col-xs-6 col-md-2">
                            Días: ' . $proyecto['dias'] . '
                            </div>
                            <div class="col-xs-12 col-md-2">
                            Fechas: ' . $proyecto['fechas'] . '
                            </div>
                            <div class="col-xs-12 col-md-2">
                                <a href="/organizacion/detalle_proyecto.php?id='. $proyecto['proyecto_id'] .'">
                                <input type="button" class="btn btn-success" style="margin:3px" value="Detalles">
                                </a>
                            </div>
                        </div>
                    ';
                    
                }
            }
            ?>
        </div>
    </div>
</div>

</body>
</html>