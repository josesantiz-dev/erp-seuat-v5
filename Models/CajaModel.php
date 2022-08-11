<?php

	class CajaMiguelModel extends Mysql
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

        public function insertCaja(int $id,string $nombre,int $id_usuario_atiende,int $estatus,int $id_usuario_creacion,int $id_usuario_actualizacion,string $fecha_creacion,string $fecha_actualizacion,
        int $id_planteles, int $id_sistemas_educativos)
		{
			$sql = "insert into t_cajas(
				nombre,id_usuario_atiende, estatus, id_usuario_creacion, id_usuario_actualizacion, fecha_creacion, fecha_actualizacion, id_planteles, id_sistemas_educativos) 
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