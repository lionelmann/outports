<footer style="margin: 100px 0 15px 0; height: 250px;">
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
        	<div class="large-6 columns">
          		<p>&copy; Copyright no one at all. Go to town.</p>
        	</div>
        	<div class="large-6 columns">
          		
        	</div>
      	</div>
    </div> 
</div>

<script src="<?php bloginfo('stylesheet_directory'); ?>/js/foundation.min.js"></script>
 <?php wp_footer()?>
</body>
</html>