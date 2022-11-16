CREATE DATABASE PROYECTOASESORIAS; #Creo mi base de datos
USE PROYECTOASESORIAS; #Defino que esta es la que usare

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
ALTER TABLE Usuario ADD COLUMN descripcionUsuario VARCHAR(45);
ALTER TABLE Usuario ADD COLUMN materiaAsesoria VARCHAR(45);
# Creo mis tablas defino mis datos, le doy una llave primaria y le añado unas columnas que no defini previamente

DROP TABLE IF EXISTS Asesoria;
-- 												TABLA DE ASESORIAS									 --
CREATE TABLE Asesoria(
	Asesoria_id INT(6) AUTO_INCREMENT NOT NULL COMMENT'Clave Primaria Tabla Asesoria',
    Usuario_id INT(6) NOT NULL COMMENT'Clave Foreanea Tabla Usuario',
	fecha DATE NOT NULL COMMENT'fecha de la asesoria',	
    hora VARCHAR(40) NOT NULL COMMENT'hora de la asesoria',
	nombreMateria VARCHAR(40) NOT NULL COMMENT'nombreMateria de la asesoria',
	descripcionMateria  VARCHAR(40) NOT NULL COMMENT'descripcionMateria de la asesoria',
	lugar VARCHAR(50) NOT NULL COMMENT'lugar de la asesoria',
	costo VARCHAR(7)  NOT NULL COMMENT'costo de la asesoria',
 CONSTRAINT PK_Asesoria
	PRIMARY KEY (Asesoria_id),
    CONSTRAINT FK_Asesoria_Usuario
	FOREIGN KEY (Usuario_id) REFERENCES Usuario(Usuario_id)
);
# Igual que la de usuarios pero con una llave foranea para referenciar a los usuarios