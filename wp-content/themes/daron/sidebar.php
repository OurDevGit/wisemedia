<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Daron
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<div class="widget">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-widget') ) : ?> 
	<?php endif;?>
</div>
<?php endif; ?>