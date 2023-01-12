<?php
/*
Element Description: VC Testimonials
*/

// Element Class 
class vcTestimonials extends WPBakeryShortCode {

// Element Init
function __construct() {
    add_action( 'init', array( $this, 'vc_Testimonials_mapping' ) );
    add_shortcode( 'vc_Testimonials', array( $this, 'vc_Testimonials_html' ) );
}

// Element Mapping
public function vc_Testimonials_mapping() {

    // Stop all if VC is not enabled
if ( !defined( 'WPB_VC_VERSION' ) ) {
        return;
}

// Map the block with vc_map()
vc_map( 

    array(
        'name' => __('Testimonials', 'text-domain'),
        'base' => 'vc_Testimonials',
        'category' => __('Add-ons', 'text-domain'),   
        'icon' => get_template_directory_uri().'/inc/image/Logo.png',            
        'params' => array(
			array(
				'type' => 'param_group',
				'heading' => 'Testimonials',
				'param_name' => 'values',
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => __( 'Name', 'text-domain' ),
						'param_name' => 'name',
					),
					array(
						'type' => 'textarea',
						'heading' => __( 'Text', 'text-domain' ),
						'param_name' => 'text',
					)
				)
			)
		)
    )
);                                


} 


// Element HTML
public function vc_Testimonials_html( $atts, $content ) {

    extract(shortcode_atts(array(
		'values'	=> '',
	), $atts));
	
	
	$values = vc_param_group_parse_atts($atts['values']);
	
	$new_accordion_value = array();
	foreach($values as $data) {
		$new_line = $data;
		$new_line['name'] = isset($new_line['name']) ? $new_line['name'] : '';
		$new_line['text'] = isset($new_line['text']) ? $new_line['text'] : '';
		$new_accordion_value[] = $new_line;
	}
	
	$idd = 0;
	
	$list .= '<div class="testimonials slider">';
	foreach($new_accordion_value as $accordion):$idd++;
		$list .= '<div class="testimonial_item"><p>'.$accordion['text'].'</p><div></div><span>'.$accordion['name'].'</span></div>';
	endforeach;
	$list .= '</div>';
	
	return $list;
	wp_reset_query();
} 

}

// Element Class Init
new vcTestimonials();