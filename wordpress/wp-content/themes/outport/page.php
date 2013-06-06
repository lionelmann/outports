<?php get_header(); ?>

<?php
    //Get post meta and put into variable
    $banner = wp_get_attachment_url(get_post_meta(get_the_ID(), '_meta_box_id_community_image', true));
?>

<?php
    if($banner) :
        echo '<div class="row banner">';
        echo '<img  src="' . $banner .'" />';
        echo '</div>';
    endif; 
?>
        
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
   
<?php get_sidebar(); ?>
<?php get_footer(); ?>