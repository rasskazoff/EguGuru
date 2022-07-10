<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package EduGuru
 */

get_header();
$cats = get_terms( 'category', 'surname='.$_GET['s'] );
if (count($cats) == 1) {
	echo '<script>window.location.href="'.get_category_link($cats[0]->term_id).'"</script>';
};
?>

	<main id="primary" class="site-main main container">

		<?php if ( $cats ): ?>
			<header class="page-header">
				<h1 class="page-title title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Результаты поиска по запросу: %s', 'eduguru' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->
			<div class="search_result">
				<ul>
			<?php
			foreach ( $cats as $cat ):
				
				echo '<li><a href="'.get_category_link($cat->term_id).'">'.$cat->name.'<a></li>';

			endforeach; ?>
			</ul>
			</div>
			<?php the_posts_navigation();
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
	</main><!-- #main -->
<?php
get_footer();
