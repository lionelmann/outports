<?php
$pages = new Cuztom_Post_Type('page');
	$pages->add_meta_box( 
		'meta_box_id',
		'Community Additions',
			array(
				array(
				'name'          => 'homepage',
				'label'         => 'List',
				'description'   => 'List this page on the homepage',
				'type'          => 'checkbox'
				),

				array(
				'name'          => 'blog',
				'label'         => 'Select Blog',
				'description'   => 'Select which blog category should be assigned to this page',
				'type'          => 'term_select',
				'args' 			=> array(
					'taxonomy'	=> 'community_category',
					'show_option_none' => '-- Select Community Category --'
		        	)
		    	),
		    	array(
	            'name'          => 'community_image',
	            'label'         => 'Banner',
	            'description'   => 'Select the banner image. Images need to be at least <span style="color: red;"><b>1200px x 400px.</b></span>',
	            'type'          => 'image'
	        	)			
		    )
		);

?>