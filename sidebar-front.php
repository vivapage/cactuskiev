<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cactuskiev
 */

if ( ! is_active_sidebar( 'sidebar-front' ) ) {
	return;
}
?>

<aside id="front-primary-sidebar" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-front' ); ?>
	<div class="widget">
		<h5 class="widget-title">Последие статьи</h5>
		<div class="widget-inner">
		<?php
			$args = array(
				'numberposts' => '4',
				'post_status' => 'publish',
				'category' => 4,5,6,7,12,
			 );
			$recent_posts = wp_get_recent_posts( $args );
			foreach( $recent_posts as $recent ){
				$cats = get_the_category($recent["ID"]);
				echo '<div class="list-post">';
				echo '<a href="' . get_permalink($recent["ID"]) . '">';
				if ( has_post_thumbnail( $recent["ID"]) ) {
							echo get_the_post_thumbnail($recent["ID"],'thumbnail');
						}
				echo '</a>';
				echo '<h4><a href="' . get_permalink($recent["ID"]) . '">' . $recent["post_title"].'</a></h4>';
				echo '<div class="date-cat">';
				echo '<span>';
				echo '<i class="fa fa-calendar" aria-hidden="true"></i>
' . date('Y-m-d', strtotime($recent['post_date']));
				echo '</span>';
				echo '<span>';
				echo '<i class="fa fa-folder-open-o" aria-hidden="true"></i><a href="' . $cats[0]->slug . '"> ' . $cats[0]->name . '</a>';
				echo '</span>';
				echo '</div>';
				echo '<div class="author-story">';
				$value = get_field( "author_story", $recent["ID"]);
				echo $value;
				echo '</div>';
				echo '<div class="excerpt">';
				echo strip_tags( get_the_excerpt($recent["ID"]) );
				echo '</div>';
				echo '</div>';

			//wp_reset_postdata();
			}
		?>
		</div>
	</div>
</aside>
<aside id="front-secondary-sidebar" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-front2' ); ?>
</aside>
<!-- #secondary -->
