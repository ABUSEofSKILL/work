<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Zuragon
 */

get_header();
?>
<?php if ( have_posts() ) : ?>
	<div class="main-news-image"></div>
	<div class="header-news">
		<div class="container">
			<div class="row align-items-end">
				<div class="col-md-6 col-lg-6">
					<h1><?php
						printf( esc_html__( 'Search Results for: %s', 'zuragon' ), '<span>' . get_search_query() . '</span>' );
					?></h1>
				</div>
				<div class="col-md-6 col-lg-6">
					<div class="news-search">
						<h3>Zuragon news</h3>
						<p>Lorem ipsum Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
						<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<div>
								<label class="screen-reader-text" for="s"><?php _x( 'Zearch.. for search zuragon news ;)', 'zuragon' ); ?></label>
								<input type="text" value="<?php echo get_search_query(); ?>" placeholder="Zearch.. for search zuragon news ;)" name="s" id="s" />
								<input type="hidden" value="post" name="post_type" />
								<button type="submit"><i class="fas fa-search"></i></button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'content' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );
		?>

		</div>
		</div>
	</div>
<?php endif;

get_footer();