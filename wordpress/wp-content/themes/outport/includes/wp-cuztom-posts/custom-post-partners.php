<?php

//Create partner custom post type
	$partner = register_cuztom_post_type( 'Partner', array( 'supports' => array ('title', 'editor')) );

		$partner->add_meta_box(
    'meta_box_id',
    'Column 1',
    array(
    	'bundle', 
    	array(
			array(
				'name'          => 'partner_link',
				'label'         => 'URL',
				'description'   => 'Example: http://www.example.com',
				'type'          => 'text',
				
		    	),
		    array(
	            'name'          => 'partner_logo',
	            'label'         => 'Logo',
	            'description'   => 'Add logo',
	            'type'          => 'image'
	        	)			
		    )
      	)
	);

$partner->add_meta_box(
    'meta_box_id_2',
    'Column 2',
    array(
    	'bundle', 
    	array(
			array(
				'name'          => 'partner_link',
				'label'         => 'URL',
				'description'   => 'Example: http://www.example.com',
				'type'          => 'text',
				
		    	),
		    array(
	            'name'          => 'partner_logo',
	            'label'         => 'Logo',
	            'description'   => 'Add logo',
	            'type'          => 'image'
	        	)			
		    )
      	)
	);

$partner->add_meta_box(
    'meta_box_id_3',
    'Column 3',
    array(
    	'bundle', 
    	array(
			array(
				'name'          => 'partner_link',
				'label'         => 'URL',
				'description'   => 'Example: http://www.example.com',
				'type'          => 'text',
				
		    	),
		    array(
	            'name'          => 'partner_logo',
	            'label'         => 'Logo',
	            'description'   => 'Add logo',
	            'type'          => 'image'
	        	)			
		    )
      	)
	);


//Organize admin columns
	function partner_columns( $cols ) {
	 	$cols = array(
	    	'cb'        => '<input type="checkbox" />',
	    	'title'     => __( 'Title', 'trans' ),
	    	'post_thumbnail' => __( 'Banner', 'trans' ),
	    	'post_description' => __( 'Description', 'trans' ),
	    	'date'      => __( 'Date', 'trans' )
		);
	  
	  return $cols;
	}

	add_filter( "manage_partner_posts_columns", "partner_columns" );

	function partner_custom_columns( $column, $post_id ) {
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

	add_action( "manage_posts_partner_custom_column", "partner_custom_columns", 10, 2 );

//Remove meta boxes from custom post types
	function partner_remove_meta_boxes() {

    	//Remove wp slug blocks meta box
    	remove_meta_box( 'slugdiv', 'slide', 'normal' );
	}
	add_action( 'add_meta_boxes', 'slide_remove_meta_boxes', 11 );

?>