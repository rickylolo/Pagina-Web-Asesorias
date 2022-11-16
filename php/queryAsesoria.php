
<?php
include_once 'db.php';

class Asesoria extends DB
{
    // Registrar Asesoria 
    function insertAsesoria($sp_Usuario_id, $sp_fecha, $sp_hora, $sp_nombreMateria, $sp_descripcionMateria, $sp_lugar, $sp_costo)
    {
        $insert = "CALL sp_GestionAsesoria('I', 
        NULL, 
        $sp_Usuario_id, 
        '$sp_fecha', 
        '$sp_hora', 
        '$sp_nombreMateria',
        '$sp_descripcionMateria',
        '$sp_lugar', 
        '$sp_costo');"; //Mi CALL de mi procedimiento almacenado
        $query = $this->connect()->query($insert); //Ejecuto mi Query con mi conexion a MySQL
        return $query;
    }


    // Obtener Total de Asesorias
    function getTotalAsesorias()
    {
        $consulta = "CALL sp_GestionAsesoria('G',
        NULL,
        NULL,
        NULL,
        NULL, 
        NULL,
        NULL, 
        NULL,
        NULL);";
        $query = $this->connect()->query($consulta);
        return $query;
    }


    // Delete Asesoria
    function deleteAsesoria($id)
    {
        $consulta = "CALL sp_GestionAsesoria('D',
        $id,
        NULL,
        NULL,
        NULL, 
        NULL,
        NULL, 
        NULL,
        NULL);";
        $query = $this->connect()->query($consulta);
        return $query;
    }


    // Obtener Total de Asesorias
    function getTotalAsesoriasDia($dia)
    {
        $consulta = "CALL sp_GestionAsesoria('H',
        NULL,
        NULL,
        '$dia',
        NULL, 
        NULL,
        NULL, 
        NULL,
        NULL);";
        $query = $this->connect()->query($consulta);
        return $query;
    }
}


?>