<?php
require_once $_SERVER['DOCUMENT_ROOT']."/../private/model/Admin.php";
//require_once $_SERVER['DOCUMENT_ROOT']."/nanosoft_web/private/model/Admin.php";

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
    <!-- Icon -->
    <link rel="shortcut icon" href="../img/icono-up.png" />
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin-style.css">
</head>

<body>
    <?php
        require ('./header.php');
    ?>
    <div class="container"> 
        <div class="row d-flex justify-content-center" style="padding-top:30px;">
            <div class="col-md-6 card" id="detalle-alumno">
                <div class="d-flex align-items-end flex-wrap" style="margin-bottom: 10px;">
                    <a href="resumen_alumnos.php">
                        <button
                            type="button"
                            class="btn btn-red"
                            style="float:right; margin:3px; font-size: 17px;"
                        >
                            <img class="flecha-atras" src="../img/flecha.png" alt="go back">
                        </button>
                    </a>
                    <h3 style="color: #a52b20; font-weight: bold; margin-left: 5px; margin-bottom: 5px;">
                        INFORMACIÓN DE ALUMNO
                    </h3>
                </div>
                <div style="border-bottom: 1px dashed; margin-top: 10px;">
                    <b>Nombre: </b><p><?php echo $alumno['nombre']; ?></p>
                </div>
                <div style="border-bottom: 1px dashed; margin-top: 10px;">
                    <b>Email: </b><p><?php echo $alumno['email']; ?></p>
                </div>
                <div style="border-bottom: 1px dashed; margin-top: 10px;">
                    <b>Semestre: </b><p><?php echo $alumno['semestre']; ?></p>
                </div>
                <div style="border-bottom: 1px dashed; margin-top: 10px;">
                    <b>Horas: </b><p><?php echo $alumno['horas']; ?></p>
                </div>
                <div style="border-bottom: 1px dashed; margin-top: 10px;">
                    <b>Cedula: </b><p><?php echo $alumno['cedula']; ?></p>
                </div>
            </div>                
        </div>
    </div>
    <?php
        require ('./footer.php');
    ?>
</body>