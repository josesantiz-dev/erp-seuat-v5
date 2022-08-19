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

        public function insertCaja(string $nombre,string $fecha_creacion,string $fecha_actualizacion,int $estatus,int $idCaja)
		{
			$sql = "insert into t_cajas(
				nombre, fecha_creacion, fecha_actualizacion, estatus) 
				values(?, ?, ?,?, NOW(), ?)";

				$request = $this->insert($sql,array(string $nombre,string $fecha_creacion,string $fecha_actualizacion,int $estatus,int $idCaja));
				return $request;
            }

            public function updateEstatusCajas(int $id)
				{
					$sql = "UPDATE t_cajas SET estatus = ? WHERE id = $id";
					$request = $this->update($sql,array(2));
					return $request;
				}
        }