<script type="text/javascript">
	$(document).ready(function (){
		$("#telefone1").mask("(99)99999-9999");
		$("#telefone2").mask("(99)99999-9999");
		
		$("#forminscricao").submit(function (){
			var form = $(this).serialize();
			var objeto = {
				url:"<?php echo site_url('eventocontroller/realizainscricao')?>",
				formulario: form,
				msgsuccess: "Sua inscrição foi realizada com sucesso, enviamos o comprovante em seu e-mail",
				msgerror: "Falha ao realizar inscrição",
				idformulario: "forminscricao"
			}
			save(objeto);
			return false;
		});

		$('#email').blur(function  () 
		{
			var email = $(this).val();   
			$.ajax({
				url:"<?php echo site_url('eventocontroller/verificaEmailVisitante')?>",
				type:"post",
				data:{
					"email": email
				},
				success:function(response){
					if(response != 0){
						toastr.info("Endereço de e-mail já cadastrado, verifique a mensagem de confirmação após a conclusção em seu e-mail.", "Atenção", {progressBar: true});
						//$("#email").val("");
					}
				}
			})
		});
	});
</script>
<div class="container m-t-1">
	<div class="card card-block">
		<h4 class="card-title"><i class="fa fa-pencil  prefix"></i> Inscrição</h4>
		<h4 class="card-title m-t-2"> Informações do visitante</h4>
		<div class="card-text m-t-2">
			<form id="forminscricao">
				<input type="hidden" name="evento" value="<?php echo $evento?>">
				<div class="row">
					<div class="col-md-5">
						<div class="md-form">
							<input type="text" id="long_name" class="form-control validate"   
							name="long_name" placeholder="Ex: Fulano de tal" length="50" maxlength="50">
							<label for="form9" data-error="Invalido" data-success="ok">Nome do visitante</label>
						</div>
					</div>
					<div class="col-md-5">
						<div class="md-form">
							<input type="email" id="email" class="form-control validate" required  
							name="email" placeholder="Ex: fuladodetal@gmail.com" length="150" maxlength="150">
							<label for="form9" data-error="Invalido" data-success="ok"><code>*</code> E-mail confirmação</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5">
						<div class="md-form">
							<input type="text" id="telefone1" class="form-control validate" required  
							name="phone1" placeholder="Ex: (92) 99999-9999" length="14" maxlength="14">
							<label for="form9" data-error="Invalido" data-success="ok"><code>*</code> Contato 1</label>
						</div>
					</div>
					<div class="col-md-5">
						<div class="md-form">
							<input type="text" id="telefone2" class="form-control validate"   
							name="phone2" placeholder="Ex: (92) 99999-9999" length="14" maxlength="14">
							<label for="form9" data-error="Invalido" data-success="ok"> Contato 2</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="md-form">
						<button type="submit" class="btn default-color">Confirmar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>