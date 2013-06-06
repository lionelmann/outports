<?php get_header(); ?>

<div class="row">

    <div class="large-8 offset-by-1 columns">
        <article>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <hr>
            <?php the_content(); ?>
            <?php endwhile; endif; //Loop ends ?>

            <div class="row">
                <div class="small-4 columns">
                    <?php 
                        $partner1 = get_post_meta($post->ID, 'meta_box_id', true);
                        foreach ( $partner1 as $value ) {
                            echo '<a href="' . $value['_meta_box_id_partner_link'] . '">' . wp_get_attachment_image($value['_meta_box_id_partner_logo']) . '</a><br><br>';
                        }
                    ?>
                </div>

                <div class="small-4 columns">
                    <?php 
                        $partner2 = get_post_meta($post->ID, 'meta_box_id_2', true);
                        foreach ( $partner2 as $value ) {
                            echo '<a href="' . $value['_meta_box_id_2_partner_link'] . '">' . wp_get_attachment_image($value['_meta_box_id_2_partner_logo']) . '</a><br><br>';
                        }
                    ?>
                </div>

                <div class="small-4 columns">
                    <?php 
                        $partner3 = get_post_meta($post->ID, 'meta_box_id_3', true);
                        foreach ( $partner3 as $value ) {
                            echo '<a href="' . $value['_meta_box_id_3_partner_link'] . '">' . wp_get_attachment_image($value['_meta_box_id_3_partner_logo']) . '</a><br><br>';
                        }
                    ?>
                </div>
        </article>
    </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>   