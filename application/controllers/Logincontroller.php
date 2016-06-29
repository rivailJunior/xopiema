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
	
	class Logincontroller extends CI_Controller
	{	
		public $data = array();

		function __construct() 
		{
			parent::__construct();
		}
		
		/*function index() 
		{
			$this->data['titulo']="Login";
			$this->form_validation->set_rules('senha','Senha','trim|required|callback_checklogin');
			$this->form_validation->set_rules('login','Login','trim|required');
			$this->load->view('login/login', $this->data);
			if(($this->form_validation->run()) == false)
			{
				
			}
			else
			{
				//redirect('autentifica/');
			}
		}*///fim da function

		public function checkuser(){
			$login = $this->input->post('dados');

			$result = $this->loginmodel->checkuserexist($login);
			//var_dump($result);
			if ($result) {
				echo true;
			}else {
				echo false;
			}
		}

		public function checklogin(){
			$dados = json_decode($this->input->post('dados'), true);
			parse_str($dados);
			$truncatesenha = trim($senha);
			$result = $this->loginmodel->validateuser($login, md5($truncatesenha));
			if($result){
				$result2 = $this->loginmodel->checkvalidation($login);
				if ($result2) {
					$sessao = array();
					foreach ($result as $row) {
						$logado = array(
							'id'=> $row->id,
							'nome'=> $row->first_name,
							'last_name'=>$row->last_name,
							'logged_in'=> TRUE
							);
						$this->session->set_userdata('user_logged', $logado);
						echo true;
					}
				}else{
					echo "Por favor valide sua conta,enviamos a confirmacao para o seu email!";
				}
			} else {
				echo "Senha incorreta";
			}
		}//fim function

		public function nav() {
			$this->data['user'] = $this->session->userdata('user_logged');
			//print_r($this->data);
			return $this->load->view('client/nav', $this->data);
		}//fim function
		
		/*		
		function checklogin2($senha)
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
		*/
		    
		    
		    function show_login($show_error = false)
		    {
		    	$this->data['error'] = $show_error;
		    	$this->load->helper('form');
		    	$this->data['titulo']="Login";
		    	$this->load->view('login/login', $this->data);
		    }
		    
		    function logout_user() 
		    {
		    	$this->session->unset_userdata('user_logged');
		    	redirect(''.site_url());
		    }
		    
	}//fim da classe

	?>