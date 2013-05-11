<?php get_header(); ?>

<div class="row">

    <div class="large-8 offset-by-1 columns">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <hr>
            <?php the_content(); ?>
        <?php endwhile; endif; //Loop ends ?>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>