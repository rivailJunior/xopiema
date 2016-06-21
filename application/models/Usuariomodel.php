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

			$validacao['id_usuario'] = $idlast;

			$validacao['hash_code'] = md5($usuario['login']);

			$validacao['status'] = false;

			$this->db->insert('validacao_cadastro',$validacao);

			
			$this->db->trans_complete();

			if(!$this->db->trans_status())
			{
				return 0;
			}
			else
			{
				$this->sendEmail($usuario['login']);
				return 1;
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


		public function sendEmail($userEmail)
		{
			$this->load->library('send_email');
			$email = $userEmail;
			$data['subject'] = "Email XoPiema";
			$data['message'] = "Para ativar sua conta acesse esta pagina: ".site_url('usuariocontroller/validacaoConta/'.md5($userEmail));
			$this->send_email->sendEmail($email, $data);
		}


	}//fim


	?>