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
			$this->load->model('eventomodel');
			$this->load->library('fileupload');
			$this->load->library('pagination');

		}
		public $data = array();
		
		//retorna o id do usuario logado
		public function getUserId()
		{
			$usuario = $this->session->userdata('user_logged');
			return $usuario['id'];
		}


		public function index()
		{
			$this->data['title'] = "Eventos";
			$this->data['eventos'] = $this->eventomodel->getEvento(10, 0);
			$this->load->view('client/header', $this->data);
			$this->load->view('client/nav-bar-header', $this->data);
			$this->load->view('client/evento/index', $this->data);
			$this->load->view('client/nav-bar-footer', $this->data);
			$this->load->view('client/footer', $this->data);
		}//fim da function



		public function pagination()
		{
			$config['base_url'] = site_url('eventocontroller/pagination/');
			$offset = $this->uri->segment(3); 

			$config['total_rows'] = $this->eventomodel->getEvento(null, null)->num_rows();
			$config['per_page'] = 10;
			$config['num_links'] = 0;	
			$config['full_tag_open'] = "<ul class='list-group pagination'>";
			$config['full_tag_close']= "</ul>";
			$config['next_tag_open'] = "<li class='list-group-item'>";
			$config['next_tagl_close'] = "</li>";
			$config['display_pages'] = FALSE;
			$config['attributes']['rel'] = FALSE;
			$config['last_link'] = false;
			$config['next_link'] = "Mais...";
			$config['first_link'] = false;
			$config['prev_link'] = false;
			
			$this->pagination->initialize($config);
			$this->data['pages'] = $this->pagination->create_links();
			$this->data['eventos'] = $this->eventomodel->getEvento($config['per_page'], $offset);
			$this->load->view('client/evento/eventos', $this->data);
		}

		public function descricao($id)
		{
			if(isset($id)) {
				//$fields = "evento.short_description, evento.description, evento"
				$table['table'] = "regras_evento";
				$this->data['evento'] = $this->eventomodel->getEventoDescricao($id, $table);		
				if($this->data['evento']->num_rows() > 0){
					$this->data['title'] = "Descricao Evento";
					$this->load->view('client/header', $this->data);
					$this->load->view('client/nav-bar-header', $this->data);
					$this->load->view('client/evento/descricao', $this->data);
					$this->load->view('client/nav-bar-footer', $this->data);
					$this->load->view('client/footer', $this->data);	
				} else {
					$this->index();
				}
			} else {
				$this->index();
			}
		}//fim

		/**
		* abre o formulario de cadastro do evento
		* o msm so podera acontecer caso o usuario esteja logado
		* 
		*/
		public function cadastro()
		{
			//so abrirá se tiver logado
			if($this->getUserId() > 0 ) {
				$this->data['estado'] = $this->db->get_where('estado', array('pais' => 1));
				$this->data['categoria'] = $this->db->get('categoria');
				$this->data['title'] = "Cadastro Evento";
				$this->load->view('client/header', $this->data);
				$this->load->view('client/nav-bar-header', $this->data);
				$this->load->view('client/evento/cadastro', $this->data);
				$this->load->view('client/nav-bar-footer', $this->data);
				$this->load->view('client/footer', $this->data);
			}else{
				$this->index();
			}
		}//fim

		/**
		* cadastra o evento na base de dados
		*/
		public function create()
		{
			//so cadastra se tiver logado
			if($this->getUserId() > 0){
				//objeto evento
				$evento['short_description'] = trim(strtolower($this->input->post('short_description')));
				$evento['description'] = trim(strtolower($this->input->post('description')));
				$evento['event_date'] = $this->input->post('event_date');
				$evento['created_at'] = date('y-m-d');
				$evento['id_usuario'] = $this->getUserId();

				//objeto regras
				$regras['players'] = $this->input->post('players');
				//total vagas para visitantes
				$regras['quantity_visitors'] = trim($this->input->post('quantity_visitors'));
				
				if($regras['players'] == "single") {
					$regras['quantity_players'] = 1;
				} else {
					//total vagas para jogadores por equipe
					$regras['quantity_players'] = trim($this->input->post('quantity_players'));
				}
				//vagas disponiveis para equipes ou participantes no evento
				$regras['vacancies'] = trim($this->input->post('vacancies'));
				$regras['entry_value'] = trim($this->input->post('entry_value'));
				$regras['inscription_value'] = trim($this->input->post('inscription_value'));
				$regras['short_description'] = trim(strtolower($this->input->post('short_description_rules')));

				//objeto fotos
				$fotos = $_FILES['userfile'];
				
				//categoria
				$categoria = $this->input->post('categoria');
				
				//endereco
				$endereco['id_city'] = $this->input->post('city');
				$endereco['street'] = trim(strtolower($this->input->post('street')));
				$endereco['district'] = trim(strtolower($this->input->post('district')));

				$ret = $this->eventomodel->create($evento, $fotos, $endereco, $regras, $categoria);
				$response = null;
				
				if($ret > 0) {	
					$objeto['file'] = $_FILES['userfile'];
					$objeto['destino'] = './assets/img-evento';
					$objeto['rename'] = $ret;
					$img = $this->fileupload->uploadImagem($objeto);
					$response = $img == true ? true : false;
				}//fim if

				echo $response;
			}else{
				$this->index();
			}

		}//fim function

		/**
		* retorna cidades de acordo com estado selecionado	
		*/
		function selectcidade($estado)
		{
			$estado = $this->input->post('estado');
			
			$this->data['cidade'] = $this->db->get_where('cidade', array('estado'=>$estado));
			$this->load->view('client/evento/options_cidades', $this->data);
		}//fim function


	}//fim da class

	?>