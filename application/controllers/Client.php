<?php 

	/**
	* @author rivail santos
	* @copyright xo-piema
	* 
	* this is the principal class content
	* is used when the user is not logged.
	*/
	class Client extends CI_Controller
	{
		
		public $data = array();
		function __construct()
		{
			parent:: __construct();
		}
		
		/**
		 * load the system main page 
		 * @return type
		 */
		public function index()
		{
			$this->data['title'] = "Xo Piema";
			$this->load->view('client/index', $this->data);
		}//fim function
		public function testeEmanuel()
		{
			$this->data['teste'] = "Emerson Apagado & ENOOOOOOO";
			$this->load->view('client/emanuel',$this->data);

			# code...
		}

	}//fim class

 ?>