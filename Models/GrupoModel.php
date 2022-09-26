<?php

	class GrupoModel extends Mysql
	{

		public function __construct()
		{
            parent::__construct();
        }

        //Funcion para traer datos de grupos
        public function selectGrupos()
        {
            $sql = "SELECT *FROM t_grupos WHERE estatus = 1";
            $request = $this -> select_all ($sql);
            return $request; 
        }

        //Insertar un nuevo grupo
        public function insertNuevoGrupo(string $nombregrupo, int $estatus, int $idUser)
        {
            $sql = "insert into t_grupos 
            (nombre_grupo, estatus, id_usuario_creacion, fecha_creacion)
            values (?, ?, ?, NOW())";
            $request = $this ->  insert ($sql,array($nombregrupo, $estatus, $idUser));
            return $request;
        }

        //Funcion para actualizar estatus de grupos
         public function updateEstatusGrupo(int $id)
        {
            $sql = "UPDATE t_grupos SET estatus = ? WHERE id = $id";
            $request = $this -> update($sql, array(2));
            return $request;
        }

        //Funcion para selecionar usuario
        public function selectGrupo(int $id)
        {
            $sql = "SELECT *from t_grupos WHERE id = $id";
           $request = $this -> select ($sql);
           return $request;
        }
        
        //Funcion para actualizar grupos
         public function updateGrupo(string $nombregrupo, int $idusuario, int $idUser)
        {
            $sql = "UPDATE t_grupos SET nombre_grupo = ?, id_usuario_actualizacion = ?, fecha_actualizacion = NOW()  WHERE id =  $idusuario";
            $request = $this -> update ($sql, array($nombregrupo, $idUser));
            return $request;
  
        } 
    }