<?php

require_once $_SERVER['DOCUMENT_ROOT']."/../private/core/Database.php";

class Organizacion extends Database {
    
    public function print_organizaciones() {
        try {
			$query = "SELECT nombre, email
						FROM organizaciones";
			$stmt = $this->conn->prepare($query);
				
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			if ($stmt->rowCount() >= 1) {    
                $organizaciones = $stmt->fetchAll();
			}
		}
		catch(PDOException $e) {
			echo $e->getMessage();
        }
        foreach ($organizaciones as $o) {
            echo ('<p>Organizacion: ' . $o['nombre'] . '</p>');
        }
    }

    public function login_organizacion() { //Código de Rodrigo
		try {
            session_unset();
            
            $email = $_POST['email_organizacion'];
            $pwd = $_POST['pwd_organizacion'];
            
			$query = "SELECT *
						FROM organizaciones
						WHERE email=:email";
            
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
				
			$stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            
			if ($stmt->rowCount() >= 1) {    
                $organizacion = $stmt->fetch();
                
                if ($organizacion['password'] == $pwd) {
                    //Inicio de sesión de organizacion exitoso
                    $_SESSION['login_organizacion'] = true;
					$_SESSION['email_organizacion'] = $organizacion['email'];
					$_SESSION['nombre_organizacion'] = $organizacion['nombre'];
                    $_SESSION['id_organizacion'] = $organizacion['organizacion_id'];
                } else {
                    //Contraseña incorrecta
                    $_SESSION['login_organizacion'] = false;
					unset($_SESSION['email_organizacion']);
					unset($_SESSION['nombre_organizacion']);
                    unset($_SESSION['id_organizacion']);
                }
			}
			else{
				$_SESSION['login_organizacion'] = false;
				unset($_SESSION['email_organizacion']);
				unset($_SESSION['nombre_organizacion']);
                unset($_SESSION['id_organizacion']);
            }
            
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
	}

    public function get_alumnos_proyectos($id) {
        try {
            $query = "SELECT alumnos.alumno_id AS alumno_id, 
                        alumnos.nombre AS alumno_nombre, 
                        alumnos.email AS alumno_email,
                        proyectos.proyecto_id AS proyecto_id, 
                        proyectos.nombre AS proyecto_nombre
                        FROM alumnos 
                        INNER JOIN proyectos ON alumnos.proyecto_id=proyectos.proyecto_id
                        WHERE proyectos.organizacion_id = :org_id";
            
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':org_id', $id, PDO::PARAM_STR);
            
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() >= 1) {
                $results = $stmt->fetchAll();
                return $results;
            } else {
                return 0;
            }
        } catch (PDOException $e) {
            echo "Error in get_alumnos_proyectos: " . $e->getMessage();
        }
    }

    public function get_proyectos($id) {
        try {
            $query = "SELECT *
                        FROM proyectos 
                        WHERE organizacion_id = :org_id";
            
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':org_id', $id, PDO::PARAM_STR);
            
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() >= 1) {
                $results = $stmt->fetchAll();
                return $results;
            } else {
                return 0;
            }
        } catch (PDOException $e) {
            echo "Error in get_proyectos: " . $e->getMessage();
        }
    }

    public function registra_organizacion($nombre, $email, $pwd) {
        session_unset();
        try {
            $query = "INSERT INTO organizaciones (nombre, email, password)
                        VALUES (:org_nombre, :org_email, :org_password)";
            
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':org_nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':org_email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':org_password', $pwd, PDO::PARAM_STR);
            
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            
            $_SESSION['login_organizacion'] = true;
			$_SESSION['email_organizacion'] = $email;
			$_SESSION['nombre_organizacion'] = $nombre;
            $_SESSION['id_organizacion'] = $this->conn->lastInsertId();

        } catch (PDOException $e) {
            echo "Error in registra_organizacion: " . $e->getMessage();
        }
    }
}