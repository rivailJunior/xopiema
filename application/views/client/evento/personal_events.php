<div class="container m-t-1">
	<div class="card card-block">
		<h4 class="card-title">Meus eventos</h4>
	</div>
		<div class="card-text">
			<div class="list-group">
			  <?php 
			  		if($eventos->num_rows() > 0){
			  			foreach ($eventos->result() as $index => $row) {
			  				# code...
			  			}
			   ?>
			  <button type="button" class="list-group-item"><?php echo $row->description?></button>
			  <?php
			  	}
			  ?>
			</div>
		</div>
</div>