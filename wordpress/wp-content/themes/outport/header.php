<!DOCTYPE html>
<!--[if IE 8]> <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title(' | ', true, 'right'); ?></title>
<meta name="viewport" content="width=device-width" />

<link href='http://fonts.googleapis.com/css?family=Bitter:400,700,400italic|Oswald:400,300|Satisfy|Merriweather+Sans' rel='stylesheet' type='text/css'>



<?php wp_head()?>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/vendor/custom.modernizr.js"></script>
<script type="text/javascript" charset="utf-8">
    $(window).load(function() {
    $('.flexslider').flexslider();
    });
</script>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

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
  <style>
  .ui-tooltip, .arrow:after {
    background: #333;
    /*border: 1px solid white;*/
  }
  .ui-tooltip {
    padding: 10px 20px;
    color: white;
    border-radius: 5px;
    font: 14px "Bitter", Sans-Serif;
    line-height: 1.5em;
    /*box-shadow: 0 0 1px black;*/
  }
  .arrow {
    width: 70px;
    height: 16px;
    overflow: hidden;
    position: absolute;
    left: 50%;
    margin-left: -35px;
    bottom: -16px;
  }
  .arrow.top {
    top: -16px;
    bottom: auto;
  }
  .arrow.left {
    left: 20%;
  }
  .arrow:after {
    content: "";
    position: absolute;
    left: 20px;
    top: -20px;
    width: 25px;
    height: 25px;
    box-shadow: 6px 5px 9px -9px black;
    -webkit-transform: rotate(45deg);
    -moz-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    -o-transform: rotate(45deg);
    tranform: rotate(45deg);
  }
  .arrow.top:after {
    bottom: -20px;
    top: auto;
  }
  </style>

</head>

<body>
    <header style="background-color: #F5F5F5; border-bottom: 1px solid #ddd; width: 100%; position: fixed; top: 0; left: 0; z-index: 99;">
    <div style="margin-bottom: 25px;">
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
    </div>
</header>

    <!-- Custom Banner -->

    <?php if (is_home()) { ?>
        <div style="margin: 161px 0 0 0;">
            <?php echo hype_slider_template(100);  ?>
        </div>
    <?php }  ?>
   