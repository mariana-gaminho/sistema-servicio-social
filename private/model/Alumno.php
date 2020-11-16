<?php

require_once $_SERVER['DOCUMENT_ROOT']."/../private/core/Database.php";

class Alumno extends Database {
    
    public function print_alumnos() {
        try {
			$query = "SELECT nombre, email
						FROM alumnos";
			$stmt = $this->conn->prepare($query);
				
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			if ($stmt->rowCount() >= 1) {    
                $alumnos = $stmt->fetchAll();
			}
		}
		catch(PDOException $e) {
			echo $e->getMessage();
        }
        foreach ($alumnos as $a) {
            echo ('<p>Alumno: ' . $a['nombre'] . '</p>');
        }
    }

	public function login_alumno(){
		try {
			$email = $_POST['email_alumno'];
			$pwd = $_POST['pwd_alumno'];
			
			$query = "SELECT * FROM alumnos
						WHERE email=:email";
			
			$stmt = $this->conn->prepare($query);
				
			$stmt->bindParam(':email', $email, PDO::PARAM_STR);
				
			$stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
			
			if ($stmt->rowCount() >= 1) {    
				$alumno = $stmt->fetch();
				if ($pwd == $alumno['password']) {
					//Inicio de sesión de alumno exitoso
                    $_SESSION['login_alumno'] = true;
					$_SESSION['email_alumno'] = $alumno['email'];
					$_SESSION['semestre_alumno'] = $alumno['semestre'];
                    $_SESSION['horas_alumno'] = $alumno['horas'];
					$_SESSION['proyecto_id_alumno'] = $alumno['proyecto_id'];
					$_SESSION['id_alumno'] = $alumno['alumno_id'];
				} else {
					//Contraseña incorrecta
					$_SESSION['login_alumno'] = false;
					unset($_SESSION['email_alumno']);
					unset($_SESSION['semestre_alumno']);
                    unset($_SESSION['horas_alumno']);
					unset($_SESSION['proyecto_id_alumno']);
					unset($_SESSION['id_alumno']);
				}
			}
			else{
				$_SESSION['login_alumno'] = false;
				unset($_SESSION['email_alumno']);
				unset($_SESSION['semestre_alumno']);
                unset($_SESSION['horas_alumno']);
				unset($_SESSION['proyecto_id_alumno']);
				unset($_SESSION['id_alumno']);
			}
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
	}
}