<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package EduGuru
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
			$args = array(
				'post_type' => 'cources',
				'publish' => true,
				'paged' => get_query_var('paged'),
				'posts_per_page' => 1,
			);
			query_posts($args);
			if ( have_posts() ) : ?>
			<div class="cards_wrap">
				<div class="cards container">
					<div class="quantity_results"></div>
						<?php get_template_part( 'template-parts/content', 'cources' ); ?>
					</div>
				</div>
			</div>
		<?php
			endif; wp_reset_query();

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'eduguru' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'eduguru' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
