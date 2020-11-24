<?php
require_once $_SERVER['DOCUMENT_ROOT']."/../private/model/Admin.php";
// require_once $_SERVER['DOCUMENT_ROOT']."/nanosoft_web/private/model/Admin.php";

if (session_status() == PHP_SESSION_NONE ) {
    session_start();
}

if (isset($_GET['id']) && isset($_SESSION['login_admin']) && $_SESSION['login_admin']) {
    $id_proyecto = $_GET['id'];
    if(isset($_GET['org'])) {
        $id_organizacion = $_GET['org'];
    }
    $a = new Admin();
} else {
    header('Location:/admin/resumen_proyectos.php');
}

$proyecto = $a->get_proyecto($id_proyecto);
$alumnos = $a->get_alumnos_proyecto($id_proyecto);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Detalles Proyecto</title>
    <!-- Icon -->
    <link rel="shortcut icon" href="../img/icono-up.png" />
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
<?php
        require ('./header.php');
    ?>
    <div class="container"> 
        <div class="row d-flex justify-content-center" style="padding-top:30px;">
            <div class="col-md-6 card" id="informacion_organizacion">
                <div class="d-flex align-items-end flex-wrap" style="margin-bottom: 10px;">
                    <?php
                    if($id_organizacion != null) {
                        echo '<a href="/admin/detalle_organizacion.php?id='. $id_organizacion .'">
                        <button
                            type="button"
                            class="btn btn-red"
                            style="float:right; margin:3px; font-size: 17px;"
                        >
                            <img class="flecha-atras" src="../img/flecha.png" alt="go back">
                        </button>
                        </a>';
                    } else {
                        echo '<a href="/admin/resumen_proyectos.php">
                        <button
                            type="button"
                            class="btn btn-red"
                            style="float:right; margin:3px; font-size: 17px;"
                        >
                            <img class="flecha-atras" src="../img/flecha.png" alt="go back">
                        </button>
                        </a>';
                    }
                    ?>
                    <h3 style="color: #a52b20; font-weight: bold; margin-left: 5px; margin-bottom: 5px;">
                        INFORMACIÓN DEL PROYECTO
                    </h3>
                </div>
                <div style="border-bottom: 1px dashed; margin-top: 10px;">
                    <b>Nombre: </b><label><?php echo $proyecto['nombre']; ?></label>
                </div>
                <div style="border-bottom: 1px dashed; margin-top: 10px;">
                    <b>Horas que da el proyecto: </b><label><?php echo $proyecto['horas']; ?></label>
                </div>
                <div style="border-bottom: 1px dashed; margin-top: 10px;">
                    <b>Días: </b><label><?php echo $proyecto['dias']; ?></label>
                </div>
                <div style="border-bottom: 1px dashed; margin-top: 10px;">
                    <b>Fechas: </b><label><?php echo $proyecto['fechas']; ?></label>
                </div>
                <h6
                    style="margin-top: 10px; font-weight: bold;"
                >
                    ALUMNOS
                </h6>
                <div style="overflow:auto;">
                <?php
                    if ($alumnos == 0) {
                        //No hay alumnos
                        echo 'No hay alumnos registrados';
                    } else {
                        echo '
                            <div class="d-flex">
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
                                <div class="d-flex">
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
    </div>
    <?php
        require ('./footer.php');
    ?>
</body>
</html>