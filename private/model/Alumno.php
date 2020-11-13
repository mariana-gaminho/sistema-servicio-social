<?php

require_once "../private/core/Database.php";

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
        var_dump($alumnos);
        foreach ($alumnos as $a) {
            echo ('<p>Alumno: ' . $a['nombre'] . '</p>');
        }
    }
    
}