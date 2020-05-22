<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GTST
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="content-box search">
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header><!-- .entry-header -->
		<div class="entry-summary">
			<?php the_excerpt(); ?>
			<p><span class="gtst-button"><a href="<?php echo get_permalink(); ?>"><?php _e('Read more','gtst'); ?></a></span></p>
		</div><!-- .entry-summary -->
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
