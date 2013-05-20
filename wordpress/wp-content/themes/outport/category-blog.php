<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>

<div class="row" style="margin-top: 100px;">
using this page
    <div class="large-8 offset-by-1 columns">
        <article>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                
                <hr>
                
                <?php if ( !empty( $post->post_excerpt ) ) : ?>
                    <p class="large"><?php echo excerpt(999); ?></p>
                    <br>
                <?php endif; ?>

                <?php the_content(); ?>
            <?php endwhile; endif; //Loop ends ?>
    </article>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>