<?php
/*
Template Name: Пустой шаблон
Template Post Type: post, page, product
*/
?>
<?php get_header(); ?>
<div class="form empty container">
	<div class="entry-content">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php
			the_content();
			?>
			<?php if (get_field('shortkod_formy')) : ?>
					<?= get_field('shortkod_formy') ?>
			<?php endif; ?>
	</div><!-- .entry-content -->
	<?php if (get_field('kod_karty')) : ?>
	<div class="map">
		<?= get_field('kod_karty') ?>
	</div>
	<?php endif; ?>
</div>
<?php get_footer(); ?>