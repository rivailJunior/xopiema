<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Miminium Admin Template v.1">
        <meta name="author" content="Isna Nur Azis">
        <meta name="keyword" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>XoPiema</title>
        <!-- start: Css -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/minimun/asset/css/bootstrap.min.css')?>">
        <!-- plugins -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/minimun/asset/css/plugins/animate.min.css')?>">
        <link href="<?php echo base_url('/assets/minimun/asset/css/style.css')?>" rel="stylesheet">
        <link href="<?php echo base_url('/assets/minimun/asset/css/plugins/font-awesome.min.css')?>" rel="stylesheet">
        <!-- end: Css -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/minimun/asset/css/plugins/simple-line-icons.css"')?>"/>
        <link rel="shortcut icon" href=" <?php echo base_url('/assets/minimun/asset/img/logomi.png')?>">
        
         <link rel="stylesheet" href="<?php echo base_url('/assets/MDB/css/style.min.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('/assets/MDB/css/mdb.min.css')?>">
        
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body id="mimin" class="dashboard">
        <!-- start: Header -->
        <nav class="navbar navbar-default header navbar-fixed-top">
            <div class="col-md-12 nav-wrapper">
                <div class="navbar-header" style="width:100%;">
                    <div class="opener-left-menu is-open">
                        <span class="top"></span>
                        <span class="middle"></span>
                        <span class="bottom"></span>
                    </div>
                    <a href="index.html" class="navbar-brand"> 
                    <b>Xo Piema</b>
                    </a>
                    <ul class="nav navbar-nav search-nav">
                        <li>
                            <div class="search">
                                <span class="fa fa-search icon-search" style="font-size:23px;"></span>
                                <div class="form-group form-animate-text">
                                    <input type="text" class="form-text" required>
                                    <span class="bar"></span>
                                    <label class="label-search">Evento, Noticia ... <b>Buscar</b> </label>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right user-nav">
                        <li class="user-name"><span>Akihiko Avaron</span></li>
                        <li class="dropdown avatar-dropdown">
                            <img src="<?php echo base_url('/assets/minimun/asset/img/avatar.jpg')?>" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/>
                            <ul class="dropdown-menu user-dropdown">
                                <li><a href="#"><span class="fa fa-user"></span> My Profile</a></li>
                                <li><a href="#"><span class="fa fa-calendar"></span> My Calendar</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="more">
                                    <ul>
                                        <li><a href=""><span class="fa fa-cogs"></span></a></li>
                                        <li><a href=""><span class="fa fa-lock"></span></a></li>
                                        <li><a href=""><span class="fa fa-power-off "></span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li ><a href="#" class="opener-right-menu"><span class="fa fa-coffee"></span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- end: Header -->
        <div class="container-fluid mimin-wrapper">
            <!-- start:Left Menu -->
            <div id="left-menu">
                <div class="sub-left-menu scroll">
                    <ul class="nav nav-list">
                        <li>
                            <div class=""></div>
                        </li>
                        <li class="ripple">
                            <a class="tree-toggle nav-header">
                            <span class="fa icon-badge"></span> Eventos <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                            <ul class="nav nav-list tree">
                                <li><a href="color.html">Categoria Nome</a></li>
                                <li><a href="weather.html">Categoria Nome</a></li>
                            </ul>
                        </li>
                        <li class="ripple">
                            <a class="tree-toggle nav-header">
                            <span class="fa fa-newspaper-o"></span> Noticias
                            <span class="fa-angle-right fa right-arrow text-right"></span>
                            </a>
                            <ul class="nav nav-list tree">
                                <li><a href="chartjs.html">ChartJs</a></li>
                                <li><a href="morris.html">Morris</a></li>
                                <li><a href="flot.html">Flot</a></li>
                                <li><a href="sparkline.html">SparkLine</a></li>
                            </ul>
                        </li>
                        <!--  
                            <li class="ripple"><a class="tree-toggle nav-header"><span class="fa fa-check-square-o"></span> Forms  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                              <ul class="nav nav-list tree">
                                <li><a href="formelement.html">Form Element</a></li>
                                <li><a href="#">Wizard</a></li>
                                <li><a href="#">File Upload</a></li>
                                <li><a href="#">Text Editor</a></li>
                              </ul>
                            </li> -->
                        <li><a href="credits.html">Credits</a></li>
                    </ul>
                </div>
            </div>
            <!-- end: Left Menu -->
        </div>
        <!-- start: Content -->
        <div id="content">
            <div class="panel box-shadow-none content-header">
                <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Noticias e eventos esportivos em um só lugar!</h3>
                        <p class="animated fadeInDown">
                            Xo Piema <span class="fa-angle-right fa"></span> Home
                        </p>
                    </div>
                </div>
            </div>
            <!--/-->
            <div class="row">
                <div class="container">
                    <div class="panel">
                        <div class="panel-body">
                            
                        </div>
                    </div>
                    <div class="col-md-4">
                           
                    </div> 
                </div>
            </div>
            <!--/row-->
        </div>
        <!-- start: Mobile -->
        <div id="mimin-mobile" class="reverse">
            <div class="mimin-mobile-menu-list">
                <div class="col-md-12 sub-mimin-mobile-menu-list animated fadeInLeft">
                    <ul class="nav nav-list">
                        <li class="active ripple">
                            <a class="tree-toggle nav-header">
                            <span class="fa-home fa"></span>Dashboard 
                            <span class="fa-angle-right fa right-arrow text-right"></span>
                            </a>
                            <ul class="nav nav-list tree">
                                <li><a href="dashboard-v1.html">Dashboard v.1</a></li>
                                <li><a href="dashboard-v2.html">Dashboard v.2</a></li>
                            </ul>
                        </li>
                        <li class="ripple">
                            <a class="tree-toggle nav-header">
                            <span class="fa-diamond fa"></span>Layout
                            <span class="fa-angle-right fa right-arrow text-right"></span>
                            </a>
                            <ul class="nav nav-list tree">
                                <li><a href="topnav.html">Top Navigation</a></li>
                                <li><a href="boxed.html">Boxed</a></li>
                            </ul>
                        </li>
                        <li class="ripple">
                            <a class="tree-toggle nav-header">
                            <span class="fa-area-chart fa"></span>Charts
                            <span class="fa-angle-right fa right-arrow text-right"></span>
                            </a>
                            <ul class="nav nav-list tree">
                                <li><a href="chartjs.html">ChartJs</a></li>
                                <li><a href="morris.html">Morris</a></li>
                                <li><a href="flot.html">Flot</a></li>
                                <li><a href="sparkline.html">SparkLine</a></li>
                            </ul>
                        </li>
                        <li class="ripple">
                            <a class="tree-toggle nav-header">
                            <span class="fa fa-pencil-square"></span>Ui Elements
                            <span class="fa-angle-right fa right-arrow text-right"></span>
                            </a>
                            <ul class="nav nav-list tree">
                                <li><a href="color.html">Color</a></li>
                                <li><a href="weather.html">Weather</a></li>
                                <li><a href="typography.html">Typography</a></li>
                                <li><a href="icons.html">Icons</a></li>
                                <li><a href="buttons.html">Buttons</a></li>
                                <li><a href="media.html">Media</a></li>
                                <li><a href="panels.html">Panels & Tabs</a></li>
                                <li><a href="notifications.html">Notifications & Tooltip</a></li>
                                <li><a href="badges.html">Badges & Label</a></li>
                                <li><a href="progress.html">Progress</a></li>
                                <li><a href="sliders.html">Sliders</a></li>
                                <li><a href="timeline.html">Timeline</a></li>
                                <li><a href="modal.html">Modals</a></li>
                            </ul>
                        </li>
                        <li class="ripple">
                            <a class="tree-toggle nav-header">
                            <span class="fa fa-check-square-o"></span>Forms
                            <span class="fa-angle-right fa right-arrow text-right"></span>
                            </a>
                            <ul class="nav nav-list tree">
                                <li><a href="formelement.html">Form Element</a></li>
                                <li><a href="#">Wizard</a></li>
                                <li><a href="#">File Upload</a></li>
                                <li><a href="#">Text Editor</a></li>
                            </ul>
                        </li>
                        <li class="ripple">
                            <a class="tree-toggle nav-header">
                            <span class="fa fa-table"></span>Tables
                            <span class="fa-angle-right fa right-arrow text-right"></span>
                            </a>
                            <ul class="nav nav-list tree">
                                <li><a href="datatables.html">Data Tables</a></li>
                                <li><a href="handsontable.html">handsontable</a></li>
                                <li><a href="tablestatic.html">Static</a></li>
                            </ul>
                        </li>
                        <li class="ripple">
                            <a href="calendar.html">
                            <span class="fa fa-calendar-o"></span>Calendar
                            </a>
                        </li>
                        <li class="ripple">
                            <a class="tree-toggle nav-header">
                            <span class="fa fa-envelope-o"></span>Mail
                            <span class="fa-angle-right fa right-arrow text-right"></span>
                            </a>
                            <ul class="nav nav-list tree">
                                <li><a href="mail-box.html">Inbox</a></li>
                                <li><a href="compose-mail.html">Compose Mail</a></li>
                                <li><a href="view-mail.html">View Mail</a></li>
                            </ul>
                        </li>
                        <li class="ripple">
                            <a class="tree-toggle nav-header">
                            <span class="fa fa-file-code-o"></span>Pages
                            <span class="fa-angle-right fa right-arrow text-right"></span>
                            </a>
                            <ul class="nav nav-list tree">
                                <li><a href="forgotpass.html">Forgot Password</a></li>
                                <li><a href="login.html">SignIn</a></li>
                                <li><a href="reg.html">SignUp</a></li>
                                <li><a href="article-v1.html">Article v1</a></li>
                                <li><a href="search-v1.html">Search Result v1</a></li>
                                <li><a href="productgrid.html">Product Grid</a></li>
                                <li><a href="profile-v1.html">Profile v1</a></li>
                                <li><a href="invoice-v1.html">Invoice v1</a></li>
                            </ul>
                        </li>
                        <li class="ripple">
                            <a class="tree-toggle nav-header"><span class="fa "></span> MultiLevel  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                            <ul class="nav nav-list tree">
                                <li><a href="view-mail.html">Level 1</a></li>
                                <li><a href="view-mail.html">Level 1</a></li>
                                <li class="ripple">
                                    <a class="sub-tree-toggle nav-header">
                                    <span class="fa fa-envelope-o"></span> Level 1
                                    <span class="fa-angle-right fa right-arrow text-right"></span>
                                    </a>
                                    <ul class="nav nav-list sub-tree">
                                        <li><a href="mail-box.html">Level 2</a></li>
                                        <li><a href="compose-mail.html">Level 2</a></li>
                                        <li><a href="view-mail.html">Level 2</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="credits.html">Credits</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <button id="mimin-mobile-menu-opener" class="animated rubberBand btn btn-circle btn-danger">
        <span class="fa fa-bars"></span>
        </button>
        <!-- end: Mobile -->
        <!-- end: Content -->
        <!-- start: Javascript -->
        <script src="<?php echo base_url('/assets/minimun')?>/asset/js/jquery.min.js"></script>
        <script src="<?php echo base_url('/assets/minimun')?>/asset/js/jquery.ui.min.js"></script>
        <script src="<?php echo base_url('/assets/minimun')?>/asset/js/bootstrap.min.js"></script>
        <!-- plugins -->
        <script src="<?php echo base_url('/assets/minimun')?>/asset/js/plugins/moment.min.js"></script>
        <script src="<?php echo base_url('/assets/minimun')?>/asset/js/plugins/jquery.nicescroll.js"></script>
        <!-- custom -->
        <script src="<?php echo base_url('/assets/minimun')?>/asset/js/main.js"></script>
        <!-- end: Javascript -->
    </body>
</html>