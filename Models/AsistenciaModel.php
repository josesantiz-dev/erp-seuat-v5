<?php

	class AsistenciaModel extends Mysql
	{

		public function __construct()
		{
            parent::__construct();
        }

        //Funcion para traer datos de grupos
        public function selectAsistencias()
        {
            $sql = "SELECT *FROM t_asistencias_docente WHERE estatus = 1";
            $request = $this -> select_all ($sql);
            return $request; 
        }
    }