<?php
/*
Template Name: Главная страница
Template Post Type: post, page, product
*/
?>
<?php get_header(); ?>
<div class="home-page">
<div class="main">
	<div class="container">
		<h1>Все курсы от всех школ в одном месте —более 1499+ курсов от 89+ школ 
		с эксклюзивными скидками и промокодами</h1>
		<div class="descript">Выбирайте подходящее обучение по своим параметрам и начинайте путь к своей мечте</div>
			<div id="search-main" class="search">
				<!-- search form -->
				<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<div>
						<label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
						<input type="text" required="required" placeholder="Введите название или категорию курса" value="<?php echo get_search_query(); ?>" name="s" id="s" />
						<button type="submit" id="searchsubmit"><img src="<?php echo get_bloginfo('template_url');?>/assets/images/search.svg" alt=""></button>
					</div>
				</form>
				<!--end search form -->
			</div>
		<div class="books"></div>
		<div class="coffe"></div>
	</div>
</div>

<div class="container">
	<div class="category">
		<h2>Категории курсов</h2>
		<div class="tabs">
			<div class="tabs-nav">
				<div class="nav-icon next"></div>
			</div>
			<ul class="tabs-wrap">
			<?php
			$args = array(
				'show_option_all'    => '',
				'orderby'            => 'name',
				'order'              => 'ASC',
				'style'              => 'list',
				'show_count'         => 0,
				'hide_empty'         => 1,
				'child_of'           => 16,
				'taxonomy'           => 'category',
				'post_type'			 => 'cources',
				'hide_title_if_empty'=> true,
				'separator'          => '<br />',
				'exclude' 			 => 10,
				'depth'				 => '2',
				'title_li'			 => '',
				'show_option_none'   => '',
				'echo'				 => '1'
			);
			
			wp_list_categories( $args );
			?>
			</ul>
		</div>
	</div>
	
	<div class="reviews">
		<h2>Отзывы о школах</h2>
		<div class="swiper slider">
			<div class="swiper-wrapper slider__items">
				<?php
					$args = array(
						'post_type' => 'school',
						'publish' => true,
						'posts_per_page' => -1,
						'orderby' => 'date',
						'order' => 'ASC'
					);
					$posts = new WP_Query($args);
				?>
				<?php if ($posts->have_posts()) : ?>
					<?php while ($posts->have_posts()) : $posts->the_post(); ?>
					<div class="swiper-slide">
						<div class="slider__item">
							<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
							<div class="name"><?php the_title(); ?></div>
							<div class="rate">
								<div class="rate__progressbar">
									<div class="progress" style="width:calc(100% / 5 * <?php echo str_replace(',','.', the_field('rate')); ?>)"></div>
								</div>
								<div class="rate__count">рейтинг<div class="count"><?php the_field('rate'); ?></div></div>
								<a href="<?php echo get_permalink(); ?>"><button class="rate__button">ПОДРОБНЕЕ</button></a>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
		<div class="slider-nav">
			<div class="swiper-pagination"></div>
			<div class="slider-prev"></div>
			<div class="slider-next"></div>
		</div>
	</div>
</div>

</div>
<?php get_footer(); ?>