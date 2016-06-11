    <!-- SCRIPTS -->
    <!-- JQuery -->

    <script type="text/javascript" src="<?php echo base_url('/assets/MDB/js/jquery-2.2.1.min.js') ?>"></script>
   
    <script type="text/javascript" src="<?php echo base_url('/assets/MDB/js/tether.min.js') ?>"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url('/assets/MDB/js/bootstrap.min.js') ?>"></script>
    
    <script src="<?php echo base_url('/assets/owncarosel/owl-carousel') ?> /owl.carousel.min.js"></script>

    <!-- Material Design Bootstrap -->
    <script type="text/javascript" src="<?php echo base_url('/assets/MDB/js/mdb.min.js') ?>"></script>

    <!--  own carrosel -->
    <script src="<?php echo base_url('/assets/') ?>/owncarosel/assets/js/bootstrap-collapse.js"></script>
    <script src="<?php echo base_url('/assets/') ?>/owncarosel/assets/js/bootstrap-transition.js"></script>
    <script src="<?php echo base_url('/assets/') ?>/owncarosel/assets/js/bootstrap-tab.js"></script>
    <script src="<?php echo base_url('/assets/') ?>/owncarosel/assets/js/google-code-prettify/prettify.js"></script>
    <script src="<?php echo base_url('/assets/') ?>/owncarosel/assets/js/application.js"></script> 
     
 	<script>
        $(".button-collapse").sideNav();
    </script>

    <script type="text/javascript">
        Waves.attach('.navbar li', ['waves-light']);
        Waves.init();
        $(function () {
		    $(".sticky").sticky({
		        topSpacing: 60
		        , zIndex: 2
		        , stopper: "#YourStopperId"
		    });
		    $(".sticky2").sticky({
		        topSpacing: 280
		        , zIndex: 2
		        , stopper: "#YourStopperId"
		    });
		});
    </script>	
</body>
</html>