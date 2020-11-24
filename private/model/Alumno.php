<?php

require_once $_SERVER['DOCUMENT_ROOT']."/../private/core/Database.php";
// require_once $_SERVER['DOCUMENT_ROOT']."/sistema-servicio-social/private/core/Database.php";
// require_once $_SERVER['DOCUMENT_ROOT']."/nanosoft_web/private/core/Database.php";

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
			session_unset();

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

	public function ver_aplicacion($id_alumno){
		try {
			$query = "SELECT alumnos.nombre AS Alumno, proyectos.nombre AS Proyecto, organizaciones.nombre AS Organizacion, proyectos.horas, dias, fechas, estatus
			FROM alumnos
			Inner JOIN aplicaciones
			On alumnos.alumno_id = aplicaciones.alumno_id
			Inner JOIN proyectos
			On proyectos.proyecto_id = aplicaciones.proyecto_id
			Inner JOIN organizaciones
			On proyectos.organizacion_id = organizaciones.organizacion_id
			WHERE alumnos.alumno_id = :id";
			$stmt = $this->conn->prepare($query);

			$stmt->bindParam(':id', $id_alumno , PDO::PARAM_STR);
				
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			if ($stmt->rowCount() >= 1) {    
				return $stmt->fetchAll();
			}
		}
		catch(PDOException $e) {
			echo $e->getMessage();
        }
	}

	public function get_nombre(){
		try {
			$ID = $_SESSION['id_alumno'];
			$query = "SELECT nombre
			FROM alumnos
			WHERE alumno_id = :id";
			$stmt = $this->conn->prepare($query);

			$stmt->bindParam(':id', $ID , PDO::PARAM_STR);
				
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			if ($stmt->rowCount() >= 1) {    
				return $alumno = $stmt->fetchAll();
			}
		}
		catch(PDOException $e) {
			echo $e->getMessage();
        }
	}

	public function get_alumno(){
		try {
			$ID = $_SESSION['id_alumno'];
			$query = "SELECT alumnos.nombre AS alumno, email, semestre, alumnos.horas, proyectos.nombre AS proyecto
			FROM alumnos
			INNER JOIN proyectos ON proyectos.proyecto_id = alumnos.proyecto_id
			WHERE alumno_id = :id";
			$stmt = $this->conn->prepare($query);

			$stmt->bindParam(':id', $ID , PDO::PARAM_STR);
				
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			if ($stmt->rowCount() >= 1) {    
				return $alumno = $stmt->fetchAll();
			}
		}
		catch(PDOException $e) {
			echo $e->getMessage();
        }
	}

	public function CrearSolicitud($proyecto,$ID){
		try {
			$query = "SELECT * FROM `aplicaciones` WHERE alumno_id = :id";
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(':id', $ID , PDO::PARAM_STR);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			if ($stmt->rowCount() < 3) {    
				$id = (int)$ID;
				$query = "INSERT INTO aplicaciones (aplicacion_id, estatus, proyecto_id, alumno_id) VALUES (NULL, 'revision', '{$proyecto}', '{$id}');";
				$stmt = $this->conn->prepare($query);

				$stmt->execute();
				$stmt->setFetchMode(PDO::FETCH_ASSOC);
				return true;
			}else{
				echo "Ya tienes el limite de solicitudes activas";
				return false;
			}

		}
		catch(PDOException $e) {
			echo $e->getMessage();
        }
	}

	public function ver_proyecto(){
		try {
			$query = "SELECT proyectos.nombre AS Proyecto, horas, dias, fechas, organizaciones.nombre AS organizacion, email, proyecto_id
			FROM proyectos
			Inner JOIN organizaciones
			On proyectos.organizacion_id = organizaciones.organizacion_id";
			$stmt = $this->conn->prepare($query);
				
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			if ($stmt->rowCount() >= 1) {    
				return $alumno = $stmt->fetchAll();
			}
		}
		catch(PDOException $e) {
			echo $e->getMessage();
        }
	}
}