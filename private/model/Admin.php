<?php

require_once $_SERVER['DOCUMENT_ROOT']."/../private/core/Database.php";
//require_once $_SERVER['DOCUMENT_ROOT']."/nanosoft_web/private/core/Database.php";

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

    public function get_proyecto_alumno($id_proyecto) {
        if ($id_proyecto == '0') {
            return "Sin proyecto";
        }
        try {
            //Marca el estatus de la aplicación como acpetado
            $query = "SELECT nombre
                        FROM proyectos
                        WHERE proyecto_id=:p_id";
            
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':p_id', $id_proyecto, PDO::PARAM_STR);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            if ($stmt->rowCount() >= 1) {
                $results = $stmt->fetch();
                return $results['nombre'];
            } else {
                $results = [];
                return $results;
            }

        } catch (PDOException $e) {
            echo "Error in get_alumnos_proyectos: " . $e->getMessage();
        }
    }
    
    public function print_alumnos() {
        try {
			$query = "SELECT nombre, email, alumno_id, proyecto_id
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
                    $proyecto = $this->get_proyecto_alumno($a['proyecto_id']);
                    echo '
                    <div
                        class="d-flex align-items-center justify-content-between"
                        style="border-bottom: 1px dashed; min-height: 50px; margin-top: 10px;"
                    >
                        <div class="">
                            <b>Nombre: </b>' . $a['nombre'] . '
                            <br>
                            <b>Email: </b>' . $a['email'] . '
                            <br>
                            <b>Proyecto: </b>' . $proyecto . '
                        </div>
                        <a href="detalle_alumno.php?id='. $a['alumno_id'] .'">
                            <input type="button" class="btn btn-red" style="float:right; margin:3px; font-size: 17px;" value="Detalles">
                        </a>
                    </div>';
                }
    }
    
    public function print_organizaciones() {
        try {
            $query = "SELECT nombre, email, organizacion_id
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
            echo '
                    <div
                        class="d-flex align-items-center justify-content-between"
                        style="border-bottom: 1px dashed; min-height: 50px; margin-top: 10px;"
                    >
                        <div class="">
                            <b>Nombre: </b>' . $o['nombre'] . '
                            <br>
                            <b>Email: </b>' . $o['email'] . '
                        </div>
                        <a href="detalle_organizacion.php?id='. $o['organizacion_id'] .'">
                            <input type="button" class="btn btn-red" style="float:right; margin:3px; font-size: 17px;" value="Detalles">
                        </a>
                    </div>';
                }
        }
    
    public function print_proyectos() {
        try {
			$query = "SELECT proyecto_id, nombre, descripcion, organizacion_id
						FROM proyectos";
			$stmt = $this->conn->prepare($query);
				
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			if ($stmt->rowCount() >= 1) {    
                $proyectos = $stmt->fetchAll();
			}
		}
		catch(PDOException $e) {
			echo $e->getMessage();
        }
        foreach ($proyectos as $p) {
            echo '
            <div
                class="d-flex align-items-center justify-content-between"
                style="border-bottom: 1px dashed; min-height: 50px; margin-top: 10px;"
            >
                <div class="">
                    <b>Nombre: </b>' . $p['nombre'] . '
                    <br>
                    <b>Descripcion: </b>' . $p['descripcion'] . '
                </div>
                <a href="detalle_proyecto.php?id='. $p['proyecto_id'] .'">
                    <input type="button" class="btn btn-red" style="float:right; margin:3px; font-size: 17px;" value="Detalles">
                </a>
            </div>';
        }
    }
    
        public function get_organizacion($id_organizacion) {
        try {
			$query = "SELECT *
						FROM organizaciones
						WHERE organizacion_id=:o_id";
            
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':o_id', $id_organizacion, PDO::PARAM_STR);
				
			$stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            
			if ($stmt->rowCount() >= 1) {    
                $organizacion = $stmt->fetch();
                return $organizacion;
			}
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}   
    }
    
    public function get_alumno($id_alumno) {
        try {
			$query = "SELECT *
						FROM alumnos
						WHERE alumno_id=:a_id";
            
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':a_id', $id_alumno, PDO::PARAM_STR);
				
			$stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            
			if ($stmt->rowCount() >= 1) {    
                $alumno = $stmt->fetch();
                return $alumno;
			}
		}
		catch(PDOException $e) {
			echo $e->getMessage();
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
    
        public function get_proyecto($id_proyecto) {
        try {
			$query = "SELECT *
						FROM proyectos
						WHERE proyecto_id=:p_id";
            
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':p_id', $id_proyecto, PDO::PARAM_STR);
				
			$stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            
			if ($stmt->rowCount() >= 1) {    
                $proyecto = $stmt->fetch();
                return $proyecto;
			}
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
    }
    
        public function get_alumnos_proyecto($id_proyecto) {
        try {
			$query = "SELECT *
						FROM alumnos
						WHERE proyecto_id=:p_id";
            
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':p_id', $id_proyecto, PDO::PARAM_STR);
				
			$stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            
			if ($stmt->rowCount() >= 1) {  
                $alumnos = $stmt->fetchAll();
                return $alumnos;
			}
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
    }
    
    }
    
