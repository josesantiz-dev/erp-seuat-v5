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
            $sql = "SELECT *From t_documentos as td 
            inner join t_detalle_documentos as tdd on td.id = tdd.id_documentos 
            where tdd.estatus = 1";
            $request = $this -> select_all ($sql);
            return $request; 
        }

        //Funcion para traer tipo de documento
        public function selectTipoDocumento()
        {
            $sql = "SELECT *FROM t_documentos";
            $request = $this -> select_all ($sql);
            return $request; 
        }

        //Insertar un nuevo documento
        public function insertNuevoDocumento(string $nombreDocumento, int $nombreTipoDocumento, int $cantidadDocumentos, int $checkbox, int $estatus, int $idUser)
        {
            $sql = "insert into t_detalle_documentos 
            (tipo_documento, id_documentos, cantidad_copias, original, estatus, id_usuario_creacion, fecha_creacion)
            values (?, ?, ?, ?, ?, ?, NOW())";
            $request = $this ->  insert ($sql,array($nombreDocumento, $nombreTipoDocumento, $cantidadDocumentos, $checkbox, $estatus, $idUser));
            return $request;
        }

        //Funcion para actualizar estatus de t-documentos
         public function updateEstatusDocumento(int $id)
        {
            $sql = "UPDATE t_detalle_documentos SET estatus = ? WHERE id = $id";
            $request = $this -> update($sql, array(2));
            return $request;
        }

        //Funcion para selecionar registro de t-documentos
        public function selectDocumento(int $id)
        {
            $sql = "SELECT *from t_detalle_documentos WHERE id = $id";
           $request = $this -> select ($sql);
           return $request;
        }
        
        //Funcion para actualizar t-documentos
         public function updateDocumento(string $nombreDocumento, int $nombreTipoDocumento, int $cantidadDocumentos, int $checkbox, int $idusuario, int $idUser)
        {
            $sql = "UPDATE t_detalle_documentos SET tipo_documento = ?, id_documentos = ?, cantidad_copias = ?, original = ?, id_usuario_actualizacion = ?, fecha_actualizacion = NOW()  WHERE id =  $idusuario";
            $request = $this -> update ($sql, array($nombreDocumento, $nombreTipoDocumento, $cantidadDocumentos, $checkbox, $idUser));
            return $request;
  
        } 
    } 