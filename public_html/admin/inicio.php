<?php
// require_once $_SERVER['DOCUMENT_ROOT']."/../private/model/Admin.php";
// require_once $_SERVER['DOCUMENT_ROOT']."/../private/model/Organizacion.php";
require_once $_SERVER['DOCUMENT_ROOT']."/nanosoft_web/private/model/Admin.php";
require_once $_SERVER['DOCUMENT_ROOT']."/nanosoft_web/private/model/Organizacion.php";

if (session_status() == PHP_SESSION_NONE ) {
    session_start();
}

if (null === $_SESSION['login_admin'] || !$_SESSION['login_admin']) {
    header('Location:/admin');
}
?> 

<html>
	<head>
		<Title>Admin Home</Title>
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<!-- Icon -->
		<link rel="shortcut icon" href="../img/icono-up.png" />
	</head>
	<body>
		<?php
				require ('./header.php');
		?>
		<div class="container"> 
			<div class="row d-flex justify-content-center">
				<div class="col-md-6 card" style="margin-top:20px;">
					<img src="../img/compromiso-social.png" alt="compromiso" width="70%;">
					<h3 style="font-weight:bold; margin-bottom: 20px;">
						Bienvenid@, <?php echo $_SESSION['nombre_admin']; ?>
					</h3>
					<div style="width: 90%; margin-top: 20px;">					
						<div class="d-flex justify-content-between">
							<p style="font-weight: bold; font-size: 17px;">Resumen de Alumnos</p><br>
							<a href="/admin/resumen_alumnos.php">
							<!-- <a href="/nanosoft_web/public_html/admin/resumen_alumnos.php"> -->
								<input type="button" class="btn btn-red" style="float:right; margin:3px" value="Continuar">
							</a>
						</div>
						<div class="d-flex justify-content-between">
							<p style="font-weight: bold; font-size: 17px;">Resumen de Organizaciones</p><br>
							<a href="/admin/resumen_organizaciones.php">
							<!-- <a href="/nanosoft_web/public_html/admin/resumen_organizaciones.php"> -->
								<input type="button" class="btn btn-red" style="float:right; margin:3px" value="Continuar">
							</a>
						</div>
						<div class="d-flex justify-content-between">
							<p style="font-weight: bold; font-size: 17px;">Resumen de Proyectos</p><br>
							<a href="/admin/resumen_proyectos.php">
								<input type="button" class="btn btn-red" style="float:right; margin:3px" value="Continuar">
							</a>
						</div>
						<div class="d-flex justify-content-between">
							<p style="font-weight: bold; font-size: 17px;">Asignar alumnos a Proyecto</p><br>
							<a href="">
								<input type="button" class="btn btn-red" style="float:right; margin:3px" value="Continuar">
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
				require ('./footer.php');
		?>
	</body>
</html>
