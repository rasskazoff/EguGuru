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
	</div>
	<div class="more_btn">
		<input type="checkbox" name="filter_more" id="filter_more">
		<label for="filter_more">показать больше параметров</label>
	</div>
</div>
<div class="cards_wrap">
	<div class="cards container">
		<div class="quantity_results">Найдено 8 вариантов:</div>
		<div class="card_wrap">
			<div class="card_top_label">Выбор редакции</div>
			<div class="card">
				<div class="card_logo">
					<a href="https://novakid.ru" target="_blank">
						<img src="<?php echo get_bloginfo('template_url');?>/assets/images/Novakid.ru.svg" alt="Novakid.ru">
						<p>Novakid.ru</p>
					</a>
				</div>
				<div class="card_content">
					<h2 class="card_tittle">Индивидуальные занятия английским с носителями</h2>
					<div class="card_steps">
						<div class="card_step step-1">
							<div class="card_step_tittle">пробный урок</div>
							<div class="card_step_desc"><strong>бесплатный</strong></div>
						</div>
						<div class="card_step step-2">
							<div class="card_step_tittle">учитель</div>
							<div class="card_step_desc"><strong>носитель языка,</strong> для которого английский второй родной (Филиппины, ЮАР)</div>
						</div>
						<div class="card_step step-3">
							<div class="card_step_tittle">формат</div>
							<div class="card_step_desc"><strong>индивидуальный</strong> онлайн-урок</div>
						</div>
						<div class="card_step step-4">
							<div class="card_step_tittle">возраст</div>
							<div class="card_step_desc"><strong>4-12 лет</strong></div>
						</div>
					</div>
					<div class="card_actions">
						<div class="more_btn">
							<input type="checkbox" name="more_btn__card-1" id="more_btn__card-1">
							<label for="more_btn__card-1">показать больше</label>
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
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>