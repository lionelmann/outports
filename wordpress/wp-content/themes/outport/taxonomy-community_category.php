<?php get_header(); ?>

<div class="row" style="margin-top: 160px;">
    <div class="large-8 offset-by-1 columns">
        <article>


            <?php 
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
            echo '<h1>' . $term->name . '</h1>'; ?>
            
            <hr>

            

            <?php if (have_posts() ) : while (  have_posts() ) :  the_post(); ?>


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