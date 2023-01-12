<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Zuragon
 */

get_header();
?>

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="error-404 not-found">
				<h1>Error 404</h1>
				<h2><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'zuragon' ); ?></h2>
				<a href="/"><?php esc_html_e( 'Go to home', 'zuragon' ); ?></a>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
