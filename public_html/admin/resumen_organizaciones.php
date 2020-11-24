<?php
require_once $_SERVER['DOCUMENT_ROOT']."/../private/model/Admin.php";
// require_once $_SERVER['DOCUMENT_ROOT']."/nanosoft_web/private/model/Admin.php";

if (session_status() == PHP_SESSION_NONE ) {
    session_start();
}
$a = new Admin();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Resumen Organizaciones</title>
        <!-- Icon -->
        <link rel="shortcut icon" href="../img/icono-up.png" />
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    <body>
    <?php
        require ('./header.php');
    ?>
    <div class="d-flex" style="max-height: 20px; margin-left: 3px;">
        <a href="inicio.php">
            <button
                type="button"
                class="btn btn-red"
                style="float:right; margin:3px; font-size: 17px;"
            >
                <img class="home" src="../img/home.png" alt="home">
            </button>
        </a>
    </div>
     <div class="container"> 
        <div class="row d-flex justify-content-center" style="padding-top:30px;">
            <div class="col-md-6 card" style="overflow:auto;">
                <div class="d-flex align-items-end" style="padding-bottom: 15px;">
                    <img src="../img/icono-up.png" alt="logo" width="70">
                    <h4 style="margin-left: 10px;">Organizaciones</h4>
                </div>
                <div style="overflow:auto;"> <?php $organizaciones = $a->print_organizaciones(); ?> </div>
            </div>
        </div>
    </div>
    <?php
        require ('./footer.php');
    ?>
</body>
</html>
    