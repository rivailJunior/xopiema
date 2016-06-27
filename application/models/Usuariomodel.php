<?php 

	/**
	* @author rivail santos
	*/
	class Usuariomodel extends CI_Model
	{
		/**
		 * @uses to insert a user with perfil
		 */
		function create($usuario, $perfil, $fotos)
		{
			//print_r($usuario);
			$this->db->trans_begin();	
			
			$this->db->insert("usuario", $usuario);
			$idlast = $this->db->insert_id();

			$perfil['id_usuario'] = $idlast;

			foreach($fotos['name'] as $index => $value) {
				$type[$index] = explode(".", $value);
				$perfil['picture'] = md5($idlast."_".$index).".".$type[$index][1];
				$this->db->insert('perfil', $perfil);
			}

			$validacao['id_usuario'] = $idlast;

			$validacao['hash_code'] = md5($usuario['login']);

			$validacao['status'] = false;

			$this->db->insert('validacao_cadastro',$validacao);
			
			$this->db->trans_complete();

			if($this->db->trans_status() != FALSE)
			{
				$this->db->trans_commit();
				return $idlast;
			}	
			else
			{
				 $this->db->trans_rollback();
				return 0;
			}
		}//fim function

		public function findById($id)
		{
			return $this->db->get_where("usuario",array('id' => $id))->result();
		}

		public function changepassword($login,$pass){
			$this->db->set('password_key', $pass);
			$this->db->where('login', $login);
			$this->db->update('usuario');
		}


	}//fim


	?>