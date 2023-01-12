<?php
/*
Element Description: VC Service
*/

// Element Class 
class vcDownloadBanner extends WPBakeryShortCode {

// Element Init
function __construct() {
    add_action( 'init', array( $this, 'vc_downloadbanner_mapping' ) );
    add_shortcode( 'vc_downloadbanner', array( $this, 'vc_downloadbanner_html' ) );
}

// Element Mapping
public function vc_downloadbanner_mapping() {

    // Stop all if VC is not enabled
if ( !defined( 'WPB_VC_VERSION' ) ) {
        return;
}

// Map the block with vc_map()
vc_map( 

    array(
        'name' => __('Download Banner', 'text-domain'),
        'base' => 'vc_downloadbanner',
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
                'type' => 'textarea',
                'heading' => __( 'Description', 'text-domain' ),
                'param_name' => 'description',
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
public function vc_downloadbanner_html( $atts ) {
	extract(
		shortcode_atts(
			array(
				'title'   => '',
				'description'   => 'description',
				'url'	=> '',
			), 
			$atts
		)
	);
	$url = vc_build_link( $url );
	$html = '
		<div class="download_banner">
			<img src="/wp-content/themes/zuragon/images/site-icons/icon-download.png">
			<h3>'.$title.'</h3>
			<p>'.$description.'</p>
			<a href="'.$url['url'].'">Download free</a>
		</div>
	';
	return $html;
} 

}

// Element Class Init
new vcDownloadBanner();