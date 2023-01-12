<?php
/*
Element Description: VC Tabs
*/

// Element Class 
class vcTabs extends WPBakeryShortCode {

// Element Init
function __construct() {
    add_action( 'init', array( $this, 'vc_Tabs_mapping' ) );
    add_shortcode( 'vc_Tabs', array( $this, 'vc_Tabs_html' ) );
}

// Element Mapping
public function vc_Tabs_mapping() {

    // Stop all if VC is not enabled
if ( !defined( 'WPB_VC_VERSION' ) ) {
        return;
}

// Map the block with vc_map()
vc_map( 

    array(
        'name' => __('Tabs', 'text-domain'),
        'base' => 'vc_Tabs',
        'category' => __('Add-ons', 'text-domain'),   
        'icon' => get_template_directory_uri().'/inc/image/Logo.png',            
        'params' => array(
			array(
				'type' => 'param_group',
				'heading' => 'Tabs',
				'param_name' => 'values',
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => __( 'Title', 'text-domain' ),
						'param_name' => 'title',
					),
					array(
						'type' => 'textarea',
						'heading' => __( 'Description', 'text-domain' ),
						'param_name' => 'description',
					),
					array(
						'type' => 'vc_link',
						'heading' => __( 'Url Button', 'text-domain' ),
						'param_name' => 'url',
					)
				)
			)
		)
    )
);                                


} 


// Element HTML
public function vc_Tabs_html( $atts, $content ) {

    extract(shortcode_atts(array(
		'values'	=> '',
	), $atts));
	
	
	$values = vc_param_group_parse_atts($atts['values']);
	
	$new_accordion_value = array();
	foreach($values as $data) {
		$new_line = $data;
		$new_line['title'] = isset($new_line['title']) ? $new_line['title'] : '';
		$new_line['description'] = isset($new_line['description']) ? $new_line['description'] : '';
		$new_line['url'] = vc_build_link( $new_line['url'] );
		$new_accordion_value[] = $new_line;
	}
	
	$idd = 0;
	$idd2 = 0;
	
	$list .= '<script src="http://dimox.name/examples/universal-jquery-tabs-script/tabs.js"></script>
	<div class="tabs  vertical">

	<ul class="tabs__caption">';
	foreach($new_accordion_value as $accordion):$idd++;
		if($idd == 1) $active = 'active'; else $active = '';
		$list .= '<li class="'.$active.'">'.$accordion['title'].'</li>';
	endforeach;
	
	$list .= '</ul>';
	
	foreach($new_accordion_value as $accordion2):$idd2++;
		if($idd2 == 1) $active = 'active'; else $active = '';
		$href = $accordion2['url'];
		$list .= '
		<div class="tabs__content '.$active.'">
		<h3>'.$accordion2['title'].'</h3>
		<p>'.$accordion2['description'].'</p>
		<a href="'.$href['url'].'">More info</a>
		</div>';
	endforeach;

	$list .= '</div>';
	return $list;
	wp_reset_query();
} 

}

// Element Class Init
new vcTabs();