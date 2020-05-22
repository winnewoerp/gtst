<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GTST
 */

?>

	</div><!-- #content -->
	
	<div class="footer-widgets">
		<div class="footer-widgets-inner">
			<?php dynamic_sidebar( 'footer-widgets' ); ?>
		</div>
	</div>

	<footer id="colophon" class="site-footer">
		<div class="site-footer-inner">
			<div class="footer-widgets-left">
			<?php dynamic_sidebar( 'footer-widgets-left' ); ?>
			</div>
			<div class="footer-navigations">
				<nav id="footer-navigation-1" class="footer-navigation-1">
					<?php
					$menu_name = 'menu-4';
					$locations = get_nav_menu_locations();
					$menu_id = $locations[$menu_name] ;
					$menu_object = wp_get_nav_menu_object( $menu_id );
					echo '
					<h3>'.$menu_object->name.'</h3>';
					wp_nav_menu( array(
						'theme_location' => 'menu-4',
						'menu_id'        => 'footer-menu-1',
					) );
					?>
				</nav><!-- #footer-navigation-1 -->
				<nav id="footer-navigation-2" class="footer-navigation-2">
					<?php
					$menu_name = 'menu-5';
					$locations = get_nav_menu_locations();
					$menu_id = $locations[$menu_name] ;
					$menu_object = wp_get_nav_menu_object( $menu_id );
					echo '
					<h3>'.$menu_object->name.'</h3>';
					wp_nav_menu( array(
						'theme_location' => 'menu-5',
						'menu_id'        => 'footer-menu-2',
					) );
					?>
				</nav><!-- #footer-navigation-2 -->
				<nav id="footer-navigation-3" class="footer-navigation-3">
					<?php
					$menu_name = 'menu-6';
					$locations = get_nav_menu_locations();
					$menu_id = $locations[$menu_name] ;
					$menu_object = wp_get_nav_menu_object( $menu_id );
					echo '
					<h3>'.$menu_object->name.'</h3>';
					wp_nav_menu( array(
						'theme_location' => 'menu-6',
						'menu_id'        => 'footer-menu-3',
					) );
					?>
				</nav><!-- #footer-navigation-3 -->
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
