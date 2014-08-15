<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo isset($pageTitle) ? $pageTitle.' | CodeIgniter-Yii' : 'CodeIgniter-Yii'; ?></title>
        <meta name="description" content="CodeIgniter Yii Integration">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="<?php echo site_url('assets/css/normalize.css'); ?>">
        <link rel="stylesheet" href="<?php echo site_url('assets/css/main.css'); ?>">
        <script src="<?php echo site_url('assets/js/vendor/modernizr-2.6.2.min.js'); ?>"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div>This is a NavBar!<hr></div>
        
        <div>
        	<div style="width: 80%; float: left;">
        	<?php 
        		if(isset($view)) {
					$_p = isset($params) ? $params : [];
					$this->load->view($view, $_p);
				} else if(isset($output)) {
					echo $output;
				}		
        	?>
        	</div>
        	<div style="width: 20%; float: left;">
        		This is a SideBar!
        	</div>
        </div>

        <!-- script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script -->
        <!-- script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script -->
        <script src="<?php echo site_url('assets/js/plugins.js'); ?>"></script>
        <script src="<?php echo site_url('assets/js/main.js'); ?>"></script>

    </body>
</html>
