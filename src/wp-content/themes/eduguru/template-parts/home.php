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
		<h1><?php if (get_field('h1')) : ?>
			<?= get_field('h1') ?>
		<?php endif; ?>
		</h1>
		<div class="descript">
		<?php if (get_field('descript')) : ?>
			<?= get_field('descript') ?>
		<?php endif; ?>
		</div>
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

			$categories = get_categories( [
				'taxonomy'     => 'category',
				'include'      => get_field("category"),
			] );
			
			if( $categories ){
				foreach( $categories as $cat ){

					$child_cat = get_categories( [
						'taxonomy'     => 'category',
						'child_of'     => $cat->cat_ID,
					] );
					$child_li = '';
					if( $child_cat ){
						foreach( $child_cat as $child ){
							$child_li .= '<li class="cat-item"><a href="'.get_category_link( $child->term_id ).'">'.$child->cat_name.'</a></li>';
						}
					}
					echo '<li class="cat-item"><div class="tab">'.$cat->cat_name.'</div><ul class="children">'.$child_li.'</ul></li>';
			
				}
			}

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
								<?php /*<a href="<?php echo get_permalink(); ?>"><button class="rate__button">ПОДРОБНЕЕ</button></a> Временно отключаем ссылки */?>
								<a href="#"><button class="rate__button">ПОДРОБНЕЕ</button></a>
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