<?php
class usuario_model{
    private $db;
    private $usuarios;
 
    public function __construct(){
        $this->db=BaseDatos::dbconexion();
        $this->usuarios=array();
    }

    public function getAmigos($idUsuario,$valueSeaarch){
        $consulta=$this->db->query("CALL sp_Amigos(".$idUsuario.",'".$valueSeaarch."')");
        while($filas=$consulta->fetch_assoc()){
            $this->usuarios[]=$filas;
        }
        return $this->usuarios;
    }

    public function getUsuario($idUsuario){
        $consulta=$this->db->query("CALL sp_Usuario(".$idUsuario.")");
        while($filas=$consulta->fetch_assoc()){
            $this->usuarios[]=$filas;
        }
        return $this->usuarios;
    }

    public function registrarAmistad($idUsuario,$email){
        $consulta=$this->db->query("CALL sp_Registrar_Amigo(".$idUsuario.",'".$email."')");
        //while($filas=$consulta->fetch_assoc()){
            //$this->usuarios[]=$filas;
        //}
        return $this->usuarios;
    }

}
?>