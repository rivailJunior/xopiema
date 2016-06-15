<div class="row">
	<div class="container">	
		<div class="card card-block">
			<h4 class="card-title text-primary">Cadastro de Usuário</h4>
			<hr>
			<div class="card-text">
				<div class="col-md-12">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs tabs-3" id="myTabs" role="tablist">
					    <li class="nav-item">
					        <a class="nav-link active" data-toggle="tab" href="#panel1" role="tab">Panel 1</a>
					    </li>
					    <li class="nav-item">
					        <a class="nav-link" data-toggle="tab" href="#panel2" role="tab">Panel 2</a>
					    </li>
					    <li class="nav-item">
					        <a class="nav-link" data-toggle="tab" href="#panel3" role="tab">Panel 3</a>
					    </li>
					</ul>

					<!-- Tab panels -->
					<div class="tab-content">

					    <!--Panel 1-->
					    <div class="tab-pane" id="panel1" role="tabpanel">
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
					    <div class="tab-pane" id="panel2" role="tabpanel">
					        <br>

					        <p>Content for Panel 2</p>

					    </div>
					    <!--/.Panel 2-->

					    <!--Panel 3-->
					    <div class="tab-pane" id="panel3" role="tabpanel">
					        <br>

					        <p>Content for Panel 3</p>

					    </div>
					    <!--/.Panel 3-->

					</div>
				</div>
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
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <!--Body-->
            <div class="modal-body">
                ...
            </div>
            <!--Footer-->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- /.Live preview-->

<script>
  $(function () {
    $('#myTabs a:first').tab('show');
  })
</script>

