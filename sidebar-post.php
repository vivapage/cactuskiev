<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cactuskiev
 */

if ( ! is_active_sidebar( 'sidebar-post' ) ) {
	return;
}
?>

<aside id="primary-sidebar" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-post' ); ?>
</aside>
<aside id="secondary-sidebar" class="widget widget-area">
	<?php dynamic_sidebar( 'sidebar-post2' ); ?>
		<h5 class="widget-title">Recent Posts</h5>
		<div class="widget-inner">
			<ul>
			<?php
				$args = array(
					'numberposts' => '4',
					'exclude' => $post->ID,
					'post_status' => 'publish',
					'category' => 4,5,6,7,12,
					'suppress_filters' => true,
				);
				$recent_posts = wp_get_recent_posts( $args );
				foreach( $recent_posts as $recent ){
					echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
					echo '<span>';
					echo '<i class="fa fa-calendar" aria-hidden="true"></i>
	' . date('Y-m-d', strtotime($recent['post_date']));
					echo '</span>';
			//wp_reset_postdata();
				}
			?>
			</ul>
		</div>
</aside>
<!-- #secondary -->
