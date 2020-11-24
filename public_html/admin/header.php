<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/style-responsive.css">
  <link rel="stylesheet" href="../css/admin-style.css">
  <title>Header</title>
</head>
<body>
<div class="d-flex justify-content-between align-items-center" style="padding:12px 5px; vertical-align: middle; height: 50px; background-color: #0E5184">
  <h3 style="color:#ffff; margin-bottom: 0;">
    SERVICIO SOCIAL
  </h3>
  <div>
    <?php 
      if($_SESSION['login_admin'] !== null || $_SESSION['login_alumno'] !== null || $_SESSION['login_organizacion'] !== null) {
        echo '<a href="/logout.php" style="color:#ffff; padding-right: 10px;">
        Logout
        <img class="logout-icon" src="../img/logout.png" alt="logout" width="20">
        </a>';
      }
    ?>
  </div>
</div>
</body>
</html>