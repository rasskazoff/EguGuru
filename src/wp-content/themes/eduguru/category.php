<?php get_header(); ?>
<?php
$category = get_queried_object();
$current_cat_id = $category->term_id;
$current_cat_name = $category->name;

if ($category->count > 0) : ?>

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
			'cat' => $current_cat_id,
		);

		$posts = get_posts( $args );
		$count = count($posts);

		foreach ( $posts as $post ) {
			setup_postdata( $post );
			print_r($post->meta_query);
			$title = get_the_title( $post->ID );
			$id = $post->ID;
			//получаем id постов в категории
			$price[] = isset(get_fields($id)['knopka']['czena'])?get_fields($id)['knopka']['czena']:'';						//получаем значение поля цена по id поста
			$school[] = isset(get_fields($id)['school'])?get_fields($id)['school']:'';    									//получаем названия школ из tittle url logo

			$promo_discount = isset(get_fields($id)['promo']['promo_discount'])?get_fields($id)['promo']['promo_discount']:'';
			$promo_tittle = isset(get_fields($id)['promo']['promo_tittle'])?get_fields($id)['promo']['promo_tittle']:'';
			$promo_note = isset(get_fields($id)['promo']['promo_note'])?get_fields($id)['promo']['promo_note']:'';

			if (!empty($promo_discount) && !empty($promo_tittle) && !empty($promo_note)) {
				$promo[] = 'promo'.$id;
			};
		}

		$school = array_map('mb_strtolower', array_map('trim', $school));   //переводим массив в нижний регистр и удаляем пробелы для приведения к единому виду
		$school = array_unique($school);									//Удаляем дубли
		$school_count = count($school);

		$promo_count = isset($promo)?count($promo):'0';
		wp_reset_postdata();
		
		$parent_cat = get_ancestors( $current_cat_id, 'category' ); 		// получаем всех родителей категории
		if (!empty($parent_cat)){
			$parent_cat = array_reverse( $parent_cat ); 			// изменяем порядок в массиве на обратный(от старшего к младшему)
			$parent_cat = get_cat_name( $parent_cat[0] ); 			// название старшей категории.
		}else{
			$parent_cat = $current_cat_name;
		}
		$parent_cat = mb_strtolower(trim($parent_cat));			//переводим массив в нижний регистр и удаляем пробелы для приведения к единому виду
		$parent_cat = array_reverse(explode('для', $parent_cat ))[0];
	?>

	<div class="counter">
		<div class="counter_item">
			<div class="counter_item_num"><?php echo $count ?></div>
			<div class="counter_item_text"><span><?php echo true_wordform($count, 'курс', 'курса', 'курсов') ?> {по английскому языку}</span> для <?php echo $parent_cat ?> найдено</div>
		</div>
		<div class="counter_item">
			<div class="counter_item_num"><?php echo min($price); ?></div>
			<div class="counter_item_text"><span>₽ минимальная цена</span> за курс</div>
		</div>
		<div class="counter_item">
			<div class="counter_item_num"><?php echo $school_count; ?></div>
			<div class="counter_item_text"><span><?php echo true_wordform($school_count, 'школа</span> найдена', 'школы</span> найдено', 'школ</span> найдено') ?></div>
		</div>
		<div class="counter_item">
			<div class="counter_item_num"><?php echo $promo_count; ?></div>
			<div class="counter_item_text"><span><?php echo true_wordform($promo_count, 'купон на скидку</span> найден', 'купона на скидки</span> найдено', 'купонов на скидки</span> найдено') ?></div>
		</div>
	</div>
</div>

<div class="filter container">
	<h2 class="filter_tittle">Выберите нужные параметры:</h2>
	<?php $tags = get_tags(); ?>
	<input type="checkbox" name="filter_more" id="filter_more">
	<label class="filter_mobile" for="filter_more" onclick="show_btn('.more_btn label','показать больше параметров','скрыть')">Параметры<span class="circle"><?php echo count($tags); ?></span></label>

	<div class="filter_wrap">
		<div class="filter_items">
			<?php
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
	</div>
	<div class="more_btn">
		<label for="filter_more" onclick="show_btn(this,'показать больше параметров','скрыть')">показать больше параметров</label>
	</div>
</div>

<?php endif; // end if count?>

<div class="cards_wrap">
	<div class="cards container">
		<?php
		$posts = new WP_Query(array(
		"post_type"        => "cources",                  		# post, page, custom_post_type
		"post_status"      => "publish",                       # статус записи
		"posts_per_page"   => 10,                              # кол-во постов вывода/загрузки
		"tag" => isset($_GET['tags']) ? $_GET['tags'] : '',
        "cat" => $current_cat_id,
		
		'meta_key' => 'top',
		'orderby'  => 'meta_value_num',
		'order' => 'DESC'

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
		<?php if ($category->count > 10) : ?>
		<div
			class="btn--load card_show_btn container"
			data-max-pages="<?= $posts->max_num_pages; ?>"
			onclick="fixHeight()"
		>
			<div class="more_btn">
				<div class="loadmore">
					показать больше
					<!--span>< ?= $published_posts_remain; ?></span> из
					<span>< ?= $published_posts_all; ?></span-->
				</div>
			</div>
		</div>
		<?php endif; // end if count?>
	</div>	
</div>
	
	</div>
</div>

<?php get_footer(); ?>