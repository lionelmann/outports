<?php
/**
 *Template Name: Team
 */
?>

<?php get_header(); ?>

<?php 
    $args = array(
        'order' => 'ASC',     
        'sort_column' => 'menu_order',
        'post_type' => 'team_member',
        'post_status' => 'publish'
            
    ); 
    $teams = get_posts($args); 
?>

<div class="row" style="margin-top: 160px;">
    <div class="large-12 columns">
        <article>
            <h1><?php the_title(); ?></h1>
            <hr>
                <div class="row">
                    <div class="small-12 columns large-spacer-top team">
                        <ul class="large-block-grid-4" style="text-align: center;">
                            <?php 
                                foreach( $teams as $post ) :  setup_postdata($post); 
                            ?>
                            <li style=" margin-bottom: 5.5%;">
                                <a href="#" title="<?php echo get_post_meta(get_the_ID(), '_team_member_team_description', true); ?>">
                                    <?php echo wp_get_attachment_image(get_post_meta(get_the_ID(), '_team_member_team_image', true), 'team-image');?><br>
                                </span>
                                <a href="<?php echo get_post_meta(get_the_ID(), '_team_member_team_url', true); ?>"><?php the_title();?></a><br>
                                <?php echo get_post_meta(get_the_ID(), '_team_member_team_job', true); ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
        </article>
    </div>
</div>

<?php get_footer(); ?>   