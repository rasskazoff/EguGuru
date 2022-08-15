<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EduGuru
 */

?>
	<footer>
		<div class="footer container">
			<div class="footer_menu">
				<div class="footer_logo">
					<a href="/" class="footer-logo">
						<?php
						$header_logo = get_theme_mod('footer_logo');
						$img = wp_get_attachment_image_src($header_logo, 'full');
						if ($img) :
							?>
							<img src="<?php echo $img[0]; ?>" alt="">
						<?php endif; ?>
					</a>
					<?php
					if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					else :
						?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif; ?>
				</div>
				<nav>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer-menu',
							'menu_id'        => 'footer-menu',
						)
					);
					?>
				</nav>
			</div>
			<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer-menu-mob',
							'menu_id'        => 'footer-menu-mob',
						)
					);
					?>
			<div class="footer_bottom_menu">
				<div class="copy">
						Copyright © 2022 Educationguru.ru<br/>
						Все права защищены.
				</div>
				<nav>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'bottom-menu',
							'menu_id'        => 'bottom-menu',
						)
					);
					?>
				</nav>
			</div>
		
		</div>
	</footer>
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
