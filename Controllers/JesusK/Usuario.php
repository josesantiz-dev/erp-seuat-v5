<?php
	class Usuarios extends Controllers{
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
			$this->idUser = $_SESSION['idUser'];
			$this->rol = $_SESSION['claveRol'];
		}
		public function Usuaios(){
			$data['page_id'] = 5;
			$data['page_tag'] = "Usuarios";
			$data['page_title'] = "Página Usuarios";
			$data['page_name'] = "Página Usuarios";
			
			$this->views->getView($this,"Usuarios",$data);
		}