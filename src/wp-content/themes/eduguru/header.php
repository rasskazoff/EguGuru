<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EduGuru
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="<?php echo get_bloginfo('template_url');?>/assets/css/style.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'eduguru' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="top-menu container">
			<div class="site-branding">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php endif; ?>
			</div><!-- .site-branding -->
			<div class="search">
				<?php get_search_form(); ?>
			</div>
			<nav>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'top-menu',
						'menu_id'        => 'top-menu',
					)
				);
				?>
			</nav>
		</div>
		
		<div class="main-menu">
			<nav class="container">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'main-menu',
						'menu_id'        => 'main-menu',
					)
				);
				?>
			</nav>
		</div>
	</header><!-- #masthead -->
