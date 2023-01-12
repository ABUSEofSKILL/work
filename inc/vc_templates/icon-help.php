<?php
/*
Element Description: VC Icon Help
*/

// Element Class 
class vcIconHelp extends WPBakeryShortCode {

// Element Init
function __construct() {
    add_action( 'init', array( $this, 'vc_iconHelp_mapping' ) );
    add_shortcode( 'vc_iconHelp', array( $this, 'vc_iconHelp_html' ) );
}

// Element Mapping
public function vc_iconHelp_mapping() {

    // Stop all if VC is not enabled
if ( !defined( 'WPB_VC_VERSION' ) ) {
        return;
}

// Map the block with vc_map()
vc_map( 

    array(
        'name' => __('Icon Help', 'text-domain'),
        'base' => 'vc_iconHelp',
        'category' => __('Add-ons', 'text-domain'),   
        'icon' => get_template_directory_uri().'/inc/image/Logo.png',            
        'params' => array(   
			array(
				'type' => 'attach_image',
				'heading' => __( 'Image', 'text-domain' ),
				'param_name' => 'image',
			),
					
            array(
                'type' => 'textarea_html',
                'heading' => __( 'Content', 'text-domain' ),
                'param_name' => 'content',
            )
        )
    )
);                                


} 


// Element HTML
public function vc_iconHelp_html( $atts, $content = null, $tag ) {
	$atts = vc_map_get_attributes($tag, $atts);
    $atts['content'] = $content;
	$gallery = shortcode_atts(
		array(
			'image'      =>  'image',
		), $atts );
	$image = wp_get_attachment_image_src($gallery['image'], 'large');
	$content = wpb_js_remove_wpautop($content, true);
	$html = '
		<div class="page-icon-help">
			<div><img src="'.$image[0].'"></div>
			'.$content.'
		</div>
	';
	return $html;
} 

}

// Element Class Init
new vcIconHelp();