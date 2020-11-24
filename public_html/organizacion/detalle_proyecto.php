<?php
require_once $_SERVER['DOCUMENT_ROOT']."/../private/model/Proyecto.php";
//require_once $_SERVER['DOCUMENT_ROOT']."/sistema-servicio-social/private/model/Proyecto.php";

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
    <link rel="shortcut icon" href="../img/icono-up.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="./../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/admin-style.css">
</head>

<body>

<?php
    require ('./../admin/header.php');
    require ('navbar-organizaciones.php');
?>


<div class="container-fluid">
  <div class="text-center">
    <br>
    <i class="fa fa-user-circle-o" aria-hidden="true" style="font-size: 10em;"></i>
    <br>
    <br>
    <div class="row">
      <div class="col">
        <p style="padding-top:12px; color:#9a171f; font-size: 24px;"><?php echo $proyecto['nombre']; ?></p>
      </div>
    </div>
    <br>

    <div class="row justify-content-center" style="padding-bottom:15px;">
      <div class="justify-content-center">
        <div class="row">
            <div class="col-sm-3">
            <i class="fa fa-users" style="color:#007c5a; font-size: 6em;"></i>
            <br>
            <br>
            <strong style="color:#7d7f81; font-size: 18px;"><?php echo $proyecto['capacidad']; ?></strong>
            <p style="font-size: 12px;">Capacidad</p>
          </div>
          <div class="col-sm-3">
            <i class="fa fa-line-chart" style="color:#9a171f; font-size: 6em;"></i>
            <br>
            <br>
            <strong style="color:#7d7f81; font-size: 18px;"><?php echo $proyecto['dias']; ?></strong>
            <p style="font-size: 12px;">Dias</p>
          </div>
          <div class="col-sm-3">
            <i class="fa fa-hourglass-o" style="color:#f0c33b; font-size: 6em;"></i>
            <br>
            <br>
            <strong style="color:#7d7f81; font-size: 18px;"><?php echo $proyecto['horas']; ?></strong>
            <p style="font-size: 12px;">Horas</p>
          </div>
          <div class="col-sm-3">
            <i class="fa fa-rocket" style="color:#00338e; font-size: 6em;"></i>
            <br>
            <br>
            <strong style="color:#7d7f81; font-size: 18px;"><?php echo  $proyecto['fechas']; ?></strong>
            <p style="font-size: 12px;">Fechas</p>
          </div>
        </div>
      </div>
    </div>


    <!--<div class="col-12" id="alumnos_organizacion">-->
<p>ALUMNOS</p>
        <div class="row justify-content-center" style="-webkit-box-shadow: -1px 1px 9px 5px rgba(0,0,0,0.15); -moz-box-shadow: -1px 1px 9px 5px rgba(0,0,0,0.15); box-shadow: -1px 1px 9px 5px rgba(0,0,0,0.15); border-radius: 25px; height: 12rem; padding: 20px;">
        <div class="justify-content-center">
            <!-- Aquí se imprimen los alumnos en proyectos de la organización -->
            <?php
                if ($alumnos == 0) {
                    //No hay alumnos
                    echo 'No hay alumnos registrados';
                } else {
                    echo '
                        <div class="row justify-content-center" >
                            <div class="col ">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p>Nombre</p>
                                        </div>
                                    <div class="col-md-6">
                                        <p>Email</p>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        ';

                    foreach ($alumnos as $alumno) {
                        echo '
                        <div class="row justify-content-center" >
                            <div class="col ">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p>'.$alumno['nombre'].'</p>
                                        </div>
                                    <div class="col-md-6">
                                        <p>'.$alumno['email'].'</p>
                                    </div>
                                </div>
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

<div class="row" style="height: 7rem;">
</div>

<div  style="padding-top:15px; height: 100px; color:#FFFFFF; background-color:#0E5184; overflow:auto; display:block; border-radius:5px;">
    <div class="col-md-3">
        <p>
            Derechos Reservados<br>
            CENTROS CULTURALES DE MEXICO A.C.<br>
            Aviso de privacidad<br>
        </p>
    </div>
</div>




</body>
</html>