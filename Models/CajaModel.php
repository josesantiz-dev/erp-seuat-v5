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

        public function insertCaja(string $nombre,string $fecha_creacion,string $fecha_actualizacion,int $estatus,$idCaja)
		{
			$sql = "insert into t_cajas(
				nombre, fecha_creacion, fecha_actualizacion, estatus) 
				values(?, ?, ?,?, NOW(), ?)";

				$request = $this->insert($sql,array($id, $nombre,$id_usuario_atiende, $estatus, $id_usuario_creacion, $id_usuario_actualizacion, $fecha_creacion, $fecha_actualizacion,
                $id_planteles, $id_sistemas_educativos));
				return $request;
            }

            public function updateEstatusCajas(int $id)
				{
					$sql = "UPDATE t_cajas SET estatus = ? WHERE id = $id";
					$request = $this->update($sql,array(2));
					return $request;
				}
        }