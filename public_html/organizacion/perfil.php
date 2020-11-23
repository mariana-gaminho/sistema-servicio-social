<?php
if (session_status() == PHP_SESSION_NONE ) {
    session_start();
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Perfil</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

<h3>Información de tu organización</h3>

<div class="container">
  <div class="row">
    <div class="col-sm-4" style='border:solid 2px black;'>
      <h4>Nombre</h4>
    </div>
    <div class="col-sm-8" style='border:solid 2px black;'>
      <h4><?php echo $_SESSION['nombre_organizacion']; ?></h4>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4" style='border:solid 2px black;'>
      <h4>Email</h4>
    </div>
    <div class="col-sm-8" style='border:solid 2px black;'>
      <h4><?php echo $_SESSION['email_organizacion']; ?></h4>
    </div>
  </div>
</div>

</body>
</html>