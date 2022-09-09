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
			"SELECT tc.id, tc.nombre, tc.id_usuario_atiende, tc.estatus, tc.fecha_creacion, 
			tc.fecha_actualizacion, tp.nombre_plantel_fisico, tse.nombre_sistema
						FROM t_cajas tc INNER JOIN t_planteles AS tp ON tc.id_planteles = tp.id
						INNER JOIN t_sistemas_educativos AS tse  ON tc.id_sistemas_educativos  = tse.id";
		$request = $this->select_all($sql);
		return $request;
	}

	public function insertNuevaCaja(string $nombre, int $id_usuario_atiende, string $fechaCreacion, string $fechaActualizacion, string $nombre_plantel_fisico, string $nombre_sistema, int $estatus, int $idUser)
	{
		$sql = "insert into t_cajas(nombre, id_usuario_atiende, fecha_creacion, id_planteles, id_sistemas_educativos, estatus,id_usuario_creacion) values(?,?,?,?,?,?,?)";

		$request = $this->insert($sql, array($nombre, $id_usuario_atiende, $fechaCreacion, 1, 1, $estatus,$idUser));
		return $request;
	}


	public function updateEstatusCajas(int $id)
	{
		$sql = "UPDATE t_cajas SET estatus = ? WHERE id = $id";
		$request = $this->update($sql, array(2));
		return $request;
	}

	/*public function setEstatusCaja()
	{
		$sql = "DELETE "
	}*/
}
