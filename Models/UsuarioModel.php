<?php

	class UsuarioModel extends Mysql
	{

		public function __construct()
		{
            parent::__construct();
        }
        
        public function selectUsuarios()
        {
            $sql = "select *from t_usuarios WHERE estatus = 1";
            $request = $this -> select_all ($sql);
            return $request; 
        }
        public function insertNuevoUsuario(string $nickname, string $password, string $sesion, int $estatus, int $idUsuario, string $fecha_conexion, string $rol, string $imagen)
        {
            $sql = "insert into erpseuat.t_usuarios 
            (nickname, password, sesion, estatus, fecha_conexion, rol, imagen)
            Values (?, ?, ?, ?, ?, ?, ?, NOW(), ?)";
            $request = $this ->  insert ($sql,array($nickname, $password, $sesion, $estatus, $idUsuario, $fecha_conexion, $rol, $imagen));
            return $request;
        }
        public function updateEstatusUsuario(int $id)
        {
            $sql = "UPDATE t_usuarios SET estatus = ? WHERE id = $id";
            $request = $this -> update($sql, array(2));
            return $request;
        }
        public function selectUsuario(int $id)
        {
            $sql = "SELECT *from t_usuarios WHERE id = $id";
           $request = $this -> select ($sql);
           return $request;
        }
        public function updateUsuario(string $nickname, string $sesion, int $idUsuario, string $fecha_conexion, string $rol, int $idUser)
        {
            $sql = "UPDATE t_usuarios SET nickname = ?, sesion = ?, rol = ?, fecha_conexion = NOW(), id_personas = ? WHERE id =  $idUsuario";
            $request = $this -> update ($sql, array($nombreGeneracion,$fechaInicio,$fechaFin,$idUser));
            return $request;
  
        }
	}
?>