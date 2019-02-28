 <?php
 error_reporting(E_ERROR | E_PARSE);
 /**
  * Simplelin functions and definitions.
  *
  * @link https://developer.wordpress.org/themes/basics/theme-functions/
  *
  * @package Simplelin
  */

if ( ! function_exists( 'simplelin_setup' ) ) :
 /**
  * Sets up theme defaults and registers support for various WordPress features.
  * Note that this function is hooked into the after_setup_theme hook, which
  * runs before the init hook. The init hook is too late for some features, such
  * as indicating support for post thumbnails.
  */
function simplelin_setup() {
  /*
   * Make theme available for translation.
   * Translation can be filed in the /languages/directory.
   */
  load_theme_textdomain( 'simplelin', get_template_directory() . '/languages' );

  // Add default posts and comments RSS feed links to head.
  add_theme_support( 'automatic-feed-links' );

  /*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */
  add_theme_support( 'title-tag' );

  // Add theme support for Custom Logo.
  add_theme_support( 'custom-logo', array(
    'width'       => 240,
    'height'      => 240,
    'flex-height' => true,
  ) );

  /*
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
   */
  add_theme_support( 'post-thumbnails' );

  add_image_size( 'simplelin-featured', 750, 420, true );
  add_image_size( 'simplelin-featured-fullwidth', 1140, 624, true);
  add_image_size( 'simplelin-tab-small', 100, 100, true ); // Small Thumbnail

  // This theme uses wp_nav_menu() in two locations.
  register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'simplelin' ),
  ) );

  /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5
   */
  add_theme_support( 'html5', array(
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ) );

  add_theme_support( 'custom-background', apply_filters( 'simplelin_custom_background_args', array(
    'default-color' => 'f4f5f6',
    'default-image' => '',
  ) ) );

  // Add theme support for selective refresh for widgets.
  add_theme_support( 'customize-selective-refresh-widgets' );

  /*
   * Enable support for Post Formats.
   *
   * See: https://codex.wordpress.org/Post_Formats
   */
  add_theme_support( 'post-formats', array(
    'aside',
    'image',
    'video',
    'quote',
    'link',
    'gallery',
    'audio',
  ) );
}
endif;
add_action( 'after_setup_theme', 'simplelin_setup' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function simplelin_content_width() {
  $GLOBALS['content_width'] = apply_filters( 'simplelin_content_width', 720);
}
add_action( 'after_setup_theme', 'simplelin_content_width' );




if ( ! function_exists( 'simplelin_widgets_init') ) :
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.or/themes/functionality/sidebars/#registering-a-sidebar
 */
function simplelin_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar', 'simplelin'),
    'id'            => 'sidebar-1',
    'description'   => esc_html__( 'Add widgets here.', 'simplelin' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

  // Header Ad Sidebar
  register_sidebar( array(
    'name'          => __( 'Header Advertisement Area', 'simplelin' ),
    'id'            => 'sidebar-header',
    'description'   => esc_html__( 'You can add advertisement widget to this widget area.', 'simplelin' ),
    'before_widget' => '<aside id="%1$s" class="widget-header %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>',
  ) );
}
endif;
add_action( 'widgets_init', 'simplelin_widgets_init' );

/**
 * Add a subhead meta box to post page(s)
 * under the title.
 *
 */

# Adds a box to the main column on the Post and Page edit screens:
function foo_deck($post_type) {

    # Allowed post types to show meta box:
    $post_types = array('post', 'page');

    if (in_array($post_type, $post_types)) {

        # Add a meta box to the administrative interface:
        add_meta_box(
            'foo-deck-meta-box', // HTML 'id' attribute of the edit screen section.
            'Deck',              // Title of the edit screen section, visible to user.
            'foo_deck_meta_box', // Function that prints out the HTML for the edit screen section.
            $post_type,          // The type of Write screen on which to show the edit screen section.
            'advanced',          // The part of the page where the edit screen section should be shown.
            'high'               // The priority within the context where the boxes should show.
        );

    }

}

# Callback that prints the box content:
function foo_deck_meta_box($post) {

    # Use `get_post_meta()` to retrieve an existing value from the database and use the value for the form:
    $deck = get_post_meta($post->ID, '_deck', true);

    # Form field to display:
    ?>

        <label class="screen-reader-text" for="foo_deck">Deck</label>
        <input id="foo_deck" type="text" autocomplete="off" value="<?=esc_attr($deck)?>" name="foo_deck" placeholder="Deck">

    <?php

    # Display the nonce hidden form field:
    wp_nonce_field(
        plugin_basename(__FILE__), // Action name.
        'foo_deck_meta_box'        // Nonce name.
    );

}

/**
 * @see https://wordpress.stackexchange.com/a/16267/32387
 */

# Save our custom data when the post is saved:
function foo_deck_save_postdata($post_id) {

    # Is the current user is authorised to do this action?
    if ((($_POST['post_type'] === 'page') && current_user_can('edit_page', $post_id) || current_user_can('edit_post', $post_id))) { // If it's a page, OR, if it's a post, can the user edit it?

        # Stop WP from clearing custom fields on autosave:
        if ((( ! defined('DOING_AUTOSAVE')) || ( ! DOING_AUTOSAVE)) && (( ! defined('DOING_AJAX')) || ( ! DOING_AJAX))) {

            # Nonce verification:
            if (wp_verify_nonce($_POST['foo_deck_meta_box'], plugin_basename(__FILE__))) {

                # Get the posted deck:
                $deck = sanitize_text_field($_POST['foo_deck']);

                # Add, update or delete?
                if ($deck !== '') {

                    # Deck exists, so add OR update it:
                    add_post_meta($post_id, '_deck', $deck, true) OR update_post_meta($post_id, '_deck', $deck);

                } else {

                    # Deck empty or removed:
                    delete_post_meta($post_id, '_deck');

                }

            }

        }

    }

}

# Get the deck:
function foo_get_deck($post_id = FALSE) {

    $post_id = ($post_id) ? $post_id : get_the_ID();

    return apply_filters('foo_the_deck', get_post_meta($post_id, '_deck', TRUE));

}

# Display deck (this will feel better when OOP):
function foo_the_deck() {

    echo foo_get_deck(get_the_ID());

}

# Conditional checker:
function foo_has_subtitle($post_id = FALSE) {

    if (foo_get_deck($post_id)) return TRUE;

}

# Define the custom box:
add_action('add_meta_boxes', 'foo_deck');
# Do something with the data entered:
add_action('save_post', 'foo_deck_save_postdata');

/**
 * @see https://wordpress.stackexchange.com/questions/36600
 * @see https://wordpress.stackexchange.com/questions/94530/
 */

# Now move advanced meta boxes after the title:
function foo_move_deck() {

    # Get the globals:
    global $post, $wp_meta_boxes;

    # Output the "advanced" meta boxes:
    do_meta_boxes(get_current_screen(), 'advanced', $post);

    # Remove the initial "advanced" meta boxes:
    unset($wp_meta_boxes['post']['advanced']);

}

add_action('edit_form_after_title', 'foo_move_deck');

/**
 * Enqueue scripts and styles.
 */
function simplelin_scripts() {

  // Theme stylesheet.
  wp_enqueue_style( 'simplelin-style', get_stylesheet_uri() );

  // Load Font Awesome v4.7.0.
  wp_enqueue_style( 'fontawesome-style', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css' );

  // Load navigation.js.
  wp_enqueue_script( 'simplelin-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20120206', true );

  // Load skip-link-focus-fix.js
  wp_enqueue_script( 'aeroblog-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array( 'jquery' ), '20120206', true );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
 }
}
add_action( 'wp_enqueue_scripts', 'simplelin_scripts' );



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

 /**
  * Custom template tags for this theme.
  */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Include Theme Customizer Options.
 */
require get_template_directory() . '/inc/customizer.php';
