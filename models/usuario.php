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

    public function crearApuesta($p_Id_Grp, $p_Id_Usr, $p_Id_Partido,$p_Ind_Pago,$p_Sts_Solicitud_Usr){
        $consulta=$this->db->query("CALL sp_crear_apuesta(".$p_Id_Grp.",".$p_Id_Usr.",".$p_Id_Partido.",'".$p_Ind_Pago."','".$p_Sts_Solicitud_Usr."')");
        //while($filas=$consulta->fetch_assoc()){
            //$this->apuesta=$filas;
        //}
        //return $this->$apuesta;
    }

    public function getByDetallePendienteGrupo($id_grp){
        $consulta=$this->db->query("select g.Id_grp, g.Nombre_Grp, g.Usr_Admin, g.Sts_Grp, g.Monto_Apuesta, g.Tipo_Grp
from grupo g where g.Id_grp = ".$id_grp.";");
        while($filas=$consulta->fetch_assoc()){
            $this->usuarios[]=$filas;
        }
        return $this->usuarios;
    }

    public function getByDetallePendienteUsuarios($id_grp, $idusuario){
        $consulta=$this->db->query("select distinct a.Id_Usr, u.Nombre, u.Apellidos, u.email,a.Ind_Pago, a.Sts_Solicitud_Usr
from grupo g inner join apuesta a on (g.Id_Grp = a.Id_Grp) inner join usuario u on (a.Id_Usr = u.IdUsuario)
where g.Id_grp = ".$id_grp." and a.Id_Usr<>".$idusuario.";");
        while($filas=$consulta->fetch_assoc()){
            $this->usuarios[]=$filas;
        }
        return $this->usuarios;
    }

    public function getByDetallePendientePartidos($id_grp){
        $consulta=$this->db->query("select distinct a.Id_Partido, p.Equipo_1, p.Equipo_2, p.Fecha_Part, p.Hora_Part, p.Sts_part
from grupo g inner join apuesta a on (g.Id_Grp = a.Id_Grp)
inner join partido p on (a.Id_Partido = p.Id_Partido) 
where g.Id_grp = ".$id_grp.";");
        while($filas=$consulta->fetch_assoc()){
            $this->usuarios[]=$filas;
        }
        return $this->usuarios;
    }

    public function actualizarGrupo($p_Id_Grp, $p_IdUsuario, $p_Ind_Pago){
        $consulta=$this->db->query("CALL sp_actualizar_grupo(".$p_Id_Grp.",".$p_IdUsuario.",'".$p_Ind_Pago."')");
        while($filas=$consulta->fetch_assoc()){
            $this->apuesta=$filas;
        }
        return $this->apuesta;
    }

    public function calculoPuntaje($p_Id_Grp){
        $consulta=$this->db->query("CALL sp_calcular_puntaje(".$p_Id_Grp.")");
        //while($filas=$consulta->fetch_assoc()){
            //$this->apuesta=$filas;
        //}
        //return $this->$apuesta;
    }

    public function actualizarPartido($p_Equipo_1, $p_Equipo_2, $p_Fecha_Part, $p_Hora_Part, $p_Goles_1, $p_Goles_2, $p_Penales_1, $p_Penales_2, $p_sts_part){
        $consulta=$this->db->query("CALL sp_actualizar_partido('".$p_Equipo_1."','".$p_Equipo_2."','".$p_Fecha_Part."','".$p_Hora_Part."',".$p_Goles_1.",".$p_Goles_2.",".$p_Penales_1.",".$p_Penales_2.",'".$p_sts_part."')");
        //while($filas=$consulta->fetch_assoc()){
            //$this->apuesta=$filas;
        //}
        //return $this->$apuesta;
        /*return "CALL sp_actualizar_partido('".$p_Equipo_1."','".$p_Equipo_2."','".$p_Fecha_Part."','".$p_Hora_Part."',".$p_Goles_1.",".$p_Goles_2.",".$p_Penales_1.",".$p_Penales_2.",'".$p_sts_part."')";*/
    }

    public function actualizarEstadoGrupo(){
        $consulta=$this->db->query("CALL sp_actualizar_estado_grupo()");
        //while($filas=$consulta->fetch_assoc()){
            //$this->apuesta=$filas;
        //}
        //return $this->$apuesta;
    }


    public function solicitudUnirseGrupo($p_Id_Grp,$p_Id_Usr){
        $consulta=$this->db->query("CALL sp_solicitud_unirse_grupo(".$p_Id_Grp.",".$p_Id_Usr.")");
    }

}
?>