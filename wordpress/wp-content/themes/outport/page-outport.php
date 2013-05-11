<?php
/*
Template Name: Outport
*/
?>

<?php get_header(); ?>

<div>
	<img src="http://placehold.it/2000x600&text=[<?php the_title(); ?>]" />
</div>

<div class="row">

	<div class="large-8 offset-by-1 columns">
		<article>
			<!-- Loop starts -->
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h1><?php the_title(); ?></h1>
				<hr>
				<?php the_content(); ?>
			<?php endwhile; endif; //Loop ends ?>
		</article>
	</div>
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>