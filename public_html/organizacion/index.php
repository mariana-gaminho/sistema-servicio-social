<?php
require_once $_SERVER['DOCUMENT_ROOT']."/../private/model/Organizacion.php";

if (session_status() == PHP_SESSION_NONE ) {
    session_start();
}

if (null === $_SESSION['login_organizacion'] || !$_SESSION['login_organizacion']) {
    header('Location:/');
}

$o = new Organizacion();
$alumnos_organizacion = $o -> get_alumnos_proyectos($_SESSION['id_organizacion']);
$proyectos = $o->get_proyectos($_SESSION['id_organizacion']);
?>

<!DOCTYPE html>
<html>

<head>
    <title><?php echo $_SESSION['nombre_organizacion']; ?></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>

<h4>Bienvenido, <?php echo $_SESSION['nombre_organizacion']; ?></h4>

<div class="row">
    <div class="col-xs-12 col-md-7" id="proyectos_organizacion">
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
                    <div style="border-style: solid; min-height:50px">
                        ' . $proyecto['nombre'] . '
                        <a href="/organizacion/detalle_proyecto.php?id='. $proyecto['proyecto_id'] .'">
                        <input type="button" class="btn btn-success" style="float:right; margin:3px" value="Detalles">
                        </a>
                    </div>
                    ';
                }
            }
            echo '
                <a href="/organizacion/proyectos.php">
                <input type="button" class="btn btn-success" style="float:right; margin:3px" value="Ver todos">
                </a>
                <a href="/organizacion/registrar_proyecto.php">
                <input type="button" class="btn btn-success" style="float:right; margin:3px" value="Nuevo proyecto">
                </a>
            ';
            ?>
        </div>
    </div>

    <div class="col-xs-12 col-md-5" id="informacion_organizacion">
        <p>INFORMACIÓN</p>
        <div style="border-style: solid; min-height: 300px">
            <div style="border-style: solid">
                Organización: <?php echo $_SESSION['nombre_organizacion']; ?>
            </div>
            <div style="border-style: solid">
                Email: <?php echo $_SESSION['email_organizacion']; ?>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12" id="alumnos_organizacion">
        <p>ALUMNOS</p>
        <div style="border-style: solid; min-height: 300px">
            <!-- Aquí se imprimen los alumnos en proyectos de la organización -->
            <?php
                if ($alumnos_organizacion == 0) {
                    //No hay alumnos
                    echo 'No hay alumnos registrados';
                } else {
                    echo '
                        <div class="row">
                            <div class="col-5" style="border-style: solid">
                                Nombre del alumno
                            </div>
                            <div class="col-3" style="border-style: solid">
                                Email del alumno
                            </div>
                            <div class="col-4" style="border-style: solid">
                                Nombre del proyecto
                            </div>
                        </div>
                    ';
                    foreach ($alumnos_organizacion as $alumno) {
                        echo '
                            <div class="row">
                                <div class="col-5" style="border-style: solid">
                                    '. $alumno['alumno_nombre'] .'
                                </div>
                                <div class="col-3" style="border-style: solid">
                                    '. $alumno['alumno_email'] .'
                                </div>
                                <div class="col-4" style="border-style: solid">
                                    '. $alumno['proyecto_nombre'] .'
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