<?php

    require_once ('modelo.php');
    class votos extends modeloCredencialesBD{
        public function __construct(){
            parent::__construct();
        }
    public function listar_votos(){
        $instruccion = "CALL sp_listar_votos()";
        
        $consulta=$this-> _db->query("instruccion");
        $resultado=$consulta->fetch_assoc(MYSQLI_ASSOC);

        if($resultado){
            return $resultado;
            $resultado->close;
            $this->close;
        }
    }
    public function actualizar_votos($voto1,$voto2){
        $instruccion = "CALL sp_actualizar_votos('".$voto1."','".$voto2."')";
        $actualiza=$this->_db->query($instruccion);

        if($actualiza){
            return $actualiza;
            $actualiza->close;
            $this->db->close;
        }
    }
    }
?>