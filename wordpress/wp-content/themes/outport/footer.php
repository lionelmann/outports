</div>

<footer>
    <div class="row">
        <div class="large-4 columns">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Address') ) : ?>
            <?php endif; ?>
        </div>
        <div class="large-4 columns">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Contact') ) : ?>
            <?php endif; ?>
        </div>
        <div class="large-4 columns">
            Social
        </div>
    </div>
</footer>


<div class="row">
	<div class="large-12 columns">
		<div class="row">
        	<div class="large-9 columns">
          		<p class="small">&copy; Copyright © 2013 E.R.A. Architects Inc.</p>
        	</div>
        	<div class="large-3 columns">
          		<p class="small">Crafted by <a href="https://www.vizify.com/lionel-mann/" target="_blank">Piksel</a></p>
                <br>
        	</div>
      	</div>
    </div> 
</div>

<script>
    document.write('<script src=' +
    ('__proto__' in {} ? '<?php bloginfo('stylesheet_directory'); ?>/js/vendor/zepto' : '<?php bloginfo('stylesheet_directory'); ?>/js/vendor/jquery') +
    '.js><\/script>')
</script>

<script src="<?php bloginfo('stylesheet_directory'); ?>/js/foundation.min.js"></script>

<?php wp_footer()?>

</body>
</html>