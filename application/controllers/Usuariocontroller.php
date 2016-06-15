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
					$this->upload_imagem->uploadimagem($_FILES['userfile'], $_FILES, "assets/img-perfil");
				}
				$result = true;
			}else{
				$result = false;
			}
		}
		echo $result;
		
	}//fim



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
	 


	 // this is used only as a example how to use the send email lib
	 /*public function exemplo_Send_Email()
	 {
	 	$this->load->library('send_email');
	 	$email = "rivail.rj@gmail.com";
	 	$data['subject'] = "testando classe de email";
	 	$data['message'] = "testando lib de email dinamic";
	 	echo $this->send_email->sendEmail($email, $data);
	 }*///fim


}

 ?>