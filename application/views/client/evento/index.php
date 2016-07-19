<script type="text/javascript">
	$(document).ready(function (){
		<?php if($mensagem != null){ ?>
				toastr.info("<?php echo $mensagem?>");
		<?php } ?>
		$("#contentPrincipal").load("<?php echo site_url('eventocontroller/pagination')?>");
		
	});//fim document
</script>


<div class="container m-t-1 flex-center">
	<div class="col-md-7" id="contentPrincipal">

	</div>
</div>
