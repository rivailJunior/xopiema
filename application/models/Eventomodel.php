<?php 

	/**
	* @author rivail santos
	*/
	class Eventomodel extends CI_Model
	{
		

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


			/*$sql = "select
			e.id as id_evento,
			e.short_description,
			e.description,
			date_format(e.event_date,'%d-%m-%Y') as event_date,
			e.id_usuario,
			re.players as format,
			re.quantity_players,
			re.quantity_visitors,
			re.entry_value,
			re.inscription_value,
			re.short_description,
			re.vacancies as vagas,
			(select ft.picture from evento_fotos ft where e.id=ft.id_evento order by id desc limit 1) as foto,
			c.nome as cidade,
			est.nome as estado from evento e,regras_evento re,endereco en,cidade c,estado est
			where e.id=re.id_evento and en.id_conect_table=e.id and en.id_city=c.id and c.estado = est.id order by e.id desc";*/

			
			if($limit != null) {
				$sql .=" limit  ".$limit."";
				if(isset($offset)){
					$sql .= " offset ".$offset;
				}
			};
			
			return $this->db->query($sql);
		}// fim function


		public function getEventoDescricao($id, $objeto)
		{
			$this->db->select('evento.*, regras_evento.*, regras_evento.short_description as descricao_regras');
			$this->db->from('evento');
			foreach ($objeto as $idnex => $value) {
				$this->db->join($value, $value.'.id_evento = evento.id', 'left');	
			}
			$this->db->where('evento.id', $id);
			return $this->db->get();	
		}
	}//fim class


	?>