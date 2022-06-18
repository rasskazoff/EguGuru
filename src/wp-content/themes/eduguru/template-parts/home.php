<?php
/*
Template Name: Главная
Template Post Type: post, page, product
*/
?>
<?php get_header(); ?>
<div class="main container">
	<h1 class="tittle">Заголовок</h1>
	<p class="description">Мы собрали для вас курсы по английскому языку для детей, выберите интересующие вас параметры, .пройдите бесплатные пробные уроки, 
	выберите понравившиеся и воспользуйтесь нашими скидками.</p>
	<div class="adv">
		<div class="adv_item">
			<div class="adv_item_num">18</div>
			<div class="adv_item_text"><span>курсов по английскому языку</span> для детей найдено</div>
		</div>
		<div class="adv_item">
			<div class="adv_item_num">350</div>
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
		<div class="filter_item">
			<input type="checkbox" name="filter_1" id="filter_1">
			<label for="filter_1">с носителем языка</label>
		</div>

		<div class="filter_item">
			<input type="checkbox" name="filter_2" id="filter_2">
			<label for="filter_2">с русскоязычным учителем</label>
		</div>

		<div class="filter_item">
			<input type="checkbox" name="filter_3" id="filter_3">
			<label for="filter_3">бесплатный пробный урок</label>
		</div>

		<div class="filter_item">
			<input type="checkbox" name="filter_4" id="filter_4">
			<label for="filter_4">в группе</label>
		</div>

		<div class="filter_item">
			<input type="checkbox" name="filter_5" id="filter_5">
			<label for="filter_5">индивидуально</label>
		</div>

		<div class="filter_item">
			<input type="checkbox" name="filter_6" id="filter_6">
			<label for="filter_6">с мини группе</label>
		</div>

		<div class="filter_item">
			<input type="checkbox" name="filter_1" id="filter_1">
			<label for="filter_1">с носителем языка</label>
		</div>

		<div class="filter_item">
			<input type="checkbox" name="filter_2" id="filter_2">
			<label for="filter_2">с русскоязычным учителем</label>
		</div>

		<div class="filter_item">
			<input type="checkbox" name="filter_3" id="filter_3">
			<label for="filter_3">бесплатный пробный урок</label>
		</div>

		<div class="filter_item">
			<input type="checkbox" name="filter_4" id="filter_4">
			<label for="filter_4">в группе</label>
		</div>

		<div class="filter_item">
			<input type="checkbox" name="filter_5" id="filter_5">
			<label for="filter_5">индивидуально</label>
		</div>

		<div class="filter_item">
			<input type="checkbox" name="filter_6" id="filter_6">
			<label for="filter_6">с мини группе</label>
		</div>
		<div class="filter_item">
			<input type="checkbox" name="filter_1" id="filter_1">
			<label for="filter_1">с носителем языка</label>
		</div>

		<div class="filter_item">
			<input type="checkbox" name="filter_2" id="filter_2">
			<label for="filter_2">с русскоязычным учителем</label>
		</div>

		<div class="filter_item">
			<input type="checkbox" name="filter_3" id="filter_3">
			<label for="filter_3">бесплатный пробный урок</label>
		</div>

		<div class="filter_item">
			<input type="checkbox" name="filter_4" id="filter_4">
			<label for="filter_4">в группе</label>
		</div>

		<div class="filter_item">
			<input type="checkbox" name="filter_5" id="filter_5">
			<label for="filter_5">индивидуально</label>
		</div>

		<div class="filter_item">
			<input type="checkbox" name="filter_6" id="filter_6">
			<label for="filter_6">с мини группе</label>
		</div>

		<div class="filter_item">
			<input type="checkbox" name="filter_1" id="filter_1">
			<label for="filter_1">с носителем языка</label>
		</div>

		<div class="filter_item">
			<input type="checkbox" name="filter_2" id="filter_2">
			<label for="filter_2">с русскоязычным учителем</label>
		</div>

		<div class="filter_item">
			<input type="checkbox" name="filter_3" id="filter_3">
			<label for="filter_3">бесплатный пробный урок</label>
		</div>

		<div class="filter_item">
			<input type="checkbox" name="filter_4" id="filter_4">
			<label for="filter_4">в группе</label>
		</div>

		<div class="filter_item">
			<input type="checkbox" name="filter_5" id="filter_5">
			<label for="filter_5">индивидуально</label>
		</div>

		<div class="filter_item">
			<input type="checkbox" name="filter_6" id="filter_6">
			<label for="filter_6">с мини группе</label>
		</div>
	</div>
	<div class="more_btn">
		<input type="checkbox" name="filter_more" id="filter_more">
		<label for="filter_more">показать больше параметров</label>
	</div>
</div>
<div class="cards_wrap">
	<div class="cards container">
	
		<?php
		$posts = new WP_Query(array(
		"post_type"        => "cources",                  		# post, page, custom_post_type
		"post_status"      => "publish",                       # статус записи
		"posts_per_page"   => 2,                              # кол-во постов вывода/загрузки
		"tag" => $_GET["tags"]								#метки
		/*
		"category_name"    => "{название_рубрики}",            # если рубрика

		"tax_query" => array(                                  # если элемент (термин) таксономии
			array(
				"taxonomy" => "{название_таксономии}",         # таксономия
				"field"    => "slug",                          # slug/id
				"terms"    => "{ярлык/id_элемента_таксономии}" # термин (ярлык/id)
			)
		),
		*/
		));?>

		<?php function true_wordform($num, $form_for_1, $form_for_2, $form_for_5){
					$num = abs($num) % 100; // берем число по модулю и сбрасываем сотни (делим на 100, а остаток присваиваем переменной $num)
					$num_x = $num % 10; // сбрасываем десятки и записываем в новую переменную
					if ($num > 10 && $num < 20) // если число принадлежит отрезку [11;19]
						return $form_for_5;
					if ($num_x > 1 && $num_x < 5) // иначе если число оканчивается на 2,3,4
						return $form_for_2;
					if ($num_x == 1) // иначе если оканчивается на 1
						return $form_for_1;
					return $form_for_5;
				}
				?>

		<?php
		wp_tag_cloud( [
			'smallest'  => 8,
			'largest'   => 22,
			'unit'      => 'pt',
			'number'    => 45,
			'format'    => 'flat',
			'separator' => "\n",
			'orderby'   => 'name',
			'order'     => 'ASC',
			'exclude'   => null,
			'include'   => null,
			'link'      => 'view',
			'taxonomy'  => 'post_tag',
			'echo'      => true,
			'topic_count_text_callback' => 'default_topic_count_text',
		] );
		// Получить кол-во постов в определенной категории (типе записи)
		$count_posts = wp_count_posts("cources"); // post, page, custom_post_type
		$published_posts_all = $count_posts->publish;  // общее кол-во записей
		$published_posts_remain = $published_posts_all - 2;   // оставшееся кол-во записей
		?>
		<div class="quantity_results"><?php echo true_wordform($published_posts_all, 'Найден', 'Найдено', 'Найдено') . ' ' . $published_posts_all . ' ' . true_wordform($published_posts_all, 'вариант', 'варианта', 'вариантов'); ?>:</div>

		<?php if ($posts->have_posts()) : ?>
			<?php while ($posts->have_posts()) : $posts->the_post(); ?>
				<?php get_template_part('template-parts/content', 'cources'); ?>
			<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>

		<?php // AJAX загрузка постов
		if ($posts->max_num_pages > 1) { ?>
		<script>
			var current_page = 1;
		</script>
		</div>
		<div
			class="btn--load card_show_btn container"
			data-param-posts='<?= json_encode($posts->query_vars); ?>' 
			data-max-pages="<?= $posts->max_num_pages; ?>"
			data-tpl="cources"
		>
			<div class="more_btn">
				<div class="loadmore">
					показать больше
					<!--span>< ?= $published_posts_remain; ?></span> из
					<span>< ?= $published_posts_all; ?></span-->
				</div>
			</div>
		</div>
			
		<?php } ?>


<div class="btn--load"
data-tag = "v-gruppe"
data-tpl="cources"
>
Тест
</div>


	</div>	
</div>
		
<?php		/*
		$args = array(
			'post_type' => 'cources',
			'post_status' => 'publish',
			'posts_per_page' => 2,
			'paged' => 1
//			'tag' => 'v-gruppe+s-nositelem-yazyka',
		);
		$blog_posts = new WP_Query( $args );
		$count_posts = count( get_posts( $args ) );

		function true_wordform($num, $form_for_1, $form_for_2, $form_for_5){
			$num = abs($num) % 100; // берем число по модулю и сбрасываем сотни (делим на 100, а остаток присваиваем переменной $num)
			$num_x = $num % 10; // сбрасываем десятки и записываем в новую переменную
			if ($num > 10 && $num < 20) // если число принадлежит отрезку [11;19]
				return $form_for_5;
			if ($num_x > 1 && $num_x < 5) // иначе если число оканчивается на 2,3,4
				return $form_for_2;
			if ($num_x == 1) // иначе если оканчивается на 1
				return $form_for_1;
			return $form_for_5;
		}
		?>
		<div class="quantity_results"><?php echo true_wordform($count_posts, 'Найден', 'Найдено', 'Найдено') . ' ' . $count_posts . ' ' . true_wordform($count_posts, 'вариант', 'варианта', 'вариантов'); ?>:</div>
	
		<?php if ( $blog_posts->have_posts() ) : ?>
				<?php while ( $blog_posts->have_posts() ) : $blog_posts->the_post(); ?>
					<?php get_template_part( 'template-parts/content', 'cources' ); ?>					
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
		<?php endif; ?>

		<!--div class="card_wrap">
			<div class="card_top_label">Выбор редакции</div>
			<div class="card">
				<div class="card_logo">
					<a href="https://foxford.ru" target="_blank">
						<img src="<?php // echo get_bloginfo('template_url');?>/assets/images/foxford.ru.svg" alt="foxford.ru">
						<p>foxford.ru</p>
					</a>
				</div>
				<div class="card_content">
					<h2 class="card_tittle">Групповые занятия английским языком для детей</h2>
					<div class="card_steps">
						<div class="card_step step-1">
							<div class="card_step_tittle">пробный урок</div>
							<div class="card_step_desc"><strong>бесплатный</strong></div>
						</div>
						<div class="card_step step-2">
							<div class="card_step_tittle">учитель</div>
							<div class="card_step_desc"><strong>русскоговорящий</strong></div>
						</div>
						<div class="card_step step-3">
							<div class="card_step_tittle">формат</div>
							<div class="card_step_desc"><strong>в группе</strong></div>
						</div>
						<div class="card_step step-4">
							<div class="card_step_tittle">возраст</div>
							<div class="card_step_desc"><strong>4-16 лет</strong></div>
						</div>
					</div>
					<div class="detail">
						<div class="detail_item">
							<div class="detail_tittle">Обучение по стандартам Cambridge и CEFR</div>
							<div class="detail_desc">Мы используем эффективный метод полного физического реагирования (TPR) и Кембриджскую коммуникативную методику. По результатам прохождения курсов наши ученики сдают внутренний экзамен и подтверждают уровень владения языком по международному стандарту.</div>
						</div>
						<div class="detail_item">
							<div class="detail_tittle">Интерактивная платформа</div>
							<div class="detail_desc">Классная комната, разработанная с заботой о ребенке и его успехах. Тематические игры, учебные материалы, домашние задания, задачи по интересам вовлекают ребенка в процесс обучения с первых минут.</div>
						</div>
					</div>
					<div class="card_actions">
						<div class="more_btn">
							<input type="checkbox" name="more_btn__card-2" id="more_btn__card-2">
							<label for="more_btn__card-2">показать больше</label>
						</div>
						<div class="btn_wrap">
							<div class="card_price">
								от <span>399₽</span>/урок
							</div>
							<div class="card_btn">
								<a href="#" target="_blank" class="btn">Подробнее</a>
							</div>
						</div>
					</div>
					<div class="card_promo">
						<div class="col">
							<div class="promo_discount">-10%</div>
						</div>
						<div class="col">
							<h3 class="promo_tittle">Введи промокод NOVA12 и получи скидку 10%</h3>
							<p class="promo_note">*Акция действует для новых клиентов только до 01.03.22</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div-- class="card_wrap">
			<div class="card_top_label">Выбор редакции</div>
			<div class="card">
				<div class="card_logo">
					<a href="https://allright.com" target="_blank">
						<img src="<?php //echo get_bloginfo('template_url');?>/assets/images/allright.com.svg" alt="allright.com">
						<p>allright.com</p>
					</a>
				</div>
				<div class="card_content">
					<h2 class="card_tittle">Групповые занятия английским языком для детей</h2>
					<div class="card_steps">
						<div class="card_step step-1">
							<div class="card_step_tittle">пробный урок</div>
							<div class="card_step_desc"><strong>бесплатный</strong></div>
						</div>
						<div class="card_step step-2">
							<div class="card_step_tittle">учитель</div>
							<div class="card_step_desc"><strong>носитель языка, </strong>для которого английский второй родной (Филиппины, ЮАР)</div>
						</div>
						<div class="card_step step-3">
							<div class="card_step_tittle">формат</div>
							<div class="card_step_desc">индивидуальный онлайн-урок</div>
						</div>
						<div class="card_step step-4">
							<div class="card_step_tittle">возраст</div>
							<div class="card_step_desc"><strong>4-12 лет</strong></div>
						</div>
					</div>
					<div class="detail">
						<div class="detail_item">
							<div class="detail_tittle">Обучение по стандартам Cambridge и CEFR</div>
							<div class="detail_desc">Мы используем эффективный метод полного физического реагирования (TPR) и Кембриджскую коммуникативную методику. По результатам прохождения курсов наши ученики сдают внутренний экзамен и подтверждают уровень владения языком по международному стандарту.</div>
						</div>
						<div class="detail_item">
							<div class="detail_tittle">Интерактивная платформа</div>
							<div class="detail_desc">Классная комната, разработанная с заботой о ребенке и его успехах. Тематические игры, учебные материалы, домашние задания, задачи по интересам вовлекают ребенка в процесс обучения с первых минут.</div>
						</div>
					</div>
					<div class="card_actions">
						<div class="more_btn">
							<input type="checkbox" name="more_btn__card-3" id="more_btn__card-3">
							<label for="more_btn__card-3">показать больше</label>
						</div>
						<div class="btn_wrap">
							<div class="card_price">
								от <span>399₽</span>/урок
							</div>
							<div class="card_btn">
								<a href="#" target="_blank" class="btn">Подробнее</a>
							</div>
						</div>
					</div>
					<div class="card_promo">
						<div class="col">
							<div class="promo_discount">-10%</div>
						</div>
						<div class="col">
							<h3 class="promo_tittle">Введи промокод NOVA12 и получи скидку 10%</h3>
							<p class="promo_note">*Акция действует для новых клиентов только до 01.03.22</p>
						</div>
					</div>
				</div>
			</div>
		</div-->
		</div>
		<?php
		
$page = get_query_var('paged') ? get_query_var('paged') : 1;
$max_pages = $wp_query->max_num_pages;



echo '<div id="loadmore" class="card_show_btn container">
<div class="more_btn">
<div class="loadmore" data-max-pages="' . $max_pages . '" data-page="' . $page . '" >показать больше</div>
</div>';

wp_reset_query();
*/?> 
	</div>
</div>

<?php get_footer(); ?>