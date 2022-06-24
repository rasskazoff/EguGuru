<?php get_header(); ?>
<div class="main container">
	<h1 class="tittle"><?php echo single_cat_title(); ?></h1>
	<p class="description"><?php the_field('description'); ?></p>

	<?php
		//получаем список постов в категории
		$args = array(
			'post_type' => 'cources',
			'posts_per_page' => -1,
			"post_status"      => "publish",
			'orderby' => 'id',
			'cat' => '13',
			'order' => 'DESC'
		);
		
		$posts = get_posts( $args );
		$count = count($posts);
		
		

		foreach ( $posts as $post ) {
			setup_postdata( $post );
			$title = get_the_title( $post->ID );
			$id = $post->ID;  										//получаем id постов в категории
			$price[] = get_fields($id)['knopka']['czena'];			//получаем значение поля цена по id поста
			$school[] = get_fields(107)['logo_wrap']['school_url']['title'];  //получаем названия школ из tittle url logo
		}
		
		//print_r(get_fields(107)['promo']['promo_discount']);
		print_r(get_fields(107)['promo']);
		//print_r($school);

		wp_reset_postdata();
	?>

	<div class="adv">
		<div class="adv_item">
			<div class="adv_item_num"><?php echo $count ?></div>
			<div class="adv_item_text"><span><?php echo true_wordform($count, 'курс', 'курса', 'курсов') ?> по английскому языку</span> для детей найдено</div>
		</div>
		<div class="adv_item">
			<div class="adv_item_num"><?php echo min($price); ?></div>
			<div class="adv_item_text"><span>₽ минимальная цена</span> за урок</div>
		</div>
		<div class="adv_item">
			<div class="adv_item_num">10</div>
			<div class="adv_item_text"><span>школ</span> найдено</div>
		</div>
		<div class="adv_item">
			<div class="adv_item_num">10</div>
			<div class="adv_item_text"><span>купонов на скидки</span> найдено</div>
		</div>
	</div>
</div>

<div class="filter container">
	<h2 class="filter_tittle">Выберите нужные параметры:</h2>

	<div class="filter_items">
		<?php
		$tags = get_tags();
        $html = '';
		foreach ( $tags as $tag ) {
			$tag_link = get_tag_link( $tag->term_id );

			$html .= '<div class="filter_item">';
			$html .= "<input type='checkbox' name={$tag->slug} id={$tag->slug}>";
			$html .= "<label for={$tag->slug}>{$tag->name}</label></div>";
		}
		echo $html;
		?>
	</div>
	<div class="more_btn">
		<input type="checkbox" name="filter_more" id="filter_more">
		<label for="filter_more">показать больше параметров</label>
	</div>
</div>
<div class="cards_wrap">
	<div class="cards container">
		<?php
        $category = get_queried_object();
        $current_cat_id = $category->term_id;
        $current_cat_name = $category->name;

		$posts = new WP_Query(array(
		"post_type"        => "cources",                  		# post, page, custom_post_type
		"post_status"      => "publish",                       # статус записи
		"posts_per_page"   => 2,                              # кол-во постов вывода/загрузки
		"tag" => isset($_GET['tags']) ? $_GET['tags'] : '',
        "cat" => $current_cat_id
		));

        $count = $posts->found_posts;
        ?>

		<div class="quantity_results"><?php echo true_wordform($count, 'Найден', 'Найдено', 'Найдено') . ' ' . $count . ' ' . true_wordform($count, 'вариант', 'варианта', 'вариантов'); ?>:</div>
		
		<?php if ($posts->have_posts()) : ?>
			<?php while ($posts->have_posts()) : $posts->the_post(); ?>
				<?php get_template_part('template-parts/content', 'cources'); ?>
			<?php endwhile; ?>
		<?php endif; ?>
		
		<?php wp_reset_postdata(); ?>
		
		</div>
		<div
			class="btn--load card_show_btn container"
			data-max-pages="<?= $posts->max_num_pages; ?>"
		>
			<div class="more_btn">
				<div class="loadmore">
					показать больше
					<!--span>< ?= $published_posts_remain; ?></span> из
					<span>< ?= $published_posts_all; ?></span-->
				</div>
			</div>
		</div>

	</div>	
</div>
	
	</div>
</div>

<?php get_footer(); ?>