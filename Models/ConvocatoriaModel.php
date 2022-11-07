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

        public function selectPlanteles()
        {
            $sql = "SELECT *FROM t_planteles WHERE estatus = 1";
            $request = $this -> select_all ($sql);
            return $request;
        }

        public function selectEscolaridad()
        {
            $sql = "SELECT *FROM t_escolaridad";
            $request = $this -> select_all ($sql);
            return $request;
        }

        public function selectplanEstudios()
        {
            $sql = "SELECT *FROM t_plan_estudios WHERE estatus = 1";
            $request = $this -> select_all ($sql);
            return $request;
        }

        public function selectPeriodos()
        {
        $sql = "SELECT *FROM t_periodos WHERE estatus = 1";
        $request = $this -> select_all ($sql);
        return $request;
        }
    }