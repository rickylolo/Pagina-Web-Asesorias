USE PROYECTOASESORIAS;
/*--------------------------------------------------------------------------------USUARIOS--------------------------------------------------------------------------*/
DROP PROCEDURE IF EXISTS sp_GestionUsuario;
DELIMITER //
# Los Procedimientos almacenados son los que uso para modificar las tablas, insertar valores y eliminar valores, los llamo desde PHP en mi api desarrollada
CREATE PROCEDURE sp_GestionUsuario
(
Operacion CHAR(1),
sp_Usuario_id INT(6),
sp_nombres VARCHAR(40),
sp_apellidos VARCHAR(40),
sp_fechaNacimiento DATE,
sp_carrera VARCHAR(50),
sp_semestre VARCHAR(2),
sp_matricula VARCHAR(8),
sp_contraseña  VARCHAR(30),
sp_fotoPerfil MEDIUMBLOB
)

BEGIN
   IF Operacion = 'I' /*INSERT USUARIO*/
   THEN  
		INSERT INTO Usuario(nombres,apellidos,fechaNacimiento,carrera,semestre,matricula,contraseña) 
			VALUES (sp_nombres,sp_apellidos,sp_fechaNacimiento,sp_carrera,sp_semestre,sp_matricula,sp_contraseña);
   END IF;
	IF Operacion = 'E'  /*EDIT USUARIO*/
    THEN 
    	SET sp_nombres=IF(sp_nombres='',NULL,sp_nombres),
			sp_carrera=IF(sp_carrera='',NULL,sp_carrera),
			sp_apellidos=IF(sp_apellidos='',NULL,sp_apellidos), # Aqui uso la variable apellidos para cambiar la inf del asesor
            sp_contraseña=IF(sp_contraseña='',NULL,sp_contraseña), # Aqui uso la variable contraseña para cambiar la materia que imparte el asesor
            sp_fotoPerfil=IF(sp_fotoPerfil='',NULL,sp_fotoPerfil);
		UPDATE Usuario 
			SET nombres = IFNULL(sp_nombres,nombres), 
			descripcionUsuario=  IFNULL(sp_apellidos,descripcionUsuario), 
            materiaAsesoria = IFNULL(sp_contraseña, materiaAsesoria),
			carrera= IFNULL(sp_carrera,carrera), 
            fotoPerfil= IFNULL(sp_fotoPerfil,fotoPerfil)
		WHERE Usuario_id=sp_Usuario_id;
   END IF;
	IF Operacion = 'L' THEN /*INICIO DE SESION USUARIO*/
	SELECT Usuario_id FROM Usuario WHERE matricula = sp_matricula AND contraseña = sp_contraseña;
   END IF;
   IF Operacion = 'G' THEN /*GET MY USER*/
	SELECT nombres,carrera,descripcionUsuario,materiaAsesoria,fotoPerfil FROM Usuario WHERE Usuario_id = sp_Usuario_id;
   END IF;
END //



# Ejemplo SP Insert
CALL sp_GestionUsuario('I', #Operacion
NULL, #Id Usuario
'Ricardo Alberto', #Nombres
'Grimaldo Estevez', #Apellidos
'2001-06-29', #Fecha Nacimiento
'Ing. En Mecatronica', #Carrera
5, #Semestre
'1868520', # Matricula
'123', # Contraseña
NULL #PFP
);

# Ejemplo SP Inicio Sesion
CALL sp_GestionUsuario('L', #Operacion
NULL, #Id Usuario
NULL, #Nombres
NULL, #Apellidos
NULL, #Fecha Nacimiento
NULL, #Carrera
NULL, #Semestre
'1868520', # Matricula
'1234', # Contraseña
NULL #PFP
);


# Ejemplo SP Insert
CALL sp_GestionUsuario('G', #Operacion
1, #Id Usuario
NULL, #Nombres
NULL, #Apellidos
NULL, #Fecha Nacimiento
NULL, #Carrera
NULL, #Semestre
NULL, # Matricula
NULL, # Contraseña
NULL #PFP
);


Select * from Usuario;

/*
Asesoria_id INT(6) AUTO_INCREMENT NOT NULL COMMENT'Clave Primaria Tabla Asesoria',
    Usuario_id INT(6) NOT NULL COMMENT'Clave Foreanea Tabla Usuario',
	fecha DATE NOT NULL UNIQUE COMMENT'fecha de la asesoria',
	nombreMateria VARCHAR(40) NOT NULL COMMENT'nombreMateria de la asesoria',
	descripcionMateria  VARCHAR(40) NOT NULL COMMENT'descripcionMateria de la asesoria',
	lugar VARCHAR(50) NOT NULL COMMENT'lugar de la asesoria',
	costo VARCHAR(7)  NOT NULL COMMENT'costo de la asesoria',
*/
/*--------------------------------------------------------------------------------ASESORIAS--------------------------------------------------------------------------*/
DROP PROCEDURE IF EXISTS sp_GestionAsesoria;
DELIMITER //

CREATE PROCEDURE sp_GestionAsesoria
(
Operacion CHAR(1),
sp_Asesoria_id INT(6),
sp_Usuario_id INT(6),
sp_fecha DATE,
sp_hora VARCHAR(40),
sp_nombreMateria VARCHAR(40),
sp_descripcionMateria VARCHAR(40),
sp_lugar VARCHAR(50),
sp_costo VARCHAR(7)
)

BEGIN
   IF Operacion = 'I' /*INSERT ASESORIA*/
   THEN  
		INSERT INTO Asesoria(Usuario_id,fecha,hora,nombreMateria,descripcionMateria,lugar,costo) 
			VALUES (sp_Usuario_id,sp_fecha,sp_hora,sp_nombreMateria,sp_descripcionMateria,sp_lugar,sp_costo);
   END IF;
   IF Operacion = 'D' THEN /*DELETE ASESORIA*/
	DELETE FROM Asesoria WHERE Asesoria_id = sp_Asesoria_id;
   END IF;
   IF Operacion = 'G' THEN /*GET NO ASESORIAS DIA*/
	SELECT fecha,COUNT(hora) AS totalHoras FROM Asesoria WHERE fecha IS NOT NULL GROUP BY fecha; 
   END IF;
   IF Operacion = 'H' THEN /*GET ASESORIAS DIA*/
	SELECT Asesoria_id,Usuario.Usuario_id,hora,nombreMateria,lugar,costo,CONCAT(nombres,' ',apellidos) AS nombreCompleto FROM Asesoria INNER JOIN Usuario
	ON Asesoria.Usuario_id = Usuario.Usuario_id
    WHERE fecha = sp_fecha;
   END IF;
END //

SELECT * FROM Asesoria;

