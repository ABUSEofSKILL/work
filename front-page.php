<?php
/**
 * The template for displaying front page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Zuragon
 */

get_header();
?>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<?php 
					while ( have_posts() ) : the_post();
						the_content();
					endwhile;
				?>
			</div>
		</div>
	</div>
<?php
get_footer();
