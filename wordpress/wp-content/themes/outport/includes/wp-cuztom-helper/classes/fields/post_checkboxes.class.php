<?php

if( ! defined( 'ABSPATH' ) ) exit;

class Cuztom_Field_Post_Checkboxes extends Cuztom_Field
{
	var $css_classes 			= array( 'cuztom-input' );

	function __construct( $field, $parent )
	{
		parent::__construct( $field, $parent );

		$this->args = array_merge(
			array(
				'post_type'			=> 'post',
				'posts_per_page'	=> -1
			),
			$this->args
		);
		
		$this->default_value 	= (array) $this->default_value;
		$this->posts 			= get_posts( $this->args );
	}
	
	function _output( $value, $object )
	{		
		$output = '<div class="cuztom-checkboxes-wrap">';
			if( is_array( $this->posts ) )
			{
				foreach( $this->posts as $post )
				{
					$output .= '<input type="checkbox" ' . $this->output_name( 'cuztom[' . $this->id_name . '][]' ) . ' ' . $this->output_id( $this->id_name . $this->after_id . '_' . Cuztom::uglify( $post->post_title ) ) . ' ' . $this->output_css_class() . ' value="' . $post->ID . '" ' . ( is_array( $value ) ? ( in_array( $post->ID, $value ) ? 'checked="checked"' : '' ) : ( ( $value == '-1' ) ? '' : in_array( $post->ID, $this->default_value ) ? 'checked="checked"' : '' ) ) . ' /> ';
					$output .= '<label for="' . $this->id_name . $this->after_id . '_' . Cuztom::uglify( $post->post_title ) . '">' . $post->post_title . '</label>';
					$output .= '<br />';
				}
			}
		$output .= '</div>';

		$output .= $this->output_explanation();

		return $output;
	}

	function save( $post_id, $value, $context )
	{
		$value = empty( $value ) ? '-1' : $value;

		parent::save( $post_id, $value, $context );
	}	
}