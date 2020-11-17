<?php

require_once $_SERVER['DOCUMENT_ROOT']."/../private/core/Database.php";

class Proyecto extends Database {
    
    public function valida_proyecto_organizacion($id_proyecto, $id_organizacion) {
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
                
                if ($proyecto['organizacion_id'] == $id_organizacion) {
                    //El proyecto sí es de esta organización
                    return true;
                } else {
                    //El proyecto no es de esta organización
                    return false;
                }
			}
			else{
                //Proyecto inexistente
                return false;
            }
            
		}
		catch(PDOException $e) {
			echo $e->getMessage();
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