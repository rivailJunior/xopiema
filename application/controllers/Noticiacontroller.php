<?php 

	/**
	* @author Eduardo Barreiros
	* @description - noticias controller
	*/
	class Noticiacontroller extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}
		
		public function index()
		{
			$this->data['title'] = "Noticias";
			$this->load->view('client/header', $this->data);
			$this->load->view('client/nav-bar-header', $this->data);
			$this->load->view('client/noticia/index', $this->data);
			$this->load->view('client/nav-bar-footer', $this->data);
			$this->load->view('client/footer', $this->data);
		}//fim da function

	}//fim da class

 ?>