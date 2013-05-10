<?php get_header()?>

<!-- Custom Banner -->
<div class="shadow"></div>
<div>
    <?php echo hype_slider_template(6); ?>
</div>

<div class="row"  style="padding: 0px 0 30px 0;">
    <div class="large-12 columns">
        <h4>Culture of Outports proposes that an understanding of the history and character of these communities is essential to successfully plan their future evolution, post fisheries.</h4>
    <hr />
    </div>
</div>  

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
            <li style="width: 31%; margin-bottom: 1.5%;" class="overlay">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'home-feature' ); ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<?php get_footer()?>