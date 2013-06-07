<?php

//Include cuztom helper files https://github.com/Gizburdt/Wordpress-Cuztom-Helper ver: 2.4.2
    include('includes/wp-cuztom-helper/cuztom.php');

//Include custom posts type. Dependent on /wp-cuztom-helper classes.
    include('includes/wp-cuztom-posts/custom-post-page.php');

//Include custom posts type. Dependent on /wp-cuztom-helper classes.
    include('includes/wp-cuztom-posts/custom-post-slider.php');

//Include slider.php for custom homepage banner
    if( file_exists( get_template_directory() . "/includes/flexslider.php" ) ) {
        include_once( get_template_directory() . '/includes/flexslider.php' );
    }

//Include custom posts type. Dependent on /wp-cuztom-helper classes.
    include('includes/wp-cuztom-posts/custom-post-community.php');

//Include custom posts type. Dependent on /wp-cuztom-helper classes.
    include('includes/wp-cuztom-posts/custom-post-team_members.php');

//Include custom posts type. Dependent on /wp-cuztom-helper classes.
    include('includes/wp-cuztom-posts/custom-post-partners.php');


//Register widgets
	if ( function_exists('register_sidebar') )

	register_sidebar(array(
        'name'=>'Address',
        'description'   => 'This is the description',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h5>',
		'after_title' => '</h5>',
	));

    register_sidebar(array(
        'name'=>'Contact',
        'description'   => 'This is the description',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h5>',
        'after_title' => '</h5>',
    ));

    register_sidebar(array(
        'name'=>'Copyright',
        'description'   => 'This is the description',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h5>',
        'after_title' => '</h5>',
    ));

    register_sidebar(array(
        'name'=>'Statement',
        'description'   => 'This is the description',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h5 style="display:none;">',
        'after_title' => '</h5>',
    ));


#POST THUMBNAIL SUPPORT

	add_theme_support( 'post-thumbnails' );
    
	
	//if( function_exists('update_option') ) {
	//	update_option('large_size_w', 650);
	//	update_option('large_size_h', 1000);
	//	update_option('large_crop', 1);
	//}
	
	if ( function_exists( 'add_image_size' ) ) {
	   add_image_size( 'slider-image', 1200, 400, true ); //(hard crop mode)
	}

    if ( function_exists( 'add_image_size' ) ) {
     add_image_size( 'home-feature', 310, 220, true ); //(hard crop mode)
    }


//Remove inline width and height added to images
    add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
    add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

//Removes attached image sizes as well
    add_filter( 'the_content', 'remove_thumbnail_dimensions', 10 );
    function remove_thumbnail_dimensions( $html ) {
            $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
            return $html;
    }

//Add page excerpt support
    add_post_type_support( 'page', 'excerpt' );

//Register custom menu support
	add_theme_support( 'menus' );
	if ( function_exists( 'register_nav_menus' ) ) {
	  	register_nav_menus(
	  		array(
	  		  'header-menu' => 'Header Menu',
	  		  'footer-menu' => 'Footer Menu'
	  		)
	  	);
	}
	
//Walkder class to extend wp_nav_menu
	function wp_main_nav() {
    	// display the wp3 menu if available
        wp_nav_menu( 
        	array( 
        		'menu' => 'header-menu', /* menu name */
        		'menu_class' => 'right',
        		'container' => '', /* container tag */
        		'depth' => '2',
        		'walker' => new description_walker()
        	)
        );
    }

//Change the standard class that wordpress puts on the active menu item in the nav bar
//Deletes all CSS classes and id's, except for those listed in the array below
    function custom_wp_nav_menu($var) {
        return is_array($var) ? array_intersect($var, array(
                //List of allowed menu classes
                'current_page_item',
                'current_page_parent',
                'current_page_ancestor',
                'first',
                'last',
                'vertical',
                'horizontal'
                )
        ) : '';
    }
    add_filter('nav_menu_css_class', 'custom_wp_nav_menu');
    add_filter('nav_menu_item_id', 'custom_wp_nav_menu');
    add_filter('page_css_class', 'custom_wp_nav_menu');
 
//Replaces "current-menu-item" with "active"
    function current_to_active($text){
        $replace = array(
                //List of menu item classes that should be changed to "active"
                'current_page_item' => 'active',
                'current_page_parent' => 'active',
                'current_page_ancestor' => 'active',
        );
        $text = str_replace(array_keys($replace), $replace, $text);
                return $text;
        }
    add_filter ('wp_nav_menu','current_to_active');
 
//Deletes empty classes and removes the sub menu class
    function strip_empty_classes($menu) {
        $menu = preg_replace('/ class=""| class="sub-menu"/','',$menu);
        return $menu;
    }
    add_filter ('wp_nav_menu','strip_empty_classes');


//Filter for *excerpt* length - example echo excerpt(25);
	function excerpt($limit) {
  		$excerpt = explode(' ', get_the_excerpt(), $limit);
  		if (count($excerpt)>=$limit) {
    		array_pop($excerpt);
    		$excerpt = implode(" ",$excerpt).'...';
  		} else {
    		$excerpt = implode(" ",$excerpt);
  		} 
  		$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  		return $excerpt;
	}
 
//Filter for *content* length
	function content($limit) {
		$content = explode(' ', get_the_content(), $limit);
  		if (count($content)>=$limit) {
    		array_pop($content);
    		$content = implode(" ",$content).'...';
  		} else {
    		$content = implode(" ",$content);
  		} 
  		$content = preg_replace('/\[.+\]/','', $content);
  		$content = apply_filters('the_content', $content); 
  		$content = str_replace(']]>', ']]&gt;', $content);
  		return $content;
	}

//Filter for *title* length
	function title($limit) {
  		$title = explode(' ', get_the_title(), $limit);
  		if (count($title)>=$limit) {
    		array_pop($title);
    		$title = implode(" ",$title).'...';
  		} else {
    		$title = implode(" ",$title);
  		} 
  		$title = preg_replace('`\[[^\]]*\]`','',$title);
  		return $title;
	}

//Enqueue scripts
    function my_scripts() {
		if (!is_admin()) {
			wp_deregister_script('jquery');
			wp_enqueue_script('jquery', get_template_directory_uri() . '/js/vendor/jquery.js', false, '1.9.2', false);
			wp_enqueue_script('jquery');
            wp_enqueue_script('modernizer', get_template_directory_uri() . '/js/vendor/custom.modernizr.js', 'jquery', '2.6.2', false);
			//wp_enqueue_script('offcanvas', get_template_directory_uri() . '/js/jquery.offcanvas.js', 'jquery', '1.0', false);

			//wp_enqueue_script('foundation', get_template_directory_uri() . '/js/foundation.min.js', false, '4.0.0', false);

			//wp_enqueue_script('snippets', get_template_directory_uri() . '/js/snippet.js', false, '1.0', true);
		}
	}
	add_action('init', 'my_scripts');
	
//Enqueue styles
	function my_styles() {
		if (!is_admin()) {
			wp_register_style('style', get_template_directory_uri() . '/style.css', array(), '1.0', 'screen' );
  			wp_enqueue_style( 'style' );
		}
	}
	add_action('wp_enqueue_scripts', 'my_styles');


//Remove trackbacks from the comment count
	add_filter('get_comments_number', 'comment_count', 0);
	function comment_count( $count ) {
		if ( ! is_admin() ) {
			global $id;
			$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
			return count($comments_by_type['comment']);
		} else {
			return $count;
		}
	}

//Invite RSS subscribers to comment
	function rss_comment_footer($content) {
		if (is_feed()) {
			if (comments_open()) {
				$content .= 'Comments are open! <a href="'.get_permalink().'">Add yours!</a>';
			}
		}
		return $content;
	}

//Custom login logo (310px x 70px)
	function my_custom_login_logo() {
    	echo '<style type="text/css">
        	h1 a { background-image:url('.get_bloginfo('template_directory').'/images/admin-logo.png) !important; }
    	</style>';
	}

	add_action('login_head', 'my_custom_login_logo');

//Remove wordpress junk from header
	remove_action('wp_head', 'rsd_link'); //Remove Really Simple Discovery (only really need this if you're using Flickr or similiar service)
	remove_action('wp_head', 'wlwmanifest_link'); //Remove Windows Live Writer
	remove_action('wp_head', 'start_post_rel_link'); //Remove Post Relational Links
	remove_action('wp_head', 'index_rel_link');	//Remove Post Relational Links
	remove_action('wp_head', 'adjacent_posts_rel_link'); //Remove Post Relational Links
	remove_action('wp_head', 'wp_generator'); //Remove WP Generator

//Dynamic copyright based on first and last post
	function copyright() {
	global $wpdb;
	$copyright_dates = $wpdb->get_results("
		SELECT
		YEAR(min(post_date_gmt)) AS firstdate,
		YEAR(max(post_date_gmt)) AS lastdate
		FROM
		$wpdb->posts
		WHERE
		post_status = 'publish'
	");
	$output = '';
	if($copyright_dates) {
	$copyright = "&copy; " . $copyright_dates[0]->firstdate;
	if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
	$copyright .= ' - ' . $copyright_dates[0]->lastdate;
	}
	$output = $copyright;	
	}
	return $output;	
	}

//Pagination
function tmhtc_paginate($is_child = true) {
    global $wp_query;
    $pagination = '';
    $int= 9999999;

    $pagination .= '<div class="pagination">';
    $pagination .= paginate_links( array(
        'base' => str_replace( $int, '%#%', get_pagenum_link( $int) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages
    ) );
    $pagination .= '</div>';

    echo $pagination;
    }