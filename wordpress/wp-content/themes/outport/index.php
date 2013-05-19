<?php get_header()?>

<div class="row">
    <div class="large-12 columns large">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Statement') ) : ?>
        <?php endif; ?>
    </div>
</div>  

<div style="background-color: #F5F5F5; margin-top: 40px; padding-bottom: 40px; border-top: 1px solid #ddd;">
    <div class="row">
        <div class="large-12 columns">
            <h3>COMMUNITIES</h3>
        </div>
    </div>

    <?php 
        $args = array(
            'order' => 'ASC',     
            'sort_column' => 'menu_order',
            'meta_key' => '_meta_box_id_homepage',
            'meta_value' => 'on',
            'post_type' => 'page',
            'post_status' => 'publish'
            
        ); 
        $communities = get_pages($args); 
    ?>

    <div class="row">
        <div class="small-12 columns">
            <ul class="inline-list">
                <?php 
                    foreach( $communities as $post ) :  setup_postdata($post); 
                ?>
                <li style="width: 31%; margin-bottom: 1.5%;">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'home-feature' ); ?></a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<?php get_footer()?>