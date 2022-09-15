<?php

    class CajaModel extends Mysql
    {

        public function __construct()
        {
            parent::__construct();
        }
        
        public function selectCajas()
        {
            $sql = "select *from t_cajas WHERE estatus = 1";
            $request = $this -> select_all ($sql);
            return $request; 
        }
        
        public function selectPlanteles()
        {
            $sql = "select *from t_planteles WHERE estatus = 1";
            $request = $this -> select_all ($sql);
            return $request;
        }

        public function selectSistemasEdu()
        {
            $sql = "select *from t_sistemas_educativos WHERE estatus = 1";
            $request = $this -> select_all ($sql);
            return $request;
        }

        public function selectUsuarios()
        {
            $sql = "select *from t_usuarios WHERE estatus = 1";
            $request = $this -> select_all ($sql);
            return $request;
        }

         public function insertNuevaCaja(string $nombreCaja, int $nombrePlantel, int $nombreSistemaEdu, int $nombreUsuario, int $estatus, int $idUser)
        {
            $sql = "insert into t_cajas
            (nombre, id_planteles, id_sistemas_educativos, id_usuario_atiende, estatus, id_usuario_creacion, fecha_creacion)
            Values (?, ?, ?, ?, ?, ?, NOW())";
            $request = $this ->  insert ($sql,array($nombreCaja, $nombrePlantel, $nombreSistemaEdu, $nombreUsuario, $estatus, $idUser));
            return $request;
            
        }

        public function updateEstatusCaja(int $id)
        {
            $sql = "UPDATE t_cajas SET estatus = ? WHERE id = $id";
            $request = $this -> update($sql, array(2));
            return $request;
        }

        public function selectCaja(int $id){
            $sql = "SELECT *from t_cajas WHERE id = $id";
           $request = $this -> select ($sql);
           return $request;
        }
        public function updateCaja(string $nombreCaja, int $nombrePlantel, int $nombreSistemaEdu, int $nombreUsuario, int $idusuario ,int $idUser)
        {
            $sql = "UPDATE t_caja SET nombre = ?, id_planteles = ?, id_sistemas_educativos = ?, id_usuario_atiende = ?, id_usuario_actualizacion = ?, fecha_actualizacion = NOW()  WHERE id =  $idGeneracion";
            $request = $this -> update ($sql, array($nombreCaja, $nombrePlantel, $nombreSistemaEdu, $nombreUsuario, $idusuario, $idUser));
            return $request;
  
        } 
	}
?>
