<?php use_javascript('/pwCorePlugin/js/boxover/boxover.js') ?>
<?php use_javascript('/pwCorePlugin/js/jquery-ui-1.7.1/js/jquery-1.3.2.min.js') ?>
<?php use_javascript('/pwCorePlugin/js/jquery-ui-1.7.1/js/jquery-ui-1.7.2.custom.min.js') ?>
<?php use_javascript('/pwCorePlugin/js/jquery-tools/jquery.tools.min.js') ?>
<?php use_stylesheet('/pwCorePlugin/css/buttons.css') ?>
<?php use_stylesheet('/pwCorePlugin/css/form.css') ?>
<?php use_stylesheet('/pwCorePlugin/css/main.css') ?>
<?php use_stylesheet('/pwCorePlugin/css/menu.css') ?>
<?php use_stylesheet('/pwCorePlugin/css/overlay.css') ?>
<?php use_stylesheet('/pwCorePlugin/css/pagination.css') ?>
<?php use_stylesheet('/pwCorePlugin/css/table.css') ?>
<?php use_stylesheet('/pwCorePlugin/css/jquery-ui-1.7.1/smoothness/jquery-ui-1.7.1.custom.css') ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <?php include_stylesheets() ?>        
    <?php include_javascripts() ?>
    <link rel="shortcut icon" href="<?php echo $sf_request->getRelativeUrlRoot() ?>/pwCorePlugin/images/favicon.ico" />

    <style type="text/css">
      div#centeredContent {
        margin: auto;
        width: 600px;
        padding: 20px 0 40px 0;
      }
    </style>
</head>
<body>

    <div id="container">

        <!-- Header of the application -->

        <h1><?php echo sfContext::getInstance()->getUser()->getAssociationName('Piwam') ?></h1>

        <!-- Main part of the content  -->

        <div id="centeredContent">
            <?php echo $sf_content ?>
        </div>

    </div>


    <!-- Apply JS behaviour to 'delete' frames
         see: jQuery-tools website -->

    <script type="text/javascript">
        $(document).ready(function() {
        	var triggers = $("a.modalInput").overlay({

        	  // some expose tweaks suitable for modal dialogs
        	  expose: {
        	    color: '#333',
        	    loadSpeed: 50,
        	    opacity: 0.8
        	  },

        	  closeOnClick: false
        	});

        	var buttons = $("#deleteFrame a").click(function(e) {
        	  // get user input
        	  var selected = buttons.index(this) === 0;
        	});
      	});
    </script>

</body>
</html>