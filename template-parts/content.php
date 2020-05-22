<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GTST
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	if(!is_singular()) {
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		echo '<div class="post-thumbnail-bg'.(esc_url(get_the_post_thumbnail_url(NULL,'large')) ? '' : ' no-image').'" style="background-image:url('.(esc_url(get_the_post_thumbnail_url(NULL,'large')) ? esc_url(get_the_post_thumbnail_url(NULL,'large')) : esc_url(wp_get_attachment_image_src( $custom_logo_id , 'large' )[0])).')"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark"></a></div>';
	}?>

	<?php
	if( !is_singular() ) {
		the_title( '<header class="entry-header"><h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2></header>' );
	}
	else {
		echo '<header class="entry-header"><h1 class="entry-title">'.__('News','gtst').'</h1></header>';
	}
	?>
	
	<?php if ( is_singular() ) { ?><div class="content-box"><?php }
			if ( is_singular() ) {
				the_title( '<h2 class="entry-title">', '</h2>' );
				}
			?>
		<?php	if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					echo '<span class="post-date">'.get_the_date().'</span>';
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		

		<?php if ( is_singular() ) {
		gtst_post_thumbnail(); ?>
		<div class="entry-content">
			<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'gtst' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gtst' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->
		<?php } else { ?>
		<div class="entry-content">
			<?php echo wp_trim_words(strip_tags(get_the_content()),15); ?>
		</div>
		<?php } ?>
		

		<footer class="entry-footer">
			<?php gtst_entry_footer(); ?>
		</footer><!-- .entry-footer -->
		
		<?php 

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		?>
	<?php if ( is_singular() ) { ?></div><?php } ?>
</article><!-- #post-<?php the_ID(); ?> -->
