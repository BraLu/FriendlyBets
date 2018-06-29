<?php
class usuario_model{
    private $db;
    private $usuarios;
 
    public function __construct(){
        $this->db=BaseDatos::conectar();
        $this->usuarios=array();
    }
    public function getAmigos($idUsuario){
        $consulta=$this->db->query("CALL sp_Amigos(".$idUsuario.")");
        while($filas=$consulta->fetch_assoc()){
            $this->usuarios[]=$filas;
        }
        return $this->usuarios;
    }
}
?>