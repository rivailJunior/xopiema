<script type="text/javascript">
	$(document).ready(function(){
		$('.mdb-selects').material_select();
		 
	});
</script>
	<option value="" disabled="">Selecione Cidade</option>
<?php 
	if($cidade->num_rows() > 0)
	{
		foreach ($cidade->result() as $row) 
		{
 ?>
 	<option value="<?php echo $row->id; ?>"><?php echo $row->nome;?></option>
 <?php
 	 	}

 	}
 ?>
