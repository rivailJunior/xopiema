<?php 


/**
* @author rivail santos
* @uses to create a new user instance
*/

class Usuariocontroller extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('usuariomodel');
	}

	public $data = array();

	/**
	 * @uses to load the create page
	 */
	public function index()
	{
		$this->data['title'] = "Cadastro de usuario";
		$this->load->view('client/header', $this->data);
		$this->load->view('client/nav-bar-header', $this->data);
		$this->load->view('client/usuario/create', $this->data);
		$this->load->view('client/nav-bar-footer', $this->data);
		$this->load->view('client/footer', $this->data);
		
	}//fim
	

	/**
	 *
	 * @uses to verify if a user exist
	 * @return boolean
	 * @param - array user 
	 *
	 */
	public function verifyUserExist($dados)
	{
		$exist = false;
		if(isset($dados)){
			$login =  $dados['login'];
			$ret = $this->db->get_where('usuario', array('login' => $login));
			if($ret->num_rows() > 0){
				$exist = true;	
			}
		}
		return $exist;
	}//fim

	/**
	 * @uses to insert a new user 
	 * @return boolean
	 */
	public function create()
	{

		$result = false;
		$senha = trim($this->input->post('password_key'));
		$usuario['first_name'] = $this->input->post('first_name');
		$usuario['last_name'] = $this->input->post('last_name');
		$usuario['nick_name'] = $this->input->post('nick_name');
		$usuario['login'] = trim($this->input->post('login'));
		$usuario['password_key'] = md5($senha);

		$perfil['short_description'] = $this->input->post('short_description');
		$perfil['description'] = $this->input->post('description');
		$perfil['picture'] = $_FILES['userfile']['name'];

		
		$exist = $this->verifyUserExist($usuario);

		if($exist == false){
			$ret = $this->usuariomodel->create($usuario, $perfil);
			if($ret == 1){
				if(isset($_FILES['userfile']['name'])){
					echo true;
					$this->upload_imagem->uploadimagem($_FILES['userfile'], $_FILES, "assets/img-perfil");
					$this->sendEmail($usuario['login']);
				}
			} else {
				echo false;
			}
		}
	}//fim



	/**
	* envia e-mail de confirmacao de conta para o usuario.
	*/
	public function sendEmail($userEmail)
	{
			$this->load->library('send_email');
			$email = $userEmail;
			$data['subject'] = "Email XoPiema";
			$data['message'] = "Para ativar sua conta acesse esta pagina: ".site_url('usuariocontroller/validacaoConta/'.md5($userEmail));
			$this->send_email->sendEmail($email, $data);
	}


	/**
	* @uses to open the user perfil
	* @author emerson maranhao
	*/
	public function perfil($id)
	{
		$this->data['title'] = "Perfil de usuario";
		$this->data['usuario'] = $this->usuariomodel->findById($id);
		$this->load->view('client/header', $this->data);
		$this->load->view('client/nav-bar-header', $this->data);
		$this->load->view('client/usuario/perfil', $this->data);
		$this->load->view('client/nav-bar-footer', $this->data);
		$this->load->view('client/footer', $this->data);
	}//fim function



	public function validacaoConta($login){
		$validacao['status'] = 1;

		$login = substr($login, 0, -8);

		$resul = $this->genericmodel->update("validacao_cadastro", "hash_code",$login, $validacao);

		$this->data['validacao'] = "Sua conta nao foi ativada!";
		if ($resul == 1) {
			$this->data['validacao'] = "Sua conta foi ativada com sucesso!";
		}

		$this->data['title'] = "Validacao de usuario";
		$this->load->view('client/header', $this->data);
		$this->load->view('client/nav-bar-header', $this->data);
		$this->load->view('client/usuario/validacao_conta', $this->data);
		$this->load->view('client/nav-bar-footer', $this->data);
		$this->load->view('client/footer', $this->data);

	}
	

	public function passchange(){
		$senha = $this->input->post('dados');
		$user = $this->session->userdata('user_logged');
		$result = $this->usuariomodel->findById($user['id']);

		foreach ($result as $row) {
			$usuario = array(
				'login'=> $row->login,
				);
		}

		if ($usuario) {
			$this->usuariomodel->changepassword($usuario['login'],md5($senha));
			echo "Senha alterada com sucesso!";
		}
	}








	 // this is used only as a example how to use the send email lib
	 /*public function sendEmail()
	 {
	 	$this->load->library('send_email');
	 	$email = "eduardo@unimedfama.com.br";
	 	$data['subject'] = "testando classe de email";
	 	$data['message'] = "testando lib de email dinamic";
	 	echo $this->send_email->sendEmail($email, $data);
	 }*/
	 ///fim


	}

	?>