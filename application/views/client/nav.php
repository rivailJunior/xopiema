<!--Navbar-->
    <nav id="nav" class="navbar  teal darken-3 navbar-dark navbar-fixed-top">
        <!--Collapse button-->
        <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="fa fa-bars white-text"></i></a>
        <!--Content for large and medium screens-->
        <div class="navbar-desktop">
            <!--Navbar Brand-->
           <div class="col-md-2">
                <a class="navbar-brand" href="#">Nosso Logo</a>
               
           </div>
           <div class="col-md-6">
                 <!--Links-->
            <ul class="nav navbar-nav">
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
           <div class="col-md-4">
            <?php  
                if($user){
                    echo "<span class='pull-xs-right'>Bem vindo:  ".$user['nome']." ".$user['last_name']. "</span>";
                }else{
            ?>
            <button type="button" class="btn  btn-default-outline waves-effect white-text pull-xs-right" data-toggle="modal" 
            data-target="#modal-subscription">
            Login
            </button>
             <a href="<?php echo site_url('usuario/index')?>"  
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