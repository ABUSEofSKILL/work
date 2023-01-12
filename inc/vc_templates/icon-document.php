<?php
/*
Element Description: VC Icon Document
*/

// Element Class 
class vcIconDocument extends WPBakeryShortCode {

// Element Init
function __construct() {
    add_action( 'init', array( $this, 'vc_icondocument_mapping' ) );
    add_shortcode( 'vc_icondocument', array( $this, 'vc_icondocument_html' ) );
}

// Element Mapping
public function vc_icondocument_mapping() {

    // Stop all if VC is not enabled
if ( !defined( 'WPB_VC_VERSION' ) ) {
        return;
}

// Map the block with vc_map()
vc_map( 

    array(
        'name' => __('Icon Document', 'text-domain'),
        'base' => 'vc_icondocument',
        'category' => __('Add-ons', 'text-domain'),   
        'icon' => get_template_directory_uri().'/inc/image/Logo.png',            
        'params' => array(   

            array(
                'type' => 'textfield',
                'holder' => 'span',
                'heading' => __( 'Title', 'text-domain' ),
                'param_name' => 'title',
                'admin_label' => false,
            ),  
			
			array(
                'type' => 'vc_link',
                'heading' => __( 'URL', 'text-domain' ),
                'param_name' => 'url',
            )
			
			

        )
    )
);                                


} 


// Element HTML
public function vc_icondocument_html( $atts ) {
	extract(
		shortcode_atts(
			array(
				'title'   => '',
				'url'	=> '',
			), 
			$atts
		)
	);
	$url = vc_build_link( $url );
	$html = '
		<a class="icon-document" href="'.$url['url'].'">
			<div>
				<span>'.$title{0}.'</span>
				<img src="/wp-content/themes/zuragon/images/site-icons/icon-document.png">
			</div>
			<h4>'.$title.'</h4>
		</a>
	';
	return $html;
} 

}

// Element Class Init
new vcIconDocument();