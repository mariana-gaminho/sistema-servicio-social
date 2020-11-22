<?php
if (session_status() == PHP_SESSION_NONE ) {
    session_start();
}

require_once $_SERVER['DOCUMENT_ROOT']."/../private/model/Alumno.php";

$a = new Alumno();

$proyectos = $a -> ver_proyecto();

?>

<!DOCTYPE html>
<html>
<head>
<title>Proyectos</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

<h1>Hola</h1>
<h3>Los proyectos ativos son los siguientes</h3>

<?php 
if(count($proyectos)>0)
{
    for ($i = 0; $i < count($proyectos); $i++)
    {
        echo "<div class='container' style='border:solid 2px black;'>";
        echo "<div class='row'>";
        echo "<div class='col-sm-8'>";
        echo "<h3>".$proyectos[$i]['Proyecto']."</h3>";
        echo "</div>";
        echo "<div class='col-sm-4'>";
        echo "<a href='crea_solicitud.php?id=".$proyectos[$i]['proyecto_id']."' class='btn btn-success'>Solicitar</a>";
        echo "</div>";
        echo "</div>";
        echo "<div class='row'>";
        echo "<div class='col-sm-3'>";
        echo "<p>Dias</p>";
        echo "<p>".$proyectos[$i]['dias']."</p>";
        echo "</div>";
        echo "<div class='col-sm-2'>";
        echo "<p>Horas</p>";
        echo "<p>".$proyectos[$i]['horas']."</p>";
        echo "</div>";
        echo "<div class='col-sm-3'>";
        echo "<p>Fechas</p>";
        echo "<p>".$proyectos[$i]['fechas']."</p>";
        echo "</div>";
        echo "<div class='col-sm-4'>";
        echo "<p><b>Organización: </b>".$proyectos[$i]['organizacion']."</p>";
        echo "<p><b>Correo: </b>".$proyectos[$i]['email']."</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "<br>";
    }
}
?>
</body>