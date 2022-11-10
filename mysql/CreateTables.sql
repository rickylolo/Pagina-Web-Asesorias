CREATE DATABASE PROYECTOASESORIAS;
USE PROYECTOASESORIAS;

DROP TABLE IF EXISTS Usuario;
-- 												TABLA DE USUARIOS										 --
CREATE TABLE Usuario(
	Usuario_id INT(6) AUTO_INCREMENT NOT NULL COMMENT'Clave Primaria Tabla Usuario',
	nombres VARCHAR(40) NOT NULL  COMMENT'Nombre(s) del usuario',
	apellidos VARCHAR(40) NOT NULL COMMENT'Apellidos del usuario',
	fechaNacimiento DATE NOT NULL COMMENT'Fecha de nacimiento del usuario',
	carrera VARCHAR(50) NOT NULL COMMENT'Nombre completo del usuario',
	semestre INT(2) NOT NULL COMMENT'Apellido materno del usuario',
	matricula VARCHAR(8) NOT NULL COMMENT'Apellido paterno del usuario',
	contraseña VARCHAR(15) NOT NULL COMMENT'Apellido paterno del usuario',
    fotoPerfil MEDIUMBLOB COMMENT'Foto de perfil tipo avatar',
 CONSTRAINT PK_Usuario
	PRIMARY KEY (Usuario_id)
);