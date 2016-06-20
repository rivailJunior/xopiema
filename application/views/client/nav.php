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
                <a class="nav-link" href="/xopiema/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/xopiema/index.php/noticiacontroller">Noticias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/xopiema/index.php/eventocontroller">Eventos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/xopiema/">Sobre nós</a>
            </li>
        </ul>    
    </div>
    <div class="col-md-4">
        <?php  
        if($user){
            //echo "<span class='pull-xs-right white-text'>Bem vindo: <a href=".site_url('usuariocontroller/perfil/'.$user['id'])."> ".$user['nome']." ".$user['last_name']. "</span>";


            echo '<div class="pull-xs-right white-text"><div class="dropdown">
            <a id="perfil-dropdown" data-target="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                '.$user["nome"].' '.$user["last_name"].'
            </a>

            <div class="dropdown-menu" aria-labelledby="perfil-dropdown">
                <a class="dropdown-item" href='.site_url("usuariocontroller/perfil/".$user["id"]).'>Perfil</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href='.site_url("logincontroller/logout_user").'>Logout</a>
            </div>
        </div></div>';


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
            <!--Search form
            <form class="form-inline pull-xs-right">
                <input class="form-control" type="text" placeholder="Search">
            </form>
        -->
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