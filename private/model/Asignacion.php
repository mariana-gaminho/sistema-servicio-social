<?php

require_once $_SERVER['DOCUMENT_ROOT']."/../private/core/Database.php";

class Asignacion extends Database {
    
    //Esta función regresa todos los alumnos que tienen aplicaciones activas
    //En el orden establecido
    public function getAlumnos() {
        try {
            //Obtiene alumnos de 7 y 8 semestre
            $query = "SELECT DISTINCT alumnos.alumno_id AS alumno_id, 
                        alumnos.nombre AS nombre, 
                        alumnos.email AS email,
                        alumnos.semestre AS semestre,
                        alumnos.horas AS horas,
                        alumnos.proyecto_id AS proyecto_id,
                        alumnos.cedula AS cedula
                        FROM alumnos 
                        INNER JOIN aplicaciones ON alumnos.alumno_id=aplicaciones.alumno_id
                        WHERE alumnos.semestre=7 OR alumnos.semestre=8
                        ORDER BY alumnos.semestre DESC";
            
            $stmt = $this->conn->prepare($query);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() >= 1) {
                $results_7_8 = $stmt->fetchAll();
            } else {
                $results_7_8 = [];
            }

            //Obtiene alumnos de 1, 2 y 3 semestre
            $query = "SELECT DISTINCT alumnos.alumno_id AS alumno_id, 
                        alumnos.nombre AS nombre, 
                        alumnos.email AS email,
                        alumnos.semestre AS semestre,
                        alumnos.horas AS horas,
                        alumnos.proyecto_id AS proyecto_id,
                        alumnos.cedula AS cedula
                        FROM alumnos 
                        INNER JOIN aplicaciones ON alumnos.alumno_id=aplicaciones.alumno_id
                        WHERE alumnos.semestre=1 OR alumnos.semestre=2 OR alumnos.semestre=3
                        ORDER BY alumnos.semestre ASC";
            
            $stmt = $this->conn->prepare($query);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() >= 1) {
                $results_1_2_3 = $stmt->fetchAll();
            } else {
                $results_1_2_3 = [];
            }

            //Obtiene al resto de los alumnos
            $query = "SELECT DISTINCT alumnos.alumno_id AS alumno_id, 
                        alumnos.nombre AS nombre, 
                        alumnos.email AS email,
                        alumnos.semestre AS semestre,
                        alumnos.horas AS horas,
                        alumnos.proyecto_id AS proyecto_id,
                        alumnos.cedula AS cedula
                        FROM alumnos 
                        INNER JOIN aplicaciones ON alumnos.alumno_id=aplicaciones.alumno_id
                        WHERE alumnos.semestre!=1 AND alumnos.semestre!=2 AND alumnos.semestre!=3
                        AND alumnos.semestre!=7 AND alumnos.semestre!=8";
            
            $stmt = $this->conn->prepare($query);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() >= 1) {
                $results_resto = $stmt->fetchAll();
            } else {
                $results_resto = [];
            } 

            return $result = array_merge($results_7_8, $results_1_2_3, $results_resto);
        } catch (PDOException $e) {
            echo "Error in get_alumnos_proyectos: " . $e->getMessage();
        }
    }

    public function getAplicaciones($alumno_id) {
        try {
            //Marca el estatus de la aplicación como acpetado
            $query = "SELECT *
                        FROM aplicaciones
                        WHERE alumno_id=:a_id";
            
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':a_id', $alumno_id, PDO::PARAM_STR);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            if ($stmt->rowCount() >= 1) {
                $results = $stmt->fetchAll();
                return $results;
            } else {
                $results = [];
                return $results;
            }

        } catch (PDOException $e) {
            echo "Error in get_alumnos_proyectos: " . $e->getMessage();
        }
    }

    //Esta función debe marcar el estatus de la aplicación como ACEPTADA y agregar el id del proyecto al alumno
    public function aceptarAplicacion($aplicacion_id, $proyecto_id, $alumno_id) {
        try {
            //Marca el estatus de la aplicación como acpetado
            $query = "UPDATE aplicaciones
                        SET estatus='ACEPTADA'
                        WHERE aplicacion_id=:ap_id";
            
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':ap_id', $aplicacion_id, PDO::PARAM_STR);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            //Agrega el id del proyecto al alumno
            $query = "UPDATE alumnos
                        SET proyecto_id=:p_id
                        WHERE alumno_id=:a_id";
            
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':p_id', $proyecto_id, PDO::PARAM_STR);
            $stmt->bindParam(':a_id', $alumno_id, PDO::PARAM_STR);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo "Error in get_alumnos_proyectos: " . $e->getMessage();
        }
    }

    //Esta función debe marcar el estatus de la aplicación como RECHAZADA
    public function rechazarAplicacion($aplicacion_id) {
        try {
            //Marca el estatus de la aplicación como acpetado
            $query = "UPDATE aplicaciones
                        SET estatus='RECHAZADA'
                        WHERE aplicacion_id=:ap_id";
            
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':ap_id', $aplicacion_id, PDO::PARAM_STR);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo "Error in get_alumnos_proyectos: " . $e->getMessage();
        }
    }

    public function getCupoDisponible($proyecto_id) {
        try {
            //Marca el estatus de la aplicación como acpetado
            $query = "SELECT capacidad, alumnos_inscritos
                        FROM proyectos
                        WHERE proyecto_id=:p_id";
            
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':p_id', $proyecto_id, PDO::PARAM_STR);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            if ($stmt->rowCount() >= 1) {
                $results = $stmt->fetch();
                return intval($results['capacidad']) - intval($results['alumnos_inscritos']);
            } else {
                return 0;
            }

        } catch (PDOException $e) {
            echo "Error in get_alumnos_proyectos: " . $e->getMessage();
        }
    }
            
}