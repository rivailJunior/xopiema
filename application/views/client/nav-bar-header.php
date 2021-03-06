    <script type="text/javascript">
        $(document).ready(function (){
            //$("#senhauser").attr('disabled', 'true');
            $("#divSenha").hide();
            $("#btLogar").hide();
            $("#btContinuar").click(function() {
                var login = $("#loginuser").val();
                $.ajax({
                    url:"<?php echo site_url('logincontroller/checkuser'); ?>",
                    type:"post",
                    data:{
                        "dados": login
                    },
                    success:function (res){
                    console.log('res ' , res);
                        if (res==1) {
                            $("#btContinuar").hide(function (){
                                $("#btLogar").show('slow');
                                $("#divSenha").show('slow');
                            })
                            

                        } else {
                            toastr.error('Usuario não cadastrado');
                        }
                    },
                    error:function (res){
                        console.log('error: ', res);

                    }
                });
                return false;
            });

            $("#nav").load('<?php echo site_url('logincontroller/nav') ?>');
            $("#formLogin").submit(function (){
                var dados = $(this).serialize();
                $.ajax({
                    url:"<?php echo site_url('logincontroller/checklogin'); ?>",
                    type:"post",
                    data:{
                        "dados":JSON.stringify(dados)
                    },
                    success:function (res){
                        if(res == true) {
                            $("#modal-subscription").modal('hide');
                             window.location.reload();
                        }else{
                            //toastr.error('Senha incorreta');
                            toastr.error(res);
                        }
                    },
                    error:function (res){
                        console.log('error: ', res);
                    }
                });
                return false;
            });//fim formLogin
        });//fim document
    </script>
    
    <div id="nav">

    </div>

    <!-- Modal Subscription -->
    <div class="modal fade modal-ext" id="modal-subscription" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Formulário de login</h4>
            </div>
            <!--Body-->
            <div class="modal-body">
                <form id="formLogin" accept-charset="utf-8" autocomplete="off">
                    <p>Entre com seu login e senha!</p>
                    <br>
                    <div class="md-form">
                        <i class="fa fa-user prefix"></i>
                        <input type="email" id="loginuser" placeholder="Ex: seu_login@gmail.com" name="login" 
                         autocomplete="off" class="form-control">
                        <label for="form22">Login</label>
                    </div>

                    <div class="md-form" id="divSenha">
                        <i class="fa fa-ellipsis-h  prefix"></i>
                        <input type="password" id="senhauser" placeholder="********" name="senha" class="form-control">
                        <label for="form32">Senha</label>
                    </div>

                    <div class="text-xs-center">
                        <a id="btContinuar" class="btn default-color" >Continuar</a>
                        <button id="btLogar" class="btn default-color" >Logar</button>
                    </div>
                </form>
            </div>
            <!--Footer-->
            <div class="modal-footer">
                <button type="button" class="btn danger-color" data-dismiss="modal">Fechar</button>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
 <script>
        $(".button-collapse").sideNav();
    </script>

    <script type="text/javascript">
        Waves.attach('.navbar li', ['waves-light']);
        Waves.init();
    </script>