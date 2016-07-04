<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/bootstrap-input/css/fileinput.min.css'); ?>">
<script src="<?php echo base_url('/assets/bootstrap-input/js/plugins/purify.min.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('/assets/bootstrap-input/js/fileinput.min.js');?>"></script>

<script type="text/javascript">
	$(document).ready(function() {

		$('#myModal').on('hidden.bs.modal', function () {
			$(this).find('form').trigger('reset');
		});
		$("#savechange").click(function () {
			if ($("#password1").val() == "" || $("#password2").val() == "") {
				toastr.error('Digite todos os campos!');
			} else {
				if ($("#password1").val() != $("#password2").val()) {
					toastr.error('As senhas não conferem!');
				} else {			
					var senha = $("#password1").val();	
					$.ajax({
						url:"<?php echo site_url('usuariocontroller/passchange'); ?>",
						type:"post",
						data:{
							"dados": senha
						},
						success:function (res){
							toastr.success(res);
							$("#myModal").modal('hide');
						},
						error:function (res){
							console.log('error: ', res);
						}
					});
				}
			}			 
		});

	});
</script>
<div class="container m-t-1">	
	<div class="card card-block">
		<h4 class="card-title text-primary">Cadastro de Usuário</h4>
		<hr>
		<div class="card-text">
			<!--div class="col-md-12"-->
			<!-- Nav tabs -->
			<ul class="nav nav-tabs tabs-3" id="myTabs" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#panel1" role="tab">Informacoes</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#panel2" role="tab">Foto</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#panel3" role="tab">Panel 3</a>
				</li>
			</ul>

			<!-- Tab panels -->
			<div class="tab-content">
				<!--Panel 1-->
				<div class="tab-pane fade in active" id="panel1" role="tabpanel">
					<br>
					<h4>Informações Básicas</h4>
					<hr>
					<?php 
					foreach ($usuario as $user) {
						?>
						<h5>Nome: <small><?php echo $user->first_name;?></small></h5>
						<h5>Sobrenome: <small><?php echo $user->last_name;?></small></h5>
						<h5>Apelido: <small><?php echo $user->nick_name;?></small></h5>
						<h5>Login: <small><?php echo $user->login;?></small></h5>
						<h5>Password: <small>********</small></h5>
						<h5><a href="#"  data-toggle="modal" data-target="#myModal">Mudar senha?</a></h5> 
						<?php
					}
					?>
				</div>
				<!--/.Panel 1-->

				<!--Panel 2-->
				<div class="tab-pane fade" id="panel2" role="tabpanel">
					<br>
					<h4>Imagem do perfil</h4>
					<hr>
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

					<!--p>Content for Panel 2</p-->

				</div>
				<!--/.Panel 2-->

				<!--Panel 3-->
				<div class="tab-pane fade" id="panel3" role="tabpanel">
					<br>

					<p>Content for Panel 3</p>

				</div>
				<!--/.Panel 3-->

			</div>
			<!--/div-->
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<!--Content-->
		<div class="modal-content">
			<!--Header-->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Alteracao de senha</h4>
			</div>
			<!--Body-->
			<div class="modal-body">

				<form id="formpasschange" action="<?php echo site_url('usuariocontroller/passchange'); ?>" accept-charset="utf-8">
					<!--p>Altere a sua senha</p-->
					<br>
					<div class="md-form">
						<i class="fa fa-ellipsis-h  prefix"></i>
						<input type="password" id="password1" name="senha" class="form-control">
						<label for="form22">Senha</label>
					</div>

					<div class="md-form">
						<i class="fa fa-ellipsis-h  prefix"></i>
						<input type="password" id="password2" name="senha" class="form-control">
						<label for="form32">Re-type</label>
					</div>
				</form>

			</div>
			<!--Footer-->
			<div class="modal-footer">
				<button type="button" id="closechange" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
				<button type="button" id="savechange" class="btn btn-primary">Salvar</button>
			</div>
		</div>
		<!--/.Content-->
	</div>
</div>
<!-- /.Live preview-->



<script>

	$("#avatar-2").fileinput({
		overwriteInitial: true,
		maxFileSize: 5000,
		showClose: false,
		showCaption: false,
		showBrowse: false,
		browseOnZoneClick: true,
		showUpload: true,
		removeIcon: '<i class="fa fa-trash" aria-hidden="true"></i>',
		uploadIcon: '<i class="fa fa-check-circle" aria-hidden="true"></i>',
		uploadLabel: '',
		uploadClass: 'btn btn-default-outline',
		removeLabel: '',
		msgErrorClass: 'alert alert-block alert-danger',
		defaultPreviewContent: '<img src="<?php echo base_url('assets/img-perfil/'.$perfil[0]->picture); ?>" alt="Seu avatar" style="width:160px"><h4 class="text-muted">Alterar Foto</h4>',
		layoutTemplates: {main2: '{preview} {remove} {upload} {browse}'},
		allowedFileExtensions: ["jpg", "png","jpeg"]
	});
</script>