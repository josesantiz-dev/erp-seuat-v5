<?php
class Grupo extends Controllers
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
	
    //Funcion para ver grupos en la web 
	public function Grupo()
	{
		$data['page_id'] = 2;
		$data['page_tag'] = "Grupos";
		$data['page_title'] = "Página de grupos";
		$data['page_name'] = "Grupos";
		$data['page_functions_js'] = "functions_grupo.js";
		$data['Grupos'] = $this->model->selectGrupos();
		$this->views->getView($this, "Grupo", $data);
	}
    //Funcion para traer grupos 
	public function getGrupos()
	{
		$data['page_functions_js'] = "functions_grupo.js";
		$this->views->getView($this, "Grupo", $data);

	}
     
	// Funcion para visualizar grupos en la tabla 
	public function getListaGrupos()
	{
        
		$arrGrupos = $this->model->selectGrupos();
		for ($i = 0; $i < count($arrGrupos); $i++) {

			$arrGrupos[$i]["numeracion"] = $i + 1;

 			$arrGrupos[$i]["estatus"] = ($arrGrupos[$i]["estatus"] == 1) ?
				'<span class="badge badge-success">Activo</span>' : '<span class="badge badge-danger">Inactivo</span>';

			$arrGrupos[$i]['acciones'] = '<button type="button" class="btn btn-primary btn-sm" onclick = "fnActualizar(' . $arrGrupos[$i]['id'] . ')"data-toggle="modal" data-target="#modalEditGrupo">Actualizar</button> 
      <button type="button" class="btn btn-secondary btn-sm" onclick ="fnEliminar(' . $arrGrupos[$i]['id'] . ')">Emilinar</button>';
		}
		echo (json_encode($arrGrupos, JSON_UNESCAPED_UNICODE));
	}

    	// Funcion agregar nuevo grupo
	public function setNuevoGrupo()
	{
		$arrDatos = $_POST;
		$nombregrupo = $arrDatos['txtgrupo'];
		$estatus = 1;
				
		$response = $this->model->insertNuevoGrupo($nombregrupo, $estatus, $this->idUser);
		if ($response) {
			$arrResponse = array('estatus' => true, 'msg' => 'Se inserto correctamente el nuevo usuario');
		} else {
			$arrResponse = array('estatus' => false, 'msg' => 'No se puedo ingresar el nuevo usuario');
		}  
		echo (json_encode($arrResponse, JSON_UNESCAPED_UNICODE));
		die();
	}

       // Funcion para checar estatus de grupo
 	public function setEstatusGrupo($valor)
     {
         $arrResponse = $this->model->updateEstatusGrupo($valor);
         if ($arrResponse) {
             $response = array('estatus' => true, 'msg' => 'SE ELIMINO EL USUARIO');
         } else {
             $response = array('estatus' => false, 'msg' => 'NO SE PUDO ELIMINAR EL USUARIO');
         }
         echo (json_encode($response, JSON_UNESCAPED_UNICODE));
     }
 
     //Funcion para traer grupo	
    public function getGrupo(int $id)
     {
         $arrDatos = $this->model->selectGrupo($id);
         echo (json_encode($arrDatos, JSON_UNESCAPED_UNICODE)); 
     }

     // Funcion para editar grupo
	public function setEditGrupo()
	{

		$arrDatos = $_POST;
		$nombregrupo = $arrDatos['txtGrupoEdit'];
		$idusuario = $arrDatos['txtIdUsuario'];
 
		$arrResponse = $this->model->updateGrupo($nombregrupo, $idusuario, $this->idUser);
		if ($arrResponse) {
			$response = array('estatus' => true, 'msg' => 'Se actualizo correctamente');
		} else {
			$response = array('estatus' => false, 'msg' => 'No se pudo actualizar');
		}
		echo (json_encode($response, JSON_UNESCAPED_UNICODE));
	} 
}