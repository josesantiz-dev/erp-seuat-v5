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
            $sql = "select cj.id as id_caja, cj.nombre, pl.nombre_plantel_fisico, se.nombre_sistema, cj.id_usuario_atiende, us.nickname, CONCAT(pe.nombre_persona,' ',pe.ap_paterno,' ',pe.ap_materno) as nombre_completo, cj. * 
            from t_cajas as cj
            inner join t_usuarios as us on cj.id_usuario_atiende = us.id
            inner join t_personas as pe on pe.id = us.id_personas 
            inner join t_planteles as pl on cj.id_planteles = pl.id
            inner join t_sistemas_educativos as se on cj.id_sistemas_educativos = se.id
            WHERE cj.estatus = 1";
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
            $sql = "SELECT *from t_personas as tp
            inner join t_usuarios as tu on tp.id = tu.id_personas 
            where tu.estatus = 1 and tu.id_roles = 4";
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
