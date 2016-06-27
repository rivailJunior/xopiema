<?php 

	/**
	* @author rivail santos
	* desciption - realiza multiplos uploads
	*/
	class Fileupload 
	{
		public $CI;
		function __construct()
		{
			$this->CI =& get_instance();
			$this->CI->load->helper('url');
			$this->CI->load->library("image_lib");
			$this->CI->load->library("upload");
		}//fim construct
		 
		/*
			$objeto['destino'] = 'pasta de destino';
		 	$objeto['file'] = $_FILES;
		 	$objeto['rename'] = 'id_do_evento_salvo';
		*/
		 function uploadImagem($objeto)
		 {
		 		$config['upload_path']          = $objeto['destino'];
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000;
                $config['max_width']            = 2024;
                $config['max_height']           = 2000;
                $config['overwrite'] 			= true;
		 		
		 		$tamanhoArquivo = count($objeto['file']['name']);
		 		$counter = 0;
		 		
		 		for($i = 0; $i < $tamanhoArquivo; $i++ ) {
		 			$config['file_name'] = md5($objeto['rename']."_".$i);	
		 			$_FILES['userfile']['name'] = $objeto['file']['name'][$i];
		 			$_FILES['userfile']['type'] = $objeto['file']['type'][$i];
		 			$_FILES['userfile']['tmp_name'] = $objeto['file']['tmp_name'][$i];
		 			$_FILES['userfile']['error'] = $objeto['file']['error'][$i];
		 			$_FILES['userfile']['size'] = $objeto['file']['size'][$i];

		 			$this->CI->upload->initialize($config);

		 			$response = $this->CI->upload->do_upload('userfile');

		 			if($response) {
		 				$counter++;
		 			} else {
		 				return $this->CI->upload->display_errors('<p>', '</p>');
		 			}
		 		}//fim 
		 	
		 		return $newResponse = $counter == $tamanhoArquivo ? true : false;
		 	 	
		 }//fim lib

	}//fim class

 ?>