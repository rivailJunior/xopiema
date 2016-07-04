<script type="text/javascript">
	$(document).ready(function (){
		$(".pagination a").click(function (){
			var url = $(this).attr("href");
			//remove o ultimo item clicado
			$(".pagination").hide();
			$.ajax({
				url:url,
				success:function(res) {
					$("#pagination").append(res);
				},
				error:function(err){
					console.log("error: ", err)
				}
			})
			return false;
		});//
	});//fim document
</script>

<div id="pagination">	
	<?php 
		$this->load->helper('text');
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
		    <a href="<?php echo site_url('eventocontroller/descricao/'.$evento->id_evento)?>" class="btn-floating btn-action"><i class="fa fa-chevron-right"></i></a>

		    <!--Card content-->
		    <div class="card-block">
		        <!--Title-->
		        <h4 class="card-title"><?php echo word_limiter($evento->short_description, 8); ?></h4>
		        <hr>
		        <!--Text-->
		        <p class="card-text">
		        	<?php echo  word_limiter($evento->description, 20);?>
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
<div class="col-md-4 col-md-offset-4" id="paginationlink">
	<?php  {echo $pages;}?> 
</div>
		
