<?php

	class DocumentoModel extends Mysql
	{

		public function __construct()
		{
            parent::__construct();
        }

        //Funcion para traer datos de t.documentos
        public function selectDocumentos()
        {
            $sql = "SELECT *FROM t_documentos WHERE estatus = 1";
            $request = $this -> select_all ($sql);
            return $request; 
        }

/*         //Insertar un nuevo documento
        public function insertNuevoDocumento(string $nombregrupo, int $estatus, int $idUser)
        {
            $sql = "insert into t_documentos 
            (nombre_grupo, estatus, id_usuario_creacion, fecha_creacion)
            values (?, ?, ?, NOW())";
            $request = $this ->  insert ($sql,array($nombregrupo, $estatus, $idUser));
            return $request;
        }

        //Funcion para actualizar estatus de t-documentos
         public function updateEstatusDocumento(int $id)
        {
            $sql = "UPDATE t_documentos SET estatus = ? WHERE id = $id";
            $request = $this -> update($sql, array(2));
            return $request;
        }

        //Funcion para selecionar registro de t-documentos
        public function selectDocumento(int $id)
        {
            $sql = "SELECT *from t_documentos WHERE id = $id";
           $request = $this -> select ($sql);
           return $request;
        }
        
        //Funcion para actualizar t-documentos
         public function updateDocumento(string $nombregrupo, int $idusuario, int $idUser)
        {
            $sql = "UPDATE t_documentos SET nombre_grupo = ?, id_usuario_actualizacion = ?, fecha_actualizacion = NOW()  WHERE id =  $idusuario";
            $request = $this -> update ($sql, array($nombregrupo, $idUser));
            return $request;
  
        } */
    } 