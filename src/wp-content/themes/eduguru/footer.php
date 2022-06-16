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
					<img src="//localhost:3000/wp-content/themes/eduguru/assets/images/logo.svg" alt="logo">
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
<script src="<?php echo get_bloginfo('template_url');?>/assets/js/scripts.min.js"></script>
<?php wp_footer(); ?>

</body>
</html>
