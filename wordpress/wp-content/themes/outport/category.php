<?php get_header(); ?>

<div class="row" style="margin-top: 160px;">
    <div class="large-8 offset-by-1 columns">
        <article>
            <h1><?php single_cat_title(''); ?></h1>
            <hr>

            <?php
                global $wp_query;
                $args = array_merge(
                    $wp_query->query,
                    array(
                    'post_type'=>array(
                        'post',
                        'community_post'),
                    'posts_per_page' => 100,
                    'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1)
                   )
                    
                );
                query_posts($args); 
            
            ?>

            <?php if (have_posts() ) : while (  have_posts() ) :  the_post(); ?>

            

            <h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
            <hr>
                
                
            <?php if ( !empty( $post->post_excerpt ) ) : ?>
                <p class="large"><?php echo excerpt(20); ?></p>
                <br>
            <?php endif; ?>

            <?php endwhile; endif; //Loop ends ?>
 

            <?php tmhtc_paginate(); ?>
            <?php wp_reset_query(); ?>
    </article>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>