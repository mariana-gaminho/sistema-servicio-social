<?php
require_once $_SERVER['DOCUMENT_ROOT']."/../private/model/Admin.php";

$admin = new Admin();
$admin->login_admin();

if($_SESSION['login_admin'])
{
    header('location:/admin/inicio.php');
} else {
    header('location:/admin?Error=CredencialesIncorrectas');
}

?>