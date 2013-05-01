<?php get_header(); ?>

<article>
	<?php the_post(); ?>
<div class="row">
	<div class="large-8 offset-by-1 columns">
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	</div>
	<div class="large-3 columns">

	<?php 
    $args = array(
        'sort_order' => 'ASC',
        'sort_column' => 'post_title',
        'meta_key' => '_meta_box_id_homepage',
        'meta_value' => 'on',
        'post_type' => 'page',
        'post_status' => 'publish'
    ); 
    $communities = get_pages($args); 
?>

<h4>Outports</h4>
<hr>
<ul>
            <?php 
                foreach( $communities as $post ) :  setup_postdata($post); 
            ?>
                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php endforeach; ?>
        </ul>

	</div>
</div>
</article>
<?php get_footer(); ?>