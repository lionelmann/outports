<?php get_header()?>

<div class="row">
    <div class="large-12 columns" style="text-align: center;" class="large">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Statement') ) : ?>
        <?php endif; ?>
    </div>
</div>  

<div style="background-color: #F5F5F5; margin-top: 40px; padding-bottom: 40px; border-top: 1px solid #ddd;">
    <div class="row">
        <div class="large-12 centered-12 columns xlarge-spacer-top">
            <h2 style="text-align: center; ">Explore</h2> 
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="small-12 columns">
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
                        echo '<div style="width:310px; height:220px; overflow:hidden;"><a href="' . get_permalink($recent["ID"]) . '" >' . get_the_post_thumbnail($recent["ID"], 'home-feature', array('class' => 'width100')) . '</a></div>';

                        echo '<p class="large"><a href="' . get_permalink($recent["ID"]) . '" >' . wp_trim_words($recent["post_title"], 3). '</a></p>';
                        echo '<i style="color: #696969;">' . mysql2date('F j, Y', $recent["post_date"]) . '</i> | ';
                        echo wp_trim_words($recent["post_excerpt"], 10) . '' . '<a href="' . get_permalink($recent["ID"]) . '" >' . 'more</a>';

                        }
                    ?>
                </li>

                
            </ul>
        </div>
    </div>



    <div class="row">
        <div class="large-12 columns xlarge-spacer-top">
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
        <div class="small-12 columns xlarge-spacer-top">
            <ul class="large-block-grid-3">
                <?php 
                    foreach( $communities as $post ) :  setup_postdata($post); 
                ?>
                <li style=" margin-bottom: 5.5%;">
                    <?php //echo wp_get_attachment_image(get_post_meta(get_the_ID(), '_meta_box_id_community_image', true), 'home-feature');?>
                    <div class="imgWrap">
                    <div style="width:310px; height:220px; overflow:hidden;"><?php the_post_thumbnail( 'home-feature', array('class' => 'width100') ); ?></div>
                    <a class="imgDescription" href="<?php the_permalink(); ?>"><h2 style="color: white; padding-top: 50px; text-align:center"><?php the_title(); ?></h2></a>
                </div>
                </li>
                
                <?php endforeach; ?>
            </ul>
       </div>

        <div class="row">
        <div class="large-12 columns">
            <h2 style="text-align: center;">Quality of Space</h2>
            <hr>
            <ul class="inline-list">

               <?php
                    $cats = get_categories();
                    foreach ((array)$cats as $cat) {
                        $catdesc = $cat->category_description;
                        $catnumber = $cat->cat_ID;
                        $photofile = (TEMPLATEPATH . '/images/icons/' . $cat->cat_ID. '.png');

                        if (file_exists($photofile)){
                            echo '<li><a href="' . get_category_link($cat) .'"><img width="56" height="56" src="' . get_bloginfo ('template_url') . '/images/icons/' . $cat->cat_ID. '.png" alt="' . $cat->cat_name . '" /></a></li>';
                        } else 
                            echo '';
                        } 
                ?>
            </ul>
        </div>
    </div>
    </div>
</div>
<?php get_footer()?>