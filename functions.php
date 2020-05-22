<?php
/**
 * GTST functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package GTST
 */
esc_html__('Wordpress Theme for Gyula-Trebitsch-Stadtteilschule Hamburg-Tonndorf (GTST), developed by STADTKREATION and based on a starter theme by Underscores.me. Design developed by blum ⁄⁄ Design und Kommunikation for a previous TYPO3 version with modifications and adaptions for responsive layout by STADTKREATION.','gtst');
 
if ( ! function_exists( 'gtst_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function gtst_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on GTST, use a find and replace
		 * to change 'gtst' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'gtst', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'gtst' ),
			'menu-2' => esc_html__( 'Secondary', 'gtst' ),
			'menu-3' => esc_html__( 'Social Menu', 'gtst' ),
			'menu-4' => esc_html__( 'Footer 1', 'gtst' ),
			'menu-5' => esc_html__( 'Footer 2', 'gtst' ),
			'menu-6' => esc_html__( 'Footer 3', 'gtst' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'gtst_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
				
		// add theme image sizes
		add_image_size( 'teaser', 460, 201, true );
		add_image_size( 'textbox-section', 434, 290, true );
		add_image_size('gtst-thumbnail',1200,800,true);

	}
endif;
add_action( 'after_setup_theme', 'gtst_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gtst_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'gtst_content_width', 640 );
}
add_action( 'after_setup_theme', 'gtst_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gtst_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'gtst' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'gtst' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Posts page sidebar', 'gtst' ),
		'id'            => 'sidebar-posts',
		'description'   => esc_html__( 'Add widgets here.', 'gtst' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Events page sidebar', 'gtst' ),
		'id'            => 'sidebar-events',
		'description'   => esc_html__( 'Add widgets here.', 'gtst' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar for Page type 2', 'gtst' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'gtst' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar for Page type 3', 'gtst' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Add widgets here.', 'gtst' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar for Page type 4', 'gtst' ),
		'id'            => 'sidebar-4',
		'description'   => esc_html__( 'Add widgets here.', 'gtst' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer top widgets', 'gtst' ),
		'id'            => 'footer-widgets',
		'description'   => esc_html__( 'Add widgets here.', 'gtst' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer left widgets', 'gtst' ),
		'id'            => 'footer-widgets-left',
		'description'   => esc_html__( 'Add widgets here.', 'gtst' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'gtst_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function gtst_scripts() {
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'gtst-fonts', get_template_directory_uri() . '/fonts/fonts.css' );
	wp_enqueue_style( 'gtst-slick-style', get_template_directory_uri() . '/slick/slick.css' );
	wp_enqueue_style( 'gtst-slick-theme', get_template_directory_uri() . '/slick/slick-theme.css' );
	wp_enqueue_style( 'gtst-style', get_stylesheet_uri() );
	wp_enqueue_style( 'gtst-style-print', get_template_directory_uri() . '/css/print.css', array(), false, 'print' );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'gtst-slick', get_template_directory_uri() . '/slick/slick.min.js', array(), '20190109', true );
	wp_enqueue_script( 'gtst-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'gtst-functions', get_template_directory_uri() . '/js/functions.js', array(), '20190109', true );

	wp_enqueue_script( 'gtst-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gtst_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/* **************************
   * GTST special functions *
   ************************** */
   
// sub menu function
function gtst_wp_nav_menu_objects_sub_menu( $sorted_menu_items, $args ) {
  if ( isset( $args->sub_menu ) ) {
    $root_id = 0;
    
    // find the current menu item
    foreach ( $sorted_menu_items as $menu_item ) {
      if ( $menu_item->current ) {
        // set the root id based on whether the current menu item has a parent or not
        $root_id = ( $menu_item->menu_item_parent ) ? $menu_item->menu_item_parent : $menu_item->ID;
        break;
      }
    }
    
    // find the top level parent
    if ( ! isset( $args->direct_parent ) ) {
      $prev_root_id = $root_id;
      while ( $prev_root_id != 0 ) {
        foreach ( $sorted_menu_items as $menu_item ) {
          if ( $menu_item->ID == $prev_root_id ) {
            $prev_root_id = $menu_item->menu_item_parent;
            // don't set the root_id to 0 if we've reached the top of the menu
            if ( $prev_root_id != 0 ) $root_id = $menu_item->menu_item_parent;
            break;
          } 
        }
      }
    }
    $menu_item_parents = array();
    foreach ( $sorted_menu_items as $key => $item ) {
      // init menu_item_parents
      if ( $item->ID == $root_id ) $menu_item_parents[] = $item->ID;
      if ( in_array( $item->menu_item_parent, $menu_item_parents ) ) {
        // part of sub-tree: keep!
        $menu_item_parents[] = $item->ID;
      } else if ( ! ( isset( $args->show_parent ) && in_array( $item->ID, $menu_item_parents ) ) ) {
        // not part of sub-tree: away with it!
        unset( $sorted_menu_items[$key] );
      }
    }
    
    return $sorted_menu_items;
  } else {
    return $sorted_menu_items;
  }
}
add_filter( 'wp_nav_menu_objects', 'gtst_wp_nav_menu_objects_sub_menu', 10, 2 );
   
// register custom post type 'slider'
function gtst_slider_post_type() {

	$labels = array(
		'name'                  => _x( 'Sliders', 'Post Type General Name', 'gtst' ),
		'singular_name'         => _x( 'Slider', 'Post Type Singular Name', 'gtst' ),
		'menu_name'             => esc_html__( 'Sliders', 'gtst' ),
		'name_admin_bar'        => esc_html__( 'Slider', 'gtst' ),
		'archives'              => esc_html__( 'Slider Archives', 'gtst' ),
		'attributes'            => esc_html__( 'Slider Attributes', 'gtst' ),
		'parent_item_colon'     => esc_html__( 'Parent Slider:', 'gtst' ),
		'all_items'             => esc_html__( 'All Sliders', 'gtst' ),
		'add_new_item'          => esc_html__( 'Add New Slider', 'gtst' ),
		'add_new'               => esc_html__( 'Add New', 'gtst' ),
		'new_item'              => esc_html__( 'New Slider', 'gtst' ),
		'edit_item'             => esc_html__( 'Edit Slider', 'gtst' ),
		'update_item'           => esc_html__( 'Update Slider', 'gtst' ),
		'view_item'             => esc_html__( 'View Slider', 'gtst' ),
		'view_items'            => esc_html__( 'View Sliders', 'gtst' ),
		'search_items'          => esc_html__( 'Search Slider', 'gtst' ),
		'not_found'             => esc_html__( 'No Slider found', 'gtst' ),
		'not_found_in_trash'    => esc_html__( 'No Slider found in Trash', 'gtst' ),
		'featured_image'        => esc_html__( 'Featured Image', 'gtst' ),
		'set_featured_image'    => esc_html__( 'Set featured image', 'gtst' ),
		'remove_featured_image' => esc_html__( 'Remove featured image', 'gtst' ),
		'use_featured_image'    => esc_html__( 'Use as featured image', 'gtst' ),
		'insert_into_item'      => esc_html__( 'Insert into item', 'gtst' ),
		'uploaded_to_this_item' => esc_html__( 'Uploaded to this Slider', 'gtst' ),
		'items_list'            => esc_html__( 'Sliders list', 'gtst' ),
		'items_list_navigation' => esc_html__( 'Sliders list navigation', 'gtst' ),
		'filter_items_list'     => esc_html__( 'Filter Sliders list', 'gtst' ),
	);
	$args = array(
		'label'                 => esc_html__( 'Slider', 'gtst' ),
		'description'           => esc_html__( 'Sliders for GTST Wordpress theme.', 'gtst' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'revisions' ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-format-gallery',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'slider', $args );

}
add_action( 'init', 'gtst_slider_post_type', 0 );

// shortcode [gtst-header-slideshow]
function gtst_header_slideshow_output($atts,$content) {
	$a = shortcode_atts( array(
		'id' => 0
	), $atts );
	$output = '';
	if($a['id']) {
		$slider_post = get_post($a['id']);
		$output .= '
	<div class="gtst-header-slideshow">
		'.do_shortcode($slider_post->post_content).'
	</div>';
	}
	
	return $output;
}
add_shortcode('gtst-header-slideshow','gtst_header_slideshow_output');

// shortcode [boxes-half]
function gtst_boxes_half_output($atts,$content) {
	$output = '';
	$output .= '
	<div class="boxes-half">'
		.do_shortcode($content).'
	</div>';
	return $output;
}
add_shortcode('gtst-boxes-half','gtst_boxes_half_output');

// shortcode [gtst-newsteaser]
function gtst_newsteaser_output($atts) {
	$output = '';
	$a = shortcode_atts( array(
		'title' => ''
	), $atts );
	
	return $output;
}
add_shortcode('gtst-newsteaser','gtst_newsteaser_output');

// shortcode [gtst-terminteaser]
function gtst_terminteaser_output($atts) {
	$output = '';
	$a = shortcode_atts( array(
		'title' => '',
		'tabtitles' => '',
	), $atts );
	$tabtitles = explode(',',$a['tabtitles']);
	$first = true;
	$output .= '
	<div class="box">'		
		.($a['title'] ? '<h2>'.$a['title'].'</h2>' : '').'
		<div class="termin-teaser">
			<ul class="tabnav">';
	foreach($tabtitles as $tabtitle) {
		$output .= '
				<li><a href="#"'.($first ? ' class="active"' : '').'>'.$tabtitle.'</a></li>';
		$first = false;
	}
	$output .= '
			</ul>
			<div class="termine-content">';
	foreach($tabtitles as $tabtitle) $output .= '
				<div class="tabbox">
					[Inhalt "'.$tabtitle.'"]
				</div>';
	$output .= '
			</div>
		</div>
	</div>';
	return $output;
}
add_shortcode('gtst-terminteaser','gtst_terminteaser_output');

// shortcode [gtst-teaser]
function gtst_teaser_output($atts,$content) {
	$output = '';
	$a = shortcode_atts( array(
		'title' => '',
		'tabtitles' => '',
		'tabtitles-mobile' => '',
		'type' => '',
		'height' => 'auto'
	), $atts );
	$content_parts = explode('[break]',$content);
	if($a['height']>0) $height = $a['height'].'px';
	else $height = $a['height'];

	
	// teaser type tabs and tabs2
	if($a['type'] == 'tabs' || $a['type'] == 'tabs2') {
		$tabtitles = explode(',',$a['tabtitles']);
		$tabtitles_mobile = explode(',',$a['tabtitles-mobile']);
		$first = true;
		$output .= '
		<div class="box">'		
			.($a['title'] ? '<h2>'.$a['title'].'</h2>' : '').'
			<div class="teaser '.$a['type'].'" style="height:'.$height.'">
				<ul class="tabnav">';
		$count = 0;
		foreach($tabtitles as $tabtitle) {
			$output .= '
					<li><a href="#"'.($first ? ' class="active"' : '').'><span class="tabtitle">'.$tabtitle.'</span>'.($tabtitles_mobile[$count] ? '<span class="tabtitle-mobile">'.$tabtitles_mobile[$count].'</span>' : '<span class="tabtitle-mobile">'.$tabtitle.'</span>').'</a></li>';
			$first = false;
			$count++;
		}
		$count = 0;
		$output .= '
				</ul>
				<div class="teaser-content">';
		foreach($tabtitles as $tabtitle) {
			$output .= '
					<div class="tabbox">
						'.wpautop(do_shortcode($content_parts[$count])).'
					</div>';
			$count++;
		}
		$output .= '
				</div>
			</div>
		</div>';
	}
	
	// teaser type accordion
	elseif($a['type'] == 'accordion') {
		$count = 0;
		$tabtitles = explode(',',$a['tabtitles']);
		$a['height'] += 45;
		$first = true;
		$position = 0;
		$output .= '
		<div class="box">'		
			.($a['title'] ? '<h2>'.$a['title'].'</h2>' : '').'
			<div class="teaser '.$a['type'].'" style="height:'.$height.'">
				<div class="inner">';
		foreach($tabtitles as $tabtitle) {
			$output .= '
					<div class="accordion-part'.($first ? ' active' : '').'">
						<div class="accordion-title" style="height:'.$height.'">
							<a href="#"'.($first ? ' class="active"' : '').' style="width:'.$height.';margin-top:'.$height.'">'.$tabtitle.'</a>
						</div>
						<div class="accordion-content" style="height:'.$a['height'].'px">
							<div class="teaser-content">
								'.wpautop(do_shortcode($content_parts[$count])).'
							</div>
						</div>
					</div>';
			$first = false;
			$count++;
		}
		$output .= '
				</div>
			</div>
		</div>';
	}
	
	// teaser type news
	elseif($a['type'] == 'news') {
		$new_loop_string = array(
			'posts_per_page' => 4
		);
		$new_loop = new WP_Query( $new_loop_string );
		if ( $new_loop->have_posts() ) :
			$output .= '
	<div class="box">'
			.($a['title'] ? '<h2>'.$a['title'].'</h2>' : '').'
		<div class="news-teasers">';
			while ( $new_loop->have_posts() ) : $new_loop->the_post(); global $post;
				unset($url);
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'teaser' );
				$url = $thumb['0'];
				$output .= '
			<div class="news-teaser'.(is_sticky($post->ID) ? ' sticky' : '').'"><a href="'.get_permalink().'">'.
				
				($url ? '<img src="'.$url.'" alt="'.esc_html__('Post image','gtst').'" />' : '').
				'
				<h3>'.esc_html(get_the_title()).'</h3>
				<p>'.(has_excerpt() ? esc_html(get_the_excerpt()) : esc_html(wp_trim_words(get_the_content(), 12))).'</p>
			</a></div>';
			endwhile;
			$output .= '
		</div>
		'.$content.'
	</div>';
		endif;
		wp_reset_postdata();
	}
	
	// default teaser type
	else {
		$output .= '
		<div class="box">'		
			.($a['title'] ? '<h2>'.$a['title'].'</h2>' : '').'
			<div class="teaser '.$a['type'].'">
				<div class="teaser-content">
					'.do_shortcode($content).'
				</div>
			</div>
		</div>';
	}
	return $output;
}
add_shortcode('gtst-teaser','gtst_teaser_output');

// shortcode [gtst-sitemap]
function gtst_sitemap_output($atts,$content) {
	$output = '';
	$a = shortcode_atts( array(
		'title' => '',
		'tabtitles' => '',
		'type' => '',
		'height' => '204'
	), $atts );
	$output .= '
	<ul>';
	ob_start();
	wp_list_pages();
	$output .= ob_get_clean();
	ob_end_flush();
	$output .= '
	</ul>';
	return $output;
}
add_shortcode('gtst-sitemap','gtst_sitemap_output');

// shortcode [searchform]
function gtst_searchform_output() {
	$output = '';
	$output .= '<p>'.esc_html__('Search for: ','gtst');
	ob_start();
	get_search_form();
	$output .= ob_get_clean();
	ob_end_flush();
	$output .= '</p>';
	return $output;
}
add_shortcode('gtst-searchform','gtst_searchform_output');

// shortcode [gtst-button]
function gtst_button_output($atts,$content) {
	$output = '';
	$output .= wpautop('<span class="gtst-button">'.do_shortcode($content).'</span>');
	return $output;
}
add_shortcode('gtst-button','gtst_button_output');

// shortcode [gtst-textbox]
function gtst_textbox_output($atts,$content) {
	$output = '';
	$a = shortcode_atts( array(
		'image' => ''
	), $atts );
	$output .= '
	<div class="textbox">'.($a['image'] ? '
		<div class="textbox-image" style="background-image:url('.$a['image'].')"></div>
		' : '').'
		<div class="textbox-content">
			'.wpautop(do_shortcode($content)).'
		</div>
	</div>';
	return $output;
}
add_shortcode('gtst-textbox','gtst_textbox_output');

// shortcode [gtst-textbox-section]
function gtst_textbox_section_output($atts,$content) {
	$output = '';
	$a = shortcode_atts( array(
		'image' => ''
	), $atts );
	$img_id = gtst_get_image_id($a['image']);
	$img = wp_get_attachment_image_src($img_id, 'textbox-section');
	$output .= '
	<div class="textbox-section">
		<div class="image-box">
			<img src="'.$img[0].'" alt="'.esc_html__('Section Image','gtst').'">
		</div>
		<div class="textbox-content-box">
			'.wpautop(do_shortcode($content)).'
		</div>
	</div>';
	return $output;
}
add_shortcode('gtst-textbox-section','gtst_textbox_section_output');

// shortcode [gtst-textslides]
function gtst_textslides_output($atts,$content) {
	$output = '';
	$a = shortcode_atts( array(
		'next' => esc_html__('next','gtst'),
		'prev' => esc_html__('previous','gtst'),
	), $atts );
	$slides_content = explode('[nextslide]',$content);
	$output .= '
	<div class="gtst-textslides">
		<div class="inner">';
	foreach($slides_content as $slide_content) {
		$output .= '
			<div class="gtst-textslide">
				'.$slide_content.'
			</div>';
	}
	$output .= '
		</div>
		<p class="textslides-navigation">
			<span class="nav-wrapper"><a class="prev" href="#">'.$a['prev'].'</a></span> <span class="nav-wrapper"><a class="next" href="#">'.$a['next'].'</a></span>
		</p>
	</div>';	
	return $output;
}
add_shortcode('gtst-textslides','gtst_textslides_output');

// shortcode [n2go]
function gtst_n2go_output($atts,$content) {
	// FUNKTION ZUNAECHST AUSKOMMENTIERT WEGEN KLAERUNGSBEDARFS MIT BSB
	/*$output = '';
	$a = shortcode_atts( array(
		'key' => '',
	), $atts );
	if($a['key']) $output .= '
	<div class="n2go-form"><script id="n2g_script">!function(e,t,n,c,r,a,i){e.Newsletter2GoTrackingObject=r,e[r]=e[r]||function(){(e[r].q=e[r].q||[]).push(arguments)},e[r].l=1*new Date,a=t.createElement(n),i=t.getElementsByTagName(n)[0],a.async=1,a.src=c,i.parentNode.insertBefore(a,i)}(window,document,"script","https://static.newsletter2go.com/utils.js","n2g");var config = {"container": {"type": "div","class": "","style": ""},"row": {"type": "div","class": "","style": "margin-top: 15px;"},"columnLeft": {"type": "div","class": "","style": ""},"columnRight": {"type": "div","class": "","style": ""},"label": {"type": "label","class": "","style": ""}};n2g("create", "'.$a['key'].'");n2g("subscribe:createForm", config);</script></div>';
	else $output .= '
	<p style="color:red">'.esc_html__('Newsletter2Go key missing','gtst').'</p>';
	return $output;*/
	/* PLATZHALTER, BEI FREISCHALTUNG DER FUNKTION ENTFERNEN */ return '<span style="color:red">[N2GO-Einbindung in Klärung mit BSB]</span>';
}
add_shortcode('n2go','gtst_n2go_output');

// delete password protected page cookie at end of session
function gtst_custom_post_password_expires( $expires ) {
    return 0; // expire after session
}
add_filter( 'post_password_expires', 'gtst_custom_post_password_expires' );

// display widget ID
function gtst_get_widget_id($widget_instance) {
	$output = '';
	$output .= '
	<p>';
    
    // Check if the widget is already saved or not. 
    if ($widget_instance->number=="__i__") $output .= esc_html__('Widget must be saved to view ID.','gtst');
    else $output .= '<strong>'.esc_html__('Widget ID is: ','gtst').'</strong>'.$widget_instance->id;
	$output .= '</p>';
	echo $output;
}
add_action('in_widget_form', 'gtst_get_widget_id');

global $wanted_sidebar_widget;
$wanted_sidebar_widget = '';

function gtst_filter_sidebars_widgets($sidebars_widgets) {
	global $wanted_sidebar_widget;
    $wanted = $wanted_sidebar_widget;
	if($wanted) {
		// Prevent intercepting another call - on demand filter(!)
		remove_filter( current_filter(), __FUNCTION__ );

		if(is_array($sidebars_widgets)) {
			// array_search() returns FALSE in case the widget isn't present
			$index = array_search( $wanted, $sidebars_widgets, FALSE );
			$sidebars_widgets = $sidebars_widgets[ $index ];
		}
		else $sidebars_widgets = $wanted === $sidebars_widgets ? $sidebars_widgets : FALSE;
	}
    return $sidebars_widgets;
}
add_filter( 'sidebars_widgets', 'gtst_filter_sidebars_widgets' );

// shortcode [get-textwidget]
function gtst_output_get_textwidget($atts,$content) {
	global $_wp_sidebars_widgets, $wp_registered_widgets, $wp_registered_sidebars;
	
	$output = '';
	$a = shortcode_atts( array(
		'id' => '',
	), $atts );
	$id = $a['id'];
	if($wp_registered_widgets[ $id ]) {
		// get widgets options
		preg_match( '/-(\d+)$/', $id, $number );
		$options = ( ! empty( $wp_registered_widgets ) && ! empty( $wp_registered_widgets[ $id ] ) ) ? get_option( $wp_registered_widgets[ $id ]['callback'][0]->option_name ) : array();
		$instance = isset( $options[ $number[1] ] ) ? $options[ $number[1] ] : array();
		$class = get_class( $wp_registered_widgets[ $id ]['callback'][0] );
		
		$widgets_map = gtst_get_widgets_map();
		if ( isset( $widgets_map[ $id ] ) ) {
			$params[0]['name'] = $wp_registered_sidebars[ $widgets_map[ $id ] ]['name'];
			$params[0]['id'] = $wp_registered_sidebars[ $widgets_map[ $id ] ]['id'];
			$params[0]['description'] = $wp_registered_sidebars[ $widgets_map[ $id ] ]['description'];
		}

		$params = apply_filters( 'dynamic_sidebar_params', $params );
		
		$widget_content .= wpautop($instance['text']);
		$output .= $widget_content;
	}
	
	return $output;
}
add_shortcode('get-textwidget','gtst_output_get_textwidget');

function gtst_get_widgets_map() {
	$sidebars_widgets = wp_get_sidebars_widgets();
	$widgets_map = array();
	if ( ! empty( $sidebars_widgets ) )
		foreach ( $sidebars_widgets as $position => $widgets )
			if ( ! empty( $widgets) )
				foreach ( $widgets as $widget )
					$widgets_map[ $widget ] = $position;

	return $widgets_map;
}

/* EVENTS */
date_default_timezone_set('Europe/Berlin');

// shortcode [gtst-terminliste]
function gtst_terminliste_output($atts,$content) {
	$output = '';
	$a = shortcode_atts( array(
		'posts_per_page' => 10,
		'posts' => 999999999,
		'kategorien' => '',
		'zeitraum' => '',
	), $atts );
	if($atts && in_array('filter',$atts)) {
		if(isset($_GET['eventsearch']) && htmlspecialchars(strip_tags($_GET['eventsearch']))) $output .= '
		<p>'.esc_html__('Search results for:','gtst').' <strong>'.htmlspecialchars(strip_tags($_GET['eventsearch'])).'</strong></p>';
		$output .= '
		<form method="get" action="" class="event-searchform"><p><label for="search-events">'.esc_html__('Search events:','gtst').' <input type="text" '.(isset($_GET['eventsearch']) ? ' id="search-events" value="'.htmlspecialchars(strip_tags($_GET['eventsearch'])).'"' : '').' name="eventsearch" /> <input type="submit" value="'.esc_html__('Search','gtst').'" /></p></form>';
	}
	if($a['posts'] < $a['posts_per_page']) $a['posts_per_page'] = $a['posts'];
	// test date
	//$today = '2019-09-16';	
	$today = date('Y-m-d');
	$metaquery = array(
		'relation' => 'OR',
		array(
			'key' => 'pp_event_dtstart_date',
			'value' => $today,
			'compare' => '>='
		),
		array(
			'relation' => 'AND',
			array(
				'key' => 'pp_event_dtend_date',
				'value' => $today,
				'compare' => '>='
			),
			array(
				'key' => 'pp_event_dtend_date',
				'value' => '',
				'compare' => '!='
			)
		)
	);
	if($a['zeitraum'] == 'heute') {
		$metaquery = array(
			'relation' => 'OR',
			array(
				'key' => 'pp_event_dtstart_date',
				'value' => $today,
				'compare' => '=='
			),
			array(
				'relation' => 'AND',
				array(
					'key' => 'pp_event_dtstart_date',
					'value' => $today,
					'compare' => '<='
				),
				array(
					'key' => 'pp_event_dtend_date',
					'value' => $today,
					'compare' => '>='
				),
				array(
					'key' => 'pp_event_dtend_date',
					'value' => '',
					'compare' => '!='
				)
			)
		);
	}
	if($a['zeitraum'] == 'abmorgen') {
		$metaquery = array(
			'relation' => 'OR',
			array(
				'key' => 'pp_event_dtstart_date',
				'value' => $today,
				'compare' => '>'
			)
		);
	}
	$paged = (get_query_var('paged') && !$a['zeitraum']=='heute') ? get_query_var('paged') : 1;
	$new_loop_string = array(
		'paged' => $paged,
		'post_type' => 'pp_event',
        'posts_per_page' => $a['posts_per_page'],
		'posts' => $a['posts'],
		'order' => 'asc',
		'orderby' => 'meta_value',
		'meta_key' => 'pp_event_dtstart',
		'meta_query' => $metaquery,	
    );
	
	// include/exclude cats when parameter given in shortcode
	if($a['kategorien']) $new_loop_string['cat'] = $a['kategorien'];
	
	if($atts && in_array('filter',$atts)) if(isset($_GET['eventsearch'])) $new_loop_string['post_title_content_like'] = $_GET['eventsearch'];
	
	$new_loop = new WP_Query( $new_loop_string );
	
	// pagination
	$paginate_links = '';
	$paginate_links_above = '';
	if($a['posts'] > $a['posts_per_page'] && $new_loop->max_num_pages > 1) {
		$big = 999999999; // need an unlikely integer
		$paginate_links = '<p class="paginate-links"><span class="page-indicator">'.sprintf(esc_html__('Page %1$s of %2$s','gtst'),max( 1, get_query_var('paged') ),$new_loop->max_num_pages).'</span><br />';
		if(max( 1, get_query_var('paged') )>1) $paginate_links_above = $paginate_links.'</p>';
		$paginate_links .= paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $new_loop->max_num_pages,
			'prev_text' => '<span class="screen-reader-text">'.esc_html__('previous page','stadtkreation').'</span>',
			'next_text' => '<span class="screen-reader-text">'.esc_html__('next page','stadtkreation').'</span>'
		) );
		$paginate_links .= '</p>';
	}
	$output .= $paginate_links_above;
	
	if ( $new_loop->have_posts() ) :
		$output .= '
		<div class="event-teasers'.($a['zeitraum']=='heute' ? ' heute' : '').'" data-compare-date="'.$today.'">';
		while ( $new_loop->have_posts() ) : $new_loop->the_post(); global $post;
			$termindatum = date_i18n('l, d.m.Y',strtotime(esc_html(get_post_meta($post->ID,'pp_event_dtstart',true))));
			$terminenddatum = false;
			if(esc_html(get_post_meta($post->ID,'pp_event_dtend',true)) && date_i18n('l, d.m.Y',strtotime(esc_html(get_post_meta($post->ID,'pp_event_dtend',true))))!=$termindatum) {
				$terminenddatum = true;
				$termindatum = '<span class="end-date">'.$termindatum.' '.esc_html__('until','gtst').' '.date_i18n('l, d.m.Y',strtotime(esc_html(get_post_meta($post->ID,'pp_event_dtend',true))));
			}
			$terminuhrzeit = date_i18n('H:i',strtotime(esc_html(get_post_meta($post->ID,'pp_event_dtstart',true))));
			$terminenduhrzeit = '';
			if(date_i18n('H:i',strtotime(esc_html(get_post_meta($post->ID,'pp_event_dtend',true)))) != date_i18n('H:i',strtotime(esc_html(get_post_meta($post->ID,'pp_event_dtstart',true))))) $terminenduhrzeit = date_i18n('H:i',strtotime(esc_html(get_post_meta($post->ID,'pp_event_dtend',true))));
			if(trim(esc_html(get_post_meta($post->ID,'terminuhrzeit_ausgabe',true)))!='') $terminuhrzeit = esc_html(get_post_meta($post->ID,'terminuhrzeit_ausgabe',true));
			$output .= '
			<p class="event-teaser" data-start-date="'.esc_html(get_post_meta($post->ID,'pp_event_dtstart_date',true)).'"  data-end-date="'.esc_html(get_post_meta($post->ID,'pp_event_dtend_date',true)).'">
				<strong class="title-line">'.esc_html(get_the_title()).'</strong> <span class="date-line">'.
				/* date*/ ($a['zeitraum']!='heute' ? '<span class="date-spacer"> | </span>'.$termindatum : (esc_html(get_post_meta($post->ID,'pp_event_dtend',true)) && date_i18n('l, d.m.Y',strtotime(esc_html(get_post_meta($post->ID,'pp_event_dtend',true))))!=$termindatum ? '<span class="date-spacer"> | </span>'.esc_html__('until','gtst').' '.date_i18n('l, d.m.Y',strtotime(esc_html(get_post_meta($post->ID,'pp_event_dtend',true)))) : '')).
				/* time*/ (!$terminenddatum ? '<span class="time-spacer"> | </span>'.$terminuhrzeit.($terminenduhrzeit ? ' - '.$terminenduhrzeit : '').' Uhr' : '').'</span>'.
				/* location */ (esc_html(get_post_meta($post->ID,'pp_event_location',true)) ? ' <span class="location-line"><span class="location-spacer"> | </span>Ort: '.esc_html(get_post_meta($post->ID,'pp_event_location',true)).'</span>' : '').'
			</p>';
		endwhile;
		$output .= '
		</div>';
	else :
		if($a['zeitraum'] == 'heute') $output .= '
		<p><em>'.esc_html__('No events today','gtst').'</em></p>';
		else $output .= '
		<p><em>'.esc_html__('No upcoming events','gtst').'</em></p>';
	endif;

	$output .= $paginate_links;
	wp_reset_query();
	return $output;
}
add_shortcode('gtst-terminliste','gtst_terminliste_output');

// save extra post meta for pp_event post objects, needed for better event filtering
function gtst_pp_event_update_post_meta($meta_id, $object_id, $meta_key, $_meta_value) {
    if ($meta_key != 'pp_event_dtstart' && $meta_key != 'pp_event_dtend') return;
	
	if(!esc_html(get_post_meta($object_id,$meta_key.'_date',true))) add_post_meta($object_id,$meta_key.'_date',sanitize_text_field(date('Y-m-d',strtotime($_meta_value))));
	else update_post_meta($object_id,$meta_key.'_date',sanitize_text_field(date('Y-m-d',strtotime($_meta_value))));

}
add_action( 'added_post_meta', 'gtst_pp_event_update_post_meta', 10, 4 );
add_action( 'updated_post_meta', 'gtst_pp_event_update_post_meta', 10, 4 );

// additional filter to query "title like %...% or content like %...%" or pp_event_location
function gtst_title_content_like_posts_where( $where, $wp_query ) {
    global $wpdb;
    if ( $post_title_content_like = $wp_query->get( 'post_title_content_like' ) ) {
        $where .= ' AND (' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql( $wpdb->esc_like( $post_title_content_like ) ) . '%\'';
		$where .= ' OR '. $wpdb->posts . '.post_content LIKE \'%' . esc_sql( $wpdb->esc_like( $post_title_content_like ) ) . '%\'';
		$where .= ' OR '. $wpdb->posts . '.ID IN (SELECT post_id FROM '.$wpdb->postmeta.' WHERE (meta_key = \'pp_event_location\' AND meta_value LIKE \'%' . esc_sql( $wpdb->esc_like( $post_title_content_like ) ) . '%\' )))';
    }
    return $where;
}
add_filter( 'posts_where', 'gtst_title_content_like_posts_where', 10, 2 );

// shortcode [gtst-drucken]
function gtst_drucken_output($atts,$content) {
	$a = shortcode_atts( array(
		'text' => esc_html__('Print page','gtst'),
	), $atts );
	$output = '';
	$output .= '
	<span class="print-page"><a href="#">'.$a['text'].'</a></span>';
	return $output;
}
add_shortcode('gtst-drucken','gtst_drucken_output');

// shortcode [gtst-accordion]
function gtst_accordion_output($atts,$content) {
	$output = '';
	$output .= '
	<div class="gtst-accordion">
		'.do_shortcode($content).'
	</div>';
	return $output;
}
add_shortcode('gtst-accordion','gtst_accordion_output');

// shortcode [gtst-accordion-section]
function gtst_accordion_section_output($atts,$content) {
	$a = shortcode_atts( array(
		'title' =>'',
	), $atts );
	$output = '';
	$output .= '
		<div class="gtst-accordion-section">
			<div class="gtst-accordion-section-title">
				<h2>'.$a['title'].'</h2>
			</div>
			<div class="gtst-accordion-section-content">
				'.do_shortcode(wpautop($content)).'
			</div>
		</div>';
	return $output;
}
add_shortcode('gtst-accordion-section','gtst_accordion_section_output');

// get image id from url
function gtst_get_image_id($image_url) {
	global $wpdb;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
        return $attachment[0]; 
}