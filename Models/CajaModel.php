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

        public function insertNuevaCaja(string $nombre,string $id_usuario_atiende,string $fechaCreacion,string $fechaActualizacion,int $id_planteles,int $id_sistemas_educativos,int $estatus)
		{
			$sql = "insert into t_cajas(
				nombre, id_usuario_atiende, fecha_creacion, fecha_actualizacion, id_sistemas_educativos, estatus) 
				values(?,?,?,?,?)";

				$request = $this->insert($sql,array($nombre,$id_usuario_atiende,$fechaCreacion,$fechaActualizacion,$id_planteles,$id_sistemas_educativos,$estatus));
				return $request;
            }

            public function updateEstatusCajas(int $id)
				{
					$sql = "UPDATE t_cajas SET estatus = ? WHERE id = $id";
					$request = $this->update($sql,array(2));
					return $request;
				}
        }