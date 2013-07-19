<?php get_header(); ?>

<div class="row">
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

            <?php 
                if ( has_post_thumbnail() ) { ?>
                    
                    <div style="width:280px; height:200px; overflow:hidden; float:left; margin: 15px 25px 35px 0;">
                        <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('home-feature', array('class' => 'alignleft')); ?></a>
                    </div>

            <?php } ?>
            

            <h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
              
            <?php if ( !empty( $post->post_excerpt ) ) { ?>
               <br>
                <p><?php echo excerpt(20); ?></p>
                <?php } else { ?>
                <p><?php echo content(20); ?></p>
                <?php } ?>
                <hr>

            <?php endwhile; endif; //Loop ends ?>
 
            <p>
                <?php tmhtc_paginate(); ?>
            </p>
            
    </article>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>