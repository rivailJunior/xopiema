
<?php if(!defined("BASEPATH")){ exit("No direct script access allowed"); }

/**
* @author rivail santos
* @category library
* @uses to permits upload multiples files in na input instance
*/
class Upload_imagem
{

	public $CI;
	
	// We'll use a constructor, as you can't directly call a function
	// from a property definition.
	function __construct()
	{
		// Assign the CodeIgniter super-object
		$this->CI =& get_instance();
		$this->CI->load->helper('url');
		$this->CI->load->library("image_lib");
		$this->CI->load->library("upload");
		//$CI->config->item('base_url');
	}


	function uploadimagem($userfile, $files, $pastadestino)
	{
		// Put each errors and upload data to an array
		$error = array();
		$success = array();

		$upload_conf = array(
			'upload_path'   => realpath($pastadestino),
			'allowed_types' => 'gif|jpg|png',
			'overwrite'=>TRUE
			);
		
		$this->CI->upload->initialize($upload_conf);
			//$files['userfile']
			foreach($userfile as $key => $val)// Change $files to new vars and loop them
			{
				$i = 1;
				foreach((array)$val as $v)
				{
					$field_name = "file_".$i;
					$files[$field_name][$key] = $v;
					$i++;  

				}
			}//fim do primeiro foreach

        		unset($userfile);// Unset the useless one ;)
        		// main action to upload each file
				//$files
			foreach($files as $field_name => $file)
			{
				
				if ($this->CI->upload->do_upload($field_name))
				{
						// otherwise, put the upload datas here.
						// if you want to use database, put insert query in this loop
						$upload_data = $this->CI->upload->data();
						//set the resize config
						$resize_conf = array(
						 // it's something like "/full/path/to/the/image.jpg" maybe
						'source_image'  => $upload_data['full_path'], 
			    		// and it's "/full/path/to/the/" + "thumb_" + "image.jpg
			    		// or you can use 'create_thumbs' => true option instead
						'new_image'     => $upload_data['file_path'].'thumb_'.$upload_data['file_name'],
						'width'         => 600,
						'height'        => 400
						);
						             
					$this->CI->image_lib->initialize($resize_conf);// initializing
					
					if ( ! $this->CI->image_lib->resize())// do it!
					{
						$error['resize'][] = $this->CI->image_lib->display_errors();// if got fail.
					}
					else
					{         		
						$success[] = $upload_data;// otherwise, put each upload data to an array.
					}
				}
			}//fim do segundo foreach
			// see what we get
			if(count($success > 0))
			{
				$data['dados'] = "sucesso";
				//print_r($data['error']);
				return true;
			}
			else
			{
				$data['dados'] = $error;
				//print_r($data['success']);
				return false;
			}
			
}//fim do uploadimg


}//fim da class

?>