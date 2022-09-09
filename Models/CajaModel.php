<?php

	class CajaModel extends Mysql
	{

		public function __construct()
		{
			parent::__construct();
		}

        public function selectCaja()
        {
            $sql = //"select * from t_cajas WHERE estatus = 1";
			"SELECT tc.id, tc.nombre, tc.id_usuario_atiende, tc.estatus, tc.fecha_creacion, tc.fecha_actualizacion, tp.nombre_plantel_fisico, tse.nombre_sistema
			FROM t_cajas tc INNER JOIN t_planteles AS tp ON tc.id  = tp.id
			INNER JOIN t_sistemas_educativos AS tse  ON tc.id = tse.id";
            $request = $this->select_all($sql);
            return $request;
        }

        public function insertNuevaCaja(string $nombre,int $id_usuario_atiende,string $fechaCreacion,string $fechaActualizacion,int $nombre_plantel_fisico,int $nombre_sistema,int $estatus)
		{
			$sql = "insert into t_cajas(
				nombre, id_usuario_atiende, Fecha_creacion, fecha_actualizacion, nombre_plantel_fisico, nombre_sistema, estatus) 
				values(?,?,?,?,?,?)";

				$request = $this->insert($sql,array($nombre,$id_usuario_atiende,$fechaCreacion,$fechaActualizacion,$nombre_plantel_fisico,$nombre_sistema,$estatus));
				return $request;
            }

            public function updateEstatusCajas(int $id)
				{
					$sql = "UPDATE t_cajas SET estatus = ? WHERE id = $id";
					$request = $this->update($sql,array(2));
					return $request;
				}
        }