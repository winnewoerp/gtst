<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GTST
 */

?>
<!doctype html>
<!--
	********************************************************************************
	* Wordpress Theme for Gyula-Trebitsch-Schule Hamburg-Tonndorf by STADTKREATION *
	* www.stadtkreation.de - 02/2019 - Based on a starter theme by Underscores.me. *
	********************************************************************************
-->
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'gtst' ); ?></a>

	<header id="masthead" class="site-header">
		<nav id="top-navigation" class="top-navigation">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-2',
				'menu_id'        => 'secondary-menu',
			) );
			?>
		</nav><!-- #top-navigation -->
		
		<div class="logo-and-menu">
			<div class="site-header-inner">
				
				<div class="site-branding">
					<div class="site-branding-inner">
						<?php
						the_custom_logo();
						if ( is_front_page() && is_home() ) :
							?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
						else :
							?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
						endif;
						$gtst_description = get_bloginfo( 'description', 'display' );
						if ( $gtst_description || is_customize_preview() ) :
							?>
							<p class="site-description"><?php echo $gtst_description; /* WPCS: xss ok. */ ?></p>
						<?php endif; ?>
					</div><!-- .site-branding-inner -->
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'gtst' ); ?></button>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					) );
					?>
				</nav><!-- #site-navigation -->
				
				<nav id="social-navigation" class="social-navigation">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-3',
						'menu_id'        => 'social-menu',
					) );
					?>
				</nav><!-- #social-navigation -->
				
							
			</div><!-- .header-inner -->
		</div><!-- .logo-and-menu -->	
		
		<nav id="site-sub-navigation" class="sub-navigation">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'site-sub-menu',
				'sub_menu' => true
			) );
			?>
		</nav><!-- #site-sub-navigation -->
	</header><!-- #masthead -->
	
	<div class="header-slider"></div>

	<div id="content" class="site-content">
