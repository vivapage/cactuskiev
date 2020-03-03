<?php
/**
 * The front page template file
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cactuskiev
 */

get_header(); ?>

	<div id="front-primary" class="content-area">
		<main id="main" class="site-main">
			<div class="widget">
				<h5 class="widget-title">Последие сообщения</h5>
				<div class="widget-inner">
				<?php echo do_shortcode('[w3allastopics topics_number="20"]'); ?>
				<a href="/forums"><button class="button arrow">На форум</button></a>
			</div>
			</div>
			<div class="widget">
				<h5 class="widget-title">Последие новости</h5>
				<div class="widget-inner">
					<?php
						$args = array(
							'numberposts' => '5',
							'post_type' => 'news',
							'meta_key' => 'author_news',
						 );
						$recent_posts = wp_get_recent_posts( $args );
						foreach( $recent_posts as $recent ){
							echo '<div class="news-item">';
							echo '<div class="date-cat"><span><i class="fa fa-calendar" aria-hidden="true"></i>
' . date( 'Y-m-d', strtotime( $recent['post_date'] ) ) . '</span></div>';
							echo '<div class="news-text">' . $recent["post_content"] .  '</div>';
							$value = get_field( "author_news", $recent["ID"]);
							echo '<div class="author-story">' . $value . '</div>';
							echo '</div> ';
						}
					?>

				<a href="/news"><button class="button arrow">Все новости</button></a>
			</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar('front');
get_footer();
