<?php get_header(); ?>

<div class="row">
    <div class="large-8 offset-by-1 columns">
        <article>
            <?php
                $category = get_the_category(); 
                echo '<h1>' . $category[0]->cat_name . '</h1>';
            ?>
            <hr>

            <?php
                $args = array(
                    'post_type' => array('post','community_post')
                    );

                $query = new WP_Query($args);
            ?>

            <?php if (have_posts() ) : while (  $query->have_posts() ) :  $query->the_post(); ?>

            <h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
            <hr>
                
                
            <?php if ( !empty( $post->post_excerpt ) ) : ?>
                <p class="large"><?php echo excerpt(999); ?></p>
                <br>
            <?php endif; ?>

            <?php endwhile; endif; //Loop ends ?>


            <?php tmhtc_paginate(); ?>
    </article>
    </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>