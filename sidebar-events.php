<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GTST
 */

if ( ! is_active_sidebar( 'sidebar-events' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-events' ); ?>
</aside><!-- #secondary -->
