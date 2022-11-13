<?php
include_once 'queryAsesoria.php';





class asesoriaAPI
{


    function insertarAsesoria($sp_Usuario_id, $sp_fecha, $sp_hora, $sp_nombreMateria, $sp_descripcionMateria, $sp_lugar, $sp_costo)
    {
        $Asesoria = new Asesoria();
        $Asesoria->insertAsesoria($sp_Usuario_id, $sp_fecha, $sp_hora, $sp_nombreMateria, $sp_descripcionMateria, $sp_lugar, $sp_costo);
    }
    function deleteAsesoria($id)
    {
        $Asesoria = new Asesoria();
        $Asesoria->deleteAsesoria($id);
    }

    function getTotalAsesorias()
    {
        $Asesoria = new Asesoria();
        $arrAsesoria = array();
        $arrAsesoria["Datos"] = array();

        $res = $Asesoria->getTotalAsesorias();

        if ($res) { // Entra si hay información
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {

                $obj = array(
                    "fecha" => $row['fecha'],
                    "totalHoras" => $row['totalHoras']
                );
                array_push($arrAsesoria["Datos"], $obj);
            }
            echo json_encode($arrAsesoria["Datos"]);
        } else {
            header("Location:../editarPerfil.php");
            exit();
        }
    }

    function getTotalAsesoriasDia($dia)
    {
        $Asesoria = new Asesoria();
        $arrAsesoria = array();
        $arrAsesoria["Datos"] = array();

        $res = $Asesoria->getTotalAsesoriasDia($dia);

        if ($res) { // Entra si hay información
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {

                $obj = array(
                    "Asesoria_id" => $row['Asesoria_id'],
                    "Usuario_id" => $row['Usuario_id'],
                    "hora" => $row['hora'],
                    "nombreMateria" => $row['nombreMateria'],
                    "lugar" => $row['lugar'],
                    "costo" => $row['costo'],
                    "nombreCompleto" => $row['nombreCompleto']

                );
                array_push($arrAsesoria["Datos"], $obj);
            }
            echo json_encode($arrAsesoria["Datos"]);
        } else {
            header("Location:../editarPerfil.php");
            exit();
        }
    }
}

//AJAX
// Funcion Mis datos Usuario

if (isset($_POST['funcion'])) {
    $funcion = $_POST['funcion'];
    switch ($funcion) { //Hago un switch con mis funciones que envie desde mi script
        case "registrarAsesoria":
            session_start();
            $id = $_SESSION['Usuario_id'];
            $var = new asesoriaAPI();
            $var->insertarAsesoria($id, $_POST['dia'], $_POST['hora'], $_POST['nombreMateria'], $_POST['Descripcion'], $_POST['Lugar'], $_POST['Costo']);
            break;
        case "getTotalAsesorias":
            $var = new asesoriaAPI();
            $var->getTotalAsesorias();
            break;
        case "getAsesoriasDia":
            $var = new asesoriaAPI();
            $var->getTotalAsesoriasDia($_POST['dia']);
            break;
        case "eliminarAsesoria":
            $var = new asesoriaAPI();
            $var->deleteAsesoria($_POST['id']);
            break;
    }
}
