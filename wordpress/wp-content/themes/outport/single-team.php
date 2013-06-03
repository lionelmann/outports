<?php get_header(); ?>

<div class="row" style="margin-top: 160px;">

    <div class="large-12 offset-by-1 columns">
        <article>
            <h1><?php the_title(); ?></h1>

            <div class="row">
                <div class="small-12 columns large-spacer-top">
                    <ul class="large-block-grid-4" style="text-align: center;">

                        <?php 
                            $team = get_post_meta($post->ID, 'team_meme', true);
                            foreach ( $team as $value ) {
                                echo '<li style="margin-bottom: 5.5%;">';
                                echo '<span data-tooltip class="has-tip" data-width="21" title="' . $value['_team_meme_team_description'] . '">' . wp_get_attachment_image($value['_team_meme_team_image'] ,'team-image') . '</span><br>';
                                echo '<a href="' . $value['_team_meme_team_url'] . '">' . $value['_team_meme_team_name'] . '</a><br>';
                                echo $value['_team_meme_team_job'] . '<br>';
                                echo '</li>';
                            }
                        ?>

                    </ul>
                </div>
        </article>
	</div>

<?php get_footer(); ?>   