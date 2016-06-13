<script src="<?php echo base_url('/assets/') ?> /owncarosel/owl-carousel/owl.carousel.js"></script>
    
<div class="row">
	<div class="container">
	    <div class="card card-block" >
			<div class="row">
					<h5 class="h4-responsive m-l-1">Voce é apaixonado por esportes?
						<small class="text-muted">Voce esta no lugar certo!</small>
					</h5>
					<small class="text-muted m-t-3 m-l-1">Noticias, Eventos, Dicas de Saude e muito mais.</small>
					<hr>		
			</div>
			<div class="row">
				<div class="col-md-5">                 
					<!--Card-->
					<div class="card">
					    <!--Image-->
					    <img class="img-fluid" src="http://mdbootstrap.com/images/regular/people/img%20(30).jpg" alt="Card image">
					    <!--Content-->
					    <div class="card-img-overlay">
					        <h4 class="card-title">Dica de saude da manha</h4>
					        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
					        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
					    </div>
					</div>
					<!--/.Card-->
				</div>
				
				<div class="col-md-5">
						<blockquote class="blockquote">
						  <p class="m-b-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
						  <p class="m-b-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
						  <p class="m-b-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
						  <p class="m-b-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
						  <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
						</blockquote>
				</div>

				<div class="col-md-2">
					<!--Panel-->
						<div class="card card-block">
						<h4 class="card-title">
							Fique por dentro
						</h4>
						<div class="card-text">
							<p>
								aqui vem algum noticiario que precisamos vender,
								ganhar dinheiro tambem é legal
							</p>
						</div>
						</div>	
					<!--/.Panel-->
				</div>
				<!--/ col-md-2-->
			</div>

			<div class="row">
				<h4 class="m-t-3 m-l-1">Eventos <small class="text-muted">Escolha uma categoria</small></h4>	
				<hr>	
			</div>
			
			<div class="row">
				
				<div id="owl-demo" class="own">
						<?php 
						$categoria = array('Aquatico', 'Corridas', 'Com Bola', 'No interior', 'Na Cidade', 'Radicais');
							for ($i=0; $i < 6; $i++) { 	
						?>
						<div class="item">
							<div class="icon-block">
								<!--Card-->
								<div class="card">
								    <!--Card image-->
								    <div class="view overlay hm-white-slight">
								        <img src="http://mdbootstrap.com/images/reg/reg%20(2).jpg" class="img-fluid" alt="">
								        <a href="#">
								            <div class="mask"></div>
								        </a>
								    </div>
								    <!--/.Card image-->

								    <!--Card content-->
								    <div class="card-block">
								        <!--Title-->
								        <h4 class="card-title"> <?php echo $categoria[$i];?> </h4>
								        <!--Text-->
								        
								        <a href="#" class="btn btn-primary">Button</a>
								    </div>
								    <!--/.Card content-->

								</div>
								<!--/.Card-->
							</div>
						</div>
						<?php
							}
						?>
				</div>
			</div>	
				
			<div class="row">
				<h4 class="m-t-3 m-l-1">Noticias</h4>	
			    <hr>
			</div>

			<div class="row">
			   
			   	
			   <div id="owl-demo2" class="own">
	            <?php 
	            for ($i = 0; $i < 10; $i++) {
	             ?>
	              <div class="item">
	              <div class="icon-block">
		              <!--Card-->
					<div class="card">
					    <!--Image-->
					    <img class="img-fluid" 
					    src="http://mdbootstrap.com/images/regular/people/img%20(30).jpg" 
					    alt="Card image">
					    <!--Content-->
					    <div class="card-img-overlay">
					        <h4 class="card-title">Dica de saude da manha</h4>
					        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
					        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
					    </div>
					</div>

	              </div>
	              </div>
	              <?php 
	                }
	               ?>
	           </div>
	           <!--/own demo-->
			</div>
			<!--/ row-->

		</div>

	</div>
</div>
	<script type="text/javascript">
         $(document).ready(function  () 
             {
                $("#owl-demo").owlCarousel({
                    autoPlay:3000,
                    navigation : false,
                    slideSpeed : 300,
                    items : 3,
                    paginationSpeed : 400,
                    autoHeight : false,
                });
                $("#owl-demo2").owlCarousel({
                    autoPlay:3000,
                    navigation : false,
                    slideSpeed : 300,
                    items : 3,
                    paginationSpeed : 400,
                    autoHeight : false,
                });
             });
      </script>
                         
	