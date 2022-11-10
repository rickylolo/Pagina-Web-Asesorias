
<?php
include_once 'db.php';

class User extends DB
{

    // Registrar usuarios 
    function insertUser($username, $password, $names, $lastName, $email, $telefono, $user_Type, $user_IMG)
    {
        $user_IMG = mysqli_escape_string($this->myCon(), $user_IMG);
        $insert = "CALL sp_GestionUsuario('I',NULL,'$username','$password','$names','$lastName','$email','$telefono',$user_Type,'$user_IMG')";
        $query = $this->connect()->query($insert);
        return $query;
    }

    // Editar Usuarios
    function updateUser($idUser, $username, $password, $names, $lastName, $email, $telefono, $user_Type, $user_IMG)
    {
        $user_IMG = mysqli_escape_string($this->myCon(), $user_IMG);
        $update = "CALL sp_GestionUsuario('E',$idUser,'$username','$password','$names','$lastName','$email','$telefono',$user_Type,'$user_IMG')";
        $query = $this->connect()->query($update);
        return $query;
    }

    // Inicio de sesion 
    function log_in($username, $password)
    {
        $login = "CALL sp_GestionUsuario('L',NULL,'$username','$password',NULL,NULL,NULL,NULL,NULL,NULL)";
        $query = $this->connect()->query($login);
        return $query;
    }
}


?>