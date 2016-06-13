<?php 


/**
* @author rivail santos
* @uses to create a new user instance
*/

class Usuario extends CI_Controller
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
		
	}

	/**
	 * @uses to insert a new user 
	 */
	public function create()
	{
		$senha = trim($this->input->post('password_key'));
		$usuario['first_name'] = $this->input->post('first_name');
		$usuario['last_name'] = $this->input->post('last_name');
		$usuario['nick_name'] = $this->input->post('nick_name');
		$usuario['login'] = $this->input->post('login');
		$usuario['password_key'] = md5($senha);

		$perfil['short_description'] = $this->input->post('short_description');
		$perfil['description'] = $this->input->post('description');
		$perfil['picture'] = $_FILES['userfile']['name'];
		$ret = $this->usuariomodel->create($usuario, $perfil);
		if($ret == 1){
			$this->upload_imagem->uploadimagem($_FILES['userfile'], $_FILES, "assets/img-perfil");
		}
		echo $ret;
		
	}//fim


}

 ?>