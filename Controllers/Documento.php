<?php
class Documento extends Controllers
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
	
    //Funcion para ver docuementos en la web 
	public function Grupo()
	{
		$data['page_id'] = 2;
		$data['page_tag'] = "Documentos";
		$data['page_title'] = "Página de documentos";
		$data['page_name'] = "Documentos";
		$data['page_functions_js'] = "functions_documento.js";
		$data['Documento'] = $this->model->selectDocumentos();
		$this->views->getView($this, "Documento", $data);
	}
    //Funcion para traer documentos
	public function getDocumentos()
	{
		$data['page_functions_js'] = "functions_documento.js";
		$this->views->getView($this, "Documento", $data);

	}
     
	// Funcion para visualizar documentos en la tabla 
	public function getListaDocumentos()
	{
        
		$arrDocumentos = $this->model->selectDocumentos();
		for ($i = 0; $i < count($arrDocumentos); $i++) {

			$arrDocumentos[$i]["numeracion"] = $i + 1;

 			$arrDocumentos[$i]["estatus"] = ($arrDocumentos[$i]["estatus"] == 1) ?
				'<span class="badge badge-success">Activo</span>' : '<span class="badge badge-danger">Inactivo</span>';

			$$arrDocumentos[$i]['acciones'] = '<button type="button" class="btn btn-primary btn-sm" onclick = "fnActualizar(' . $arrDocumentos[$i]['id'] . ')"data-toggle="modal" data-target="#modalEditDocumento">Actualizar</button> 
      <button type="button" class="btn btn-secondary btn-sm" onclick ="fnEliminar(' . $arrDocumentos[$i]['id'] . ')">Emilinar</button>';
		}
		echo (json_encode($arrDocumentos, JSON_UNESCAPED_UNICODE));
	}
}