<?php $post_ID = get_the_ID(); ?>

		<?php if( get_field('top') ): ?>
		<div class="card_wrap top">
			<div class="card_top_label">Выбор редакции</div>
		<?php else : ?>
		<div class="card_wrap">
		<?php endif; ?>
			
			<div class="card">

				<?php while (have_rows('logo_wrap')) : the_row(); ?>
				<div class="card_logo">

					<?php if (get_sub_field('school_url')) : ?>
					<a href="<?= get_sub_field('school_url')['url'] ?>" target="<?= get_sub_field('school_url')['target'] ?>">
					<?php endif; ?>

						<?php if (get_sub_field('logotip')) : ?>
							<img src="<?= get_sub_field('logotip') ?>" alt="<?php the_title(); ?>">
						<?php endif; ?>
					
					<?php if (get_sub_field('school_url')) : ?>
						<p><?= get_sub_field('school_url')['title'] ?></p>
					</a>
					<?php endif; ?>

				</div>
				<?php endwhile; ?>

				<div class="card_content">
					<h2 class="card_tittle"><?php the_title(); ?></h2>

					<?php while (have_rows('parametry')) : the_row(); ?>
					<div class="card_steps">
						<div class="card_step step-1">
							<div class="card_step_tittle">пробный урок</div>
							<?php if (get_sub_field('probnyj_urok')) : ?>
								<div class="card_step_desc"><?= get_sub_field('probnyj_urok') ?></div>
							<?php endif; ?>
						</div>
						<div class="card_step step-2">
							<div class="card_step_tittle">учитель</div>
							<?php if (get_sub_field('uchitel')) : ?>
								<div class="card_step_desc"><?= get_sub_field('uchitel') ?></div>
							<?php endif; ?>
						</div>
						<div class="card_step step-3">
							<div class="card_step_tittle">формат</div>
							<?php if (get_sub_field('format')) : ?>
								<div class="card_step_desc"><?= get_sub_field('format') ?></div>
							<?php endif; ?>
						</div>
						<div class="card_step step-4">
							<div class="card_step_tittle">возраст</div>
							<?php if (get_sub_field('vozrast')) : ?>
								<div class="card_step_desc"><?= get_sub_field('vozrast') ?></div>
							<?php endif; ?>
						</div>
			
					</div>
					<?php endwhile; ?>
								
					<div class="detail">
					<?php if (have_rows("osobennosti")) : ?>
    					<?php while (have_rows("osobennosti")) : the_row(); ?>
						
						<div class="detail_item">
						<?php if (get_sub_field('tittle_item')) : ?>
							<div class="detail_tittle"><?php the_sub_field("tittle_item") ?></div>
						<?php endif; ?>
						<?php if (get_sub_field('desc_item')) : ?>
							<div class="detail_desc"><?php the_sub_field("desc_item") ?></div>
						<?php endif; ?>
						</div>
						
						<?php endwhile; ?>
					<?php endif; ?>

					</div>
					<div class="card_actions">
						<div class="more_btn">
							<input type="checkbox" name="more_btn__card-<?php echo $post_ID ?>" id="more_btn__card-<?php echo $post_ID ?>">
							<label for="more_btn__card-<?php echo $post_ID ?>">показать больше</label>
						</div>
						<?php while (have_rows('knopka')) : the_row(); ?>
						<div class="btn_wrap">
							<div class="card_price">
								<?php if (get_sub_field('czena')) : ?>
									от <span><?= get_sub_field('czena') ?>₽</span>/урок
								<?php endif; ?>
							</div>
							<div class="card_btn">
								<?php if (get_sub_field('partner_url')) : ?>
									<a href="<?= get_sub_field('partner_url') ?>" target="_blank" class="btn">Подробнее</a>
								<?php endif; ?>
							</div>
						</div>
					<?php endwhile; ?>
					</div>
					
					<?php while (have_rows('promo')) : the_row(); ?>
					<?php if (get_sub_field('promo_tittle')) : ?>
					<div class="card_promo">
						<?php if (get_sub_field('promo_discount')) : ?>
						<div class="col">
							<div class="promo_discount">-<?= get_sub_field('promo_discount') ?>%</div>
						</div>
						<?php endif; ?>
						<div class="col">
							<h3 class="promo_tittle"><?= get_sub_field('promo_tittle') ?></h3>
							<?php if (get_sub_field('promo_note')) : ?>
								<p class="promo_note"><?= get_sub_field('promo_note') ?></p>
							<?php endif; ?>
						</div>
					</div>
					<?php endif; ?>
					<?php endwhile; ?>

				</div>
			</div>
		</div>