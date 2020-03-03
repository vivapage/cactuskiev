<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cactuskiev
 */

if ( ! is_active_sidebar( 'sidebar-shop2' ) ) {
	return;
}
?>

<aside id="secondary-sidebar" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-shop2' ); ?>
</aside>

<!-- #secondary -->
