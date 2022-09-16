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
	<?php  if (is_page_template('template-parts/home.php')): ?>
	<link rel="stylesheet" href="<?php echo get_bloginfo('template_url');?>/assets/css/style-home.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
	<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
	<?php endif; ?>
	<?php  if (is_page_template('template-parts/empty.php')): ?>
	<link rel="stylesheet" href="<?php echo get_bloginfo('template_url');?>/assets/css/style-empty.min.css">
	<?php endif; ?>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link as="style" rel="stylesheet preload prefetch" href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" type="text/css" crossorigin="anonymous">
	<title><?php
	if (is_category()) {
		get_field('title') ? the_field('title') : bloginfo('name');
	} elseif (is_search()){
		$search_page = get_page_by_path('search');
		$search_page = $search_page->ID;
		if ( get_field('title',$search_page) ){the_field('title',$search_page); }else{ echo get_the_title($search_page); }
	} elseif (is_404()){
		echo "Страница не найдена";
	} else {
		get_field('title') ? the_field('title') : the_title();
	}
	?></title>
	<meta name="description" content="<?php
		if (is_category()) {
			if(category_description()){
				echo strip_tags(category_description(), '');
			}else{
				echo get_bloginfo('description');
			}
		} elseif (is_search()){
			if ( get_field('description',$search_page) ){the_field('description',$search_page); }else{ echo get_the_title($search_page); }
		} elseif (is_404()){
			echo "Страница не найдена";
		} else {
			get_field('description') ? the_field('description') : the_title();
		}
	?>"> 
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'eduguru' ); ?></a>

	<header id="masthead" class="site-header">
		<input type="checkbox" name="burger" id="burger">
		<div class="top-menu mob-menu container">
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
			<input type="checkbox" name="mob-search" id="mob-search">
			<div id="search" class="search">
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
			<label for="mob-search" class="search-mob"></label>
			<label for="burger"></label>
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
				<div class="mob-menu-bottom">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'top-menu',
							'menu_id'        => 'top-menu',
						)
					);
					?>
				</div>
			</nav>
		</div>
	</header><!-- #masthead -->
