<?php
   
    class Caja extends Controllers{

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
            //$this->rol = $_SESSION['claveRol'];
       }

         public function caja(){
        $data['page_id'] = 2;
        $data['page_tag'] = "Caja";
        $data['page_title'] = "Página Caja";
        $data['page_name'] = "Caja";
        $data['page_functions_js'] = "functions_Caja.js";
        $data['Cajas'] = $this->model->selectCajas();
        $this->views->getView($this, "Caja", $data);
        } 
     
        public function getCajas()
        {
        $data['page_functions_js'] = "functions_Caja.js";
        $this->views->getView($this, "Caja", $data);
        }  
    
    public function getListaCajas()
    {
        
    $arrCajas = $this -> model -> selectCajas();
    for($i = 0; $i < count($arrCajas); $i++){
      $arrCajas[$i]["numeracion"] = $i +1; 
      $arrCajas[$i]["estatus"] = ($arrCajas[$i]["estatus"] == 1)?
      '<span class="badge badge-success">Activo</span>': '<span class="badge badge-danger">Inactivo</span>';
      $arrCajas[$i]['acciones'] = '<button type="button" class="btn btn-danger btn-sm" onclick = "fnActualizar('.$arrCajas[$i]['id'].')"data-toggle="modal" data-target="#modalEditCaja">Actualizar</button> 
      <button type="button" class="btn btn-dark btn-sm" onclick ="fnEliminar('.$arrCajas[$i]['id'].')">Eliminar</button>';
    }
    echo (json_encode($arrCajas, JSON_UNESCAPED_UNICODE));
    }

   /*  public function setNuevaCaja() 
    {
        $arrDatos = $_POST;
        $nombre = $arrDatos['txtNombre'];
        $id_usuario_atiende = intval($arrDatos['txtid_usuario_atiende']);
        $fechaCreacion = $arrDatos['dateFechaCreacion'];
        $fechaActualizacion = $arrDatos['datefechaActualizacion'];
        $nombre_plantel_fisico = $arrDatos['txtnombre_plantel_fisico'];
        $nombre_sistema = $arrDatos['txtnombre_sistema'];
        $estatus = 1;
        $response = $this->model->insertNuevaCaja($nombre,$id_usuario_atiende,$fechaCreacion,$fechaActualizacion,$nombre_plantel_fisico,$nombre_sistema,$estatus,$this->idUser);
        if($response){
            $arrResponse = array ('estatus' => true, 'msg' => 'Se inserto correctamente el registro');
       
        }else{
            $arrResponse = array ('estatus' => false, 'msg' => 'No se inserto el resgistro');

        } 
        echo(json_encode($arrResponse,JSON_UNESCAPED_UNICODE));

    }

    public function setEstatusCaja($valor)
    {
        $arrResponse = $this->model->updateEstatusCaja($valor); 
        if($arrResponse){
            $response = array ('estatus' => true, 'msg' => 'Se elimino correctamente');
       
        }else{
            $response = array ('estatus' => false, 'msg' => 'No se pudo eliminar');

        }
        echo(json_encode($response,JSON_UNESCAPED_UNICODE));
    }*/
}

     
    
?>