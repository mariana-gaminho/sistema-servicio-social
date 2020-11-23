<?php
require_once $_SERVER['DOCUMENT_ROOT']."/../private/model/Admin.php";
require_once $_SERVER['DOCUMENT_ROOT']."/../private/model/Organizacion.php";

if (session_status() == PHP_SESSION_NONE ) {
    session_start();
}

if (null === $_SESSION['login_admin'] || !$_SESSION['login_admin']) {
    header('Location:/admin');
}
?> 

<html>
    <head>
        <Title>Index</Title>
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container"> 
            <div class="row">
                <div class="col-md-6">
                    <h2>Bienvenido, <?php echo $_SESSION['nombre_admin']; ?></h2>

                    <form>
                        
                        <div class="form-group">
                            <label>Resumen de alumnos</label> 
                            <a href="/admin/resumen_alumnos.php"> <input type="button" class="btn btn-success" style="float:right; margin:3px" value="Continuar"> </a>
                        </div>

                        <div class="form-group">
                            <label>Resumen de organizaciones</label> 
                            <a href="/admin/resumen_organizaciones.php"> <input type="button" class="btn btn-success" style="float:right; margin:3px" value="Continuar"> </a>
                        </div>
                        
                        <div class="form-group">
                            <label>Resumen de proyectos</label> 
                            <a href="/admin/resumen_proyectos.php"> <input type="button" class="btn btn-success" style="float:right; margin:3px" value="Continuar"> </a>
                        </div>
                        
                        <div class="form-group">
                            <label>Asignar alumnos a proyecto</label> 
                            <a href=""> <input type="button" class="btn btn-success" style="float:right; margin:3px" value="Continuar"> </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </body>

</html>
