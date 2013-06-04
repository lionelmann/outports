<?php get_header(); ?>

<?php

    $banner = wp_get_attachment_url(get_post_meta(get_the_ID(), '_meta_box_id_community_image', true));
    if($banner) { ?>
        <div style="margin-top: 161px;">
            <div class="row" style="height: 548px; overflow: hidden; max-width: 100%;">
           
            <?php echo '<img  src="' . $banner .'" />'?>
        </div>
        </div>  
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
                </article>
            </div>
    <?php } else { ?>
        
        <div class="row" style="margin-top: 161px;">
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
                </article>
            </div>
    <?php } ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>