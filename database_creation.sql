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
	password varchar(80)
);

CREATE TABLE proyectos (
	proyecto_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	nombre varchar(80),
	horas INT,
	dias varchar(20),
	fechas varchar(30),
	organizacion_id varchar(100)
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

INSERT INTO alumnos (nombre, email, semestre, horas, proyecto_id, password)
VALUES ('Pepe', 'pepegmail.com', 3, 120, 1, 'contrasena');