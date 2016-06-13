<?php header('Access-Control-Allow-Origin: *'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php header('Access-Control-Allow-Origin:*'); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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

    <script src="<?php echo base_url('/assets/') ?> /owncarosel/owl-carousel/owl.carousel.js"></script>

    <script type="text/javascript" src="<?php echo base_url('/assets/js/jquery1.js') ?> "></script>

    <script type="text/javascript" src="<?php echo base_url('/assets/js/jquery.form.js') ?> "></script>
     
    <style type="text/css">
    	.container{
    		padding-top: 80px;
    	}
         #owl-demo .item, #owl-demo2 .item
         {
            margin: 5px;
         }
         #owl-demo .item img, #owl-demo2 .item img
         {
            display: block;
            width: 100%;
            max-height: 280px;
         }
    </style>
</head>
<body class="grey lighten-2">