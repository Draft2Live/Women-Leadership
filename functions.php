<?php
/**
 * Luminary Collective — theme bootstrap
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'LUMINARY_VERSION', '1.0.4' );
define( 'LUMINARY_DIR', get_template_directory() );
define( 'LUMINARY_URI', get_template_directory_uri() );

require_once LUMINARY_DIR . '/inc/data.php';
require_once LUMINARY_DIR . '/inc/render.php';
require_once LUMINARY_DIR . '/inc/seed-pages.php';

add_action( 'after_setup_theme', function () {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ] );

    register_nav_menus( [
        'primary' => __( 'Primary navigation (header)', 'luminary' ),
        'footer'  => __( 'Footer links', 'luminary' ),
    ] );
} );

/**
 * Fallback for the primary nav location — renders the default site links
 * when no menu has been assigned in Appearance → Menus.
 */
function luminary_primary_menu_fallback() {
    $current = luminary_current_slug();
    echo '<ul class="site-nav-menu" id="primary-menu">';
    foreach ( luminary( 'nav' ) as $item ) {
        $cls = ( $item['id'] === $current ) ? ' class="current"' : '';
        printf(
            '<li><a href="%s"%s>%s</a></li>',
            esc_url( $item['url'] ),
            $cls,
            esc_html( $item['label'] )
        );
    }
    echo '</ul>';
}

/**
 * Fallback for the footer nav location.
 */
function luminary_footer_menu_fallback() {
    foreach ( luminary( 'nav' ) as $item ) {
        printf( '<a href="%s">%s</a>', esc_url( $item['url'] ), esc_html( $item['label'] ) );
    }
}

/**
 * Footer menu walker — renders flat <a> tags so the footer column styles apply
 * (the existing CSS expects direct anchors, not <ul><li> structure).
 */
class Luminary_Footer_Walker extends Walker_Nav_Menu {
    public function start_lvl( &$output, $depth = 0, $args = null ) {}
    public function end_lvl( &$output, $depth = 0, $args = null ) {}
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $url   = ! empty( $item->url ) ? $item->url : '#';
        $title = apply_filters( 'the_title', $item->title, $item->ID );
        $output .= sprintf(
            '<a href="%s">%s</a>',
            esc_url( $url ),
            esc_html( $title )
        );
    }
    public function end_el( &$output, $item, $depth = 0, $args = null ) {}
}

add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'luminary-fonts',
        'https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght,SOFT,WONK@0,9..144,300..900,0..100,0..1;1,9..144,300..900,0..100,0..1&family=Inter:wght@300;400;500;600;700&display=swap',
        [],
        null
    );
    wp_enqueue_style(
        'luminary-style',
        get_stylesheet_uri(),
        [ 'luminary-fonts' ],
        LUMINARY_VERSION
    );
} );

/**
 * Preconnect to Google Fonts for performance.
 */
add_action( 'wp_head', function () {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}, 1 );

/**
 * Helper: current page slug for nav highlighting.
 */
function luminary_current_slug() {
    if ( is_front_page() || is_home() ) return 'home';
    if ( is_page() ) {
        global $post;
        return $post->post_name ?? '';
    }
    if ( is_singular() ) {
        global $post;
        return $post->post_name ?? '';
    }
    return '';
}

/**
 * Helper: path to a bundled image.
 */
function luminary_img( $id ) {
    if ( ! $id ) return '';
    return LUMINARY_URI . '/assets/images/' . $id . '.png';
}
