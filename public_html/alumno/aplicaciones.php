<?php
if (session_status() == PHP_SESSION_NONE ) {
    session_start();
}

require_once $_SERVER['DOCUMENT_ROOT']."/../private/model/Alumno.php";

$a = new Alumno();

if(!empty($_GET['id']))
{
        $a -> CrearSolicitud($_GET['id'],$_SESSION['id_alumno']);
}
$alumno = $a -> ver_aplicacion($_SESSION['id_alumno']);

?>
<!DOCTYPE html>
<html>
<head>
<title>Aplicacion</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

<?php
if($alumno !== null && count($alumno)>0)
{
    echo "<h1>Hola ".$alumno[0]['Alumno']."</h1>";
    echo "<h3>Has aplicado para:</h3>";
    for ($i = 0; $i < count($alumno); $i++)
    {
        echo "<div class='container'>";
        echo "<div class='row'>";
        echo "<div class='col-sm-2' style='border:solid 2px black;'>";
        echo "<h4>Proyecto:</h4>";
        echo "</div>";
        echo "<div class='col-sm-6' style='border:solid 2px black;'>";
        echo "<h4>".$alumno[$i]['Proyecto']."</h4>";
        echo "</div>";
        echo "</div>";
        echo "<div class='row'>";
        echo "<div class='col-sm-2' style='border:solid 2px black;'>";
        echo "<h4>Organización:</h4>";
        echo "</div>";
        echo "<div class='col-sm-6' style='border:solid 2px black;'>";
        echo "<h4>".$alumno[$i]['Organizacion']."</h4>";
        echo "</div>";
        echo "</div>";
        echo "<div class='row'>";
        echo "<div class='col-sm-2' style='border:solid 2px black;'>";
        echo "<h4>Horas:</h4>";
        echo "</div>";
        echo "<div class='col-sm-6' style='border:solid 2px black;'>";
        echo "<h4>".$alumno[$i]['horas']."</h4>";
        echo "</div>";
        echo "</div>";
        echo "<div class='row'>";
        echo "<div class='col-sm-2' style='border:solid 2px black;'>";
        echo "<h4>Dias:</h4>";
        echo "</div>";
        echo "<div class='col-sm-6' style='border:solid 2px black;'>";
        echo "<h4>".$alumno[$i]['dias']."</h4>";
        echo "</div>";
        echo "</div>";
        echo "<div class='row'>";
        echo "<div class='col-sm-2' style='border:solid 2px black;'>";
        echo "<h4>Fechas:</h4>";
        echo "</div>";
        echo "<div class='col-sm-6' style='border:solid 2px black;'>";
        echo "<h4>".$alumno[$i]['fechas']."</h4>";
        echo "</div>";
        echo "</div>";
        echo "<div class='row'>";
        echo "<div class='col-sm-2' style='border:solid 2px black;'>";
        echo "<h4>Estatus:</h4>";
        echo "</div>";
        echo "<div class='col-sm-6' style='border:solid 2px black;'>";
        echo "<h4>".$alumno[$i]['estatus']."</h4>";
        echo "</div>";
        echo "</div>";
        echo "</div><br>";
    }
}
else{
    $alumno = $a -> get_nombre();
    echo "<h1>Hola ".$alumno[0]['nombre']."</h1>";
    echo "<h3>Parece que no tienes solicitudes activas, ve a proyectos para hacer una solicitud</h3>";
}
?>
</div>
</body>