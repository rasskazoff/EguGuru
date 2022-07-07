<?php
/*
Template Name: Главная
Template Post Type: post, page, product
*/
?>
<?php get_header(); ?>
<div class="main container">
	<div class="entry-content">
			<?php
			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'eduguru' ),
					'after'  => '</div>',
				)
			);
			?>
	</div><!-- .entry-content -->
</div>
<?php get_footer(); ?>