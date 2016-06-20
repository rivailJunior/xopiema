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

	}
	?>