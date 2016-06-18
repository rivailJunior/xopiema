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
			$this->data['title'] = "Evento";
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
		}


	}//fim da class

 ?>