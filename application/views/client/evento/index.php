<div class="container">
	<div class="col-md-8 col-md-offset-2">	
		<?php 
			foreach ($eventos->result() as $evento) {

		 ?>						
			<!--Card-->
			<div class="card">

			    <!--Card image-->
			    <div class="view overlay hm-white-slight">
			        <img src="<?php echo base_url('/assets/img-evento/'.$evento->foto)?>" class="img-fluid" alt="">
			        <a>
			            <div class="mask"></div>
			        </a>
			    </div>
			    <!--/.Card image-->

			    <!--Button-->
			    <a class="btn-floating btn-action"><i class="fa fa-chevron-right"></i></a>

			    <!--Card content-->
			    <div class="card-block">
			        <!--Title-->
			        <h4 class="card-title"><?php echo $evento->short_description?></h4>
			        <hr>
			        <!--Text-->
			        <p class="card-text">
			        	<?php echo $evento->description;?>
			        </p>
			    </div>
			    <!--/.Card content-->

			    <!-- Card footer -->
			    <div class="card-data">
			        <ul>
			            <li><i class="fa fa-clock-o"></i><?php echo $evento->event_date?></li>
			            <li><a href="#"><i class="fa fa-facebook"> </i></a></li>
			            <li><a href="#"><i class="fa fa-twitter"> </i></a></li>
			        </ul>
			    </div>
			    <!-- Card footer -->

			</div>
			<!--/.Card-->
			<p class="m-b-3">
		 <?php
		 	}
		 ?>
	</div>
</div>			
