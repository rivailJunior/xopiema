<?php 

	/**
	* @author rivail santos
	* @uses to create some structure files as controller and views, pass the model name in the 
	* parameter and look to the folder, done! 
	*/
	class Creatingcontroller extends CI_Controller
	{
		
		public $data = array();
		function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			$this->data['tables'] = $this->db->list_tables();
			$this->load->view('create_schema/index', $this->data);
				
		}

		public function createschema()
		{
			echo "aqui";
			echo $this->input->post('dados');
			$dados = json_decode($this->input->post('dados'), true);
			echo $dados;
			exit();
			parse_str($dados);
			print_r($dados);
		}
	}

 ?>