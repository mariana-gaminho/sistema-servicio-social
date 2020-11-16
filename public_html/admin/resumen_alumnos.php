<?php 

if (session_status() == PHP_SESSION_NONE ) {
    session_start();
}

echo 'Bienvenido admin: ' . $_SESSION['nombre_admin'] . '!';

?>