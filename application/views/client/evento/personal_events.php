<?php $this->load->helper('text');?>
<script type="text/javascript">
    $(document).ready(function (){
        $(".btnSocial").click(function (){
            var social = $(this).attr("id").split('_')[0];
            var btType = $(this).attr('id').split('_')[1];
            var icon = '<a type="button" class="btn-floating btn-small '+btType+'"><i class="fa '+social+'"></i></a>';
            $(".modal-title").html(icon+" Onde estamos?");
            $("#myModal").modal('toggle');
        });
    });
</script>
<div class="container m-t-1">
		<div class="card-text">
			<div class="list-group">
                <a href="#" class="list-group-item ">
                    <h4 class="list-group-item-heading">Meus Eventos</h4>
                    <p class="list-group-item-text"></p>
                </a>
            <?php 
			  		if($eventos->num_rows() > 0){
			  			foreach ($eventos->result() as $index => $row) {
			  			}
			   ?>

                <a class="list-group-item" href="<?php echo site_url('eventocontroller/edit/'.$row->evento_id)?>">
                     <h4 class="list-group-item-heading">
                         <?php echo word_limiter($row->evento_name, 5);?>
                     </h4> 
                <p class="list-group-item-text"><?php echo word_limiter($row->evento_descricao, 15);?></p>
                <h5 class="list-group-item-text m-t-1">
                    Onde podemos ser encontrados?
                    <small class="text-muted">informe o link de nossas redes sociais!</small>
                </h5>
                </a>
                <a type="button" class="btn-floating btn-small btn-fb btnSocial" id="fa-facebook_btn-fb"><i class="fa fa-facebook"></i></a>
                <a type="button" class="btn-floating btn-small btn-ins btnSocial" id="fa-instagram_btn-ins"><i class="fa fa-instagram"></i></a>
                <a type="button" class="btn-floating btn-small btn-yt btnSocial" id="fa-youtube_btn-yt"><i class="fa fa-youtube"></i></a>
                <a type="button" class="btn-floating btn-small btn-gplus btnSocial" id="fa-google-plus_ btn-gplus"><i class="fa fa-google-plus"></i></a>
			  <?php
			  	}
			  ?>
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
                <h4 class="modal-title" id="myModalLabel">
                    <a type="button" class="btn-floating btn-small btn-fb"><i class="fa fa-facebook"></i></a>
                Redes sociais!</h4>
            </div>
            <!--Body-->
            <div class="modal-body">
               <div class="row">
                   <div class="col-md-12">
                       <div class="md-form">
                    <i class="fa fa-link prefix"></i>
                    <input type="text" id="form2" class="form-control" placeholder="http://facebook.com/seu_evento">
                    <label for="form2">Link</label>
                </div>
                   </div>
               </div>
            </div>
            <!--Footer-->
            <div class="modal-footer">
                <button type="button" class="btn danger-color" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn default-color">Salvar</button>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- /.Live preview-->


