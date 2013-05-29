<?php

//Create article custom post type
$community = register_cuztom_post_type( 'Community Post', array( 'supports' => array('title','editor', 'excerpt','thumbnail'), 'rewrite' => array('slug' => 'community')));
    $community->add_taxonomy( 'post_tag' );
    $community->add_taxonomy( 'Category' );
    $community->add_taxonomy( 'Community Category' );

//Organize admin columns for article
function community_columns( $cols ) {
  $cols = array(
    'cb'        => '<input type="checkbox" />',
    'title'     => __( 'Title', 'trans' ),
    'tags'      => __( 'Tags', 'trans' ),
    'date'      => __( 'Date', 'trans' )
);
  
  return $cols;
}

add_filter( "manage_community_posts_columns", "community_columns" );


//Remove meta boxes from custom post types
function community_remove_meta_boxes() {

    //Remove wp slug blocks meta box
    remove_meta_box( 'slugdiv', 'community', 'normal' );
}
add_action( 'add_meta_boxes', 'community_remove_meta_boxes', 11 );

?>