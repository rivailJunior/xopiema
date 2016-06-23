<?php 

	/**
	* @author rivail santos
	* @description - evento controller
	*/
	class Eventocontroller extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}
		public $data = array();
		
		public function index()
		{
			$this->data['title'] = "Eventos";
			$this->load->view('client/header', $this->data);
			$this->load->view('client/nav-bar-header', $this->data);
			$this->load->view('client/evento/index', $this->data);
			$this->load->view('client/nav-bar-footer', $this->data);
			$this->load->view('client/footer', $this->data);
		}//fim da function

		public function descricao()
		{
			
			$this->data['title'] = "Descricao Evento";
			$this->load->view('client/header', $this->data);
			$this->load->view('client/nav-bar-header', $this->data);
			$this->load->view('client/evento/descricao', $this->data);
			$this->load->view('client/nav-bar-footer', $this->data);
			$this->load->view('client/footer', $this->data);
		}//fim
		 
		/**
		* realiza o cadastro do evento
		* o msm so podera acontecer caso o usuario esteja logado
		* 
		*/
		public function cadastro()
		{
			$usuario = $this->session->userdata('user_logged');
			//if(isset($usuario)) {
				$this->data['title'] = "Cadastro Evento";
				$this->load->view('client/header', $this->data);
				$this->load->view('client/nav-bar-header', $this->data);
				$this->load->view('client/evento/cadastro', $this->data);
				$this->load->view('client/nav-bar-footer', $this->data);
				$this->load->view('client/footer', $this->data);
/*
			} else {
				echo "nao tem ninguem logado";
			}*/
		}//fim


	}//fim da class

 ?>