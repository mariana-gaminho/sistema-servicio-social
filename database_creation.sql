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
	capacidad INT
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
VALUES ('Pepe', 'pepe@gmail.com', 3, 120, 1, 'contrasena', 'CED1');

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password, cedula)
VALUES ('Juanito', 'juanito@gmail.com', 6, 320, 2, 'contrasena', 'CED2');

INSERT INTO organizaciones (nombre, email, password)
VALUES ('Unidos', 'unidos@gmail.com', 'contrasena');

INSERT INTO organizaciones (nombre, email, password)
VALUES ('Sinergia', 'sinergia@gmail.com', 'contrasena');

INSERT INTO proyectos (nombre, horas, dias, fechas, organizacion_id, descripcion, capacidad)
VALUES ('Campamento Unidos', 10, 'Martes', 'Enero', 1, 'Proyecto acerca de un campamento de unidos', 5);

INSERT INTO proyectos (nombre, horas, dias, fechas, organizacion_id, descripcion, capacidad)
VALUES ('Proyecto Unidos', 11, 'Jueves', 'Marzo', 1, 'Proyecto acerca de un proyecto de unidos', 10);

INSERT INTO proyectos (nombre, horas, dias, fechas, organizacion_id, descripcion, capacidad)
VALUES ('Curso de verano', 12, 'Lunes', 'Mayo', 1, 'Proyecto acerca de un curso de verano', 3);

INSERT INTO administradores (nombre, email, password)
VALUES ('Iara', 'iara@up.edu.mx', 'contrasena');