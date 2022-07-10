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
						
					<?php /* if (get_sub_field('school_url')) : ?>
					<a href="<?= get_sub_field('school_url') ?>" target="_blank">
					<?php endif; ?>

						<?php if (get_sub_field('logotip')) : ?>
							<div class="img" style="background-image: url(<?= get_sub_field('logotip') ?>)">
						</div>
						<?php endif; ?>
					
					<?php if (get_sub_field('school_url')) : ?>
						<p><?= parse_url(get_sub_field('school_url'),PHP_URL_HOST)?></p>
					</a>
					<?php endif; */?> 
				<div>
					<?php if (get_sub_field('logotip')) : ?>
						<div class="img" style="background-image: url(<?= get_sub_field('logotip') ?>)">
					</div>
					<?php endif; ?>
					
					<?php if (get_sub_field('school_url')) : ?>
						<p><?= parse_url(get_sub_field('school_url'),PHP_URL_HOST)?></p>
					<?php endif; ?>
				</div>
				</div>
				<?php endwhile; ?>

				<div class="card_content">
					<h2 class="card_title"><?php the_title();?><?php if( get_field('school') ){ echo ' в '; the_field('school'); }?></h2>

					<?php while (have_rows('parametry')) : the_row(); ?>
					<div class="card_steps">

						<?php if (get_sub_field('format')) : ?>
						<div class="card_step format">
							<div class="card_step_title">Формат</div>
								<div class="card_step_desc"><?= get_sub_field('format') ?></div>
						</div>
						<?php endif; ?>

						<?php if (get_sub_field('sertifikatdiplom')) : ?>
						<div class="card_step step">
							<div class="card_step_title">Сертификат/диплом</div>
								<div class="card_step_desc"><?= get_sub_field('sertifikatdiplom') ?></div>
						</div>
						<?php endif; ?>

						<?php if (get_sub_field('trudoustrojstvo')) : ?>
						<div class="card_step person">
							<div class="card_step_title">Трудоустройство</div>
								<div class="card_step_desc"><?= get_sub_field('trudoustrojstvo') ?></div>
						</div>
						<?php endif; ?>

						<?php if (get_sub_field('uroven')) : ?>
						<div class="card_step level">
							<div class="card_step_title">Уровень</div>
								<div class="card_step_desc"><?= get_sub_field('uroven') ?></div>
						</div>
						<?php endif; ?>

						<?php if (get_sub_field('srok_obucheniya')) : ?>
						<div class="card_step step">
							<div class="card_step_title">Срок обучения</div>
								<div class="card_step_desc"><?= get_sub_field('srok_obucheniya') ?></div>
						</div>
						<?php endif; ?>

						<?php if (get_sub_field('data_starta')) : ?>
						<div class="card_step step">
							<div class="card_step_title">Дата старта</div>
								<div class="card_step_desc"><?= get_sub_field('data_starta') ?></div>
						</div>
						<?php endif; ?>

						<?php if (get_sub_field('rassrochka')) : ?>
						<div class="card_step step">
							<div class="card_step_title">Рассрочка</div>
								<div class="card_step_desc"><?= get_sub_field('rassrochka') ?></div>
						</div>
						<?php endif; ?>
			
					</div>
					<?php endwhile; ?>
					
					<?php if (get_field('item')) : ?>
					<div class="detail">
						<div class="detail_item">
							<b>Особенности:</b><br>
							<?php
							$item = get_field("item");
							$item = explode("\n",$item);
							//echo $item[0];
							for($i=0; $i<count($item); $i++){
								echo "<li>".$item[$i]."</li>";
							}
							?>
						</div>
					</div>
					<?php endif; ?>

					<div class="card_actions">

						<?php if (get_field('item')) : ?>
						<div class="more_btn">
							<input type="checkbox" name="more_btn__card-<?php echo $post_ID ?>" id="more_btn__card-<?php echo $post_ID ?>">
							<label for="more_btn__card-<?php echo $post_ID ?>" onclick="show_btn(this,'показать больше','скрыть')">показать больше</label>
						</div>
						<?php endif; ?>
						
						<?php while (have_rows('knopka')) : the_row(); ?>
						<div class="btn_wrap">
							<div class="card_price">
								<?php if (mb_strtolower(get_sub_field('czena')) == 'бесплатно') : ?>
									<span><?= get_sub_field('czena') ?></span>
								<?php elseif (get_sub_field('czena')) : ?>
									от <span><?= get_sub_field('czena') ?>₽</span>/урок
								<?php endif; ?>
							</div>
							<?php endwhile; ?>
							<?php
								$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
								$url = explode('?', $url)[0].'?action=partner&id='.$post_ID;
								partner();
							?>
							<div class="card_btn">
								<a href="<?php echo $url; ?>" target="_blank" class="btn">Подробнее</a>
							</div>
						</div>
					</div>

					<?php while (have_rows('promo')) : the_row(); ?>
					<?php if (get_sub_field('promo_title')) : ?>
					<div class="card_promo">
						<?php if (get_sub_field('promo_discount')) : ?>
						<div class="col">
							<div class="promo_discount">-<?= get_sub_field('promo_discount') ?>%</div>
						</div>
						<?php endif; ?>
						<div class="col">
							<h3 class="promo_title"><?= get_sub_field('promo_title') ?></h3>
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