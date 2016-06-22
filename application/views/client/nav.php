<!--Navbar-->
<nav id="nav" class="navbar  teal darken-3 navbar-dark navbar-fixed-top">
    <!--Collapse button-->
    <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="fa fa-bars white-text"></i></a>
    <!--Content for large and medium screens-->
    <div class="navbar-desktop">
        <!--Navbar Brand-->
        <div class="col-md-2">
            <a class="navbar-brand" href="/xopiema/">Nosso Logo</a>

        </div>
        <div class="col-md-6">
         <!--Links-->
         <ul class="nav navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo site_url('client/index')?>">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('noticiacontroller/index');?>">Noticias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('eventocontroller/index') ?>">Eventos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#/xopiema/">Sobre nós</a>
            </li>
        </ul>    
    </div>
    <div class="col-md-4">
        <?php  
        if($user)
            { 
                ?>
            <div class="pull-xs-right white-text">
                <div class="dropdown">
                    <a id="perfil-dropdown" data-target="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $user["nome"]." ".$user["last_name"];?>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="perfil-dropdown">
                        <a class="dropdown-item" href="<?php echo site_url("usuariocontroller/perfil/".$user["id"])?>">Perfil</a>
                        <a class="dropdown-item" href="<?php echo site_url("logincontroller/logout_user")?>">Logout</a>
                    </div>
                </div>
            </div>

        <?php
        }else{
        ?>
        <button type="button" id="btloginnav" class="btn  btn-default-outline waves-effect white-text pull-xs-right" data-toggle="modal" 
        data-target="#modal-subscription">
        Login
    </button>
    <a href="<?php echo site_url('usuariocontroller/index')?>"  
     class="btn btn-default-outline waves-effect white-text pull-xs-right" >
     Cadastrar-se
 </a>
 <?php
}
?>
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