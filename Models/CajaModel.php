<?php

	class CajaModel extends Mysql
	{

		public function __construct()
		{
			parent::__construct();
		}

        public function selectCajas()
        {
            $sql = "select * from t_cajas WHERE estatus = 1";
            $request = $this->select_all($sql);
            return $request;
        }

        public function insertNuevaCaja($nombre,$fechaCreacion,$fechaActualizacion,$estatus)
		{
			$sql = "insert into t_cajas(
				nombre, fecha_creacion, fecha_actualizacion, estatus) 
				values(?,?,?,?)";

				$request = $this->insert($sql,array( $nombre, $fechaCreacion, $fechaActualizacion, $estatus));
				return $request;
            }

            public function updateEstatusCajas(int $id)
				{
					$sql = "UPDATE t_cajas SET estatus = ? WHERE id = $id";
					$request = $this->update($sql,array(2));
					return $request;
				}
        }