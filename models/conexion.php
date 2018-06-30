<?php

require_once "config.php";

class BaseDatos
{
    public $conexion;
    public $db;

    public function conectar()
    {
        $this->conexion = mysql_connect(HOST, USER, PASS);
        if ($this->conexion == 0) die("Lo sentimos, no se ha podido conectar con MySQL: " . mysql_error());
        $this->db = mysql_select_db(DBNAME, $this->conexion);
        if ($this->db == 0) die("Lo sentimos, no se ha podido conectar con la base datos: " . DBNAME);

        return true;

    }

    public function desconectar()
    {
        //if ($this->conectar()->conexion) {
          //  mysql_close($this->$conexion);
        //}

    }

    public function dbconexion(){
        
        $mysqli = new mysqli(HOST, USER, PASS, DBNAME);
        return $mysqli;
    }

    public function pruebadb()
    {
        $tabla = "usuario";
        $query = mysql_query("SELECT * from $tabla", $this->conexion);
        
    }
}

?>