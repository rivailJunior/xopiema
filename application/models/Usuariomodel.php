<?php 

	/**
	* @author rivail santos
	*/
	class Usuariomodel extends CI_Model
	{
		/**
		 * @uses to insert a user with perfil
		 */
		function create($usuario, $perfil)
		{
			//print_r($usuario);
			$this->db->trans_start();	
			
			$this->db->insert("usuario", $usuario);
			$idlast = $this->db->insert_id();

			$perfil['id_usuario'] = $idlast;
			$this->db->insert('perfil',$perfil);
			
			$this->db->trans_complete();

			if(!$this->db->trans_status())
			{
				return 0;
			}
			else
			{
				return 1;
			}
		}//fim function

		public function findById($id)
		{
			
			return $this->db->get_where("usuario",array('id' => $id))->result();


		}


	}//fim


 ?>