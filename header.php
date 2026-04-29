<?php
/**
 * Shared site header + opening <body>.
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-nav">
    <div class="site-nav-inner">
        <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            Luminary <span>Collective</span>
        </a>
        <nav aria-label="<?php esc_attr_e( 'Primary', 'luminary' ); ?>">
            <?php
            wp_nav_menu( [
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'site-nav-menu',
                'menu_id'        => 'primary-menu',
                'depth'          => 1,
                'fallback_cb'    => 'luminary_primary_menu_fallback',
            ] );
            ?>
        </nav>
        <div style="display:flex; align-items:center; gap:20px;">
            <?php luminary_language_switcher(); ?>
            <?php luminary_pill( 'Apply Now', [ 'variant' => 'primary', 'icon' => 'arrow-right', 'href' => home_url( '/apply/' ) ] ); ?>
        </div>
    </div>
</header>

<main id="main">
