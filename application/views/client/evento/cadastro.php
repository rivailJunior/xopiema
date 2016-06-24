<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/bootstrap-input/css/fileinput.min.css'); ?>">
<script src="<?php echo base_url('/assets/bootstrap-input/js/plugins/purify.min.js');?>" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('/assets/bootstrap-input/js/fileinput.min.js');?>"></script>

<script type="text/javascript">
$("#optCidades").prepend("<option value='teste'>teste</option>");
	$(document).ready(function (){
		 $('.mdb-select').material_select();
		 $('#selectCity').material_select();
		 $(".mdb-selectcategoria").material_select();
		 $('#event_date').pickadate();
		 $( "#license" ).addClass( "mdb-select price-select" );
		 $("#quantity_players").mask("9999");
		 $("#quantity_visitors").mask("9999");
		 $("#entry_value").maskMoney({thousands:'.', decimal:','});
		 $("#inscription_value").maskMoney({thousands:'.', decimal:','});

		$("#selectEstado").change(function  () 
		{
			  var id = $(this).val();

			  var url = "<?php echo site_url('eventocontroller/selectcidade/')?>";
			  $.ajax({
			  	url:url,
			  	type:"post",
			  	dataType:"HTML",
			  	data:{
			  		'estado': id
			  	},
			  	success:function (res) {
			  		$("#selectCity").material_select('destroy');  
					$("#selectCity").html(res);  
			  	},
			  	error:function(res) {
			  		console.log("err: ", res);
			  	}
			  });
		});//fim select
		  
		// objeto para envio de formulario
		var objeto = {
			formularioId: "create",
			msgsuccess:"Salvo com sucesso!",
			msgerror: "Nao foi possivel cadastrar Evento, verifique os dados cadastrados"
		}
		saveAndReload(objeto); 
		   
	});
</script>

<div class="container">
	<form id="create"  method="POST" autocomplete="off" 
	enctype="multipart/form-data" action="<?php echo site_url('eventocontroller/create')?>">
		<div class="card card-block">
			<h4 class="card-title">Cadastro de evento</h4>
			<div class="card-text">			
				<h4 class="card-title m-b-3"><i class="fa  fa-info-circle "></i> Informações Gerais</h4>

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
							<select class="mdb-select"  name="categoria" multiple>
								<option value="" disabled selected>Escolha uma ou mais categorias</option>
								<?php 
										foreach($categoria->result() as $cat) {
								 ?>
								 <option value="<?php echo $cat->id;?>"> <?php echo $cat->category_name;?> </option>
								 <?php
								 	
								 }
								 ?>
							</select>
							<label for="form9" data-error="Invalido" data-success="ok">Categoria do Evento</label>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		<!--/card block-->

		<div class="card card-block">
			<h4 class="card-title m-b-3"><i class="fa fa-picture-o"></i> Fotos</h4>
				<div class="row">
					<div class="col-md-10">
						<input id="file-input" type="file" name="userfile[]" multiple class="file-loading" >	
					</div>
				</div>
		</div>
		<!--/card block-->

		<div class="card card-block">
			<h4 class="card-title"><i class="fa fa-check-circle"></i> Regras do Evento</h4>
			<div class="card-text">

				<div class="row">
					<div class="col-md-5">
						<div class="md-form">
							<div class="form-inline">
								<fieldset class="form-group">
									<input name="players" type="radio" value="single" class="with-gap" id="radio1">
									<label for="radio1">Individual</label>
								</fieldset>
								<fieldset class="form-group">
									<input name="players" value="team" type="radio" class="with-gap" id="radio2">
									<label for="radio2">Equipe</label>
								</fieldset>
							</div>

						</div>
					</div>

					<div class="col-md-5">
						<div class="md-form">
							<input type="text" id="quantity_players" class="form-control validate" 
							placeholder="Ex: 100" 
							required  name="quantity_players">
							<label for="form9" data-error="Invalido"  data-success="ok">Total vagas para participantes
							<small class="text-danger">Vagas ilimitadas, favor desconsiderar campo</small></label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5" id="equipe">
						<div class="md-form">
							<input type="text" id="quantity_players" class="form-control validate" 
							placeholder="Ex: 5" name="quantity_players">
							<label for="form9" data-error="Invalido"  data-success="ok">
							Quantidade por equipe <small class="text-danger">Caso especifico para equipe</small></label>
						</div>
					</div>
					<div class="col-md-5">
						<div class="md-form">	
							<input type="text" id="entry_value" class="form-control validate" 
							placeholder="Ex: R$ 50.00" 
							required  name="entry_value">
							<label for="form9" data-error="Invalido" data-success="ok">Valor Inscrição
							<small class="text-danger">Evento gratuito, favor desconsiderar campo</small></label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5">
						<div class="md-form">
							<input type="text" id="quantity_visitors" class="form-control validate" 
							placeholder="Ex: 100" 
							name="quantity_visitors">
							<label for="form9" data-error="Invalido"  data-success="ok">Total vagas para visitantes
							<small class="text-danger">Vagas ilimitadas, favor desconsiredar campo</small></label>
						</div>
					</div>
					<div class="col-md-5">
						<div class="md-form">
							<input type="text" id="inscription_value" class="form-control validate" 
							placeholder="Ex: R$ 10.00" 
							required  name="inscription_value">
							<label for="form9" data-error="Invalido" data-success="ok">Valor Inscrição Visitante, 
							<small class="text-danger">Evento gratuito, favor desconsiderar campo</small></label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-10">
						<div class="md-form">
					
							<textarea name="short_description_rules" required class="md-textarea validate" 
							length="140" placeholder="Faça uma breve observação das regras do evento"></textarea>
							<label for="form9" data-error="inválido" data-success="ok">Observações</label>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="card card-block">
			<h4 class="card-title m-b-3"> <i class="fa fa-street-view"></i> Endereço do Evento</h4>
			<div class="card-text">
				<div class="row">
					<div class="col-md-5">
						<div class="md-form">
							<select id="selectEstado" name="estado" class="mdb-select">
								<option  disabled selected>Selecione Estado</option>
								<?php 
									if($estado->num_rows() > 0){
										foreach ($estado->result() as $row) {		
								 ?>
								 	<option value="<?php echo $row->id; ?>"><?php echo $row->nome;?></option>
								 <?php
								 	}
								 }
								 ?>
							</select>
							<label for="form9" data-error="inválido" data-success="ok">Estado</label>
						</div>
					</div>
					<div class="col-md-5">
						<div class="md-form" id="divCidades">
							<select class="mdb-selects" name="city" id="selectCity">
								<option id="optCidades" disabled selected>Selecione Cidade</option>

							</select>
							<label for="form9" data-error="inválido" data-success="ok">Cidade</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
						<div class="md-form">
							
							<input type="text" class="form-control validate" 
								placeholder="Digite a localização do evento" 
								required  name="street">
							<label for="form9" data-error="inválido" data-success="ok">Logradouro</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
						<div class="md-form">
							<button type="submit" type="submit" class="btn btn-success" >Salvar</button>
						</div>
					</div>
				</div>

			</div>
		</div>
	</form>
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
