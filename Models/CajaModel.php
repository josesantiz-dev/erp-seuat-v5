<?php

    class CajaModel extends Mysql
    {

        public function __construct()
        {
            parent::__construct();
        }

        //Funcion para traer datos a la tablas 
        public function selectCajas()
        {
            $sql = "select cj.id as idcj, cj.nombre, cj.id_planteles, cj.id_usuario_atiende, us.id, us.nickname, pl.id, pl.nombre_plantel_fisico, cj.estatus, cj.id_usuario_creacion , cj.id_usuario_actualizacion,cj.fecha_creacion, cj.fecha_actualizacion, cj.id_sistemas_educativos,pe.id ,pe.nombre_persona, pe.ap_paterno,pe.ap_materno 
            from t_cajas as cj
            inner join t_usuarios as us on cj.id_usuario_atiende = us.id 
            inner join t_planteles as pl on cj.id_planteles = pl.id 
            inner join t_personas as pe on pe.id = cj.id_usuario_atiende
            ";
            $request = $this -> select_all ($sql);
            return $request;         
        }
        
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
