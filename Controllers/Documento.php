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
	public function Documento()
	{
		$data['page_id'] = 2;
		$data['page_tag'] = "Documentos";
		$data['page_title'] = "Página de documentos";
		$data['page_name'] = "Documentos";
		$data['page_functions_js'] = "functions_documento.js";
		$data['Documento'] = $this->model->selectDocumentos();
		$data['tipoDocumento'] = $this->model->selectTipoDocumento();
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

			$arrDocumentos[$i]["id_documentos"] = ($arrDocumentos[$i]["nombre_documentos"]);

 			$arrDocumentos[$i]["estatus"] = ($arrDocumentos[$i]["estatus"] == 1) ?
				'<span class="badge badge-success">Activo</span>' : '<span class="badge badge-danger">Inactivo</span>';

			$arrDocumentos[$i]['acciones'] = '<button type="button" class="btn btn-primary btn-sm" onclick = "fnActualizar(' . $arrDocumentos[$i]['id'] . ')"data-toggle="modal" data-target="#modalEditDocumento">Actualizar</button> 
      <button type="button" class="btn btn-secondary btn-sm" onclick ="fnEliminar(' . $arrDocumentos[$i]['id'] . ')">Emilinar</button>';
		}
		echo (json_encode($arrDocumentos, JSON_UNESCAPED_UNICODE));
	}

		// Funcion agregar nuevo grupo
		public function setNuevoDocumento()
		{
			$arrDatos = $_POST;
			$nombreDocumento = $arrDatos['nombre-Documento'];
			$nombreTipoDocumento = $arrDatos['tipo-Documento'];
			$cantidadDocumentos = $arrDatos['cantidad-Documentos'];
			$documentosOriginales = $arrDatos['documento-Original'];
			$estatus = 1;
					
			$response = $this->model->insertNuevoDocumento($nombreDocumento, $nombreTipoDocumento, $cantidadDocumentos, $documentosOriginales, $estatus, $this->idUser);
			if ($response) {
				$arrResponse = array('estatus' => true, 'msg' => 'Se inserto correctamente el nuevo usuario');
			} else {
				$arrResponse = array('estatus' => false, 'msg' => 'No se puedo ingresar el nuevo usuario');
			}  
			echo (json_encode($arrResponse, JSON_UNESCAPED_UNICODE));
			die();
		}
	
		   // Funcion para checar estatus de grupo
		 public function setEstatusDocumento($valor)
		 {
			 $arrResponse = $this->model->updateEstatusDocumento($valor);
			 if ($arrResponse) {
				 $response = array('estatus' => true, 'msg' => 'SE ELIMINO EL USUARIO');
			 } else {
				 $response = array('estatus' => false, 'msg' => 'NO SE PUDO ELIMINAR EL USUARIO');
			 }
			 echo (json_encode($response, JSON_UNESCAPED_UNICODE));
		 }
	 
		 //Funcion para traer grupo	
		public function getDocumento(int $id)
		 {
			 $arrDatos = $this->model->selectGrupo($id);
			 echo (json_encode($arrDatos, JSON_UNESCAPED_UNICODE)); 
		 }
	
		 // Funcion para editar grupo
		public function setEditDocumento()
		{
	
			$arrDatos = $_POST;
			$nombreDocumento = $arrDatos['nombre-Documento-Edit'];
			$nombreTipoDocumento = $arrDatos['tipo-Documento-Edit'];
			$cantidadDocumentos = $arrDatos['cantidad-Documentos-Edit'];
			$documentosOriginales = $arrDatos['documento-Original-Edit'];
			$idusuario = $arrDatos['txtIdUsuario'];
	 
			$arrResponse = $this->model->updateDocumento($nombreDocumeto, $nombreTipoDocumento, $cantidadDocumentos, $documentosOriginales, $idusuario, $this->idUser);
			if ($arrResponse) {
				$response = array('estatus' => true, 'msg' => 'Se actualizo correctamente');
			} else {
				$response = array('estatus' => false, 'msg' => 'No se pudo actualizar');
			}
			echo (json_encode($response, JSON_UNESCAPED_UNICODE));
		} 
}