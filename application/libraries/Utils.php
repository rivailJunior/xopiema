<?php 

	/**
	* this is the default utils library.
	* this is used to some method which is common to most of controllers
	* ex : date() {return the actual date}
	*/
	class Utils extends AnotherClass
	{
		
		/*
		*	@curDate - return the current date
		*	$type - usa or br
		* 	@format - (/) or (-)
		*/
		public function curDate ($type, $format) {
			date_default_timezone_set('UTC');
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