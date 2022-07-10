<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div>
		<label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
		<input type="text" required="required" value="<?php echo get_search_query(); ?>" name="s" id="s" />
		<button type="submit" id="searchsubmit"><img src="<?php echo get_bloginfo('template_url');?>/assets/images/search.svg" alt=""></button>
	</div>
</form>
