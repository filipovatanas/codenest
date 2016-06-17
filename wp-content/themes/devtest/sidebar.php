<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package storto
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<button class="sidebar-toggle"><?php _e( 'Show sidebar...', 'storto' ); ?><i class="fa fa-table"></i></button>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
