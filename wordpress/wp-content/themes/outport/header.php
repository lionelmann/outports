<!DOCTYPE html>
<!--[if IE 8]> <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title(' | ', true, 'right'); ?></title>
<meta name="viewport" content="width=device-width" />
<!--<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>-->
<link href='http://fonts.googleapis.com/css?family=Fjalla+One|Droid+Sans|Vollkorn:400italic,400' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Bitter:400,700,400italic' rel='stylesheet' type='text/css'>

<script src="<?php bloginfo('stylesheet_directory'); ?>/js/vendor/custom.modernizr.js"></script>
<?php wp_head()?>

<script type="text/javascript" charset="utf-8">
  $(window).load(function() {
    $('.flexslider').flexslider();
  });
</script>
</head>

<body>
<div style="padding-bottom: 25px;">
<div class="row" >
	<div class="large-5 columns">
    	<h1><a  href="<?php bloginfo( 'url' ) ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png"></a></h1>
    </div>
    <div class="large-7 columns">


		<nav>
    		<?php wp_nav_menu(); ?>
    	</nav>
 	</div>
</div>
</div>