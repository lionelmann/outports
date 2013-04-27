<?php
/*
Template Name: Outport
*/
?>

<?php get_header(); ?>

<article>
	
<div class="row">
	<div class="large-12 columns">
		<img src="http://placehold.it/1000x300&text=[<?php the_title(); ?>]" />
	<div>
</div>

<div class="row">
	
	<div class="large-8 offset-by-1 columns">
		<!-- Loop starts -->
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		<?php endwhile; endif; //Loop ends ?>
	</div>
	
	<div class="large-3 columns">
		
		<?php
		 	if($post->post_parent) {

		 	//Get the values
		 	$permalink = get_permalink($post->post_parent);
		 	$children = wp_list_pages("title_li=&child_of=" . $post->post_parent . "&echo=0");
		 	$titlenamer = '<li><a href="' . $permalink . '">' . get_the_title($post->post_parent) . '</a></li>';
		 	}

		 	else {
		  	$children = wp_list_pages("title_li=&child_of=" . $post->ID . "&echo=0");
		  	//$titlenamer = get_the_title($post->ID);
		  	}
		  	if ($children) {
		?>

		<ul>
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

		

		<hr>
		<h4>Other Outports</h4>
		<hr>
		<ul>
			<?php wp_list_pages('title_li=&depth=1&exclude=4,6,8,' . $post->post_parent . ',' . $post->ID); ?>
		</ul>

	</div>
</div>
</article>
<?php get_footer(); ?>