    <div class="container m-t-1">
	    <div class="">
	    	<h3 class="card-title m-b-2">Em destaque!</h3>
		    <div class="card-text">
				<div class="row">
					<div class="col-md-8 col-sm-8 col-xs-12">
						<!--Carousel Wrapper-->
						<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
						    <!--Indicators-->
						    <ol class="carousel-indicators">
						        <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
						        <li data-target="#carousel-example-2" data-slide-to="1"></li>
						        <li data-target="#carousel-example-2" data-slide-to="2"></li>
						    </ol>
						    <!--/.Indicators-->

						    <!--Slides-->
						    <div class="carousel-inner" role="listbox">
						        <!--First slide-->
						        <div class="carousel-item active">
						            <!--Mask color-->
						            <div class="view hm-black-light">
						                <img src="http://mdbootstrap.com/images/slides/slide%20(11).jpg" class="img-fluid" alt="">
						                <div class="full-bg-img">
						                </div>
						            </div>
						            <!--Caption-->
						            <div class="carousel-caption">
						                <div class="animated fadeInDown">
						                    <h3 class="h3-responsive">Light mask</h3>
						                    <p>Secondary text</p>
						                </div>
						            </div>
						            <!--Caption-->
						        </div>
						        <!--/First slide-->

						        <!--Second slide-->
						        <div class="carousel-item">
						            <!--Mask color-->
						            <div class="view hm-black-strong">
						                <img src="http://mdbootstrap.com/images/slides/slide%20(15).jpg" class="img-fluid" alt="">
						                <div class="full-bg-img">
						                </div>
						            </div>
						            <!--Caption-->
						            <div class="carousel-caption">
						                <div class="animated fadeInDown">
						                    <h3 class="h3-responsive">Strong mask</h3>
						                    <p>Secondary text</p>
						                </div>
						            </div>
						            <!--Caption-->
						        </div>
						        <!--/Second slide-->

						        <!--Third slide-->
						        <div class="carousel-item">
						            <!--Mask color-->
						            <div class="view hm-black-slight">
						                <img src="http://mdbootstrap.com/images/slides/slide%20(13).jpg" class="img-fluid" alt="">
						                <div class="full-bg-img">
						                </div>
						            </div>
						            <!--Caption-->
						            <div class="carousel-caption">
						                <div class="animated fadeInDown">
						                    <h3 class="h3-responsive">Super light mask</h3>
						                    <p>Secondary text</p>
						                </div>
						            </div>
						            <!--Caption-->
						        </div>
						        <!--/Third slide-->
						    </div>
						    <!--/.Slides-->

						    <!--Controls-->
						    <a class="left carousel-control" href="#carousel-example-2" role="button" data-slide="prev">
						        <span class="icon-prev" aria-hidden="true"></span>
						        <span class="sr-only">Previous</span>
						    </a>
						    <a class="right carousel-control" href="#carousel-example-2" role="button" data-slide="next">
						        <span class="icon-next" aria-hidden="true"></span>
						        <span class="sr-only">Next</span>
						    </a>
						    <!--/.Controls-->
						</div>
						<!--/.Carousel Wrapper-->
					</div>
					<div class="col-md-4 col-sm-6 col-xs-6">
						
					</div>
				</div>
			</div>
		</div>
		<!-- sessao de eventos -->
		<div class="m-t-3">
			<h3 class="card-title m-b-2">Eventos em da semana</h3>
			<div class="card-text">	
				<div class="row">
					<div class="col-md-12">
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
										        
										        <a href="<?php echo site_url('eventocontroller/index');?>" 
										        class="btn btn-primary">Button</a>
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
				</div>	
			</div>
		</div>
		<!-- sessao de noticias-->
		<div class="m-t-0">
			<h3 class="card-title m-b-2">Noticias do dia</h3>
			<div class="card-text">
				<div class="row">
				   	<div class="col-md-12">
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
				</div>
			</div>
		</div>
		<!--/ row-->

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
                         
	