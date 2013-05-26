<?php get_header()?>

<div class="row">
    <div class="large-12 columns">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Statement') ) : ?>
        <?php endif; ?>
    </div>
</div>  

<div style="background-color: #F5F5F5; margin-top: 40px; padding-bottom: 40px; border-top: 1px solid #ddd;">
    <div class="row">
        <div class="large-12 centered-12 columns">
            <h2>Blog</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="small-12 columns large-spacer-top">
            <ul class="large-block-grid-3">
                <?php
                    $args = array( 
                        'numberposts' => '3' 
                    );

                    $recent_posts = wp_get_recent_posts( $args );
                
                    foreach( $recent_posts as $recent ){
                ?>
                <li>
                    <?php
                        echo '<a href="' . get_permalink($recent["ID"]) . '" >' . $recent["post_title"]. '</a><br>';
                        echo '<i>' . mysql2date('F j, Y', $recent["post_date"]) . '</i> | ';
                        echo $recent["post_excerpt"] . '...' . '<a href="' . get_permalink($recent["ID"]) . '" >' . 'read more</a>';

                        }
                    ?>
                </li>

                
            </ul>
        </div>
    </div>



    <div class="row">
        <div class="large-12 columns">
            <h2>Communties</h2>
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
                <li style=" margin-bottom: 5.5%; text-align: center;">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'home-feature' ); ?></a>
                </li>
                <?php endforeach; ?>
            </ul>
       </div>
    </div>
</div>
<?php get_footer()?>