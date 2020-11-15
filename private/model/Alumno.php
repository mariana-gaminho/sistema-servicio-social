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

}