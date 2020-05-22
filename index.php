<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GTST
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		
		<header class="page-header">
				<?php
				echo '<h1 class="page-title">'.__('News','gtst').'</h1>';
				?>
		</header><!-- .page-header -->

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				
				<div class="content-box">
				<div class="inner">
				<?php
			endif;

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
