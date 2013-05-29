<?php

//Create slide custom post type
	$slide = register_cuztom_post_type( 'Slide', array( 'supports' => array ('title')) );
		$slide->add_taxonomy( 'Slide Category' );

		$slide->add_meta_box( 
	    'meta_box_id',
	    'Add Banner', 
	    array(
	        array(
	            'name'          => 'banner_link',
	            'label'         => 'Link',
	            'description'   => 'Example: http://www.example.ca/..',
	            'type'          => 'text'
	        ),
	        array(
	            'name'          => 'banner_description',
	            'label'         => 'Description',
	            'description'   => 'Brief description for banner',
	            'type'          => 'textarea'
	        ),
	        array(
	            'name'          => 'banner_image',
	            'label'         => 'Image',
	            'description'   => 'Select the banner image. Images need to be at least <span style="color: red;"><b>1200px x 400px.</b></span>',
	            'type'          => 'image'
	        )
	    )
	);

//Organize admin columns
	function slide_columns( $cols ) {
	 	$cols = array(
	    	'cb'        => '<input type="checkbox" />',
	    	'title'     => __( 'Title', 'trans' ),
	    	'post_thumbnail' => __( 'Banner', 'trans' ),
	    	'post_description' => __( 'Description', 'trans' ),
	    	'date'      => __( 'Date', 'trans' )
		);
	  
	  return $cols;
	}

	add_filter( "manage_slide_posts_columns", "slide_columns" );

	function custom_columns( $column, $post_id ) {
	  	switch ( $column ) {
		    case "post_thumbnail":
		    //echo the_post_thumbnail('thumbnail');
			echo wp_get_attachment_image(get_post_meta(get_the_ID(), '_meta_box_id_banner_image', true));
		    break;
		    case "post_description":
		   	echo get_post_meta(get_the_ID(), '_meta_box_id_banner_description', true);
		    break;
	  	}
	}

	add_action( "manage_posts_custom_column", "custom_columns", 10, 2 );

//Remove meta boxes from custom post types
	function slide_remove_meta_boxes() {

    	//Remove wp slug blocks meta box
    	remove_meta_box( 'slugdiv', 'slide', 'normal' );
	}
	add_action( 'add_meta_boxes', 'slide_remove_meta_boxes', 11 );

?>