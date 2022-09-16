<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package EduGuru
 */

get_header();
?>

	<main id="primary" class="site-main container">

		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Страница 404', 'eduguru' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p>Такой страницы не существует. Возможно, Вы некорректно набрали адрес страницы или перешли по неправильной ссылке на наш сайт.</p>
				<p>В любом случае не расстраивайтесь, у нас много полезной и актуальной информации. Посетите интересующий Вас раздел сайта:</p>

					<?php
					the_widget('WP_Widget_Pages', 'title=Страницы&exclude=179');
					?>

					<div class="widget widget_categories">
						<h2 class="widget-title"><?php esc_html_e( 'Каталог курсов', 'eduguru' ); ?></h2>
						<ul>
							<?php
							wp_list_categories(
								array(
									'orderby'    => 'count',
									'order'      => 'DESC',
									'show_count' => 1,
									'title_li'   => '',
									'number'     => 10,
								)
							);
							?>
						</ul>
					</div><!-- .widget -->
					<style>
						.widget ul{ margin: 5px 20px; padding: 0; }
						h1, h2, h3, h4, h5, h6{ padding-top: 40px;}
					</style>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
