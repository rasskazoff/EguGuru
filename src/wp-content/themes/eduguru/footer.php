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
