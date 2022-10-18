<?php
class Usuario extends Controllers
{
	private $idUser;
	//private $rol;
	public function __construct()
	{
		parent::__construct();
		session_start();
		if(empty($_SESSION['login']))
        {
            header('Location: '.base_url().'/login');
            die();
        }
        $this->idUser = $_SESSION['idUser'];
       // $this->rol = $_SESSION['claveRol'];
	}
    //Funcion para ver usuarios en la web 
	public function Usuario()
	{
		$data['page_id'] = 2;
		$data['page_tag'] = "Usuarios";
		$data['page_title'] = "Página Usuarios";
		$data['page_name'] = "Usuarios";
		$data['page_functions_js'] = "functions_usuario.js";
		$data['Usuarios'] = $this->model->selectUsuarios();
		$data['roles'] = $this->model->selectRoles();
		$data['personas'] = $this->model->selectPersonas();
		$this->views->getView($this, "Usuario", $data);
	}
    //Funcion para traer usuarios 
	public function getUsuarios()
	{
		$data['page_functions_js'] = "functions_usuario.js";
		$this->views->getView($this, "Usuario", $data);

	}
	// Funcion para visualizar usuarios en la tabla 
	public function getListaUsuarios()
	{
		$arrUsuarios = $this->model->selectUsuarios();
		for ($i = 0; $i < count($arrUsuarios); $i++) {
			$arrUsuarios[$i]["numeracion"] = $i + 1;
			$arrUsuarios[$i]["nombre_completo"] = ($arrUsuarios[$i]["nombre_completo"]);
 			$arrUsuarios[$i]["estatus"] = ($arrUsuarios[$i]["estatus"] == 1) ?
				'<span class="badge badge-success">Activo</span>' : '<span class="badge badge-danger">Inactivo</span>';
			$arrUsuarios[$i]["sesion"] = ($arrUsuarios[$i]["sesion"] == 1) ?
				'<span class="badge badge-success">Conectado</span>' : '<span class="badge badge-danger">Desconectado</span>';
			$arrUsuarios[$i]['acciones'] = '<button type="button" class="btn btn-primary btn-xs" onclick = "fnActualizar(' . $arrUsuarios[$i]['id'] . ')"data-toggle="modal" data-target="#modalEditUsuario">Actualizar</button> 
      		<button type="button" class="btn btn-secondary btn-xs" onclick ="fnEliminar(' . $arrUsuarios[$i]['id'] . ')">Emilinar</button>';
		}
		echo (json_encode($arrUsuarios, JSON_UNESCAPED_UNICODE));
	}
	// Funcion nuevo Usuario
	public function setNuevoUsuario()
	{
		$arrDatos = $_POST;
		$arrFiles = $_FILES; 
		$nickname = $arrDatos['txtNickname'];
		$password = hash("SHA256" ,$arrDatos['txtPassword']);
		$rol = $arrDatos['txtRol'];
		$persona = $arrDatos['txtNombrePersona'];
		$imagen = $arrFiles['profileImageUsuario']['name'];
		$estatus = 1;
		$rutatemporal = $arrFiles['profileImageUsuario']['tmp_name'];  
		$nuevoNombre = time().$imagen;
		move_uploaded_file($rutatemporal, "Assets/images/imagenUsuario/".$nuevoNombre);
		$response = $this->model->insertNuevoUsuario($nickname, $password, $rol, $persona, $estatus, $nuevoNombre, $this->idUser);
		if ($response) {
			$arrResponse = array('estatus' => true, 'msg' => 'Se inserto correctamente el nuevo usuario');
		} else {
			$arrResponse = array('estatus' => false, 'msg' => 'No se puedo ingresar el nuevo usuario');
		}  
		echo (json_encode($arrResponse, JSON_UNESCAPED_UNICODE));
		die();
	}
    // Funcion para checar Estatus Ususario
 	public function setEstatusUsuario($valor)
	{
		$arrResponse = $this->model->updateEstatusUsuario($valor);
		if ($arrResponse) {
			$response = array('estatus' => true, 'msg' => 'Se elimino el usuario');
		} else {
			$response = array('estatus' => false, 'msg' => 'No se pudo eliminar el usuario');
		}
		echo (json_encode($response, JSON_UNESCAPED_UNICODE));
	}
    //Funcion para traer usuario	
	public function getUsuario(int $id)
	{
		$arrDatos = $this->model->selectUsuario($id);
		echo (json_encode($arrDatos, JSON_UNESCAPED_UNICODE)); 
	}
	// Funcion para editar usuario
	public function setEditUsuario()
	{
		$arrDatos = $_POST;
		$arrFiles = $_FILES;
		$nickname = $arrDatos['txtNicknameEdit'];
		$password = hash("SHA256" ,$arrDatos['txtPasswordEdit']);
		$rol = $arrDatos['txtRolEdit'];
		$persona = $arrDatos['txtNombrePersonaEdit'];
		$imagen = $arrFiles['profileImageUsuarioEdit']['name'];
		$idusuario = $arrDatos['txtIdUsuario'];
		$rutatemporal = $arrFiles['profileImageUsuarioEdit']['tmp_name'];  
		$nuevoNombre = time().$imagen;
		move_uploaded_file($rutatemporal, "Assets/images/imagenUsuario/".$nuevoNombre);
		$arrResponse = $this->model->updateUsuario($nickname, $password, $rol, $persona, $nuevoNombre, $idusuario, $this->idUser);
		if ($arrResponse) {
			$response = array('estatus' => true, 'msg' => 'Se actualizo correctamente el usuario');
		} else {
			$response = array('estatus' => false, 'msg' => 'No se pudo actualizar el usuario');
		}
		echo (json_encode($response, JSON_UNESCAPED_UNICODE));
	} 
}

