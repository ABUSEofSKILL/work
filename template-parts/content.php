<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Zuragon
 */

?>

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
			<a href="<?php the_permalink();?>"><?php _e( 'Read more.', 'zuragon' ); ?></a>
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
