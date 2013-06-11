<?php

//Create team custom post type
	$team = register_cuztom_post_type( 'Team', array( 'supports' => array ('title','page-attributes')),'hierarchical' => true );

		$team->add_meta_box( 
	    'team_meme',
	    'Add Team Member', 
	    array(
            'bundle', 
		    array(
		        array(
		            'name'          => 'team_name',
		            'label'         => 'Name',
		            'description'   => 'First, Last',
		            'type'          => 'text'
		        ),
		        array(
		            'name'          => 'team_url',
		            'label'         => 'URL',
		            'description'   => 'Optional: Website address <br>Example: <b>http://www.example.com</b>',
		            'type'          => 'text'
		        ),
		        array(
		            'name'          => 'team_job',
		            'label'         => 'Job Title',
		            'description'   => '',
		            'type'          => 'text'
		        ),
		        array(
		            'name'          => 'team_description',
		            'label'         => 'Description',
		            'description'   => '',
		            'type'          => 'textarea'
		        ),
		        array(
		            'name'          => 'team_image',
		            'label'         => 'Image',
		            'description'   => 'Images need to be at least <span style="color: red;"><b>150px x150x.</b></span>',
		            'type'          => 'image'
		        )
		    )
		)
	);

//Organize admin columns
	function team_columns( $cols ) {
	 	$cols = array(
	    	'cb'        => '<input type="checkbox" />',
	    	'title'     => __( 'Title', 'trans' ),
	    	'post_thumbnail' => __( 'Banner', 'trans' ),
	    	'post_description' => __( 'Description', 'trans' ),
	    	'date'      => __( 'Date', 'trans' )
		);
	  
	  return $cols;
	}

	add_filter( "manage_team_posts_columns", "team_columns" );

	function customteam_columns( $column, $post_id ) {
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

	add_action( "manage_posts_customteam_column", "customteam_columns", 10, 2 );

//Remove meta boxes from custom post types
	function team_remove_meta_boxes() {

    	//Remove wp slug blocks meta box
    	remove_meta_box( 'slugdiv', 'team', 'normal' );
	}
	add_action( 'add_meta_boxes', 'team_remove_meta_boxes', 11 );

?>