
<?php
include_once 'db.php';

class User extends DB
{

    // Registrar usuarios 
    function insertUser($nombres, $apellidos, $fechaNacimiento, $carrera, $semestre, $matricula, $contraseña)
    {
        $insert = "CALL sp_GestionUsuario('I', 
        NULL, 
        '$nombres', 
        '$apellidos', 
        '$fechaNacimiento', 
        '$carrera',
        $semestre,
        '$matricula', 
        '$contraseña',
        NULL);";
        $query = $this->connect()->query($insert);
        return $query;
    }

    // Editar Usuarios
    function updateUser($userId, $nombres, $apellidos, $fechaNacimiento, $carrera, $semestre, $matricula, $contraseña, $user_IMG)
    {
        $user_IMG = mysqli_escape_string($this->myCon(), $user_IMG);
        $update = "CALL sp_GestionUsuario('E', 
        $userId, 
        '$nombres', 
        '$apellidos', 
        '$fechaNacimiento', 
        '$carrera',
        $semestre,
        '$matricula', 
        '$contraseña',
        '$user_IMG');";
        $query = $this->connect()->query($update);
        return $query;
    }

    // Inicio de sesion 
    function log_in($matricula, $password)
    {
        $login = "CALL sp_GestionUsuario('L', 
        NULL,
        NULL,
        NULL, 
        NULL, 
        NULL, 
        NULL,
        '$matricula', 
        '$password', 
        NULL);";
        $query = $this->connect()->query($login);
        return $query;
    }
}


?>