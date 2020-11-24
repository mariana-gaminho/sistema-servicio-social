<html>
    <head>
        <Title>Admin Login</Title>
        <!-- Icon -->
        <link rel="shortcut icon" href="../img/icono-up.png" />
        <!-- Bootstrap styles -->
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/admin-style.css">
    </head>

    <body>
        <?php
            require ('./header.php');
        ?>
        <div class="container"> 
            <div class="row d-flex justify-content-center" style="padding-top:30px;">
                <div class="col-md-6 card">
                        <div class="d-flex align-items-end" style="padding-bottom: 15px;">
                            <img src="../img/icono-up.png" alt="logo" width="70">
                            <h3 style="margin-left: 10px;">Compromiso<br>Social</h3>
                        </div>
                        <form action="/admin/login_admin.php"  method="post">   
                        <!-- <form action="/nanosoft_web/public_html/admin/login_admin.php"  method="post"> -->
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
        <?php
            require ('./footer.php');
        ?>
    </body>
</html>
