<?php

	class ConvocatoriaModel extends Mysql
	{

		public function __construct()
		{
            parent::__construct();
        }

        //Funcion para traer datos de grupos
        public function selectConvocatorias()
        {
            $sql = "SELECT *FROM t_convocatorias WHERE estatus = 1";
            $request = $this -> select_all ($sql);
            return $request; 
        }
    }