</div>

<footer>
    <div class="row">
        <div class="large-5 columns small">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Address') ) : ?>
            <?php endif; ?>
        </div>
        <div class="large-3 large-offset-1 columns small">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Contact') ) : ?>
            <?php endif; ?>
        </div>
        <div class="large-2 large-offset-1 columns small">
            <ul style="list-style: none;">
            <li><a href="http://twitter.com/CultureOutports"><i class="icon-2x icon-twitter-sign" style="color: white;"></i><span style="margin: 0 0 0 8px; vertical-align: 5px; color: white">twitter</span></a></li>
            <li><a href="http://www.facebook.com/CultureOfOutports"><i class="icon-2x icon-facebook-sign" style="color: white;"></i><span style="margin: 0 0 0 8px; vertical-align: 5px; color: white">facebook</span></a></li>
            <li><a href="http://twitter.com/CultureOutports"><i class="icon-2x icon-rss-sign" style="color: white;"></i><span style="margin: 0 0 0 8px; vertical-align: 5px; color: white">rss</span></a></li>
        </ul>
        </div>
    </div>
</footer>

<div class="row">
	<div class="large-12 columns">
		<div class="row">
        	<div class="large-10 columns">
          		<p class="small">&copy; Copyright © 2013 E.R.A. Architects Inc.</p>
                <br>
        	</div>
            <!--
        	<div class="large-2 columns">
          		<p class="small">Crafted by <a href="https://www.vizify.com/lionel-mann/" target="_blank">Piksel</a></p>
                
        	</div>
        -->
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