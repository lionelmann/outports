<?php get_header(); ?>

<div class="row" style="margin-top: 190px;">
    <div class="large-8 offset-by-1 columns">
        <article>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <?php
                $category = get_the_category(); 
                echo '<h1>' . $category[0]->cat_name . '</h1>';
            ?>
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