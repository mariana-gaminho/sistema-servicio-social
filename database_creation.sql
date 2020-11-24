DROP DATABASE IF EXISTS nanosoft;
CREATE DATABASE nanosoft;
USE nanosoft;

CREATE TABLE alumnos (
	alumno_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	nombre varchar(80),
	email varchar(80),
	semestre INT,
	horas INT,
	proyecto_id INT,
	password varchar(80),
	cedula varchar(80)
);

CREATE TABLE proyectos (
	proyecto_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	nombre varchar(80),
	horas INT,
	dias varchar(20),
	fechas varchar(30),
	organizacion_id varchar(100),
	descripcion varchar(400),
	capacidad INT,
	alumnos_inscritos INT
);

CREATE TABLE organizaciones (
	organizacion_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	nombre varchar(80),
	email varchar(80),
	password varchar(80)
);

CREATE TABLE administradores (
	admin_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	nombre varchar(80),
	email varchar(80),
	password varchar(80)
);

CREATE TABLE aplicaciones (
	aplicacion_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	estatus varchar(30),
	proyecto_id INT,
	alumno_id INT
);

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Pepe', 'pepe@gmail.com', 3, 120, 0, 'contrasena', 'CED1');

INSERT INTO aplicaciones (estatus, proyecto_id, alumno_id)
VALUES ('PENDIENTE', 4, 1);

INSERT INTO aplicaciones (estatus, proyecto_id, alumno_id)
VALUES ('PENDIENTE', 2, 1);

INSERT INTO aplicaciones (estatus, proyecto_id, alumno_id)
VALUES ('PENDIENTE', 5, 1);

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Juanito', 'juanito@gmail.com', 6, 320, 0, 'contrasena', 'CED2');

INSERT INTO aplicaciones (estatus, proyecto_id, alumno_id)
VALUES ('PENDIENTE', 2, 2);

INSERT INTO aplicaciones (estatus, proyecto_id, alumno_id)
VALUES ('PENDIENTE', 10, 2);

INSERT INTO aplicaciones (estatus, proyecto_id, alumno_id)
VALUES ('PENDIENTE', 16, 2);

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Alex', 'alex@gmail.com', 8, 420, 0, 'contrasena', 'CED3');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Pedro', 'pedro@gmail.com', 5, 120, 0, 'contrasena', 'CED4');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Carlos', 'calrlos@gmail.com', 7, 100, 0, 'contrasena', 'CED5');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Natalia', 'natalia@gmail.com', 3, 240, 0, 'contrasena', 'CED6');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Carla', 'carla@gmail.com', 8, 100, 0, 'contrasena', 'CED7');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Mariana', 'mariana@gmail.com', 5, 200, 0, 'contrasena', 'CED8');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Pablo', 'pablo@gmail.com', 7, 480, 0, 'contrasena', 'CED9');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Alfonso', 'alfonso@gmail.com', 7, 480, 0, 'contrasena', 'CED10');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Ximena', 'ximena@gmail.com', 4, 120, 0, 'contrasena', 'CED11');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Fatima', 'fatima@gmail.com', 4, 150, 0, 'contrasena', 'CED12');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Regina', 'regina@gmail.com', 6, 200, 0, 'contrasena', 'CED13');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Ana', 'ana@gmail.com', 1, 0, 0, 'contrasena', 'CED14');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Daniel', 'daniel@gmail.com', 2, 60, 0, 'contrasena', 'CED15');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Rodrigo', 'rodrigo@gmail.com', 3, 80, 0, 'contrasena', 'CED16');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Braulio', 'braulio@gmail.com', 5, 240, 0, 'contrasena', 'CED17');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Fernando', 'fernando@gmail.com', 7, 120, 0, 'contrasena', 'CED18');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Brian', 'brian@gmail.com', 8, 60, 0, 'contrasena', 'CED19');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Diego', 'diego@gmail.com', 6, 320, 0, 'contrasena', 'CED20');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Bernardo', 'bernardo@gmail.com', 3, 180, 0, 'contrasena', 'CED21');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Antonio', 'antonio@gmail.com', 4, 320, 0, 'contrasena', 'CED22');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Maria', 'maria@gmail.com', 8, 120, 0, 'contrasena', 'CED23');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Monica', 'monica@gmail.com', 4, 180, 0, 'contrasena', 'CED24');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Isabela', 'isabela@gmail.com', 7, 120, 0, 'contrasena', 'CED25');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Daniela', 'daniela@gmail.com', 3, 60, 0, 'contrasena', 'CED26');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Paulette', 'paulette@gmail.com', 7, 480, 0, 'contrasena', 'CED27');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Gloria', 'gloria@gmail.com', 3, 320, 0, 'contrasena', 'CED28');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Fermin', 'fermin@gmail.com', 6, 320, 0, 'contrasena', 'CED29');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Nadia', 'nadia@gmail.com', 4, 120, 0, 'contrasena', 'CED30');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Paulina', 'paulina@gmail.com', 3, 240, 0, 'contrasena', 'CED31');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Fernanda', 'fernanda@gmail.com', 2, 60, 0, 'contrasena', 'CED32');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Alejandra', 'alejandra@gmail.com', 5, 180, 0, 'contrasena', 'CED33');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Sebastian', 'sebastian@gmail.com', 1, 60, 0, 'contrasena', 'CED34');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Fabricio', 'fabricio@gmail.com', 6, 240, 0, 'contrasena', 'CED35');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Natasha', 'natasha@gmail.com', 3, 220, 0, 'contrasena', 'CED36');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Naomi', 'naomi@gmail.com', 6, 320, 0, 'contrasena', 'CED37');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('William', 'william@gmail.com', 3, 120, 0, 'contrasena', 'CED38');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Dafne', 'dafne@gmail.com', 2, 60, 0, 'contrasena', 'CED39');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Alonso', 'alonso@gmail.com', 4, 60, 0, 'contrasena', 'CED40');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Rosa', 'rosa@gmail.com', 4, 320, 0, 'contrasena', 'CED41');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Octavio', 'octavio@gmail.com', 5, 120, 0, 'contrasena', 'CED42');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Francisco', 'francisco@gmail.com', 3, 80, 0, 'contrasena', 'CED43');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Jorge', 'jorge@gmail.com', 5, 240, 0, 'contrasena', 'CED44');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Segio', 'sergio@gmail.com', 3, 60, 0, 'contrasena', 'CED45');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Santiago', 'santiago@gmail.com', 2, 120, 0, 'contrasena', 'CED46');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Fabian', 'fabian@gmail.com', 7, 60, 0, 'contrasena', 'CED47');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Rebeca', 'rebeca@gmail.com', 4, 320, 0, 'contrasena', 'CED48');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Pamela', 'pamela@gmail.com', 5, 120, 0, 'contrasena', 'CED49');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Lucia', 'lucia@gmail.com', 3, 60, 0, 'contrasena', 'CED50');

INSERT INTO organizaciones (nombre, email, password)
VALUES ('Unidos', 'unidos@gmail.com', 'contrasena');

INSERT INTO organizaciones (nombre, email, password)
VALUES ('Madi', 'madi@gmail.com', 'contrasena');

INSERT INTO organizaciones (nombre, email, password)
VALUES ('CIES', 'cies@gmail.com', 'contrasena');

INSERT INTO organizaciones (nombre, email, password)
VALUES ('Microsoft', 'microsoft@gmail.com', 'contrasena');

INSERT INTO organizaciones (nombre, email, password)
VALUES ('Sinergia', 'sinergia@gmail.com', 'contrasena');

INSERT INTO organizaciones (nombre, email, password)
VALUES ('Mayama', 'mayama@gmail.com', 'contrasena');

INSERT INTO organizaciones (nombre, email, password)
VALUES ('Paidi', 'paidi@gmail.com', 'contrasena');

INSERT INTO organizaciones (nombre, email, password)
VALUES ('Atlantic', 'atlantic@gmail.com', 'contrasena');

INSERT INTO organizaciones (nombre, email, password)
VALUES ('Semillas', 'semillas@gmail.com', 'contrasena');

INSERT INTO organizaciones (nombre, email, password)
VALUES ('Sinergia', 'sinergia@gmail.com', 'contrasena');

INSERT INTO proyectos (nombre, horas, dias, fechas, organizacion_id, descripcion, capacidad, alumnos_inscritos)
VALUES ('Campamento Unidos', 100, 'Martes', 'Enero', 1, 'Proyecto acerca de un campamento de unidos', 10, 0);

INSERT INTO proyectos (nombre, horas, dias, fechas, organizacion_id, descripcion, capacidad, alumnos_inscritos)
VALUES ('Proyecto Unidos', 80, 'Jueves', 'Marzo', 1, 'Proyecto acerca de un proyecto de unidos', 15, 0);

INSERT INTO proyectos (nombre, horas, dias, fechas, organizacion_id, descripcion, capacidad, alumnos_inscritos)
VALUES ('Curso de verano', 60, 'Lunes', 'Mayo', 1, 'Proyecto acerca de un curso de verano', 10, 0);

INSERT INTO proyectos (nombre, horas, dias, fechas, organizacion_id, descripcion, capacidad, alumnos_inscritos)
VALUES ('Clases Madi', 120, 'Viernes', 'Abril', 2, 'Proyecto para dar clases', 20, 0);

INSERT INTO proyectos (nombre, horas, dias, fechas, organizacion_id, descripcion, capacidad, alumnos_inscritos)
VALUES ('Debates Madi', 60, 'Lunes', 'Enero', 2, 'Proyecto para generar debates', 10, 0);

INSERT INTO proyectos (nombre, horas, dias, fechas, organizacion_id, descripcion, capacidad, alumnos_inscritos)
VALUES ('Clases de religion', 80, 'Martes', 'Abril', 3, 'Dar clases de religion', 20, 0);

INSERT INTO proyectos (nombre, horas, dias, fechas, organizacion_id, descripcion, capacidad, alumnos_inscritos)
VALUES ('Catecismo', 120, 'Miercoles', 'Abril', 3, 'Preparacion para la primera comunion', 20, 0);

INSERT INTO proyectos (nombre, horas, dias, fechas, organizacion_id, descripcion, capacidad, alumnos_inscritos)
VALUES ('Preparacion del matrimonio', 240, 'Jueves', 'Abril', 3, 'Preparacion para el matrimonio', 20, 0);

INSERT INTO proyectos (nombre, horas, dias, fechas, organizacion_id, descripcion, capacidad, alumnos_inscritos)
VALUES ('Cursos de informatica', 120, 'Lunes', 'Marzo', 4, 'Clases de informatica avanzada', 15, 0);

INSERT INTO proyectos (nombre, horas, dias, fechas, organizacion_id, descripcion, capacidad, alumnos_inscritos)
VALUES ('Curso de computacion', 120, 'Lunes', 'Marzo', 4, 'Clases de computacion basicas', 15, 0);

INSERT INTO proyectos (nombre, horas, dias, fechas, organizacion_id, descripcion, capacidad, alumnos_inscritos)
VALUES ('Clases de natacion', 80, 'Viernes', 'Mayo', 5, 'Clases de natacion basicas', 5, 0);

INSERT INTO proyectos (nombre, horas, dias, fechas, organizacion_id, descripcion, capacidad, alumnos_inscritos)
VALUES ('Club de lectura', 60, 'Lunes', 'Febrero', 6, 'Un club de lectura', 10, 0);

INSERT INTO proyectos (nombre, horas, dias, fechas, organizacion_id, descripcion, capacidad, alumnos_inscritos)
VALUES ('Debate de politica', 60, 'Lunes', 'Febrero', 6, 'Debates de cualquier tema', 10, 0);

INSERT INTO proyectos (nombre, horas, dias, fechas, organizacion_id, descripcion, capacidad, alumnos_inscritos)
VALUES ('Clases de lectura', 240, 'Miercoles', 'Junio', 7, 'Clases para aprender a leer', 15, 0);

INSERT INTO proyectos (nombre, horas, dias, fechas, organizacion_id, descripcion, capacidad, alumnos_inscritos)
VALUES ('Clases de esgrima', 320, 'Lunes', 'Julio', 8, 'Clases de esgirma basicas', 5, 0);

INSERT INTO proyectos (nombre, horas, dias, fechas, organizacion_id, descripcion, capacidad, alumnos_inscritos)
VALUES ('Clases de equitacion', 320, 'Jueves', 'Mayo', 8, 'Clases de equitacion basicas', 5, 0);

INSERT INTO proyectos (nombre, horas, dias, fechas, organizacion_id, descripcion, capacidad, alumnos_inscritos)
VALUES ('Trabajo en la fundacion', 480, 'Lunes', 'Mayo', 9, 'Laborar en la fundacion apoyando a los adultos', 3, 0);

INSERT INTO proyectos (nombre, horas, dias, fechas, organizacion_id, descripcion, capacidad, alumnos_inscritos)
VALUES ('Clases de ingles', 120, 'Martes', 'Abril', 10, 'Clases de ingles basicas', 10, 0);

INSERT INTO proyectos (nombre, horas, dias, fechas, organizacion_id, descripcion, capacidad, alumnos_inscritos)
VALUES ('Clases de aleman', 120, 'Jueves', 'Abril', 10, 'Clases de aleman basicas', 10, 0);

INSERT INTO administradores (nombre, email, password)
VALUES ('Iara', 'iara@up.edu.mx', 'contrasena');