<?php
    class Vista extends Controllers{
        public function __construct()
        {
            parent::__construct();
        }

        public function vista();
        {
            $data['page_id'] = 2;
            $data['page_tag'] = "Caja";
            $data['page_title'] = "Página Caja";
            $data['page_name'] = "Caja";
            $this->views->getView($this,"Caja",$data);
        }
    }
     
    
    class Caja extends Controllers{

        private $idUser;
        private $rol;  
       public function __construct()
       
       {
        parent::__construct();
			session_start();
		    if(empty($_SESSION['login']))
		    {
			    header('Location: '.base_url().'/login');
			    die();
		    }
			$this->idCaja = $_SESSION['idCaja'];
			$this->rol = $_SESSION['claveRol'];
       }

       public function Caja(){
        $data['page_id'] = 2;
        $data['page_tag'] = "Caja";
        $data['page_title'] = "Página Caja";
        $data['page_name'] = "Página Caja";
        $data['page_functions_js'] = "functions_Caja.js";
        $data['planteles'] = $this->model->selectCaja();
        $this->views->getView($this,"Caja",$data);
    
    
       public function getCaja()
    {
        $data = "";
        //$data['page_functions_js'] = "functions_caja.js";

        //$this->views->getView($this,"caja",$data);
        
        $arrCaja = $this->model->selectCaja();
        //var_dump($arrCaja);
        echo(json_encode($arrCaja,JSON_UNESCAPED_UNICODE));
        //echo dep($data);
    } 
    //echo dep($data)
    public function getListaCaja()
    {
        $arrCaja = $this->model->selectCaja();
        for($i = 0; $i < count($arrCaja); $i++){
            $arrCaja[$i]["numeracion"] = $i +1;

            $arrCaja[$i]["status"] = ($arrCaja[$i]['estatus'] == 1 )?
            '<span class="badge badge-success">Activo</span>':'<span class="badge badge-warning">Inactivo</span>';
            
            $arrCaja[$i]['acciones'] = '<button type="button" class="btn btn-primary btn-sm">Actualizar</button> <button type="button" class="btn btn-danger btn-sm" 
            onclick="fnEliminar('.$arrCaja[$i]['id'].')" >Eliminar</button>';
        }
        
        echo(json_encode($arrCaja,JSON_UNESCAPED_UNICODE));
    }

    public function setNuevaCaja() 
    {
        $arrDatos = $_POST;

        $nombreCaja = $arrDatos['txtNombreCaja'];
        $fechaCreacion = $arrDatos['dateFechaCreacion'];
        $fechaActualizacion = $arrDatos['dateFechaActualizacion'];
        $estatus = 1;
        $idCaja =5;


        $response = $this->model->insertNuevaCaja($nombreCaja,$fechaCreacion,$fechaActualizacion,$estatus,$idCaja);
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
    }
}
    }
    
?>