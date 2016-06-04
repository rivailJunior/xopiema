<?php 

	

	 /**
	  * 
	  * @author rivail santos
	  * this is the defaul library to common functions
	  * to use this class just do this - utils->
	  * 
	  */

	class Utils
	{
		
		function __construct()
		{
			setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
            date_default_timezone_set('America/Sao_Paulo');
		}
		/**
		*	@curDate - return the current date
		*	$type - usa or br
		* 	@format - (/) or (-)
		*/
		public function curDate ($type, $format) {
			$data = new Date();
			
			if(($type == "usa") && ($format == "-")){
				$data = date_format($data, 'Y-m-d H:i:s');
			}
			else if (($type == "usa") && ($format == "/")){
				$data = date_format($data, 'Y/m/d H:i:s');
			}
			else if(($type == "br") && ($format == "-"))
			{
				$data = date_format($data, 'd-m-Y H:i:s');
			}
			else if(($type == "br") && ($format == "/"))
			{
				$data = date_format($data, 'd/m/Y H:i:s');
			}
			return $data;
		}//fim function


		/**
		* this function return your datafor as uppercase
		* @data - array('todos objetos do formulario');
		*/
		public function toUpperForm($data){
			
			if(!empty($data)) {
				$sizeData = sizeof($data);
				for ($i=0; $i < $sizeData; $i++) { 
					$data[$i] = strtoupper($data[$i]);
				}
			} else {
				return null;
			}
			return $data;
		}//fim function 
		 
		
		/**
		* this function return your datafor as uppercase
		* @data - array('todos objetos do formulario');
		*/
		public function toLowerForm($data) {
			
			if(!empty($data)) {
				$sizeData = sizeof($data);
				for ($i=0; $i < $sizeData; $i++) { 
					$data[$i] = strtolower($data[$i]);
				}
			} else {
				return null;
			}
			return $data;
		}//fim function 
		 
	}//fim da classe

?>