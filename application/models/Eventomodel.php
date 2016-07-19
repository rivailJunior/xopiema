<?php 

	/**
	* @author rivail santos
	*/
	class Eventomodel extends CI_Model
	{
		
		/**
		* @author rivail santos
		* realiza cadastro de evento
		*/
		public function create($evento, $fotos, $endereco, $regras, $categoria)
		{
			$this->load->helper('string');
			$this->db->trans_begin();	

			//insere evento
			$this->db->insert('evento', $evento);
			$idlastEvento = $this->db->insert_id();

			//insere endereco
			$endereco['id_conect_table'] = $idlastEvento;
			$endereco['conection_table'] = "evento";
			$this->db->insert('endereco', $endereco);
			
			//insere foto
			$evento_fotos['id_evento'] = $idlastEvento;
			foreach($fotos['name'] as $index => $value) {
				//echo $index."<br>";
				$type[$index] = explode(".", $value);
				//print_r($type);
				$evento_fotos['picture'] = md5($idlastEvento."_".$index).".".$type[$index][1];
				$this->db->insert('evento_fotos', $evento_fotos);
			}
			
			//insere categoria
			$cat_evento['id_evento'] = $idlastEvento;
			for($i = 0; $i < sizeof($categoria); $i++){
				$cat_evento['created_at'] = date('d-m-y');
				$cat_evento['id_categoria'] = $categoria[$i];
				$this->db->insert('categoria_evento', $cat_evento);
			}
			
			//insere regras
			$regras['id_evento'] = $idlastEvento;

			$this->db->insert('regras_evento', $regras);

			$this->db->trans_complete();

			if($this->db->trans_status() != FALSE)
			{
				$this->db->trans_commit();
				return $idlastEvento;
			}	
			else
			{
				$this->db->trans_rollback();
				return 0;
			}
		}//fim da function

		/**
		* retornar todos os eventos sem filtro e em ordem decrescentes
		*/
		public function getEvento($limit = null, $offset = null)
		{
			$sql = "select 
			e.id as id_evento,
			e.description as description,
			date_format(e.event_date, '%d-%m-%Y') as event_date,
			e.short_description as short_description,
			e.id_usuario as id_usuario,
			re.entry_value as entry_value,
			re.inscription_value as inscription_value,
			re.players as format,
			re.quantity_players as quantity_players,
			re.vacancies as vagas,
			re.quantity_visitors as quantity_visitors,
			c.nome as cidade,
			(select picture from evento_fotos ef where ef.id_evento = e.id  order by id desc limit 1) as foto,
			est.nome as estado
			from evento e
			inner join endereco ed on ed.id_conect_table = e.id
			inner join regras_evento re on re.id_evento = e.id
			inner join cidade c on c.id = ed.id_city
			inner join estado est on est.id = c.estado
			where ed.conection_table = 'evento' group by e.id order by e.id desc";
			
			if($limit != null) {
				$sql .=" limit  ".$limit."";
				if(isset($offset)){
					$sql .= " offset ".$offset;
				}
			};
			
			return $this->db->query($sql);
		}// fim function

		/**
		* @author rivail santos
		* retorna descricao do evento
		*/
		public function getEventoDescricao($id, $objeto)
		{
			$this->db->select('evento.*, 
				evento.short_description as evento_name, 
				evento.description as evento_descricao, 
				endereco.*,
				usuario.*, 
				regras_evento.*, 
				regras_evento.short_description as descricao_regras');
			$this->db->from('evento');
			foreach ($objeto as $idnex => $value) {
				$this->db->join($value, $value.'.id_evento = evento.id', 'left');	
			}
			$this->db->join('endereco', 'endereco.id_conect_table = evento.id', 'left');
			$this->db->join('usuario', 'evento.id_usuario = usuario.id', 'left');
			$this->db->where('evento.id', $id);
			$this->db->where('endereco.conection_table', 'evento');
			return $this->db->get();	
		}//fim
		
		//retorna total de participantes do evento pelo id do evento
		//params - id do evento
		public function getTotalInscritos($tipo,$id)
		{	 $type = $tipo == 'visitante' ? 'inscricao_visitante' : 'inscricao_participante';
		echo $type;
		return $this->db->get_where($type, array('id_evento' => $id));
		}//fim

		//retorna o endereco do evento
		public function getEnderecoEvento($id)
		{
			$sql = "select etd.*, c.*, e.*, c.nome as cidade, etd.nome as estado from endereco e
			inner join cidade c on c.id = e.id_city
			inner join estado etd on etd.id = c.estado
			where e.id = ".$id;
			return $this->db->query($sql);
		}//fim
		
		/**
		* @author rivail santos
		* realiza inscricao do visitante no evento
		*/ 
		public function inscricao($data)
		{
			return $this->db->insert('inscricao_visitante', $data);
		}//fim 
		

		/**
		* @author rivail santos
		* verifica se o usuario ja nao esta inscrito no evento;
		*/
		public function verifyInscriptions($user)
		{
			$this->db->select('*');
			$this->db->from('inscricao_visitante iv');
			$this->db->where('long_name', $user['long_name']);
			$this->db->where('id_usuario', $user['id_usuario']);
			$this->db->where('email', $user['email']);
			return $this->db->get();
		}//fim function 
		

		/**
		* @author rivail santos
		* retorna todos os eventos cadastrados pelo participante
		*/
		public function personalEvents($user)
		{	
			$fields = " e.*,e.description as evento_descricao, e.short_description as evento_name, e.id as evento_id,
						c.nome, et.nome, re.*, re.short_description as regras,
    					(select count(*) from inscricao_visitante iv where iv.id_evento = e.id) as visitantes,
    					(select count(*) from inscricao_participante ip where ip.id_evento = e.id )as participantes";
			$this->db->select($fields);
			$this->db->from('evento e');
			$this->db->join('regras_evento re', 'e.id = re.id_evento', 'left');
			$this->db->join('endereco ed', 'e.id = ed.id_conect_table', 'left');
			$this->db->join('cidade c', 'ed.id_city = c.id');
			$this->db->join('estado et', 'et.id = c.estado');
			$this->db->where('e.id_usuario', $user);
			$this->db->where('ed.conection_table', 'evento');
			return $this->db->get();
		}//fim
	}//fim class


	?>