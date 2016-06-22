<!DOCTYPE html>
<html lang="en">
<head>
	<?php header('Access-Control-Allow-Origin:*'); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="cache-control" content="no-cache" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <!-- Font Awesome     -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Material Design Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('/assets/MDB/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Material Design Bootstrap   -->
    <link href="<?php echo base_url('/assets/MDB/css/mdb.min.css') ?>" rel="stylesheet">
    <!--own carrosel -->
    <link href="<?php echo base_url('/assets/owncarosel/owl-carousel/owl.transitions.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('/assets/owncarosel/owl-carousel/owl.carousel.css') ?>" rel="stylesheet" type="text/css" > 
    <link href="<?php echo base_url('/assets/owncarosel/owl-carousel/owl.theme.css') ?>" rel="stylesheet" >
    <link rel="stylesheet" href="<?php echo base_url('/assets/default_css/style.css') ?>">
    <script type="text/javascript" src="<?php echo base_url('/assets/js/jquery.js') ?> "></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/default_js/utils.js')?>"></script>

</head>
<body class="grey lighten-2">

    <div id="mdb-preloader" class="flex-center teal darken-3">
    <div id="preloader-markup">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue-only">
                  <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
            <div class="circle"></div>
        </div>
    </div>
</div>
</div>
</div>