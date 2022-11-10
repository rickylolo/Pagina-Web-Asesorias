<?php
include_once 'queryUser.php';





class userAPI
{
    function seleccionLoggeo(string $username, string $password)
    {

        $user = new User();
        $arrUsers = array();
        $arrUsers["Datos"] = array();

        $res = $user->log_in($username, $password);

        if ($res) { // Entra si hay información
            session_start();
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {

                $obj = array(
                    "id" => $row['id'],
                    "tipo_Usuario" => $row['user_Type']
                );
                $_SESSION['id'] = $obj["id"];
                $_SESSION['userType'] = $obj["tipo_Usuario"];
                array_push($arrUsers["Datos"], $obj);
            }
            if (!$res->fetch(PDO::FETCH_ASSOC)) {
                //Normal user
                if ($_SESSION['userType'] == 1) {
                    header("Location:../index.php");
                    exit();
                }
                //reporter
                if ($_SESSION['userType'] == 2) {
                    header("Location:../reporterPage.php");
                    exit();
                }
                //editor
                if ($_SESSION['userType'] == 3) {
                    header("Location:../editorPage.php");
                    exit();
                }
            }
        } else {
            header("Location:../index.php");
            exit();
        }
    }

    function insertarUser($username, $password, $names, $lastName, $email, $telefono, $user_Type, $user_IMG)
    {
        $user = new User();
        $user->insertUser($username, $password, $names, $lastName, $email, $telefono, $user_Type, $user_IMG);
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
            $tipoArchivo = $_FILES['file']['type'];
            $nombreArchivo = $_FILES['file']['name'];
            $tamanoArchivo = $_FILES['file']['size'];
            $imagenSubida = fopen($_FILES['file']['tmp_name'], 'r');
            $binariosImagen = fread($imagenSubida, $tamanoArchivo);
            session_start();
            $tipoUsuario = 1;
            if ($_SESSION != NULL) {
                if ($_SESSION['userType'] == 3) {
                    $tipoUsuario = 2;
                }
            }
            $var = new userAPI();
            $var->insertarUser($_POST['usuario'], $_POST['contrasenia'], $_POST['names'], $_POST['lastName'], $_POST['email'], $_POST['telefono'], $tipoUsuario, $binariosImagen);
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
            $id = $_SESSION['id'];
            $tipoUser = $_SESSION['userType'];

            $var = new userAPI();
            $var->actualizarUser($id, $_POST['E_usuario'], $_POST['E_contrasenia'], $_POST['E_names'], $_POST['E_lastName'], $_POST['E_email'], $_POST['E_telefono'], $tipoUser, $binariosImagen1);
            break;
    }
}

//Cerrar Sesión
if (isset($_GET['logout'])) {
    $var = new userAPI();
    $var->cerrarSesion();
}


// Buscar User
if (isset($_POST['username']) && isset($_POST['password'])) {
    $var = new userAPI();
    $var->seleccionLoggeo($_POST['username'], $_POST['password']);
}
