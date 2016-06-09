<?php 


/**
* @author rivail santos
* @uses to build some views and controllers structures
* @category library
*/
class Create_structure
{
	
	public $CI;
	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->helper('file');
	}


	public function createController($model)
	{
		$fields = $this->CI->db->list_fields($model);
		$model = ucfirst($model);
		$structure = "
		<?php
			defined('BASEPATH') OR exit('No direct script access allowed');
			/**
			* @author created by create_views library
			* @uses 
			* @category controller
			*/

			class ".$model."controller extends CI_Controller {

				public function __construct(){
					parent::__construct();
					//put the permission code here
				}

				/**
				* @author created by create_views library
				* @uses to insert a row
				* @category function
				*/
				public function create() {
				}//fim

				/**
				* @author created by create_views library
				* @uses to read some results rows
				* @category function
				*/
				public function read() {
				}//fim

				/**
				* @author created by create_views library
				* @uses to update a row
				* @category function
				*/
				public function update() {
				}//fim

				/**
				* @author created by create_views library
				* @uses to delete a row
				* @category function
				*/
				public function delete() {
				}//fim

			}//fim class

		?>
		";

		if ( ! write_file('application/controllers/'.$model.'controller.php', $structure))
		{
		        echo 'erro while create controller structure';
		}
		else
		{
		       echo 1;
		}

	}//fim function

	/*public function getView($model)
	{
		$fields = $this->CI->db->list_fields($model);
		foreach ($fields as $field) {
			
		}
	}*///fim function



}//fim class

 ?>