<?php 

	/**
	* @author rivail santos
	*/
	class Eventomodel extends CI_Model
	{
		

		public function create($evento, $fotos, $endereco, $regras, $cateogira)
		{
			$this->db->trans_begin();	

			//insere evento
			$this->db->insert('evento', $evento);
			$idlastEvento = $this->db->insert_id();


			//insere endereco
			$endereco['id_conect_table'] = $idlastEvento;
			$endereco['conection_table'] = "evento";
			$this->db->insert('endereco', $endereco);

			print_r($fotos);
			//insere fotos
			$fotos['id_evento'] = $idlastEvento;

			foreach ($fotos['name'] as $fot) {
				$fotos['picture'] = $fot->name;
			}
			$this->db->insert('evento_fotos', $fotos);

			//insere categoria
			$categoria['id_evento'] = $idlastEvento;
			foreach ($categoria as $cat) {
				$categoria['id_categoria'] = $cat->id;
			}
			$this->db->insert('categoria_evento', $categoria);

			//insere regras
			$regras['id_evento'] = $idlastEvento;
			$this->db->insert('regras_evento', $regras);

			$this->db->trans_complete();

			if(!$this->db->trans_status() === FALSE)
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