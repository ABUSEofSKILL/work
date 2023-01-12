<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Zuragon
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta property="og:url" content="<?php the_permalink(); ?>">
	<meta property="og:title" content="<?php the_title();?>">
	<meta property="og:image" content="<?php the_post_thumbnail_url('full');?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<nav id="site-navigation" class="main-navigation main-navigation-phone">
<div class="menu-main-overflow"></div>
	<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fas fa-align-justify"></i></button>
	<?php
	wp_nav_menu( array(
		'theme_location' => 'menu-1',
		'menu_id'        => 'primary-menu',
	) );
	?>
</nav>
	<header>
		<div class="container">
			<div class="row align-items-center">
				<div class="col-12 col-sm-12 col-lg-2 col-xl-3"><?php the_custom_logo(); ?></div>
				<div class="col-12 col-sm-12 col-lg-10 col-xl-9">
					<nav id="site-navigation" class="main-navigation">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						) );
						?>
					</nav>
				</div>
			</div>
		</div>
	</header>
