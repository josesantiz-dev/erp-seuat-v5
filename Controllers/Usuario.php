<?php
class Usuario extends Controllers{
    private $idUser;
    private $rol;
    public function __construct()
    {
        parent::__construct();
        session_start();
       /* if(empty($_SESSION['login']))
        {
            header('Location: '.base_url().'/login');
            die();
        }
        $this->idUser = $_SESSION['idUser'];
        $this->rol = $_SESSION['claveRol'];*/
    }

    public function Usuario(){
        $data['page_id'] = 2;
        $data['page_tag'] = "Usuarios";
        $data['page_title'] = "Página Usuarios";
        $data['page_name'] = "Usuarios";
        $data['page_functions_js'] = "functions_usuario.js";
        $data['planteles'] = $this->model->selectUsuarios();
        $data['roles'] = $this->model->selectRoles();
        $data['personas'] = $this->model->selectPersonas();
        $this->views->getView($this,"Usuario",$data);
    }

    public function getRoles()
    {
        $data['roles'] = $this->model->getRoles();
        $this->views->getView($this,"roles",$data);
    }

    public function getUsuarios()
    {
    $data['page_functions_js'] = "functions_usuario.js";
     $this -> views -> getView ($this, "Usuario", $data); 

    //$arrUsuarios = $this -> model -> selectUsuarios();
    // var_dump ($arrUsuarios); 
     //echo (json_encode($arrUsuarios, JSON_UNESCAPED_UNICODE));
    }

    public function getListaUsuarios()
    {
    $arrUsuarios = $this -> model -> selectUsuarios();
    for($i = 0; $i < count($arrUsuarios); $i++)
    {
      $arrUsuarios[$i]["numeracion"] = $i +1; 
      $arrUsuarios[$i]["estatus"] = ($arrUsuarios[$i]["estatus"] == 1)?
      '<span class="badge badge-success">Activo</span>': '<span class="badge badge-danger">Inactivo</span>
      ';
      $arrUsuarios[$i]["sesion"] = ($arrUsuarios[$i]["sesion"] == 1)?
      '<span class="badge badge-success">Conectado</span>': '<span class="badge badge-danger">Desconectado</span>
      ';
      $arrUsuarios[$i]['acciones'] = '<button type="button" class="btn btn-danger btn-sm" onclick = "fnActualizar('.$arrUsuarios[$i]['id'].')"data-toggle="modal" data-target="#modalEditUsuario">Actualizar</button> 
      <button type="button" class="btn btn-dark btn-sm" onclick ="fnEliminar('.$arrUsuarios[$i]['id'].')">Eliminar</button>';
    }
    echo (json_encode($arrUsuarios, JSON_UNESCAPED_UNICODE));
    }

    public function setNuevoUsuario() 
        {
$arrDatos = $_POST;
$arrDatos = $_FILES;
$nickname = $arrDatos ['txtNickname'];
$password = $arrDatos ['txtPassword'];
$rol = $arrDatos ['txtRol'];
$persona = $arrDatos ['txtNombrePersona'];
$estatus = 1;
$idUser = 5;

        $response = $this -> model -> insertNuevoUsuario ($nickname, $password, $rol, $persona);
if ($response){
    $arrResponse = array('estatus' => true, 'msg' => 'SE INSERTO CORRECTAMENTE EL NUEVO USUARIO'); 

}else{
    $arrResponse = array('estatus' => false, 'msg' => 'NO SE PUEDO INGRESAR EL NUEVO USUARIO'); 

}
echo (json_encode($arrResponse, JSON_UNESCAPED_UNICODE));

        }
public function setEstatusUsuario($valor)
{
    $arrResponse = $this -> model -> updateEstatusUsuario($valor);
    if ($arrResponse){
        $response = array('estatus' => true, 'msg' => 'SE ELIMINO EL USUARIO'); 
    
    }else{
        $response = array('estatus' => false, 'msg' => 'NO SE PUDO ELIMINAR EL USUARIO'); 
    
    }
    echo (json_encode($response, JSON_UNESCAPED_UNICODE));
}

public function getUsuario(int $id)
    {
        $arrDatos = $this -> model -> selectUsuario($id);
        echo (json_encode($arrDatos, JSON_UNESCAPED_UNICODE));
    }
public function setEditUsuario()
{
    $arrDatos = $_POST; 
    $nickname = $arrDatos ['txtNickname'];
    $estatus = $arrDatos ['txtEstatus'];
    $imagen = $arrDatos ['Imagen'];
    $rol = $arrDatos ['txtRol'];
    $persona = $arrDatos ['txtPersona'];
    $idUser = 10;
    $arrResponse = $this -> model -> updateUsuario($nickname, $estatus, $imagen, $rol, $persona);
    if ($arrResponse){
        $response = array('estatus' => true, 'msg' => 'SE ACTUALIZO CORRECTAMENTE :) '); 
    
    }else{
        $response = array('estatus' => false, 'msg' => 'NO SE PUDO ACTUALIZAR :( '); 
    
    }
    echo (json_encode($response, JSON_UNESCAPED_UNICODE));
}
    }
?>