<?php 
	/**
	* @author rivail santos
	* @uses to create some structure files as controller and views, pass the model name in the 
	* parameter and look to the folder, done! 
	*/
	class Creatingcontroller extends CI_Controller
	{	
		public $data = array();
		
		public function index()
		{
			$this->data['tables'] = $this->db->list_tables();
			$this->load->view('create_schema/index', $this->data);
				
		}

		function createschema()
		{
			$dados = json_decode($this->input->post('dados'), true);
			$ret = null;
			if($dados['optionId'] == 1){
				$ret = $this->create_structure->createController($dados['tableId']);
			}
			
			echo $ret;
		}
	}

 ?>