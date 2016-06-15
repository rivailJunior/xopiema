<?php 

	/**
	* @description - this is used to send e-mails in a dinamic way
	* @author rivail santos
	*/
	class Send_email 
	{
		
		public $CI;
		function __construct()
		{
			$this->CI =& get_instance();
			$this->CI->load->helper('email');
			$this->CI->load->library('email');

		}//fim construct
		 
		/**
		* @description - this is the main function, used to send a e-mail
		* @param $email ex: $email = array('email@gmail.com', 'otheremail@gmail.com') or $email = 'email.com'
		* @param $data has to objects 1 -> subject ex: $data['subject'] = "titulo"; 2 -> $data['messagem'] = "mensagem";
		*/
		public function sendEmail($email, $data)
		{
			$config = Array(
			    'protocol' => 'smtp',
			    'smtp_host' => 'ssl://smtp.googlemail.com',
			    'smtp_port' => 465,
			    'smtp_user' => 'r4exopiema@gmail.com',
			    'smtp_pass' => 'cin07s1xopiema',
			    'mailtype'  => 'html', 
			    'charset'   => 'iso-8859-1'
			);
			$this->CI->email->initialize($config);
			$this->CI->email->set_newline("\r\n");
			
			$this->CI->email->from('r4exopiema@gmail.com', 'Xo Piema');
			$this->CI->email->to($email);
			//$this->CI->email->cc('another@another-example.com');
			//$this->CI->email->bcc('them@their-example.com');

			$this->CI->email->subject($data['subject']);
			$this->CI->email->message($data['message']);

			if($this->CI->email->send()){
				return true;
			} else {
				return false;
			}

		}//fim sendEmail


	}//fim da class

 ?>