<?php
require_once $_SERVER['DOCUMENT_ROOT']."/../private/model/Admin.php";
//require_once $_SERVER['DOCUMENT_ROOT']."/nanosoft_web/private/model/Admin.php";

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
                    <a href="resumen_organizaciones.php">
                        <button
                            type="button"
                            class="btn btn-red"
                            style="float:right; margin:3px; font-size: 17px;"
                        >
                            <img class="flecha-atras" src="../img/flecha.png" alt="go back">
                        </button>
                    </a>
                    <h3 style="color: #a52b20; font-weight: bold; margin-left: 5px; margin-bottom: 5px;">
                        INFORMACIÓN DE ORGANIZACIÓN
                    </h3>
                </div>
                <div style="border-bottom: 1px dashed; margin-top: 10px;">
                    <b>Organización: </b><label><?php echo $org['nombre'];   ?></label>
                </div>
                <div style="border-bottom: 1px dashed; margin-top: 10px;">
                    <b>Email: </b><label><?php echo $org['email']; ?></label>
                </div>
                <h6
                    style="margin-top: 10px; font-weight: bold;"
                >
                    PROYECTOS
                </h6>
                <?php
                if ($proy == 0) {
                    echo 'No hay proyectos registrados';
                } else {
                    foreach ($proy as $proyecto) {
                        echo '
                        <div style="border: 1.5px solid; min-height:50px; margin-bottom: 3px; padding: 5px;">
                            ' . $proyecto['nombre'] . '
                            <a href="/admin/detalle_proyecto.php?id='. $proyecto['proyecto_id'] .'&org='. $org['organizacion_id'] .'">
                                <input type="button" class="btn btn-red" style="float:right; margin:3px; font-size: 14px;" value="Detalles">
                            </a>
                        </div>
                        ';
                    }
                }
                ?>
            </div>                
        </div>
    </div>
    <?php
        require ('./footer.php');
    ?>
</body>
<!-- <a href="/admin/detalle_proyecto.php?id='. $proyecto['proyecto_id'] .'"> -->