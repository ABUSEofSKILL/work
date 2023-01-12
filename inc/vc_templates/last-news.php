<?php
/*
Element Description: VC Last News
*/

// Element Class 
class vcLastNews extends WPBakeryShortCode {

// Element Init
function __construct() {
    add_action( 'init', array( $this, 'vc_lastnews_mapping' ) );
    add_shortcode( 'vc_lastnews', array( $this, 'vc_lastnews_html' ) );
}

// Element Mapping
public function vc_lastnews_mapping() {

    // Stop all if VC is not enabled
if ( !defined( 'WPB_VC_VERSION' ) ) {
        return;
}

// Map the block with vc_map()
vc_map( 

    array(
        'name' => __('Last News', 'text-domain'),
        'base' => 'vc_lastnews',
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
                'type' => 'textfield',
                'heading' => __( 'Number post', 'text-domain' ),
                'param_name' => 'number',
            ), 
			
			array(
                'type' => 'textfield',
                'heading' => __( 'Category', 'text-domain' ),
                'param_name' => 'category',
            )
			
			

        )
    )
);                                


} 


// Element HTML
public function vc_lastnews_html( $atts ) {
	extract( shortcode_atts( array(
		'title'       => '',
		'number'       => '',
		'category'       => ''
	), $atts ) );
	
	$post = new WP_Query( array( 'posts_per_page' => $number, 'cat' => $category, 'order' => 'DESC'));
	
	$output = '<div class="fade slider last-news">';
	while ( $post->have_posts() ) {
		$post->the_post();
		$output .= '
		<div class="last-news-item">
			<div class="last-news-image" style="background:url('. get_the_post_thumbnail_url().') no-repeat center;"></div>
			<div class="last-news-content">
				<div class="last-news-date">'.get_the_date('d').'<span>'.get_the_date('M').'</span></div>
				<h2 class="last-news-type">'.$title.'</h2>
				<h3 class="last-news-title">'.get_the_title().'</h3>
				<p class="last-news-excerpt">'.get_the_excerpt().'</p>
				<a href="'.get_permalink().'">Read more.</a>
			</div>
		</div>';
	}
	$output .= '</div>';
	
	wp_reset_query();
	
	return $output;
} 

}

// Element Class Init
new vcLastNews();