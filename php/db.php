<?php

class DB
{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct()
    {
        $this->host = 'localhost';
        $this->db = 'PROYECTOASESORIAS'; // Nombre de la base de datos
        $this->user = 'root'; //Usuario de MySQL
        $this->password = ''; // Contraseña de MySQL
        $this->charset = 'utf8mb4'; // Juego de Caracteres
    }

    function connect()
    {
        try {
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;

            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $pdo = new PDO($connection, $this->user, $this->password);
            //Funcion para intentar realizar la conexion en mysql en caso de que no me arrojara las excepciones
            return $pdo;
        } catch (PDOException $e) {
            print_r('Error Connection: ' . $e->getMessage());
        }
    }
    function myCon()  //Conexion con mysqli para mis imagenes
    {
        $con = mysqli_connect($this->host,  $this->user, $this->password, $this->db);
        return $con;
    }
}
