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
            get_query_var('term_id') => $id
            //'cat' => $id
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
					if ( get_post_meta( get_the_id(), '_meta_box_id_banner_link', true) != '' ) { ?>
						<a href="<?php echo esc_url( get_post_meta( get_the_id(), '_meta_box_id_banner_link', true ) ); ?>">
					<?php }
					
					// The Slide's Image
					echo wp_get_attachment_image(get_post_meta(get_the_ID(), '_meta_box_id_banner_image', true), 'slider-image');
					//echo the_post_thumbnail('slider-image');
					  
					if ( get_post_meta( get_the_id(), '_meta_box_id_banner_description', true) != '' ) { ?>
						<p class="banner-description"><?php echo get_post_meta( get_the_id(), '_meta_box_id_banner_description', true ); ?></p>
			
					<?php }

					// Close off the Slide's Link if there is one
					if ( get_post_meta( get_the_id(), '_meta_box_id_banner_link', true) != '' ) { ?>
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