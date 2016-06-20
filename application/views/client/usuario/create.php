 
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/bootstrap-input/css/fileinput.min.css'); ?>">

<script src="<?php echo base_url('/assets/bootstrap-input/js/plugins/purify.min.js');?>" type="text/javascript"></script>

<script src="<?php echo base_url('/assets/bootstrap-input/js/fileinput.min.js');?>"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" type="text/javascript"></script>


<style>
	.kv-avatar .file-preview-frame,.kv-avatar .file-preview-frame:hover {
		margin: 0;
		padding: 0;
		border: none;
		box-shadow: none;
		text-align: center;
	}
	.kv-avatar .file-input {
		display: table-cell;
		max-width: 420px;
	}
</style>


<script type="text/javascript">
	$(document).ready(function (){
		$("#formsalvar").ajaxForm({
			complete:function (res){
				console.log("complete:", res);
			},
			success:function (res){
				if(res == true){
					toastr.success('Salvo com sucesso');
					setTimeout(function () {
						window.location.reload()
					}, 3000);
				}else{
					toastr.info('Erro ao tentar salvar usuario, verifique os dados e tente novamente');
				}
				
			}
		});

	});
</script>
<div class="row">
	<div class="container">	
		<div class="card card-block">
			<h4 class="card-title text-primary">Cadastro de Usuário</h4>
			<hr>
			<div class="card-text">
				<div class="col-md-10">
					<form id="formsalvar" autocomplete="off" action="<?php echo site_url('usuariocontroller/create'); ?>"  method="POST" enctype="multipart/form-data">
						<h5 class="card=title text-info">Foto Perfil</h5>
						<div class="row">
							<div class="col-md-10">
								<div class="md-form">

									<!-- the avatar markup -->
									<div id="kv-avatar-errors-2" class="center-block"></div>
									<div class="kv-avatar center-block" >
										<input id="avatar-2" name="userfile" type="file" class="file-loading">
									</div>
									<!-- include other inputs if needed and include a form submit (save) button -->
									<!-- your server code `avatar_upload.php` will receive `$_FILES['avatar']` on form submission -->

								</div>
							</div>
						</div>

						<h5 class="card-title text-info">Dados Básicos</h5>
						
						<div class="row">
							<div class="col-md-5">	
								<div class="md-form">
									<i class="fa fa-user prefix"></i>
									<input type="text" class="form-control validate" required  name="first_name">
									<label for="form9" data-error="Invalido" data-success="ok">Nome</label>
								</div>	
							</div>
							<div class="col-md-5">
								<div class="md-form">
									<i class="fa fa-user prefix"></i>
									<input type="text" class="form-control validate"  name="last_name">
									<label for="form9" data-error="inválido" data-success="ok">Sobrenome</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-10">		
								<div class="md-form">
									<i class="fa fa-user prefix"></i>
									<input type="text" class="form-control validate" required name="nick_name">
									<label for="form9" data-error="inválido" data-success="ok">Apelido</label>
								</div>							
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">	
								<div class="md-form">
									<i class="fa fa-envelope prefix"></i>
									<input type="email" class="form-control validate" autocomplete="off" required name="login">
									<label for="form9" data-error="inválido"  data-success="ok">E-mail</label>
								</div>							
							</div>
							<div class="col-md-5">	
								<div class="md-form">
									<i class="fa fa-lock prefix"></i>
									<input type="password" class="form-control validate" autocomplete="off"  required name="password_key">
									<label for="form9" data-error="inválido" data-success="ok">Senha</label>
								</div>							
							</div>
						</div>
						<h5 class="card-title text-info m-t-3">Informações do Perfil</h5>
						
						<div class="row">
							<div class="col-md-10">
								<div class="md-form">
									<i class="fa fa-file-text-o prefix"></i>
									<textarea name="short_description" required class="md-textarea validate"></textarea>
									<label for="form9" data-error="inválido" data-success="ok">Descrição curta</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-10">
								<div class="md-form">
									<i class="fa fa-file-text prefix"></i>
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
					</form>
				</div>
				<div class="col-md-2">
					<h3><span class="glyphicon glyphicon-pencil"></span> Ajuda</h3>
					<p class="text-justify"><code>Apelido:</code>
						<em>Nome que gostaria de ser chamado.</em></p>
						<p class="text-justify"><code>Descricao curta:</code>
							<em>Terá apenas 140 caracteres para se descrever, essa informação 
								aparecerá como rápida apresentação do seu perfil.</em></p>
								<p class="text-justify"><code>Descrição:</code>
									<em>Mais de 140 caracteres para se descrever</em></p>
								</div>
							</div>
						</div>
					</div>
				</div>


				<script>
					var remove = "<a  href='#' class='btn btn-default-outline'>X</a>"
					$("#avatar-2").fileinput({
						overwriteInitial: true,
						maxFileSize: 5000,
						showClose: false,
						showCaption: false,
						showBrowse: false,
						browseOnZoneClick: true,
						removeLabel: '',
						removeIcon: '<i class="fa fa-trash"></i>',
	    //removeTitle: 'Cancelar',
	     //elErrorContainer: '#kv-avatar-errors-2',
	     msgErrorClass: 'alert alert-block alert-danger',
	     defaultPreviewContent: '<img src="<?php echo base_url('assets/bootstrap-input/img/avatar.jpg') ?>" alt="Seu avatar" style="width:160px"><h4 class="text-muted">Selecione Foto</h4>',
	     layoutTemplates: {main2: '{preview} {remove} {browse}'},
	     allowedFileExtensions: ["jpg", "png","jpeg"]
	 });
	</script>
