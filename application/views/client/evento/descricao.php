<?php 
	$this->load->helper('date');
 ?>
<style type="text/css">
	.carousel-item img{
		width: 100%;
		max-height: 300px;
	}
	.scroll-box {
position: relative;
}
.scrollspy-example {
position: relative;
overflow-y: scroll;
height: 400px; 
}
</style>

<div class="container m-t-1">
	
	<div class="list-group">
		<a href="<?php echo site_url('eventocontroller/ingresso/'.$evento->row()->id)?>" 
		class="list-group-item red white-text">Confirmar presença</a>
	</div>
	<!--Descricao-->
	<div class="card card-block m-t-1">
		<h4 class="card-title text-fluid"> <i class="fa fa-file-text "></i> Sobre o evento</h4>
		<h4 class="card-title m-t-2 text-fluid text-muted"><?php echo $evento->row()->short_description;?></h4>
		<div class="card-text">
			<div class="row">
				<div class="col-md-6 m-t-2">	
					<!--Carousel Wrapper-->
					<div id="carousel-example-1" class="carousel slide carousel-fade" data-ride="carousel">
					    <!--Indicators-->
					    <ol class="carousel-indicators">
					    <?php 
					    	$fotos = $this->db->get_where('evento_fotos', array('id_evento'=>$evento->row()->id));
					    	if($fotos->num_rows() > 0) {
					    		for($i = 0; $i < $fotos->num_rows(); $i++) {		
					     ?>
					        <li data-target="#carousel-example-1" data-slide-to="<?php echo $i ;?>"
					         class="<?php if($i === 0) echo "active"; ?>"></li>
					        <?php
					        	}
					        }
					        ?>
					    </ol>
					    <!--/.Indicators-->

					    <!--Slides-->
					    <div class="carousel-inner z-depth-1" role="listbox">
					    <?php 	
					    	if($fotos->num_rows() > 0){
					    		foreach ($fotos->result() as $index => $fot) {
					     ?>
					        <!--First slide-->
					        <div class="carousel-item <?php if($index == 0) echo "active"; ?> ">
					            <img src="<?php echo base_url('/assets/img-evento/'.$fot->picture);?>" 
					            alt="First slide">
					        </div>
					        <!--/First slide-->
					    <?php
					    	}
					    }
					    ?>

					    </div>
					    <!--/.Slides-->

					    <!--Controls-->
					    <a class="left carousel-control" href="#carousel-example-1" role="button" data-slide="prev">
					        <span class="icon-prev" aria-hidden="true"></span>
					        <span class="sr-only">Previous</span>
					    </a>
					    <a class="right carousel-control" href="#carousel-example-1" role="button" data-slide="next">
					        <span class="icon-next" aria-hidden="true"></span>
					        <span class="sr-only">Next</span>
					    </a>
					    <!--/.Controls-->
					</div>
					<!--/.Carousel Wrapper-->
				</div>
				<div class="col-md-6 m-t-2">
					<h4 class="card-title"> ... </h4>
					<blockquote class="blockquote text-muted">" <?php echo $evento->row()->description;?> "
					<footer class="blockquote-footer">
					<cite title="Source Title"><?php echo $evento->row()->last_name;?></cite></footer>
					</blockquote>
				</div>
			</div>			
		</div>
	</div>
	<!--/descricao-->
	<!-- geral-->
	<div class="card card-block">
		<h4 class="card-title"><i class="fa fa-info-circle"></i> Geral</h4>
		<div class="card-text m-t-2">
			<div class="row">	
				<div class="col-md-10 col-sm-8">
					<blockquote class="blockquote bq-warning">
			   			<p class="bq-title">Participantes ou visitantes...</p>
			   			<p class="text-muted"><?php echo $evento->row()->descricao_regras;?></p>
					</blockquote>
				</div>
				<div class="col-md-2 col-sm-4">
					<blockquote class="blockquote bq-warning">
						<p class="bq-title">Data</p>
						<p class="text-muted">
							<?php 
								$now = $evento->row()->event_date;
								echo nice_date($now, 'd-m-Y');?>
						</p>
					</blockquote>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-4">
					<div class="card teal darken-1 text-xs-center z-depth-1">
					    <div class="card-block">
					    	<h4 class="card-title white-text">Total vagas</h4>
					        <p class="white-text">
					        	<?php 
					        	$vagas = $evento->row()->vacancies; 
					        	echo  $vagas > 0 ? $vagas : "Ilimitadas";
					        	?>
					        </p>
					    </div>
					</div>
				</div>
				<div class="col-md-3 col-sm-4">
					<div class="card teal darken-1 text-xs-center z-depth-1">
					    <div class="card-block">
					    	<h4 class="card-title white-text">Valor participante</h4>
					        <p class="white-text">
					        	<?php 
					        		$inscricao = $evento->row()->inscription_value;
					        		echo $inscricao > 0 ? "R$: ".$inscricao : "Evento Gratuito";
					        	?></p>
					    </div>
					</div>
				</div>
				<div class="col-md-3 col-sm-4">
					<div class="card teal darken-3 text-xs-center z-depth-1">
					    <div class="card-block">
					    	<h4 class="card-title white-text">Valor Visitante</h4>
					        <p class="white-text">
					        	<?php 
					        		$entrada = $evento->row()->entry_value;
					        		echo $entrada > 0 ? "R$: ".$entrada : "Entrada Gratuita";
					        	?>	
					        	</p>
					    </div>
					</div>
				</div>
				<div class="col-md-3 col-sm-4">
					<div class="card teal darken-3 text-xs-center z-depth-1">
					    <div class="card-block">
					    	<h4 class="card-title white-text">Vagas visitantes</h4>
					        <p class="white-text">
						        <?php 
						        	$visitantes = $evento->row()->quantity_visitors;
						        	echo $visitantes > 0 ? $visitantes : "Ilimitada";
						        ?>	
					        </p>
					    </div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-4">
					<div class="card  teal darken-3 text-xs-center z-depth-1">
					    <div class="card-block">
					    	<h4 class="card-title white-text">Formato parcitipação</h4>
					        <p class="white-text">
					        <?php if ($evento->row()->players !== 'single') 
					        		echo 'equipe';
					        	  else 
					        	  	echo 'individual';	
					        ?>	
					        </p>
					    </div>
					</div>
				</div>
				<div class="col-md-3 col-sm-4">
					<div class="card teal darken-1 text-xs-center z-depth-1">
					    <div class="card-block">
					    	<h4 class="card-title white-text">Qunatidade por equipe</h4>
					        <p class="white-text"><?php echo $evento->row()->quantity_players;?></p>
					    </div>
					</div>
				</div>
				<div class="col-md-3 col-sm-4">
					<div class="card card-danger text-xs-center z-depth-1">
					    <div class="card-block">
					    	<h4 class="card-title white-text">Número de inscritos</h4>
					        <p class="white-text"><?php echo $total_inscritos;?></p>
					    </div>
					</div>
				</div>
				<div class="col-md-3 col-sm-4">
					<div class="card card-danger text-xs-center z-depth-1">
					    <div class="card-block">
					    	<h4 class="card-title white-text">Participantes inscritos</h4>
					        <p class="white-text"><?php echo $total_participantes;?></p>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/geral-->
	<!--Endereco-->
	<div class="card card-block">
		<h4 class="card-title"><i class="material-icons prefix">place</i> Endereço</h4>
		<div class="card-text m-t-2">
			<div class="row">
				<div class="col-md-6">
					<div class="col-md-12">
						<dl class="dl-horizontal">							  
							  <dt class="col-sm-3">Estado</dt>
							  <dd class="col-sm-9"><?php echo $endereco->row()->estado; ?></dd>

							  <dt class="col-sm-3">Cidade</dt>
							  <dd class="col-sm-9"><?php echo $endereco->row()->cidade;?></dd>

							  <dt class="col-sm-3">Biarro</dt>
							  <dd class="col-sm-9">
								  <?php 
								  		$bairro = $endereco->row()->district;
								  		echo $bairro !== "" ? $bairro : "Sem endereço";
								  ?>
							  </dd>

							  <dt class="col-sm-3">Rua</dt>
							  <dd class="col-sm-9">
							  <?php 
								  	$rua = $endereco->row()->street;
								  	echo $rua !== "" ? $rua : "Sem endereço";
							  	?>
							  </dd>
						</dl>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/endereco-->

	<!--Mensagens-->
	<div class="card card-block">
		<h4 class="card-title"><i class="fa fa-envelope-o"></i> Mensagens</h4>
		<div class="card-text">
			<div class="row">
				<div class="col-md-6 m-t-2">

					<div class="scroll-box">
						<div class="scrollspy-example" data-spy="scroll" data-target="#navbar-example2" data-offset="0">
							
							<?php 
								for ($i=0; $i < 10 ; $i++) { 

							 ?>
							 <!--First review-->
						    <div class="media">
						        <a class="media-left waves-light">
						            <img class="img-circle" src="http://mdbootstrap.com/wp-content/uploads/2015/10/team-avatar-1.jpg" alt="Generic placeholder image">
						        </a>
						        <div class="media-body">
						            <h4 class="media-heading">John Doe</h4>
						        
						            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi cupiditate temporibus iure soluta. Quasi mollitia maxime nemo quam accusamus possimus, voluptatum expedita assumenda. Earum sit id ullam eum vel delectus!</p>
						        </div>
						    </div>

						   <?php 
						   		}
						    ?>

						</div>
					</div>

				</div>
				<div class="col-md-6 m-t-2">
					<div class="md-form">
						<input type="text" class="form-control" placeholder="Ex: seu_email@gmail.com" name="mensagem">
						<label for="form7">E-mail alternativo</label>
					</div>
					<div class="md-form">
					    <textarea type="text" id="form7" placeholder="Ex: Esse evento vai ser show!!!" class="md-textarea"></textarea>
					    <label for="form7">Deixe sua mensagem</label>
					</div>
					<div class="md-form">
						<button type="submit" class="btn btn-success">Enviar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/mensagens-->
</div>

