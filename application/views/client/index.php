<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Xo piema</title>


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Material Design Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('/assets/MDB/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url('/assets/MDB/css/mdb.min.css') ?>" rel="stylesheet">
    <style type="text/css">
    	.container{
    		padding-top: 80px;
    	}
    </style>

</head>

<body>

      <!--Navbar-->
    <nav class="navbar navbar-dark navbar-fixed-top bg-primary">
        <!--Collapse button-->
        <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="fa fa-bars white-text"></i></a>

        <!--Content for large and medium screens-->
        <div class="navbar-desktop">
            <!--Navbar Brand-->
            <a class="navbar-brand" href="#">Navbar</a>
            <!--Links-->
            <ul class="nav navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Noticias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Eventos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sobre nós</a>
                </li>
            </ul>
            <!--Search form-->
            <form class="form-inline pull-xs-right">
                <input class="form-control" type="text" placeholder="Search">
            </form>
        </div>

        <!-- Content for mobile devices-->
        <div class="navbar-mobile">
            <ul class="side-nav" id="mobile-menu">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Noticias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Eventos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sobre nós</a>
                </li>
            </ul>
        </div>
    </nav>
    <!--/.Navbar-->	
    <div class="container">
		<div class="row">
			<div class="col-md-8">
				<h5 class="h4-responsive">Voce é apaixonado por esportes?
					<small class="text-muted">Voce esta no lugar certo!</small>
				</h5>
				<small class="text-muted">Noticias, Eventos, Dicas de Saude e muito mais.</small>
				<hr>		
			</div>
		</div>

		<div class="row">
			<div class="col-md-10">
				<div class="col-md-6">                 
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
				<div class="col-md-6">
					<blockquote class="blockquote">
					  <p class="m-b-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
					  <p class="m-b-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
					  <p class="m-b-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
					  <p class="m-b-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
					  <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
					</blockquote>
				</div>
				<div class="row"></div>

				<div class="col-md-10">
					<p class="text-center"><h4>Eventos 
					<small class="text-muted">Escolha uma categoria!</small></h4></p>			
				</div>
			<?php 
			$categoria = array('Aquatico', 'Corridas', 'Com Bola', 'No interior', 'Na Cidade', 'Radicais');
				for ($i=0; $i < 6; $i++) { 	
			?>
				<div class="col-md-4">
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
				<?php
					}
				?>
			</div>
			<div class="col-xs-2">
				<!--Panel-->
				<div class="sticky">
					<div class="card card-block" style="position: relative;  width: 200px; z-index: 0;">
					    <h4 class="card-title">Propaganda 1</h4>
					    <p class="card-text">Aqui vem algum tipo de propaganda ou noticia</p>
					    <p class="card-text">Aqui vem algum tipo de propaganda ou noticia</p>
					    <p class="card-text">Aqui vem algum tipo de propaganda ou noticia</p>
					    <a href="#" class="card-link">Card link</a>
					    <a href="#" class="card-link">Another link</a>
					</div>	
				</div>				
				<!--/.Panel-->
			</div>
		</div>
		<div class="row">
			<div class="col-md-10">
				<div class="col-md-6">
					<p class="text-center"><h4>Noticias 
					<small class="text-muted">Escolha uma categoria!</small></h4></p>			
				</div>
			</div>
		</div>
		<!--row-->
		<div class="row">
			<div class="col-md-10">
				<div class="col-md-4">                 
					<!--Card-->
					<div class="card">
					    <!--Image-->
					    <img class="img-fluid" src="http://mdbootstrap.com/images/regular/people/img%20(30).jpg" alt="Card image">

					    <!--Content-->
					    <div class="card-img-overlay">
					        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
					    </div>
					</div>
					<!--/.Card-->
				</div>
				<div class="col-md-4">
					<blockquote class="blockquote">
					  <p class="m-b-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
					  <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
					</blockquote>
				</div>
				<div class="col-md-4">
					<blockquote class="blockquote">
					  <p class="m-b-0">Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet,
					  consectetur adipiscing elit. Integer posuere erat a ante.</p>
					</blockquote>
				</div>
			</div>
		</div>

	</div>
	<!--container-->

    <!-- SCRIPTS -->

    <!-- JQuery -->
    <script type="text/javascript" src="<?php echo base_url('/assets/MDB/js/jquery-2.2.1.min.js') ?>"></script>
   
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url('/assets/MDB/js/bootstrap.min.js') ?>"></script>

    <!-- Material Design Bootstrap -->
    <script type="text/javascript" src="<?php echo base_url('/assets/MDB/js/mdb.min.js') ?>"></script>
 	<script>
        $(".button-collapse").sideNav();
    </script>

    <script type="text/javascript">
        Waves.attach('.navbar li', ['waves-light']);
        Waves.init();
        $(function () {
		    $(".sticky").sticky({
		        topSpacing: 60
		        , zIndex: 2
		        , stopper: "#YourStopperId"
		    });
		    $(".sticky2").sticky({
		        topSpacing: 280
		        , zIndex: 2
		        , stopper: "#YourStopperId"
		    });

		});
    </script>	
</body>

</html>