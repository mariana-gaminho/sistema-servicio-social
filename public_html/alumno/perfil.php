<?php
if (session_status() == PHP_SESSION_NONE ) {
    session_start();
}

require_once $_SERVER['DOCUMENT_ROOT']."/../private/model/Alumno.php";
//require_once $_SERVER['DOCUMENT_ROOT']."/projects/sistema-servicio-social/private/model/Alumno.php";
//Prueba de que esta cochinada jala
$a = new Alumno();

$alumno = $a -> get_alumno();

?>
<!DOCTYPE html>
<html>
<head>
<title>Perfil</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

<h1>Hola</h1>
<h3>Aqui podras revisar tu informacion</h3>

<div class="container">
  <div class="row">
    <div class="col-sm-4" style='border:solid 2px black;'>
      <h4>Nombre</h4>
    </div>
    <div class="col-sm-8" style='border:solid 2px black;'>
      <h4><?php echo $alumno[0]['alumno']; ?></h4>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4" style='border:solid 2px black;'>
      <h4>Email</h4>
    </div>
    <div class="col-sm-8" style='border:solid 2px black;'>
      <h4><?php echo $alumno[0]['email']; ?></h4>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4" style='border:solid 2px black;'>
      <h4>Semestre</h4>
    </div>
    <div class="col-sm-8" style='border:solid 2px black;'>
      <h4><?php echo $alumno[0]['semestre']; ?></h4>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4" style='border:solid 2px black;'>
      <h4>Horas</h4>
    </div>
    <div class="col-sm-8" style='border:solid 2px black;'>
      <h4><?php echo $alumno[0]['horas']; ?></h4>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4" style='border:solid 2px black;'>
      <h4>Proyecto</h4>
    </div>
    <div class="col-sm-8" style='border:solid 2px black;'>
      <h4><?php echo $alumno[0]['proyecto']; ?></h4>
    </div>
  </div>
</div>

</body>
</html>