<?php 
	//load the helpers
	$this->load->helper('string');					
 ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/bootstrap-input/css/fileinput.min.css'); ?>">

<script type="text/javascript">
$("#optCidades").prepend("<option value='teste'>teste</option>");
	$(document).ready(function (){
		var optionsDate	= {
		  // Escape any “rule” characters with an exclamation mark (!).
		  format: 'dd/mm/yy',
		  formatSubmit: 'yyyy-mm-dd',
		  today:"today",
		  closeOnSelect:true,
		  closeOnClear:false,
		  min: "today",
		};
		 $('.mdb-select').material_select();
		 $('#selectCity').material_select();
		 $(".mdb-selectcategoria").material_select();
		 $('#event_date').pickadate(optionsDate);
		 $( "#license" ).addClass( "mdb-select price-select" );
		 $("#quantity_players").mask("9999");
		 $("#vacancies").mask("9999");
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

	    //chama o  submit do formulario
	    var objeto = {
	        formularioId: "create",
	        url: "<?php echo site_url('eventocontroller/create')?>",
	        msgsuccess: "Salvo com sucesso!",
	        msgerror: "Nao foi possivel cadastrar Evento, verifique os dados cadastrados"
	    }
		saveAndReload(objeto); 
		   
	});
</script>

<div class="container m-t-1">
<?php 
	$attributes = array('id' => 'create');
	echo  form_open_multipart('eventocontroller/create', $attributes);
	?>
		<div class="card card-block">
			<h4 class="card-title">Edicao do evento</h4>
			<div class="card-text">			
				<h4 class="card-title m-b-3"><i class="fa  fa-info-circle "></i> Informações Gerais</h4>

				<div class="row">
					<div class="col-md-10">
						<div class="md-form">
							<i class="fa fa-file-text-o prefix"></i>
							<textarea  name="short_description" required class="md-textarea validate" 
							placeholder="Faça uma breve observação das regras do evento"
							length="140" maxlength="140">
								<?php echo $evento->row()->evento_name;?>
							</textarea>
							<label for="form9" data-error="Invalido" data-success="ok">
							<code>*</code>Breve descrição</label>
							
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-10">
						<div class="md-form">
							<i class="fa fa-file-text prefix"></i>
							<textarea name="description" required class="md-textarea validate" 
							length="300" maxlength="300" placeholder="Faça uma breve observação das regras do evento">
								<?php echo $evento->row()->evento_descricao;?>
							</textarea>
							<label for="form9" data-error="Invalido" data-success="ok">
							<code>*</code>Descrição detalhada</label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-5">
						<div class="md-form">
							<i class="fa fa-calendar prefix"></i>
							<input type="text" id="event_date" class="form-control datepicker" required  
							name="event_date" placeholder="Data do evento" value="<?php echo $evento->row()->event_date;?>">
							<label for="form9" data-error="Invalido" data-success="ok">
							<code>*</code>Data Realização</label>
						</div>
					</div>
					<div class="col-md-5">
						<div class="md-form">
					
							<label for="form9" data-error="Invalido" data-success="ok">
							<code>*</code>Categoria do Evento</label>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		<!--/card block-->

		<div class="card card-block">
			<h4 class="card-title m-b-3"><i class="fa fa-picture-o"></i> <code>*</code>Fotos</h4>
				<div class="row">
					<div class="col-md-10">
						<input id="file-input" required type="file" name="userfile[]" multiple="multiple" class="file-loading" >	
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
								<?php $players = $evento->row()->players == 'single'? 'checked' : '';?>
								<fieldset class="form-group">
									<input name="players" <?php echo $players;?> required type="radio" value="single" class="with-gap" 
									id="radio1">
									<label for="radio1">Individual</label>
								</fieldset>
								<?php $players = $evento->row()->players == 'team'? 'checked' : '';?>
								<fieldset class="form-group">
									<input name="players" <?php echo $players;?>  value="team" type="radio" class="with-gap" id="radio2">
									<label for="radio2">Equipe</label>
								</fieldset>
							</div>

						</div>
					</div>

					<div class="col-md-5">
						<div class="md-form">
							<input type="text" id="vacancies" class="form-control" 
							placeholder="Ex: 100" name="vacancies"
							value="<?php echo $evento->row()->vacancies;?>">
							<label for="form9" data-error="Invalido"  data-success="ok">Total vagas para participantes
							<small class="text-danger">Vagas ilimitadas, favor desconsiderar campo</small></label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5" id="equipe">
						<div class="md-form">
							<input type="text" id="quantity_players" class="form-control" 
							placeholder="Ex: 5" name="quantity_players"
							value="<?php echo $evento->row()->quantity_players;?>">
							<label for="form9" data-error="Invalido"  data-success="ok">
							Quantidade por equipe <small class="text-danger">Caso especifico para equipe</small></label>
						</div>
					</div>
					<div class="col-md-5">
						<div class="md-form">	
							<input type="text" id="inscription_value" class="form-control" 
							placeholder="Ex: R$ 50.00" name="inscription_value"
							value="<?php echo $evento->row()->inscription_value;?>">
							<label for="form9" data-error="Invalido" data-success="ok">Valor Inscrição
							<small class="text-danger">Evento gratuito, favor desconsiderar campo</small></label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5">
						<div class="md-form">
							<input type="text" id="quantity_visitors" class="form-control" 
							placeholder="Ex: 100" value="<?php echo $evento->row()->quantity_visitors;?>"
							name="quantity_visitors">
							<label for="form9" data-error="Invalido"  data-success="ok">Total vagas para visitantes
							<small class="text-danger">Vagas ilimitadas, favor desconsiredar campo</small></label>
						</div>
					</div>
					<div class="col-md-5">
						<div class="md-form">
							<input type="text" id="entry_value" class="form-control" 
							placeholder="Ex: R$ 10.00"  name="entry_value"
							value="<?php echo $evento->row()->entry_value;?>">
							<label for="form9" data-error="Invalido" data-success="ok">Valor Inscrição Visitante, 
							<small class="text-danger">Evento gratuito, favor desconsiderar campo</small></label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-10">
						<div class="md-form">
							<textarea name="short_description_rules" required class="md-textarea validate" 
							length="140" maxlength="140" placeholder="Faça uma breve observação das regras do evento">
								<?php echo $evento->row()->descricao_regras;?>
							</textarea>
							<label for="form9" data-error="inválido" data-success="ok">
							<code>*</code>Observações</label>
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
							<select id="selectEstado" required name="estado" class="mdb-select">
							
							</select>
							<label for="form9" data-error="inválido" data-success="ok">
							<code>*</code>Estado</label>
						</div>
					</div>
					<div class="col-md-5">
						<div class="md-form" id="divCidades">
							<select class="mdb-selects" required name="city" id="selectCity">
								<option id="optCidades" disabled selected>Selecione Cidade</option>

							</select>
							<label for="form9" data-error="inválido" data-success="ok">
							<code>*</code>Cidade</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5">
						<div class="md-form">
							<input type="text" class="form-control validate" 
								placeholder="Digite a localização do evento" 
								value="<?php echo $evento->row()->street;?>"
							    required  name="street" length="100" maxlength="100">
							<label for="form9" data-error="inválido" data-success="ok">
							<code>*</code>Logradouro</label>
						</div>
					</div>
					<div class="col-md-3">
						<div class="md-form">
							<input type="text" class="form-control validate" 
								placeholder="Ex: Ponta negra" 
								value="<?php echo $evento->row()->district;?>"
								required  name="district" length="100" maxlength="100">
							<label for="form9" data-error="inválido" data-success="ok">
							<code>*</code>Bairro</label>
						</div>
					</div>
					<div class="col-md-2">
						<div class="md-form">
							<input type="text" class="form-control validate" 
								placeholder="Ex: A32" 
								value="<?php echo $evento->row()->local_number;?>"
								required  name="local_number" length="100" maxlength="100">
							<label for="form9" data-error="inválido" data-success="ok">
							<code>*</code>Numero</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
						<div class="md-form">
							<button type="submit" type="submit" class="btn default-color" >Salvar</button>
						</div>
					</div>
				</div>

			</div>
		</div>
	</form>
</div>
<!--/container-->

<script src="<?php echo base_url('/assets/bootstrap-input/js/plugins/purify.min.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('/assets/bootstrap-input/js/fileinput.min.js');?>"></script>


<script type="text/javascript">

		var option = {
			showClose: true,
			maxFileCount:5,
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
