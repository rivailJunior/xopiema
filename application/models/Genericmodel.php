<?php 


	/**
	* this is the model which has the common models functions like:
	* create, update, read, delete 
	*/
	class Genericmodel extends CI_Model
	{
		/*
		* @create - create a new instance
		* @model - your table name
		* @data - the values as array 
		* return boolean
		*/
		public function create($model, $data)
		{
			return $this->db->insert($model, $data);
		}//fim

		/*
		* @read - find the objects from your table
		* @model - your table name
		* @data - your sql script - ex: select * from tablename
		* return object results
		*/
		public function read($model, $data = null)
		{	

			if($data != null){
				return $this->db->query($data)->result();
			}
		}//fim

		/*
		* @delete - delete a object from your table
		* @model - your table name
		* @tableId - your table id name - ex: usuarioId
		* @id - the id value - only number
		* return boolean
		*/
		public function delete($model, $tableId, $id)
		{
			return $this->db->delete($model, array($tableId => $id));
			
		}//fim
		

		/*
		* @update - update a single object from your table
		* @model - your table name
		* @tableId - your table id name - ex: usuarioId
		* @id - the id value - only number
		* return boolean
		*/
		public function update($model, $tableId, $id, $data)
		{
			$this->db->where($tableId, $id);
			return $this->db->update($model, $data);
			
		}//fim

		/*
		* @findById - find a sigle object from your table
		* @model - your table name
		* @tableId - your table id name - ex: usuarioId
		* @id - the id value - only number
		* return object
		*/	
		public function findById($model, $tableId, $id)
		{
			return $this->db->get_where($model, array($tableId => $id))->result();
		}//fim
	}

 ?>