<?php

// Enqueue Flexslider Files

	function hype_slider_scripts() {
		wp_enqueue_script( 'jquery' );
	
		//wp_enqueue_style( 'flex-style', get_template_directory_uri() . '/css/flexslider.css' );
	
		wp_enqueue_script( 'flex-script', get_template_directory_uri() .  '/js/jquery.flexslider-min.js', array( 'jquery' ), false, false );
	}
	add_action( 'wp_enqueue_scripts', 'hype_slider_scripts' );


// Initialize Slider
	
	function hype_slider_initialize() { ?>
		<script type="text/javascript" charset="utf-8">
			jQuery(window).load(function() {
			  jQuery('.flexslider').flexslider({
			    animation: "fade",
			    direction: "horizontal",
		    	slideshowSpeed: 7000,
		    	animationSpeed: 600
			  });
			});
		</script>
	<?php }
	add_action( 'wp_head', 'hype_slider_initialize' );
	
	
// Create Slider
	
	function hype_slider_template($id) {
        // Query Arguments
        $args = array(
            'post_type' => 'slide',
            'posts_per_page' => 10,
            'cat' => $id
				);	
		
		// The Query
		$the_query = new WP_Query( $args );
		
		// Check if the Query returns any posts
		if ( $the_query->have_posts() ) {
		
		// Start the Slider ?>
		<div class="flexslider">
			<ul class="slides">
			
				<?php		
				// The Loop
				while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<li>
					
					<?php // Check if there's a Slide URL given and if so let's a link to it
					if ( get_post_meta( get_the_id(), '_meta_box_id_bannerlink', true) != '' ) { ?>
						<a href="<?php echo esc_url( get_post_meta( get_the_id(), '_meta_box_id_bannerlink', true ) ); ?>">
					<?php }
					
					// The Slide's Image
					//echo wp_get_attachment_image(get_post_meta(get_the_ID(), '_meta_box_id_bannerimage', true), 'slider-image');
					//echo '<span class="banner" style="background-image:url(' . wp_get_attachment_url(get_post_thumbnail_id($post->ID)) . ')"></span>';
					echo the_post_thumbnail('slider-image');
					  
					if ( get_post_meta( get_the_id(), '_meta_box_id_description', true) != '' ) { ?>
						<!--<p style="position: absolute; top: 10%; left: 20%; width: 60%; padding-left: 30px; font-family: Satisfy; color: white; font-size: 72px; border: 1px solid red;"><?php echo get_post_meta( get_the_id(), '_meta_box_id_description', true ); ?></p>-->
						<p style="position: absolute; left: 0; right: 0; text-align: center; top: 40%; font-family: Satisfy; color: white; font-size: 3.5em; text-shadow: 1px 1px 1px #888; border: 1px solid red;"><?php echo get_post_meta( get_the_id(), '_meta_box_id_description', true ); ?></p>
			
					<?php }

					// Close off the Slide's Link if there is one
					if ( get_post_meta( get_the_id(), '_meta_box_id_bannerlink', true) != '' ) { ?>
						</a>
					<?php } ?>
					
				   
				<?php endwhile; ?>
		
			</ul><!-- .slides -->
		</div><!-- .flexslider -->
		
		<?php }
		
		// Reset Post Data
		wp_reset_postdata();
	}

// Slider Shortcode


function hype_slider_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'id' => ''
		), $atts ) );

		ob_start();
		wptuts_slider_template( $id );
		$output = ob_get_clean();
		return $output;
	}
	add_shortcode( 'slider', 'hype_slider_shortcode' );