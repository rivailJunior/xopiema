<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/bootstrap-input/css/fileinput.min.css'); ?>">
<script src="<?php echo base_url('/assets/bootstrap-input/js/plugins/purify.min.js');?>" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('/assets/bootstrap-input/js/fileinput.min.js');?>"></script>

<!--Google Maps-->
<script src="http://maps.google.com/maps/api/js"></script>
<script type="text/javascript">
	$(document).ready(function (){
		$('#event_date').pickadate();
		$( "#license" ).addClass( "mdb-select price-select" );
		$('.mdb-select').material_select();



				
		function init_map() {
		    
		    var var_location = new google.maps.LatLng(40.725118, -73.997699);

		    var var_mapoptions = {
		        center: var_location,
		    
		        zoom: 14
		    };

		    var var_marker = new google.maps.Marker({
		        position: var_location,
		        map: var_map,
		        title: "New York"
		    });

		    var var_map = new google.maps.Map(document.getElementById("map-container"),
		        var_mapoptions);

		    var_marker.setMap(var_map);

		}

		google.maps.event.addDomListener(window, 'load', init_map);


	});
</script>

<div class="container">
	<div class="card card-block">
		<h4 class="card-title">Cadastro de evento</h4>
		<div class="card-text">			
			<h4 class="card-title m-b-3">Informações Gerais</h4>

			<div class="row">
				<div class="col-md-10">
					<div class="md-form">
						<i class="fa fa-file-text-o prefix"></i>
						<textarea name="short_description" required class="md-textarea validate" 
						placeholder="Faça uma breve observação das regras do evento"
						length="140"></textarea>
						<label for="form9" data-error="Invalido" data-success="ok">Breve descrição</label>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-10">
					<div class="md-form">
						<i class="fa fa-file-text prefix"></i>
						<textarea name="description" required class="md-textarea validate" 
						length="300" placeholder="Faça uma breve observação das regras do evento"></textarea>
						<label for="form9" data-error="Invalido" data-success="ok">Descrição detalhada</label>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-5">
					<div class="md-form">
						<i class="fa fa-calendar prefix"></i>
						<input type="text" id="event_date" class="form-control datepicker" required  
						name="event_date" placeholder="Data do evento">
						<label for="form9" data-error="Invalido" data-success="ok">Data Realização</label>
					</div>
				</div>
				<div class="col-md-5">
					<div class="md-form">
						<select class="mdb-select" multiple>
							<option value="" disabled selected>Escolha uma ou mais categorias</option>
							<option value="1">Option 1</option>
							<option value="2">Option 2</option>
							<option value="3">Option 3</option>
						</select>
						<label for="form9" data-error="Invalido" data-success="ok">Categoria do Evento</label>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<!--/card block-->

	<div class="card card-block">
		<h4 class="card-title m-b-3">Fotos</h4>
			<div class="row">
				<div class="col-md-10">
					<input id="file-input" type="file" name="file[]" multiple class="file-loading" >	
				</div>
			</div>
	</div>
	<!--/card block-->

	<div class="card card-block">
		<h4 class="card-title">Regras do Evento</h4>
		<div class="card-text">

			<div class="row">
				<div class="col-md-10">
					<div class="md-form">
						<label for="form9" data-error="Invalido" data-success="ok">Regras de participação</label>
						<br>
						<div class="form-inline">
							<fieldset class="form-group">
								<input name="formato" type="radio" class="with-gap" id="radio1">
								<label for="radio1">Individual</label>
							</fieldset>
							<fieldset class="form-group">
								<input name="formato" type="radio" class="with-gap" id="radio2">
								<label for="radio2">Equipe</label>
							</fieldset>
						</div>

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5" id="equipe" hidden>
					<div class="md-form">
						<i class="fa fa-group prefix"></i>
						<input type="text" class="form-control validate" 
						placeholder="Digite a quantidade de participantes por equipe" 
						required  name="short_description">
						<label for="form9" data-error="Invalido" data-success="ok">Quantidade por equipe</label>
					</div>
				</div>
				<div class="col-md-5">
					<div class="md-form">
						<i class="fa fa-money prefix"></i>
						<input type="text" class="form-control validate" 
						placeholder="Digite o valor da inscrição (no total)" 
						required  name="short_description">
						<label for="form9" data-error="Invalido" data-success="ok">Valor Inscrição Participante</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					<div class="md-form">
						<i class="fa fa-child prefix"></i>
						<input type="text" class="form-control validate" 
						placeholder="Digite a quantidade máxima de visitantes" 
						required  name="short_description">
						<label for="form9" data-error="Invalido" data-success="ok">Quantidade Visitantes</label>
					</div>
				</div>
				<div class="col-md-5">
					<div class="md-form">
						<i class="fa fa-money prefix"></i>
						<input type="text" class="form-control validate" 
						placeholder="Digite o valor da entrada" 
						required  name="short_description">
						<label for="form9" data-error="Invalido" data-success="ok">Valor Inscrição Visitante, 
						<small class="text-danger">Evento gratuito, favor desconsiderar campo</small></label>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-10">
					<div class="md-form">
						<i class="fa fa-file-text-o prefix"></i>
						<textarea name="short_description" required class="md-textarea validate" 
						length="140" placeholder="Faça uma breve observação das regras do evento"></textarea>
						<label for="form9" data-error="inválido" data-success="ok">Observações</label>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="card card-block">
		<h4 class="card-title">Localização Evento</h4>
		<div class="card-text">
			<div id="map-container" class="z-depth-1" style="height: 300px"></div>
		</div>
	</div>

</div>
<!--/container-->

<script type="text/javascript">

		var option = {
			showClose: true,
			showCaption:false,
			showRemove:true,
			removeIcon:'<i class="fa fa-trash"></i>',
			showCancel:false,
			removeLabel:'Remover',
			showUpload:false,
			browseLabel:"Selecionar",
			browseClass:"btn btn-primary-outline waves-effect"
		}
		$("#file-input").fileinput(option);

</script>
