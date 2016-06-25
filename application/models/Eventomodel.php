<?php 

	/**
	* @author rivail santos
	*/
	class Eventomodel extends CI_Model
	{
		

		public function create($evento, $fotos, $endereco, $regras, $categoria)
		{
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
				$evento_fotos['picture'] = $value;
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
				return 1;
			}	
			else
			{
				 $this->db->trans_rollback();
				return 0;
			}
		}//fim da function

	}//fim class


 ?>