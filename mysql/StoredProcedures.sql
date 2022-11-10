USE PROYECTOASESORIAS;
/*--------------------------------------------------------------------------------USUARIOS--------------------------------------------------------------------------*/
DROP PROCEDURE IF EXISTS sp_GestionUsuario;
DELIMITER //

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