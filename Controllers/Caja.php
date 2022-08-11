<?php
	/*class Caja extends Controllers{
        private $idCaja;
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
			$this->nombre = $_SESSION['nombre'];
        }
        public function Caja(){
			$data['page_id'] = 2;
			$data['page_tag'] = "Dashboard DIRC";
			$data['page_title'] = "Página Dashboard";
			$data['page_name'] = "Página Dashboard";
			$data['page_functions_js'] = "functions_dashboard_dirc.js";
			$data['planteles'] = $this->model->selectPlanteles();
			$this->views->getView($this,"dashboarddirc",$data);
    }
}*/

<?php
    class Caja extends Controllers{

        private $idCaja;
        public function __construct()
        {
            parent::__construct();
            /*session_start();
            if(empty($_SESSION['login']))
            {
                header('Location: '.base_url().'/login');
                die();
            }
            $this->idUser = $_SESSION['idUser'];*/
        }

        public function getCaja()
    {
        //$data = "";
        $data['page_functions_js'] = "functions_Caja.js";

        $this->views->getView($this,"caja",$data);
       // $arrGeneraciones = $this->model->selectGeneraciones();
        //var_dump($arrGeneraciones);
        //echo(json_encode($arrGeneraciones,JSON_UNESCAPED_UNICODE));
        //echo dep($data);
    } 
    //echo dep($data)
    public function getCaja()
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

    public function setNuevoRegistro() 
    {
        $arrDatos = $_POST;

        $nombre = $arrDatos['txtNombre'];
        $estatus = $arrDatos['txtEstatus'];
        $fechaCreacion = $arrDatos['dateFechaCreacion'];
        $fechaActualizacion = $arrDatos['dateFechaActuaizacion'];
        $estatus = 1;
        $idCaja =5;


        $response = $this->model->insertCaja(int $id,string $nombre,int $id_usuario_atiende,int $estatus,int $id_usuario_creacion,int $id_usuario_actualizacion,string $fecha_creacion,string $fecha_actualizacion,
        int $id_planteles, int $id_sistemas_educativos);
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
?>