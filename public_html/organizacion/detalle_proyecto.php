<?php
require_once $_SERVER['DOCUMENT_ROOT']."/../private/model/Proyecto.php";

if (session_status() == PHP_SESSION_NONE ) {
    session_start();
}

$proyecto_valido = false;

if (isset($_GET['id']) && isset($_SESSION['login_organizacion']) && $_SESSION['login_organizacion']) {
    $id_proyecto = $_GET['id'];
    $p = new Proyecto();
    $proyecto_valido = $p->valida_proyecto_organizacion($id_proyecto, $_SESSION['id_organizacion']);
}

if (!$proyecto_valido) {
    //El usuario no tiene acceso a este archivo
    header('Location:/organizacion');
}

$proyecto = $p->get_proyecto($id_proyecto);
$alumnos = $p->get_alumnos_proyecto($id_proyecto);
?>

<!DOCTYPE html>
<html>

<head>
    <title><?php echo $_SESSION['nombre_organizacion']. '-' .$proyecto['nombre']; ?></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>

<h4>Detalles del proyecto <?php echo $proyecto['nombre']; ?></h4>

<div class="row">
    <div class="col-xs-12 col-md-5" id="info_proyecto">
        <p>INFORMACIÓN</p>
        <p>Nombre: <?php echo $proyecto['nombre']; ?></p>
        <p>Horas que da el proyecto: <?php echo $proyecto['horas']; ?></p>
        <p>Días: <?php echo $proyecto['dias']; ?></p>
        <p>Fechas: <?php echo $proyecto['fechas']; ?></p>
    </div>

    <div class="col-xs-12 col-md-7" id="alumnos_proyecto">
        <p>ALUMNOS</p>
        <div style="border-style: solid; min-height: 300px">
            <!-- Aquí se imprimen los alumnos en proyectos de la organización -->
            <?php
                if ($alumnos == 0) {
                    //No hay alumnos
                    echo 'No hay alumnos registrados';
                } else {
                    echo '
                        <div class="row">
                            <div class="col-6" style="border-style: solid">
                                Nombre del alumno
                            </div>
                            <div class="col-6" style="border-style: solid">
                                Email del alumno
                            </div>
                        </div>
                    ';
                    foreach ($alumnos as $alumno) {
                        echo '
                            <div class="row">
                                <div class="col-6" style="border-style: solid">
                                    '. $alumno['nombre'] .'
                                </div>
                                <div class="col-6" style="border-style: solid">
                                    '. $alumno['email'] .'
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