<?php
class Asistencia extends Controllers
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
	
    //Funcion para ver asistencias en la web 
	public function Asistencia()
	{
		$data['page_id'] = 2;
		$data['page_tag'] = "Asistencia";
		$data['page_title'] = "Página de asistencias";
		$data['page_name'] = "Asistencias";
		$data['page_functions_js'] = "functions_asistencia.js";
		$data['Asistencias'] = $this->model->selectAsistencias();
		$this->views->getView($this, "Asistencia", $data);
	}
    //Funcion para traer asistencias 
	/* public function getAsistencia()
	{
		$data['page_functions_js'] = "functions_asistencia.js";
		$this->views->getView($this, "Asistencia", $data);

	}
    
    // Funcion para visualizar grupos en la tabla 
	public function getListaAsistencias()
	{
        
		$arrAsistencias = $this->model->selectAsistencias();
		for ($i = 0; $i < count($arrAsistencia); $i++) {

			$arrAsistencias[$i]["numeracion"] = $i + 1;


			$arrAsistencias[$i]['acciones'] = '<button type="button" class="btn btn-primary btn-xs" onclick = "fnActualizar(' . $arrAsistencias[$i]['id'] . ')"data-toggle="modal" data-target="#modalEditConvocatoria">Actualizar</button> 
      <button type="button" class="btn btn-secondary btn-xs" onclick ="fnEliminar(' . $arrAsistencias[$i]['id'] . ')">Emilinar</button>';
		}
		echo (json_encode($arrAsistencias, JSON_UNESCAPED_UNICODE));
	} */
}