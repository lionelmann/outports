<?php get_header(); ?>

<div class="row">

    <div class="large-8 offset-by-1 columns">
        <article>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <h1><?php the_title(); ?></h1>
                <hr>
                
                <?php if ( !empty( $post->post_excerpt ) ) : ?>
                    <p class="large"><?php echo excerpt(999); ?></p>
                    <br>
                <?php endif; ?>

                <?php the_content(); ?>
            <?php endwhile; endif; //Loop ends ?>

            <div style="float:left">
                <?php previous_post('&laquo; &laquo; %', 'Previous', 'no'); ?>
            </div>
            <div style="float:right">
                <?php next_post('% &raquo; &raquo; ', 'Next', 'no'); ?>
            </div>
    </article>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>