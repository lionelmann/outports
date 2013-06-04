<?php get_header()?>

<div class="row">
    <div class="large-12 columns" style="text-align: center;" class="large">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Statement') ) : ?>
        <?php endif; ?>
    </div>
</div>  

<div style="background-color: #F5F5F5; margin-top: 40px; padding-bottom: 40px; border-top: 1px solid #ddd;">
    <div class="row">
        <div class="large-12 centered-12 columns">
            <h2 style="text-align: center; ">Explore</h2> 
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="small-12 columns large-spacer-top">
            <ul class="large-block-grid-3">
                <?php
                    $args = array( 
                        'numberposts' => '3',
                        'post_type' => array( 'post', 'community_post' )
                    );

                    $recent_posts = wp_get_recent_posts( $args );
                
                    foreach( $recent_posts as $recent ){
                ?>
                <li>
                    <?php
                        echo '<div style="width:310px; height:220px; overflow:hidden;"><a href="' . get_permalink($recent["ID"]) . '" >' . get_the_post_thumbnail($recent["ID"], 'home-feature') . '</a></div>';

                        echo '<p class="large"><a href="' . get_permalink($recent["ID"]) . '" >' . $recent["post_title"]. '</a></p>';
                        //echo '<i>' . mysql2date('F j, Y', $recent["post_date"]) . '</i> | ';
                        //echo wp_trim_words($recent["post_excerpt"], 150) . '...' . '<a href="' . get_permalink($recent["ID"]) . '" >' . 'read more</a>';

                        }
                    ?>
                </li>

                
            </ul>
        </div>
    </div>



    <div class="row">
        <div class="large-12 columns">
            <h2 style="text-align: center;">Communties</h2>
            <hr>
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
        <div class="small-12 columns large-spacer-top">
            <ul class="large-block-grid-3">
                <?php 
                    foreach( $communities as $post ) :  setup_postdata($post); 
                ?>
                <li style=" margin-bottom: 5.5%;" class="thumb">
                    <?php //echo wp_get_attachment_image(get_post_meta(get_the_ID(), '_meta_box_id_community_image', true), 'home-feature');?>
                    <div style="width:310px; height:220px; overflow:hidden;"><?php the_post_thumbnail( 'home-feature' ); ?></div>
                    <a class="text" href="<?php the_permalink(); ?>"><h2 style="color: white; padding-top: 50px;"><?php the_title(); ?></h2></a>
                </li>
                
                <?php endforeach; ?>
            </ul>
       </div>

        <div class="row">
        <div class="large-12 columns">
            <h2 style="text-align: center;">Quality of Space</h2>
            <hr>
            <ul class="large-block-grid-12">
            <li><img src="http://placehold.it/80x80"></li>
            <li><img src="http://placehold.it/80x80"></li>
            <li><img src="http://placehold.it/80x80"></li>
            <li><img src="http://placehold.it/80x80"></li>
            <li><img src="http://placehold.it/80x80"></li>
            <li><img src="http://placehold.it/80x80"></li>
            <li><img src="http://placehold.it/80x80"></li>
            <li><img src="http://placehold.it/80x80"></li>
            <li><img src="http://placehold.it/80x80"></li>
            <li><img src="http://placehold.it/80x80"></li>
            <li><img src="http://placehold.it/80x80"></li>
            <li><img src="http://placehold.it/80x80"></li>
            </ul>
        </div>
    </div>
    </div>
</div>
<?php get_footer()?>