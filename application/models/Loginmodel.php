<?php 

/**
	@validadeuser($login,$senha)
	$login: the user login, who wants to enter in the system
	$senha: the user password
*/

	class Loginmodel extends CI_Model
	{


		function validateuser($login,$senha)
		{
			$senhaTrunc = substr($senha, 0, -7);
			
			$sql = "select * from usuario where login = '".$login."' and password_key = '".$senhaTrunc."'";

			$sqlreturn = $this->db->query($sql);
			
			if($sqlreturn->num_rows()==1)
			{
				return $sqlreturn->result();
			}
			else
			{
				return false;
			}
		}


		function checkuserexist($login){
			
			//$sqlresult = $this->db->query($sql);

			$sqlresult = $this->db->get_where('usuario', array('login' => $login));

			if ($sqlresult->num_rows()==1) {
				return true;
			} else {
				return false;
			}

		}

		function checkvalidation($login){

			$login = md5($login);
			$login = substr($login, 0, -8);

			$sql = "select * from validacao_cadastro where hash_code = '".$login."' and status = 1";

			$sqlresult = $this->db->query($sql);

			if ($sqlresult->num_rows()==1) {
				return true;
			}else {
				return false;
			}
		}
	}
	?>