<?php

	/**
	* 
	Controller diferente dos demais, pois inicia uma sessao de acesso ao sistema,
	na index recebemos os dados vindo da View login, validando todos os campos usando a
	funcao nativa do framework(Form_validation), nota-se que no set_rules -tbm nativo- temos
	uma funcao (callback_) -que chama outra funcao dentro do controlador, passando como parametro
	o campo na qual ela esta sendo chamada(senha)- essa funcao esta chamando o (checklogin),
	na qual fazemos a conexao com o Model administrador e verificamos se existe dados no banco
	referente aos dados passado pelo usuario, as demais funcoes servem para mostrar o erro de login
	tao como sair da sessao.
	*/
	
	class Login extends CI_Controller
	{	
		public $data = array();

		function __construct() 
		{
			parent::__construct();
		}
		
		function index() 
		{
			$this->data['titulo']="Login";
			$this->form_validation->set_rules('senha','senha','trim|required|callback_checklogin');
			$this->form_validation->set_rules('login','login','trim|required');
			
			if(($this->form_validation->run()) == false)
			{
				$this->load->view('login/login', $this->data);
			}
			else
			{
				//redirect('autentifica/');
			}
		}//fim da function
		
		function checklogin($senha)
		{ 
				$login = $this->input->post('login'); 
		        $senhafinal = md5($senha);

		        $result = $this->loginmodel->validateuser($login,$senhafinal);
		        if($result)
		        {
		        	$sess_array = array();
		        	foreach($result as $row)
		        	{
		        		$newdata = array(
		        			'nome'  => $row->nome,
		        			'id'     => $row->id,
		        			'status'=>$row->status,
		        			'login'=>$row->login,
		        			'logged_in' => TRUE
		        			);

		        		$this->session->set_userdata('user_loged', $newdata);
		        	}
		        	return true; 
		        }
		        else
		        {
		        	$this->form_validation->set_message('checklogin', 'Login e Senha invalidos, verifique e tente novamente!');
		        	return false;
		        }
		    }
		    
		    
		    function show_login($show_error = false)
		    {
		    	$this->data['error'] = $show_error;
		    	$this->load->helper('form');
		    	$this->data['titulo']="Login";
		    	$this->load->view('login/login', $this->data);
		    }
		    
		    function logout_user() 
		    {
		    	$this->session->unset_userdata('user_loged');
		    	redirect('logincontroller');
		    }
		    
	}//fim da classe

?>