<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Zuragon
 */

get_header();
?>
<div class="main-news-image"></div>
<div class="header-news">
		<div class="container">
			<div class="row align-items-end">
				<div class="col-md-6 col-lg-6">
					<?php
						the_archive_title( '<h1>', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
					?>
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
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="post-news-img">
						<img src="<?php the_post_thumbnail_url( 'full' ); ?>">
					</div>
					<div class="post-news-category"><?php the_category(', '); ?></div>
					
					<div class="post-news-content">
						<div class="post-news-left"><?php the_field('additional_title'); ?></div>
						<div class="post-news-center">
							<?php the_title( '<h2>', '</h2>' ); ?>
							<p><?php the_excerpt(); ?></p>
							<p><?php the_content(); ?></p>
						</div>
						<div class="post-news-right">
							<div class="post-news-date">
								<?php echo get_the_date('d').'<span>'.get_the_date('M').'</span>';?>
							</div>
							<img src="/wp-content/themes/zuragon/images/site-icons/icon-share-4.png">
						</div>
					</div>
					<div style="clear:both;"></div>
				</article>
			<?php endwhile;?>
		</div>
	</div>
</div>
<div class="footer-news">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<?php dynamic_sidebar('news-bottom'); ?>
			</div>
		</div>
	</div>
</div> 
<?php 
get_footer();
