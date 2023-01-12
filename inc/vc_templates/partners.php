<?php
/*
Element Description: VC Partners
*/

// Element Class 
class vcPartners extends WPBakeryShortCode {

// Element Init
function __construct() {
    add_action( 'init', array( $this, 'vc_Partners_mapping' ) );
    add_shortcode( 'vc_Partners', array( $this, 'vc_Partners_html' ) );
}

// Element Mapping
public function vc_Partners_mapping() {

    // Stop all if VC is not enabled
if ( !defined( 'WPB_VC_VERSION' ) ) {
        return;
}

// Map the block with vc_map()
vc_map( 

    array(
        'name' => __('Partners', 'text-domain'),
        'base' => 'vc_Partners',
        'category' => __('Add-ons', 'text-domain'),   
        'icon' => get_template_directory_uri().'/inc/image/Logo.png',            
        'params' => array(
			array(
				'type' => 'param_group',
				'heading' => 'Partners',
				'param_name' => 'values',
				'params' => array(
					array(
						'type' => 'attach_image',
						'heading' => __( 'Image', 'text-domain' ),
						'param_name' => 'image',
					),
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
						'heading' => __( 'URL Button', 'text-domain' ),
						'param_name' => 'url',
					)
				)
			)
		)
    )
);                                


} 


// Element HTML
public function vc_Partners_html( $atts, $content ) {

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
	
	$gallery = shortcode_atts(
		array(
			'image'      =>  'image',
		), $atts );
	
	$idd = 0;
	$k = 0;
	$list .= '<div class="partners row">';
	foreach($new_accordion_value as $accordion):$idd++;
		$image = wp_get_attachment_image_src($accordion['image'], 'large');
		$href = $accordion['url'];
		
		$list .= '
		<div class="col-md-6 col-lg-6 partner_item">
			<div class="row align-items-center justify-content-center">
				<div class="col-md-5 col-lg-5 partner_image"><img src="'.$image[0].'"></div>
				<div class="col-md-6 col-lg-6">
					<h3>'.$accordion['title'].'</h3>
					<p>'.$accordion['description'].'</p>
					<a href="'.$href['url'].'">Read more.</a>
				</div>
			</div>
		</div>';
		if($idd%2 == 0) $list .= '<div class="partners_border"></div>';
		
	endforeach;
	$list .= '</div>';
	
	return $list;
	wp_reset_query();
} 

}

// Element Class Init
new vcPartners();