<!DOCTYPE html>
<!--[if IE 8]> <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title(' | ', true, 'right'); ?></title>
<meta name="viewport" content="width=device-width" />

<script src="<?php bloginfo('stylesheet_directory'); ?>/js/vendor/custom.modernizr.js"></script>
<?php wp_head()?>

<script type="text/javascript" charset="utf-8">
  $(window).load(function() {
    $('.flexslider').flexslider();
  });
</script>
</head>

<body>

<div class="row">
	<div class="large-6 columns">
    	<h1><a href="<?php bloginfo( 'url' ) ?>">Culture of Outports</a></h1>
    </div>
    <div class="large-6 columns">
		<nav class="top-bar">
    		<section class="top-bar-section">
    			<?php wp_main_nav(); ?>
    		</section>
    	</nav>
 	</div>
</div>