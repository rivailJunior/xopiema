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
		$fields = $this->db->list_fields($model);
		$structure = "
		<?php
			defined('BASEPATH') OR exit('No direct script access allowed');
			/**
			* @author created by create_views library
			* @uses 
			* @category controller
			*/

			class ".$model."controller extends CI_Controller {

				public $data = array();
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
					//all the input post come here
					//ex: {$model}['field_name'] = $this->input->post('table_field_name');
					//ex: {$model}['other_field_name'] = $this->input->post('table_field_name'); 
					//$this->genericmodel->create($model, $modelname);
					//your code tu return the response
				}//fim

				/**
				* @author created by create_views library
				* @uses to read some results rows
				* @category function
				*/
				public function read() {
					//$this->data['list'] = $this->db->get($model);
					//$this->load->view('put your view name here', $this->data);
				}//fim

				/**
				* @author created by create_views library
				* @uses to update a row
				* @category function
				*/
				public function update($id) {
					//all the input post come here
					//ex: {$modelname}['field_name'] = $this->input->post('table_field_name');
					//ex: {$modelname}['other_field_name'] = $this->input->post('table_field_name'); 
					//$this->genericmodel->update($model, 'table id name', $id, $modelname);
					//your code tu return the response
				}//fim

				/**
				* @author created by create_views library
				* @uses to delete a row
				* @category function
				*/
				public function delete($id) {
					//$this->genericmodel->delete($model, 'table id name', $id);
					//your code tu return the response
				}//fim

			}//fim class

		?>
		";

		if ( ! write_file('../controllers/'.$model.'controller.php', $structure))
		{
		        echo 'erro while create controller structure';
		}
		else
		{
		        echo 'controller created';
		}

	}//fim function

	public function getView($model)
	{
		$fields = $this->db->list_fields($model);
		foreach ($fields as $field) {
			
		}
	}//fim function



}//fim class

 ?>