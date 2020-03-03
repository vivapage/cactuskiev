<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cactuskiev
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="primary-sidebar" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
<aside id="secondary-sidebar" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-2' ); ?>
</aside>
<!-- #secondary -->
