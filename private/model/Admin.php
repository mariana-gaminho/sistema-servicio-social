<?php

require_once $_SERVER['DOCUMENT_ROOT']."/../private/core/Database.php";

if (session_status() == PHP_SESSION_NONE ) {
    session_start();
}

class Admin extends Database {
    
    public function login_admin() {
        try {
			$email = $_POST['email_admin'];
            $pwd = $_POST['pwd_admin'];
            
            $query = "SELECT * FROM administradores WHERE email = :email";
			$stmt = $this->conn->prepare($query);
            $stmt ->bindParam(':email', $email, PDO::PARAM_STR);
				
			$stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            
			if ($stmt->rowCount() >= 1) {    
                $admin = $stmt->fetch();
                if($pwd == $admin['password'])
                {
                    //Inicio de sesión de admin exitoso
                    $_SESSION['login_admin'] = true;
                    $_SESSION['email_admin'] = $admin['email'];
                    $_SESSION['nombre_admin'] = $admin['nombre'];
                    $_SESSION['id_admin'] = $admin['admin_id'];
                } else {
                    //Contraseña incorrecta
                    $_SESSION['login_admin'] = false;
                    unset($_SESSION['email_admin']);
                    unset($_SESSION['nombre_admin']);
                    unset($_SESSION['id_admin']);
                }
            } else {
                //Usuario no encontrado
                $_SESSION['login_admin'] = false;
                unset($_SESSION['email_admin']);
                unset($_SESSION['nombre_admin']);
                unset($_SESSION['id_admin']);
            }
            
		}
		catch(PDOException $e) {
			echo $e->getMessage();
        }
    }
    
}