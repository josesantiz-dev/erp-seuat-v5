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
        public function insertNuevoUsuario(string $nickname, string $password, string $rol, string $persona, int $idUsuario)
        {
            $sql = "insert into erpseuat.t_usuarios 
            (nickname, password, id_roles, id_personas, id)
            Values (?, ?, ?, ?, ?)";
            $request = $this ->  insert ($sql,array($nickname, $password, $persona, $rol, $idUsuario));
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
            $request = $this -> update ($sql, array($nickname, $sesion, $rol, $fecha_conexion, $idUsuario,  $idUser));
            return $request;
  
        }
        public function selectRoles()
        {
            $sql = "SELECT *from t_roles WHERE estatus = 1";
           $request = $this -> select_all ($sql);
           return $request;
        }
        public function selectPersonas()
        {
            $sql = "SELECT *from t_personas WHERE estatus = 1";
           $request = $this -> select_all ($sql);
           return $request;
        }
	}
?>