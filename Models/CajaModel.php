<?php

    class CajaModel extends Mysql
    {

        public function __construct()
        {
            parent::__construct();
        }

        //Funcion para traer nombre de planteles a tabla 
        public function selectCajas()
        {
            $sql = "SELECT 
            *from t_planteles  as pts
            inner join t_cajas as cjs
            on pts.id = cjs.id_planteles 
            where pts.id";
            $request = $this -> select_all ($sql);
            return $request;
            
        }
        
        //Funcion para seleccionar caja
       /*  public function selectCajas()
        {
            $sql = "select *from t_cajas WHERE estatus = 1";
            $request = $this -> select_all ($sql);
            return $request; 
        } */

        //Funcion para seleccionar planteles en formularios 
        public function selectPlanteles()
        {
            $sql = "select *from t_planteles WHERE estatus = 1";
            $request = $this -> select_all ($sql);
            return $request;
        }

        //Funcion para seleccionar sistemasEdu en formularios
        public function selectSistemasEdu()
        {
            $sql = "select *from t_sistemas_educativos WHERE estatus = 1";
            $request = $this -> select_all ($sql);
            return $request;
        }

        //Funcion para seleccionar usuarios en formularios 
        public function selectUsuarios()
        {
            $sql = "select *from t_usuarios WHERE estatus = 1";
            $request = $this -> select_all ($sql);
            return $request;
        }

        //Funcion para mostrar nombre de usuarios en formularios
        public function selectPersonas()
        {
            $sql = "select *from t_personas WHERE estatus = 1";
            $request = $this -> select_all ($sql);
            return $request;
        }

        //Funcion para insertar una nueva caja 
         public function insertNuevaCaja(string $nombreCaja, int $nombrePlantel, int $nombreSistemaEdu, int $nombreUsuario, int $estatus, int $idUser)
        {
            $sql = "insert into t_cajas
            (nombre, id_planteles, id_sistemas_educativos, id_usuario_atiende, estatus, id_usuario_creacion, fecha_creacion)
            Values (?, ?, ?, ?, ?, ?, NOW())";
            $request = $this ->  insert ($sql,array($nombreCaja, $nombrePlantel, $nombreSistemaEdu, $nombreUsuario, $estatus, $idUser));
            return $request;
            
        }

        //Funcion para actualizar estatus de registros 
        public function updateEstatusCaja(int $id)
        {
            $sql = "UPDATE t_cajas SET estatus = ? WHERE id = $id";
            $request = $this -> update($sql, array(2));
            return $request;
        }

        //Funcion para seleccionar caja en especifico 
        public function selectCaja(int $id){
            $sql = "SELECT *from t_cajas WHERE id = $id";
           $request = $this -> select ($sql);
           return $request;
        }

        //Funcion para actualizar algun registro 
        public function updateCaja(string $nombreCaja, int $nombrePlantel, int $nombreSistemaEdu, int $nombreUsuario, int $idusuario ,int $idUser)
        {
            $sql = "UPDATE t_cajas SET nombre = ?, id_planteles = ?, id_sistemas_educativos = ?, id_usuario_atiende = ?, id_usuario_actualizacion = ?, fecha_actualizacion = NOW()  WHERE id =  $idusuario";
            $request = $this -> update ($sql, array($nombreCaja, $nombrePlantel, $nombreSistemaEdu, $nombreUsuario, $idUser));
            return $request;
  
        } 
	}
?>
