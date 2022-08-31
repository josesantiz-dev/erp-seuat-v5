<?php

	class UsuarioModel extends Mysql
	{

		public function __construct()
		{
            parent::__construct();
        }
        
        public function selectUsuarios()
        {
            $sql = "SELECT CONCAT(per.nombre_persona,' ',per.ap_paterno,' ',per.ap_materno) as nombre_completo, usu.*
            from t_personas as per
            inner join t_usuarios as usu
            on per.id = usu.id_personas  
            where per.id";
         /*    $sql = "SELECT * 
            from t_personas  as per
            inner join t_usuarios as usu
            on per.id = usu.id_personas  
            where per.id"; */
            $request = $this -> select_all ($sql);
            return $request; 
        }

        //Insertar un nuevo usuario
        public function insertNuevoUsuario(string $nickname, string $password, int $rol, int $persona, int $estatus, string $imagen)
        {
            $sql = "insert into t_usuarios 
            (nickname, password, id_roles, id_personas, estatus, imagen)
            Values (?, ?, ?, ?, ?, ?)";
            $request = $this ->  insert ($sql,array($nickname, $password, $rol, $persona, $estatus, $imagen));
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

         public function updateUsuario(string $nickname, string $password, int $rol, int $persona, string $imagen, int $idusuario)
        {
            $sql = "UPDATE t_usuarios SET nickname = ?, password = ?, id_roles = ?, id_personas = ?, imagen = ?  WHERE id =  $idusuario";
            $request = $this -> update ($sql, array($nickname, $password, $rol, $persona, $imagen));
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
