<?php
    class Caja extends Controllers{}

        public function getCaja()
    {
        //$data = "";
        $data['page_functions_js'] = "functions_caja.js";

        $this->views->getView($this,"caja",$data);
        
        $arrCaja = $this->model->selectCaja();
        var_dump($arrCaja);
        echo(json_encode($arrCaja,JSON_UNESCAPED_UNICODE));
        echo dep($data);
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
    
?>