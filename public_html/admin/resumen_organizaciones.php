<?php
require_once $_SERVER['DOCUMENT_ROOT']."/../private/model/Admin.php";

if (session_status() == PHP_SESSION_NONE ) {
    session_start();
}

$a = new Admin();
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Resumen Organizaciones</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    <body>

<h4>Bienvenido, <?php echo $_SESSION['nombre_admin']; ?></h4>
        <div> <?php $organizaciones = $a->print_organizaciones(); ?> </div>
</body>
</html>
    