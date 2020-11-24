<?php
if (session_status() == PHP_SESSION_NONE ) {
    session_start();
}

require_once $_SERVER['DOCUMENT_ROOT']."/../private/model/Alumno.php";
//require_once $_SERVER['DOCUMENT_ROOT']."/sistema-servicio-social/private/model/Alumno.php";

$a = new Alumno();

$alumno = $a -> get_alumno();

?>

<!DOCTYPE html>
<html>


<head>
  <title>Perfil</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="shortcut icon" href="../img/icono-up.png" />
  <meta charset="UTF-8">
  <link href="./../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
</head>


<body>

<?php
  require ('./../admin/header.php');
?>

<div class="container-fluid">
  <div class="text-center">
    <br>
    <i class="fa fa-user-circle-o" aria-hidden="true" style="font-size: 10em;"></i>
    <br>
    <br>
    <div class="row">
      <div class="col">
        <p style="padding-top:12px; color:#9a171f; font-size: 24px;"><?php echo $alumno[0]['alumno']; ?></p>
        <p style="color:#7d7f81; font-size: 18px;"><?php echo $alumno[0]['email']; ?></p>
      </div>
    </div>

    <br>

    <div class="row justify-content-center" style="padding-bottom:15px;">
      <div class="justify-content-center">
        <div class="row">
          <div class="col-sm-4">
            <i class="fa fa-line-chart" style="color:#9a171f; font-size: 6em;"></i>
            <br>
            <br>
            <strong style="color:#7d7f81; font-size: 18px;"><?php echo $alumno[0]['semestre']; ?></strong>
            <p style="font-size: 12px;">Semestre</p>
          </div>
          <div class="col-sm-4">
            <i class="fa fa-hourglass-o" style="color:#f0c33b; font-size: 6em;"></i>
            <br>
            <br>
            <strong style="color:#7d7f81; font-size: 18px;"><?php echo $alumno[0]['horas']; ?></strong>
            <p style="font-size: 12px;">Horas</p>
          </div>
          <div class="col-sm-4">
            <i class="fa fa-rocket" style="color:#00338e; font-size: 6em;"></i>
            <br>
            <br>
            <strong style="color:#7d7f81; font-size: 18px;"><?php echo $alumno[0]['proyecto']; ?></strong>
            <p style="font-size: 12px;">Proyecto</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
    require ('./../admin/footer.php');
?>

</body>
</html>