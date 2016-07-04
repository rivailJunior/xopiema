<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/bootstrap-input/css/fileinput.min.css'); ?>">
<script src="<?php echo base_url('/assets/bootstrap-input/js/plugins/purify.min.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('/assets/bootstrap-input/js/fileinput.min.js');?>"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" type="text/javascript"></script>

<script type="text/javascript">
	$(document).ready(function () {
		var objeto = {
			formularioId: "formsalvar",
			url: "<?php echo site_url('usuariocontroller/create')?>",
			msgsuccess:"Salvo com sucesso! enviamos uma confirmação de conta para seu e-mail, verifique!",
			msgerror: "Nao foi possivel cadastrar usuario, verifique os dados cadastrados"
		}
		saveAndReload(objeto);
	});//fim doc
</script>
<div class="container m-t-1">
<?php 
	$attributes = array('id' => 'formsalvar');
	echo  form_open_multipart('usuariocontroller/create', $attributes);
	?>
	
	<div class="card card-block">
		<h4 class="card-title m-b-2">Foto Perfil</h4>
		<div class="card-text">
			<div class="col-md-10">
				<div class="md-form">
					<!-- the avatar markup -->
					<div id="kv-avatar-errors-2" class="center-block"></div>
					<div class="kv-avatar center-block" >
						<input id="avatar-2" name="userfile[]" type="file" class="file-loading">
					</div>
				</div>
			</div>
		</div>
		<div class="row"></div>
		<h4 class="card-title m-b-3"><i class="fa fa-user prefix"></i>
						 Informações Básicas</h4>
		<div class="card-text">
			<div class="row">
				<div class="col-md-5">	
					<div class="md-form">
						<input type="text" class="form-control validate" required  name="first_name">
						<label for="form9" data-error="Invalido" data-success="ok">Nome</label>
					</div>	
				</div>
				<div class="col-md-5">
					<div class="md-form">
						<input type="text" class="form-control validate"  name="last_name">
						<label for="form9" data-error="inválido" data-success="ok">Sobrenome</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10">		
					<div class="md-form">
						<input type="text" class="form-control validate" required name="nick_name">
						<label for="form9" data-error="inválido" data-success="ok">Apelido</label>
					</div>							
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">	
					<div class="md-form">
						<input type="email" class="form-control validate" autocomplete="off" required name="login">
						<label for="form9" data-error="inválido"  data-success="ok">E-mail</label>
					</div>							
				</div>
				<div class="col-md-5">	
					<div class="md-form">
						<input type="password" class="form-control validate" autocomplete="off"  required name="password_key">
						<label for="form9" data-error="inválido" data-success="ok">Senha</label>
					</div>							
				</div>
			</div>
		</div>
	</div>
	<!--/card block-->
	<div class="card card-block">
		<h4 class="card-title m-b-3"><i class="fa fa-file-text-o prefix"></i>
							Informações Perfil</h4>
			<div class="card-text">
				<div class="row">
					<div class="col-md-10">
						<div class="md-form">
							<textarea name="short_description" required class="md-textarea validate"></textarea>
							<label for="form9" data-error="inválido" data-success="ok">Descrição curta</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
						<div class="md-form">
							<textarea name="description" class="md-textarea validate"></textarea>
							<label for="form9" data-error="inválido" data-success="ok">Descrição</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<span> </span>
							<button type="submit" class="btn btn-success" >Salvar</button>
						</div>							
					</div>
				</div>
			</div>
		</h4>
	</div>
	<!--/card block-->
	</form>
</div>
<!--/container-->
<script>
	//var remove = "<a  href='#' class='btn btn-default-outline'>X</a>"
	$("#avatar-2").fileinput({
		overwriteInitial: true,
		maxFileSize: 5000,
		showClose: false,
		showCaption: false,
		showBrowse: false,
		browseOnZoneClick: true,
		removeLabel: '',
		removeIcon: '<i class="fa fa-trash"></i>',
		msgErrorClass: 'alert alert-block alert-danger',
		defaultPreviewContent: '<img src="<?php echo base_url('assets/bootstrap-input/img/avatar.jpg') ?>" alt="Seu avatar" style="width:160px"><h4 class="text-muted">Selecione Foto</h4>',
		layoutTemplates: {main2: '{preview} {remove} {browse}'},
		allowedFileExtensions: ["jpg", "png","jpeg"]
	});
</script>