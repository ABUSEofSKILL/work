<?php
/*
Element Description: VC Number List
*/

// Element Class 
class vcNumberList extends WPBakeryShortCode {

// Element Init
function __construct() {
    add_action( 'init', array( $this, 'vc_NumberList_mapping' ) );
    add_shortcode( 'vc_NumberList', array( $this, 'vc_NumberList_html' ) );
}

// Element Mapping
public function vc_NumberList_mapping() {

    // Stop all if VC is not enabled
if ( !defined( 'WPB_VC_VERSION' ) ) {
        return;
}

// Map the block with vc_map()
vc_map( 

    array(
        'name' => __('Number List', 'text-domain'),
        'base' => 'vc_NumberList',
        'category' => __('Add-ons', 'text-domain'),   
        'icon' => get_template_directory_uri().'/inc/image/Logo.png',            
        'params' => array(
			array(
				'type' => 'param_group',
				'heading' => 'Number List',
				'param_name' => 'values',
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => __( 'Number', 'text-domain' ),
						'param_name' => 'number',
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Title', 'text-domain' ),
						'param_name' => 'title',
					)
				)
			)
		)
    )
);                                


} 


// Element HTML
public function vc_NumberList_html( $atts, $content ) {

    extract(shortcode_atts(array(
		'values'	=> '',
	), $atts));
	
	$values = vc_param_group_parse_atts($atts['values']);
	
	$new_accordion_value = array();
	foreach($values as $data) {
		$new_line = $data;
		$new_line['title'] = isset($new_line['title']) ? $new_line['title'] : '';
		$new_line['number'] = isset($new_line['number']) ? $new_line['number'] : '';
		$new_accordion_value[] = $new_line;
	}
	

	$idd = 0;
	foreach($new_accordion_value as $accordion):$idd++;
		$list .= '<div class="number-list"><div>'.$accordion['number'].'</div><p>'.$accordion['title'].'</p></div>';
		
	endforeach;
	
	return $list;
	wp_reset_query();
} 

}

// Element Class Init
new vcNumberList();