<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GTST
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">'.__('News','gtst').' - ', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<div class="content-box">
			<div class="inner">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;
			
			?>
			</div><?php

			// paginate links
			$big = 999999999; // need an unlikely integer
			$paginate_links = '<div class="paginate-links">';
			$paginate_links .= paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $wp_query->max_num_pages,
				'prev_text' => '<span class="screen-reader-text">'.__('previous page','stadtkreation').'</span>',
				'next_text' => '<span class="screen-reader-text">'.__('next page','stadtkreation').'</span>'
			) );
			$paginate_links .= '</div>';
			echo $paginate_links;
			
			?>
			</div><?php

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
			

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar('posts');
get_footer();
