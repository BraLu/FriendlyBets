<?php
class usuario_model{
    private $db;
    private $usuarios;
    private $grupo;
 
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

    public function crearGrupo($p_Nombre_Grp, $p_Usr_Admin, $p_Monto_Apuesta, $p_Tipo_Grp){
        $consulta=$this->db->query("CALL sp_crear_grupo('".$p_Nombre_Grp."',".$p_Usr_Admin.",".$p_Monto_Apuesta.",'".$p_Tipo_Grp."')");
        while($filas=$consulta->fetch_assoc()){
            $this->grupo=$filas;
        }
        return $this->grupo;
    }

    public function crearPartido($p_Equipo_1, $p_Equipo_2, $p_Fecha_Part, $p_Hora_Part){
        $consulta=$this->db->query("CALL sp_crear_partido('".$p_Equipo_1."','".$p_Equipo_2."','".$p_Fecha_Part."','".$p_Hora_Part."')");
        while($filas=$consulta->fetch_assoc()){
            $this->partido=$filas;
        }
        return $this->partido;
    }

    public function crearApuesta($p_Id_Grp, $p_Id_Usr, $p_Id_Partido,$p_Ind_Pago){
        $consulta=$this->db->query("CALL sp_crear_apuesta(".$p_Id_Grp.",".$p_Id_Usr.",".$p_Id_Partido.",'".$p_Ind_Pago."')");
        //while($filas=$consulta->fetch_assoc()){
            //$this->apuesta=$filas;
        //}
        //return $this->$apuesta;
    }

}
?>