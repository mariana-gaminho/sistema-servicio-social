<?php
require_once $_SERVER['DOCUMENT_ROOT']."/../private/model/Organizacion.php";
//require_once $_SERVER['DOCUMENT_ROOT']."/sistema-servicio-social/private/model/Organizacion.php";

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
    <link rel="stylesheet" href="../css/admin-style.css">
    <link rel="shortcut icon" href="../img/icono-up.png" />
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="./../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    
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
        <p style="color:#9a171f; font-size: 24px;"><?php echo $_SESSION['nombre_organizacion']; ?></p>
        <p style="color:#7d7f81; font-size: 18px;"><?php echo $_SESSION['email_organizacion']; ?></p>
      </div>
    </div>

    <br>

    <div class="row justify-content-center" style="padding-bottom:15px;">
      <div class="justify-content-center">
        <div class="row">
            <?php
                if ($proyectos == 0) {
                    //No hay proyectos
                    echo 'No hay proyectos registrados';
                } else {
                    foreach ($proyectos as $proyecto) {
                        echo '
                        <div class="col-sm-4">
                            <strong style="color:#7d7f81; font-size: 18px;">' . $proyecto['nombre'] . '</strong>
                            <br>
                            <br>
                            <a href="/organizacion/detalle_proyecto.php?id='. $proyecto['proyecto_id'] .'">
                                <input type="button" class="btn btn-block btn-red" style="float:right; margin:3px" value="Detalles">
                            </a>
                        </div>
                        ';
                    }
                }
                
                echo '
                
                    <div class="col-md-12">
                    <p style="height: 25px;"></p>
                        
                        <a href="/organizacion/registrar_proyecto.php">
                        <input type="button" class="btn btn-red" style="margin:3px" value="Nuevo proyecto">
                        </a>
                    </div>

                ';
            ?>
        </div>
      </div>
    </div>




    <!--<div class="col-12" id="alumnos_organizacion">-->
<p>ALUMNOS</p>
        <div class="row justify-content-center" style="-webkit-box-shadow: -1px 1px 9px 5px rgba(0,0,0,0.15); -moz-box-shadow: -1px 1px 9px 5px rgba(0,0,0,0.15); box-shadow: -1px 1px 9px 5px rgba(0,0,0,0.15); border-radius: 25px; height: 12rem; padding: 20px;">
        <div class="justify-content-center">
            <!-- Aquí se imprimen los alumnos en proyectos de la organización -->
            <?php
                if ($alumnos_organizacion == 0) {
                    //No hay alumnos
                    echo 'No hay alumnos registrados';
                } else {
                    echo '
                        <div class="row justify-content-center" >
                            <div class="col ">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>Nombre</p>
                                        </div>
                                    <div class="col-md-4">
                                        <p>Email</p>
                                        
                                    </div>
                                    <div class="col-md-4">
                                        <p>Proyecto</p>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        ';

                    foreach ($alumnos_organizacion as $alumno) {
                        echo '
                        <div class="row justify-content-center" >
                            <div class="col ">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>'.$alumno['alumno_nombre'].'</p>
                                        </div>
                                    <div class="col-md-4">
                                        <p>'.$alumno['alumno_email'].'</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p>'.$alumno['proyecto_nombre'].'</p>
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