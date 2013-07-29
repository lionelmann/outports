<div class="large-3 columns">
	<aside>
		
	<?php
		if($post->post_parent) {

			//Get the values
			$permalink = get_permalink($post->post_parent);
			$children = wp_list_pages("title_li=&child_of=" . $post->post_parent . "&echo=0");
			$titlenamer = '<li><a href="' . $permalink . '">' . get_the_title($post->post_parent) . '</a></li>';			
			
			} else {
			
			$children = wp_list_pages("title_li=&child_of=" . $post->ID . "&echo=0");
			//$titlenamer = "";
			}
			
		if ($children) {
	?>

		<ul>
			<li><h5>RESOURCES</h5></li>
			<?php //echo $titlenamer; ?> 
			<?php echo $children; ?>
			<?php
				$taxonomy = 'community_category';
				$cat = get_post_meta($post->ID, '_meta_box_id_blog', true);
				$args = array(
					'include' => $cat,
				);
			  
			 	$terms = get_terms( $taxonomy, $args);
			  
			 	if ($terms) {
			    foreach($terms as $term) {
			        echo '<li><a href="' . esc_attr(get_term_link($term, $taxonomy)) . '" title="' . sprintf( __( "View all posts in %s" ), $term->name ) . '" ' . '>Blog</a></li> ';
			    	}
			  	}
			?>		
		</ul>

		<?php } ?>

		<?php 
		    $args = array(
		        'sort_order' => 'ASC',
		        'sort_column' => 'post_title',
		        'meta_key' => '_meta_box_id_homepage',
		        'meta_value' => 'on',
		        'post_type' => 'page',
		        'post_status' => 'publish',
		        'title_li'     => '',
		    ); 
		?>
		<ul>
			<li><h5>OUTPORTS</h5></li>
			<?php wp_list_pages($args) ?>
		</ul>

		<?php 
		    $args2 = array(
		        'orderby' => 'name',
		        'order'   => 'ASC',
		        'title_li'     => '',
		    ); 
		?>

		<ul>
			<li><h5>CATEGORIES</h5></li>
			<?php wp_list_categories($args2); ?>
			
		</ul>

		<ul>
			
			<li><h5><a href="#">ARCHIVES</a></h5></li>
		</ul>

	</aside>
</div>