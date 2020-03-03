<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cactuskiev
 */

?>

<article>
	<?php the_post_thumbnail(thumbnail); ?>
	<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
	<div class="entry-meta">
		<?php
			cactuskiev_posted_on();
			cactuskiev_entry_footer();
		?>
	</div><!-- .entry-meta -->
	<div class="author-story">
		<p><?php the_field('author_story'); ?></p>
	</div>
	<div class="excerpt">
		<?php the_excerpt();?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
<hr />
