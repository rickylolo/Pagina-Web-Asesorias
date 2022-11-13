<?php
include_once 'queryUser.php';





class userAPI
{
    function seleccionLoggeo($matricula, $password)
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
                if ($_SESSION != NULL) {
                    header("Location:../perfil.php");
                    exit();
                } else {
                    header("Location:../index.php");
                    exit();
                }
            }
        } else {
            header("Location:../index.php");
            exit();
        }
    }

    function insertarUser($nombres, $apellidos, $fechaNacimiento, $carrera, $semestre, $matricula, $pass)
    {
        $user = new User();
        $user->insertUser($nombres, $apellidos, $fechaNacimiento, $carrera, $semestre, $matricula, $pass);
    }

    function actualizarUser($idUser, $nameAsesor, $carreraAsesor, $infoAsesor, $materiaAsesor, $user_IMG)
    {
        $user = new User();
        $user->updateUser($idUser, $nameAsesor, $carreraAsesor, $infoAsesor, $materiaAsesor, $user_IMG);
    }


    function getUser($idUser)
    {
        $user = new User();
        $arrUsers = array();
        $arrUsers["Datos"] = array();

        $res = $user->getUser($idUser);

        if ($res) { // Entra si hay información
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {

                $obj = array(
                    "nombres" => $row['nombres'],
                    "carrera" => $row['carrera'],
                    "descripcionUsuario" => $row['descripcionUsuario'],
                    "materiaAsesoria" => $row['materiaAsesoria'],
                    "fotoPerfil" => base64_encode(($row['fotoPerfil']))


                );
                array_push($arrUsers["Datos"], $obj);
            }
            echo json_encode($arrUsers["Datos"]);
        } else {
            header("Location:../perfil.php");
            exit();
        }
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
            $var->actualizarUser($id, $_POST['nameAsesor'], $_POST['carreraAsesor'], $_POST['infoAsesor'], $_POST['materiaAsesor'], $binariosImagen1);
            break;
        case "obtenerMiUser":
            session_start();
            if ($_SESSION != NULL) {
                $var = new userAPI();
                $var->getUser($_SESSION['Usuario_id']);
            }
            break;
    }
}
//Cerrar Sesión
if (isset($_GET['logout'])) {
    $var = new userAPI();
    $var->cerrarSesion();
}

// Registrar User
if (isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['nacimiento']) && isset($_POST['carrera']) && isset($_POST['semestre']) && isset($_POST['matricula_register']) && isset($_POST['password_register'])) {
    $var = new userAPI();
    $var->insertarUser($_POST['nombre'], $_POST['apellidos'], $_POST['nacimiento'], $_POST['carrera'], $_POST['semestre'], $_POST['matricula_register'], $_POST['password_register']);
    header("Location:../index.php");
}

// Buscar User
if (isset($_POST['matricula']) && isset($_POST['password'])) {
    $var = new userAPI();
    $var->seleccionLoggeo($_POST['matricula'], $_POST['password']);
}
