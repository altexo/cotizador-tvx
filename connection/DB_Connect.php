<?php
class DB_Connect 
{
    function __construct() 
    {

    }

    function __destruct() 
    {

    }

    public function connect() 
    {
        //creamos el socket para conectar con la BD
        $dbhost = "localhost"; 
        $dbuser = "teamvoxt_manager"; 
        $dbpass = "Teamvoxhost1"; 
        $dbname = "teamvoxt_teamvox"; 
            /*$dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $dbname = 'ejercicio';*/

        //require_once 'include/config.php';
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

        if ($conn->connect_error) 
        {
            die("Connection failed: " . $conn->connect_error);
        } 

        return $conn;
    }

    public function close() {
        mysql_close();
    }

}
?>