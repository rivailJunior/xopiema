<style type="text/css">
    .linkRigth{
        margin-top: .425rem;
        font-size: 16px;
        font-weight: 400;
        
    }
    .linkRigth a{
        color:rgba(255,255,255,.5);
    }
    
    .btn-login:hover{
        color:white;
    }
    .btn-cadastro:hover{
        color:white;
        }
    .logo img{
        float: left;
        padding: 5px;
    }
</style>

<!--Navbar-->
<nav id="nav" class="navbar  teal darken-3 navbar-dark navbar-fixed-top">
    <!--Collapse button-->
    <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="fa fa-bars white-text"></i></a>
    <!--Content for large and medium screens-->
    <div class="navbar-desktop">
        <!--Navbar Brand-->
        <div class="col-md-4  logo">
            <a class="navbar-brand" href="/xopiema/"></a> 
            <img src="<?php echo base_url('/assets/minimun/asset/img/img.png')?>"  height="42" width="42">
            <img src="<?php echo base_url('/assets/minimun/asset/img/icone_xopiema2.png')?>"  height="42" width="100">
        </div>
        <div class="col-md-4">
           <!--Links-->
           <ul class="nav navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo site_url('client/index')?>">Home <span class="sr-only">(current)</span></a>
               
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('noticiacontroller/index');?>">Noticias</a>
            </li>
            <?php
                if(isset($user)) {
            ?>
            <li class="nav-item btn-group">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" 
                 >Eventos</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo site_url('eventocontroller/index') ?>">Ver todos</a>
                    <a class="dropdown-item" href="#">Meus Evento</a>
                    <a class="dropdown-item" href="#">Meus Interesses</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('eventocontroller/cadastro')?>">Criar Evento</a>
                </div>
            </li>
            <?php 
                }
                else {
            ?>
             <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('eventocontroller/index') ?>">Eventos</a>
            </li>
            <?php
                }
            ?>
            <li class="nav-item">
                <a class="nav-link" href="#/xopiema/">Sobre nós</a>
            </li>
        </ul>    
    </div>
    <div class="col-md-4">
        <?php  if(isset($user)) { ?>
            <div class="pull-xs-right white-text m-r-3">
                <div class="dropdown">
                    <a id="perfil-dropdown" data-target="#" data-toggle="dropdown" aria-haspopup="true" 
                    aria-expanded="false">
                        <?php echo $user["nome"]."  ".$user["last_name"];?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="perfil-dropdown">
                        <a class="dropdown-item" 
                        href="<?php echo site_url("usuariocontroller/perfil/".$user["id"]);?>">
                        <i class="fa fa-edit"></i>
                        Perfil</a>
                        <a class="dropdown-item" href="<?php echo site_url("logincontroller/logout_user")?>">
                        <i class="fa fa-sign-out"></i>
                        Logout</a>
                    </div>
                </div>
            </div>
            </div>

            <?php } else { ?>
                 <h5 class="pull-xs-right white-text linkRigth">
                    <a href="" title="" class="btn-login" data-toggle="modal" 
                    data-target="#modal-subscription">Login</a>
                    |
                    <a class="btn-cadastro"  href="<?php echo site_url('usuariocontroller/index');?>">
                    Cadastrar-se</a>
               </h5>
               <?php } ?>
    </div>
    <!-- Content for mobile devices-->
    <div class="navbar-mobile">
        <ul class="side-nav" id="mobile-menu">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Noticias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Eventos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Sobre nós</a>
            </li>
        </ul>
    </div>
</nav>
<script>
    $(".button-collapse").sideNav();
</script>

