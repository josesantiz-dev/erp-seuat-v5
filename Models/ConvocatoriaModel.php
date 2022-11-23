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
            $sql = "SELECT *FROM t_nivel_educativos";
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
        public function selectMaterias(int $idPln, int $idNvl)
        {
            $sql = "SELECT mat.id, mat.clave, mat.nombre_materia, pln.nombre_carrera, nvl.nombre_nivel_educativo
            FROM t_materias as mat
            INNER JOIN t_plan_estudios as pln ON pln.id = mat.id_plan_estudios
            INNER JOIN t_nivel_educativos as nvl ON nvl.id = pln.id_nivel_educativos
            WHERE pln.id = $idPln and nvl.id = $idNvl";
            $request = $this->select_all($sql);
            return $request;
        }

        public function selectCarrera(int $idNv)
        {
            $idNvl = $idNv;
            $sql = "SELECT id, nombre_carrera FROM t_plan_estudios WHERE id_nivel_educativos = $idNvl";
            $request = $this->select_all($sql);
            return $request;
        }
    }