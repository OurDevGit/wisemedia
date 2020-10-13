<div class="site-search-area">
	<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div>
			<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="<?php esc_html_e('Search...', 'daron'); ?>"/>
			<input type="submit" id="searchsubmit" value="Search" />
		</div>
	</form>
</div>