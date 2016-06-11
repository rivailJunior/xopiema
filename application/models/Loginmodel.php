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
		$sql = $this->db->query("select * from usuario where login = '".$login."' and password_key = '".$senha."'");
		if($sql->num_rows()==1)
		{
			return $sql->result();
		}
		else
		{
			return false;
		}
	}
}
?>