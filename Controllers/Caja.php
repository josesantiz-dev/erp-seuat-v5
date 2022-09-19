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

        //Funcion para mostrar datos en tabla 
         public function caja(){
        $data['page_id'] = 2;
        $data['page_tag'] = "Caja";
        $data['page_title'] = "Página Caja";
        $data['page_name'] = "Caja";
        $data['page_functions_js'] = "functions_Caja.js";
        $data['Cajas'] = $this->model->selectCajas();
        $data['Planteles'] = $this->model->selectPlanteles();
        $data['SistemasEdu'] = $this->model->selectSistemasEdu();
        $data['Usuarios'] = $this->model->selectUsuarios();
        $data['Personas'] = $this->model->selectPersonas();
        $this->views->getView($this, "Caja", $data);
        } 
     
        //Funcion para mostrar caja en pagina 
        public function getCajas()
        {
        $data['page_functions_js'] = "functions_Caja.js";
        $this->views->getView($this, "Caja", $data);
        }  
    
        //Funcion para traer lista de usuarios 
    public function getListaCajas()
    {
        
    $arrCajas = $this -> model -> selectCajas();
    for($i = 0; $i < count($arrCajas); $i++){

      $arrCajas[$i]["numeracion"] = $i +1; 

      $arrCajas[$i]["id_planteles"] = ($arrCajas[$i]["nombre_plantel_fisico"]);
      
      /* $arrCajas[$i]["id_usuario_atiende"] = ($arrCajas[$i]["nickname"]); */

      $arrCajas[$i]["estatus"] = ($arrCajas[$i]["estatus"] == 1)?
      '<span class="badge badge-success">Activo</span>': '<span class="badge badge-danger">Inactivo</span>';

      $arrCajas[$i]['acciones'] = '<button type="button" class="btn btn-danger btn-sm" onclick = "fnActualizar('.$arrCajas[$i]['id'].')"data-toggle="modal" data-target="#modalCajaEdit">Actualizar</button> 
      <button type="button" class="btn btn-dark btn-sm" onclick ="fnEliminar('.$arrCajas[$i]['id'].')">Eliminar</button>';
    }
    echo (json_encode($arrCajas, JSON_UNESCAPED_UNICODE));
    }

    //Funcion para ingresar un nuevo registro 
     public function setNuevaCaja() 
    {
        $arrDatos = $_POST;
        $nombreCaja = $arrDatos['txtNombre'];
        $nombrePlantel = $arrDatos['txtPlantel'];
        $nombreSistemaEdu = $arrDatos['txtSistemaEdu'];
        $nombreUsuario = $arrDatos['txtUsuarios'];
        $estatus = 1;
        $response = $this->model->insertNuevaCaja($nombreCaja, $nombrePlantel, $nombreSistemaEdu, $nombreUsuario, $estatus, $this->idUser);
        if($response){
            $arrResponse = array ('estatus' => true, 'msg' => 'Se inserto correctamente el registro');
       
        }else{
            $arrResponse = array ('estatus' => false, 'msg' => 'No se inserto el resgistro');

        } 
        echo(json_encode($arrResponse,JSON_UNESCAPED_UNICODE));

    }

    //Funcion para cambiar estatus de registros
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

    //Funcion para traer un registro con id
    public function getCaja(int $id)
    {
        $arrDatos = $this->model->selectCaja($id);
        echo (json_encode($arrDatos, JSON_UNESCAPED_UNICODE)); 
    }

    //Funcion para editar un registro
    public function setEditCaja()
    {
        $arrDatos = $_POST;
        $nombreCaja = $arrDatos['txtNombreEdit'];
        $nombrePlantel = $arrDatos['txtPlantelEdit'];
        $nombreSistemaEdu = $arrDatos['txtSistemaEduEdit'];
        $nombreUsuario = $arrDatos['txtUsuariosEdit'];
        $idusuario = $arrDatos['txtIdUsuario'];

        $arrResponse = $this->model->updateCaja($nombreCaja, $nombrePlantel, $nombreSistemaEdu, $nombreUsuario, $idusuario, $this->idUser);
        if ($arrResponse) {
            $response = array('estatus' => true, 'msg' => 'Se actualizo correctamente');
        } else {
            $response = array('estatus' => false, 'msg' => 'No se pudo actualizar');
        }
        echo (json_encode($response, JSON_UNESCAPED_UNICODE));
    }

        
}

     
    
?>