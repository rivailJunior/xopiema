
<!DOCTYPE html>
<html>
<head>
 <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Material Design Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('/assets/MDB/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url('/assets/MDB/css/mdb.min.css') ?>" rel="stylesheet">
     <!-- JQuery -->
    <script type="text/javascript" src="<?php echo base_url('/assets/MDB/js/jquery-2.2.1.min.js') ?>"></script>
   
    <style type="text/css">
    	.container{
    		padding-top: 80px;
    	}
    </style>

	<title>Creating schemas</title>
	<script>
		$(document).ready(function() {
			
			var options = {
				tableId : null,
				optionId: null
			};
			function setAttr(element, value) {
				options[element] = value;
			}//fim
			
			function getAttr() {
				return options;
			}//fim

			$(".tableLink").click(function (){
				var id = $(this).attr('id');
				setAttr('tableId', id);
				$("#"+id+" li").addClass("active");
			});

			$('.optionLink').click(function () {
				var id = $(this).attr('id');
				setAttr('optionId', id);
				var opt = getAttr();
				if(opt.tableId != null){
					$('#myModal').modal('toggle');	
				}
				return false;
			});

			$("#btcriar").click(function (){
				$("#myModal").modal('hide');
				$.ajax({
					url:"<?php echo site_url('creatingcontroller/createschema')?>",
					crossDomain:true,
					dataType:'json',
					type:"post",
					data:{
						"dados": getAttr()
					},
					success:function (res){
						if(res == 1){
							alert('sucesso');
						}else{
							alert('fracasso');
						}
					},
					error:function (res){
						console.log('deu erro', res);
					}
				});
				return false;
			});
		})
	</script>
</head>
<body>
	<div class="container">
		<div class="col-md-6">
			<ul class="list-group">	
				<li class="list-group-item disabled">Escolha uma tabela</li>
				<?php 
					if($tables){
						foreach ($tables as $model) {
				 ?>
				 	<a class="tableLink" id="<?php echo $model?>"><li class="list-group-item"><?php  echo $model?> </li></a>
				 <?php
					}
				}
				 ?>
			</ul>
		</div>
		<div class="col-md-6">
			<a href="#" class="optionLink" id="1" data-target="#myModal" >
				<div class="card default-color text-xs-center">
					<div class="card-block">
						<p class="black-text">Deseja ativar somente controller?</p>
					</div>
				</div>
			</a>
			<div class="row"></div>
			<a href="#"  class="optionLink" id="2" data-target="#myModal" >
				<div class="card default-color text-xs-center ">
					<div class="card-block">
						<p class="black-text">Deseja ativar somente view?</p>
					</div>
				</div>
			</a>
			<div class="row"></div>
			<a href="#"  class="optionLink" id="3" data-target="#myModal" >
				<div class="card card-success text-xs-center ">
					<div class="card-block">
						<p class="white-text">Deseja ativar view e controller?</p>
					</div>
				</div>
			</a>
		</div>
	</div>

	<!--container-->
	<script type="text/javascript" src="<?php echo base_url('/assets/MDB/js/tether.min.js') ?>"></script>

    <!-- SCRIPTS -->
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url('/assets/MDB/js/bootstrap.min.js') ?>"></script>

    <!-- Material Design Bootstrap -->
    <script type="text/javascript" src="<?php echo base_url('/assets/MDB/js/mdb.min.js') ?>">
    	
    </script>
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


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Criando novos esquemas</h4>
            </div>
            <!--Body-->
            <div class="modal-body">
               Deseja Criar novos esquemas baseados nos itens selecionados?
            </div>
            <!--Footer-->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                <button type="button" id="btcriar" data-dismiss="modal" class="btn btn-success">Criar</button>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- /.Live preview-->


