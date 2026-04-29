<?php
/**
 * Seed pages for the primary navigation.
 *
 * Creates a Page for each nav slug if it doesn't exist yet, so clicking the
 * header links resolves to a real URL instead of 404. WordPress then picks
 * the matching `page-{slug}.php` template automatically.
 *
 * Idempotent: safe to call repeatedly. Tracks completion per slug via the
 * `lum_seeded_pages` option.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function luminary_seed_pages() {
    $seeded = get_option( 'lum_seeded_pages', [] );
    if ( ! is_array( $seeded ) ) $seeded = [];

    $pages = [
        'programs'   => 'Programs',
        'summits'    => 'Summits',
        'members'    => 'Members',
        'stories'    => 'Stories',
        'membership' => 'Membership',
        'apply'      => 'Apply',
    ];

    $changed = false;
    foreach ( $pages as $slug => $title ) {
        if ( in_array( $slug, $seeded, true ) ) continue;
        $existing = get_page_by_path( $slug );
        if ( $existing ) {
            $seeded[] = $slug;
            $changed = true;
            continue;
        }
        $page_id = wp_insert_post( [
            'post_type'    => 'page',
            'post_title'   => $title,
            'post_name'    => $slug,
            'post_status'  => 'publish',
            'post_content' => '', // page-{slug}.php template provides the layout
            'comment_status' => 'closed',
            'ping_status'    => 'closed',
        ] );
        if ( $page_id && ! is_wp_error( $page_id ) ) {
            $seeded[] = $slug;
            $changed = true;
        }
    }

    if ( $changed ) {
        update_option( 'lum_seeded_pages', $seeded );
    }
}

// Run on theme activation (covers initial install).
add_action( 'after_switch_theme', 'luminary_seed_pages' );

// Safety net: also run once on init if the option says we haven't fully seeded.
// Cheap when the option already lists all 6 slugs (early return on first item).
add_action( 'init', function () {
    $seeded = get_option( 'lum_seeded_pages', [] );
    if ( count( (array) $seeded ) < 6 ) {
        luminary_seed_pages();
    }
}, 20 );
