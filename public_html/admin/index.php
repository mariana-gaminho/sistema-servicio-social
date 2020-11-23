<html>
    <head>
        <Title>Admin Login</Title>
        <!-- Icon -->
        <link rel="shortcut icon" href="../img/icono-up.png" />
        <!-- Bootstrap styles -->
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/login-style.css">
    </head>

    <body>
        <h3 style="padding:12px 5px; color:#FFFFFF;vertical-align: middle; height: 50px; background-color: #0E5184">SERVICIO SOCIAL</h3>
        <div class="container"> 
            <div class="row d-flex justify-content-center" style="padding-top:30px;">
                <div class="col-md-6 card">
                        <div class="d-flex align-items-end" style="padding-bottom: 15px;">
                            <img src="../img/icono-up.png" alt="logo" width="70">
                            <h3 style="margin-left: 10px;">Compromiso<br>Social</h3>
                        </div>
                        <form action="/admin/login_admin.php"  method="post">   
                            <div class="form-group">
                                <label>Email</label> 
                                <input type="text" name="email_admin" id="email_admin" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Contraseña</label>
                                <input type="password" name="pwd_admin" id="pwd_admin" class="form-control" required>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-red" style="width: 65%;">
                                    Login
                                </button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
        <footer class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <p>
                        Universidad Panamericana<br>
                        Derechos Reservados<br>
                        CENTROS CULTURALES DE MEXICO A.C.<br>
                        Aviso de privacidad<br>
                    </p>
                </div>
            </div>
        </footer>
    </body>
</html>
