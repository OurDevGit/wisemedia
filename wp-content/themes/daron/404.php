<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Daron
 */
get_header(); ?>
	<div class="g-padding-y-80--xs g-padding-y-100--sm">
		<div class="g-bg-position--center g-fullheight--xs">
			<div class="container js__ver-center-aligned">
				<div class="g-text-center--xs">
					<div class="g-margin-t-40--xs g-margin-b-60--xs g-margin-b-80--sm">
						<h1 class="g-font-size-32--xs g-font-size-50--sm g-font-size-60--md g-margin-b-30--xs"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'daron' ); ?></h1>
						<p class="g-font-size-20--md g-font-weight--300"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'daron' ); ?></p>
					</div>
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>