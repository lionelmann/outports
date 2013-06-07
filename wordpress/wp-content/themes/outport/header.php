<!DOCTYPE html>
<!--[if IE 8]> <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title(' | ', true, 'right'); ?></title>
<meta name="viewport" content="width=device-width" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Bitter:400,700,400italic|Oswald:400,300|Satisfy|Merriweather+Sans' rel='stylesheet' type='text/css'>

<?php wp_head()?>

<script type="text/javascript" charset="utf-8">
    $(window).load(function() {
    $('.flexslider').flexslider();
    });
</script>

<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
    $(function() {
        $( document ).tooltip({
        position: {
        my: "center bottom-20",
        at: "center top",
        using: function( position, feedback ) {
          $( this ).css( position );
          $( "<div>" )
            .addClass( "arrow" )
            .addClass( feedback.vertical )
            .addClass( feedback.horizontal )
            .appendTo( this );
                }
            }
        });
    });
</script>

</head>

<body>
    <header>
        <div class="row">
	       <div class="large-12 large-centered columns" style="text-align: center">
    	       <a href="<?php bloginfo( 'url' ) ?>"><img class="logo" src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png"></a>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
                <nav>
    		      <?php wp_nav_menu(); ?>
    	       </nav>
            </div>
        </div>
    </header>

<!-- Custom Banner -->
    <?php if (is_home()) { ?>
        <?php echo hype_slider_template(100);  ?>
    <?php }  ?>
   