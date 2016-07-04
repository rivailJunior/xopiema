<div class="container m-t-3">
	<div class="card card-block">
		<h4 class="card-title text-fluid">Descricao do Evento</h4>
		<h4 class="card-title m-t-2 text-fluid">Evento: <?php echo $evento->row()->short_description;?></h4>
		<div class="card-text">
			<div class="row">
				<div class="col-md-6">	
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
					    <div class="carousel-inner" role="listbox">
					    <?php 
					    	
					    	if($fotos->num_rows() > 0){
					    		foreach ($fotos->result() as $index => $fot) {
					     ?>
					        <!--First slide-->
					        <div class="carousel-item <?php if($index == 0) echo "active"; ?>">
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
				<div class="col-md-6">
					<h4 class="card-title">Sobre o evento </h4>
					<blockquote class="blockquote"><?php echo $evento->row()->description;?></blockquote>
				</div>
			</div>			
		</div>
	</div>
	<div class="card card-block">
		<h4 class="card-title">Geral</h4>
		<div class="card-text">
			<div class="row">	
				<div class="col-md-12">
					<blockquote class="blockquote bq-primary">
			   			<p class="bq-title">Participantes ou visitantes...</p>
			   			<p><?php echo $evento->row()->descricao_regras;?></p>
					</blockquote>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="card card-primary text-xs-center z-depth-2">
					    <div class="card-block">
					    	<h4 class="card-title white-text">Total vagas</h4>
					        <p class="white-text"><?php echo $evento->row()->vacancies;?></p>
					    </div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card card-primary text-xs-center z-depth-2">
					    <div class="card-block">
					    	<h4 class="card-title white-text">Valor participante</h4>
					        <p class="white-text"><?php echo "R$: ".$evento->row()->inscription_value;?></p>
					    </div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card card-success text-xs-center z-depth-2">
					    <div class="card-block">
					    	<h4 class="card-title white-text">Valor Visitante</h4>
					        <p class="white-text"><?php echo "R$: ".$evento->row()->entry_value;?></p>
					    </div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card card-success text-xs-center z-depth-2">
					    <div class="card-block">
					    	<h4 class="card-title white-text">Vagas visitantes</h4>
					        <p class="white-text"><?php echo $evento->row()->quantity_visitors;?></p>
					    </div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="card card-success text-xs-center z-depth-2">
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
				<div class="col-md-6">
					<div class="card card-primary text-xs-center z-depth-2">
					    <div class="card-block">
					    	<h4 class="card-title white-text">Por equipe</h4>
					        <p class="white-text"><?php echo $evento->row()->quantity_players;?></p>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>