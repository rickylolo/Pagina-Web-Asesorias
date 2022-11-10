<?php
include_once 'queryUser.php';





class userAPI
{
    function seleccionLoggeo(string $matricula, string $password)
    {

        $user = new User();
        $arrUsers = array();
        $arrUsers["Datos"] = array();

        $res = $user->log_in($matricula, $password);

        if ($res) { // Entra si hay información
            session_start();
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {

                $obj = array(
                    "Usuario_id" => $row['Usuario_id']
                );
                $_SESSION['Usuario_id'] = $obj["Usuario_id"];
                array_push($arrUsers["Datos"], $obj);
            }
            if (!$res->fetch(PDO::FETCH_ASSOC)) {
                header("Location:../perfil.php");
                exit();
            }
        } else {
            header("Location:../index.html");
            exit();
        }
    }

    function insertarUser($nombres, $apellidos, $fechaNacimiento, $carrera, $semestre, $matricula, $pass)
    {
        $user = new User();
        $user->insertUser($nombres, $apellidos, $fechaNacimiento, $carrera, $semestre, $matricula, $pass);
    }

    function actualizarUser($idUser, $username, $password, $names, $lastName, $email, $telefono, $user_Type, $user_IMG)
    {
        $user = new User();
        $user->updateUser($idUser, $username, $password, $names, $lastName, $email, $telefono, $user_Type, $user_IMG);
    }

    function cerrarSesion()
    {
        session_start();
        session_destroy();
        header("Location:index.php");
        exit();
    }
}

//AJAX
// Funcion Mis datos Usuario

if (isset($_POST['funcion'])) {
    $funcion = $_POST['funcion'];
    switch ($funcion) {
        case "registrarUsuario":
            $var = new userAPI();
            $var->insertarUser($_POST['nombres'], $_POST['apellidos'], $_POST['fechaNacimiento'], $_POST['carrera'], $_POST['semestre'], $_POST['matricula'], $_POST['password']);
            break;
        case "actualizarUser":
            $binariosImagen1 = '';
            if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != NULL) {
                $tipoArchivo1 = $_FILES['file']['type'];
                $nombreArchivo1 = $_FILES['file']['name'];
                $tamanoArchivo1 = $_FILES['file']['size'];
                $imagenSubida1 = fopen($_FILES['file']['tmp_name'], 'r');
                $binariosImagen1 = fread($imagenSubida1, $tamanoArchivo1);
            }
            session_start();
            $id = $_SESSION['Usuario_id'];
            $var = new userAPI();
            $var->actualizarUser($id, $_POST['nombres'], $_POST['apellidos'], $_POST['fechaNacimiento'], $_POST['carrera'], $_POST['semestre'], $_POST['matricula'], $_POST['contraseña'], $binariosImagen1);
            break;
    }
}

//Cerrar Sesión
if (isset($_GET['logout'])) {
    $var = new userAPI();
    $var->cerrarSesion();
}

// Buscar User
if (isset($_POST['matricula']) && isset($_POST['password'])) {
    $var = new userAPI();
    $var->seleccionLoggeo($_POST['matricula'], $_POST['password']);
}
