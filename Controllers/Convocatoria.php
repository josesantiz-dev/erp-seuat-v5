<?php
class Convocatoria extends Controllers
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
	
    //Funcion para ver convocatoria en la web 
	public function Convocatoria()
	{
		$data['page_id'] = 2;
		$data['page_tag'] = "Convocatoria";
		$data['page_title'] = "Página de convocatorias";
		$data['page_name'] = "Convocatorias";
		$data['page_functions_js'] = "functions_convocatoria.js";
		$data['Convocatorias'] = $this->model->selectConvocatorias();
		$this->views->getView($this, "Convocatoria", $data);
	}
    //Funcion para traer grupos 
	public function getConvocatoria()
	{
		$data['page_functions_js'] = "functions_convocatoria.js";
		$this->views->getView($this, "Convocatoria", $data);

	}
     
	// Funcion para visualizar grupos en la tabla 
	public function getListaConvocatorias()
	{
        
		$arrConvocatorias = $this->model->selectConvocatorias();
		for ($i = 0; $i < count($arrConvocatorias); $i++) {

			$arrConvocatorias[$i]["numeracion"] = $i + 1;

 			$arrConvocatorias[$i]["estatus"] = ($arrConvocatorias[$i]["estatus"] == 1) ?
				'<span class="badge badge-success">Activo</span>' : '<span class="badge badge-danger">Inactivo</span>';

			$arrConvocatorias[$i]['acciones'] = '<button type="button" class="btn btn-primary btn-xs" onclick = "fnActualizar(' . $arrConvocatorias[$i]['id'] . ')"data-toggle="modal" data-target="#modalEditConvocatoria">Actualizar</button> 
      <button type="button" class="btn btn-secondary btn-xs" onclick ="fnEliminar(' . $arrConvocatorias[$i]['id'] . ')">Emilinar</button>';
		}
		echo (json_encode($arrConvocatorias, JSON_UNESCAPED_UNICODE));
	}
}