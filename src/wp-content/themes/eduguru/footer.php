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

	<footer id="colophon" class="site-footer" style="display: none;">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'eduguru' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'eduguru' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'eduguru' ), 'eduguru', '<a href="http://underscores.me/">Underscores.me</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<script src="<?php echo get_bloginfo('template_url');?>/assets/js/scripts.min.js"></script>
<?php wp_footer(); ?>

</body>
</html>
