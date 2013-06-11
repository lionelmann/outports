<?php

//Create team custom post type
	$team_member = register_cuztom_post_type( 'Team Member', array( 'supports' => array ('title','page-attributes')) );

		$team_member->add_meta_box( 
	    'team_member',
	    'Add Team Member', 
	    
		    array(
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
	);


//Organize admin columns
	function team_columns( $cols ) {
	 	$cols = array(
	    	'cb'        => '<input type="checkbox" />',
	    	'title'     => __( 'Title', 'trans' ),
	    	'post_thumbnail' => __( 'Image', 'trans' ),
	    	'date'      => __( 'Date', 'trans' )
		);
	  
	  return $cols;
	}

	add_filter( "manage_team_member_posts_columns", "team_columns" );

	function customteam_columns( $column, $post_id ) {
	  	switch ( $column ) {
		    case "post_thumbnail":
		    //echo the_post_thumbnail('thumbnail');
			echo wp_get_attachment_image(get_post_meta(get_the_ID(), '_team_member_team_image', true),'team-image');
		    break;
		    
	  	}
	}

add_action( "manage_posts_custom_column", "customteam_columns", 10, 2 );


//Remove meta boxes from custom post types
	function team_member_remove_meta_boxes() {

    	//Remove wp slug blocks meta box
    	remove_meta_box( 'slugdiv', 'team_member', 'normal' );
	}
	add_action( 'add_meta_boxes', 'team_member_remove_meta_boxes', 11 );

?>