<?php

if (session_status() == PHP_SESSION_NONE ) {
    session_start();
}

if (null !== $_SESSION['login_alumno'] && $_SESSION['login_alumno']) {
    header('Location:/alumno/aplicaciones.php');
} else {
    header('Location:/');
}

?>