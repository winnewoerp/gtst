<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package GTST
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php if ( have_posts() ) : ?>
				<header class="page-header">
					<h1 class="page-title">
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'gtst' ), '<span>' . get_search_query() . '</span>' );
						?>
					</h1>
					</header><!-- .page-header -->

				<div class="search-content">
					<div class="content-box search">
						<p class="search-meta">
							<?php
							$allsearch = new WP_Query("s=$s&showposts=-1");
							$count = $allsearch->post_count;
							printf(esc_html__( '%s results found.', 'gtst' ),'<strong>'.$count.'</strong>'); ?>
						</p>
					</div>
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );

				endwhile;

				the_posts_navigation();
			?>
				</div>
				<p>&nbsp;</p>
				<div class="content-box search">
					<p><?php esc_html_e('New search:','gtst').' '; get_search_form(); ?></p>
				</div>
			<?php
			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
			

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
