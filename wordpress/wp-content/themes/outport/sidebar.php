<div class="large-3 columns" style="margin-top: 92px;">
	<aside>
		
		<?php
			if($post->post_parent) {

			//Get the values
			$permalink = get_permalink($post->post_parent);
			$children = wp_list_pages("title_li=&child_of=" . $post->post_parent . "&echo=0");
			$titlenamer = '<li><a href="' . $permalink . '">' . get_the_title($post->post_parent) . '</a></li>';
			
			} else {
			
			$children = wp_list_pages("title_li=&child_of=" . $post->ID . "&echo=0");
			$titlenamer = "";
			}
			
			if ($children) {
		?>

		<ul>
			<li style="border-top: 1px solid #000; border-bottom: 1px solid #000; padding: 4px 0 4px 0; margin-top: -1px; font-weight: bold;">RESOURCES</li>
			<?php echo $titlenamer; ?> 
			<?php echo $children; ?>
				<?php
					$cat = get_post_meta($post->ID, '_meta_box_id_blog', true);;
					$yourcat = get_category_link($cat);
					if ($yourcat) {
					echo '<li><a href="' . $yourcat . '">Blog</a></li>';
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
		        'exclude' => array($post->post_parent, $post->ID)
		    ); 
		    $communities = get_pages($args); 
		?>

		<ul>
			<li style="border-top: 1px solid #000; border-bottom: 1px solid #000; padding: 4px 0 4px 0; margin-top: -1px; font-weight: bold;">OUTPORTS</li>
			<?php 
				foreach( $communities as $post ) :  setup_postdata($post); 
			?>
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			<?php endforeach; ?>
		</ul>
	</aside>
</div>