<?php
/**
 * Rendering helpers — small, composable, mirror the React primitives.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Image + gradient block. Pass `variant` for the gradient fallback,
 * `img` for the bundled PNG id.
 */
function luminary_plate( $args = [] ) {
    $a = wp_parse_args( $args, [
        'variant' => '',
        'img'     => '',
        'alt'     => '',
        'label'   => '',
        'class'   => '',
        'style'   => '',
        'inner'   => '', // raw HTML to render inside the plate
    ] );
    $cls = 'plate ' . esc_attr( $a['variant'] ) . ' ' . esc_attr( $a['class'] );
    $style = $a['style'] ? ' style="' . esc_attr( $a['style'] ) . '"' : '';
    ?>
    <div class="<?php echo $cls; ?>"<?php echo $style; ?>>
        <?php if ( $a['img'] ) : ?>
            <img class="plate-img"
                 src="<?php echo esc_url( luminary_img( $a['img'] ) ); ?>"
                 alt="<?php echo esc_attr( $a['alt'] ); ?>"
                 loading="lazy" />
        <?php endif; ?>
        <?php if ( $a['label'] ) : ?>
            <div class="plate-label"><?php echo esc_html( $a['label'] ); ?></div>
        <?php endif; ?>
        <?php echo $a['inner']; // raw HTML (already escaped by caller) ?>
    </div>
    <?php
}

/**
 * Inline SVG icons — matches the React Icon set.
 */
function luminary_icon( $name, $size = 18 ) {
    $stroke = 1.5;
    $s = (int) $size;
    $common = 'width="' . $s . '" height="' . $s . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="' . $stroke . '" stroke-linecap="round" stroke-linejoin="round"';
    $icons = [
        'arrow-right'    => '<svg ' . $common . '><path d="M5 12h14M13 5l7 7-7 7"/></svg>',
        'arrow-up-right' => '<svg ' . $common . '><path d="M7 17L17 7M8 7h9v9"/></svg>',
        'arrow-left'    => '<svg ' . $common . '><path d="M19 12H5M11 5l-7 7 7 7"/></svg>',
        'play'          => '<svg ' . $common . '><path d="M8 5v14l11-7z" fill="currentColor"/></svg>',
        'plus'          => '<svg ' . $common . '><path d="M12 5v14M5 12h14"/></svg>',
        'minus'         => '<svg ' . $common . '><path d="M5 12h14"/></svg>',
        'check'         => '<svg ' . $common . '><path d="M5 12l5 5 9-11"/></svg>',
        'x'             => '<svg ' . $common . '><path d="M6 6l12 12M6 18L18 6"/></svg>',
        'search'        => '<svg ' . $common . '><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/></svg>',
        'linkedin'      => '<svg viewBox="0 0 24 24" width="' . $s . '" height="' . $s . '" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.87 6 2.5 6S.02 4.88.02 3.5 1.13 1 2.5 1s2.48 1.12 2.48 2.5zM0 8h5v16H0V8zm7.5 0H12v2.2h.07c.63-1.18 2.17-2.42 4.47-2.42 4.78 0 5.66 3.15 5.66 7.24V24h-5v-7.1c0-1.7-.03-3.88-2.36-3.88-2.36 0-2.72 1.85-2.72 3.76V24h-5V8z"/></svg>',
        'instagram'     => '<svg ' . $common . '><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="0.8" fill="currentColor"/></svg>',
        'spotify'       => '<svg viewBox="0 0 24 24" width="' . $s . '" height="' . $s . '" fill="currentColor"><path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.52 17.34c-.24.36-.66.48-1.02.24-2.82-1.74-6.36-2.1-10.56-1.14-.42.12-.78-.18-.9-.54-.12-.42.18-.78.54-.9 4.56-1.02 8.52-.6 11.64 1.32.42.18.48.66.3 1.02zm1.44-3.3c-.3.42-.84.6-1.26.3-3.24-1.98-8.16-2.58-11.94-1.38-.48.12-1.02-.12-1.14-.6-.12-.48.12-1.02.6-1.14 4.38-1.32 9.78-.66 13.5 1.62.36.18.54.78.24 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.3c-.6.18-1.2-.18-1.38-.72-.18-.6.18-1.2.72-1.38 4.26-1.26 11.28-1.02 15.72 1.62.54.3.72 1.02.42 1.56-.3.42-1.02.6-1.56.3z"/></svg>',
        'calendar'      => '<svg ' . $common . '><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>',
        'pin'           => '<svg ' . $common . '><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>',
        'sparkle'       => '<svg ' . $common . '><path d="M12 3v4M12 17v4M3 12h4M17 12h4M5.6 5.6l2.8 2.8M15.6 15.6l2.8 2.8M5.6 18.4l2.8-2.8M15.6 8.4l2.8-2.8"/></svg>',
        'sun'           => '<svg ' . $common . '><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/></svg>',
        'menu'          => '<svg ' . $common . '><path d="M3 6h18M3 12h18M3 18h18"/></svg>',
        'chevron-down'  => '<svg ' . $common . '><path d="M6 9l6 6 6-6"/></svg>',
        'chevron-right' => '<svg ' . $common . '><path d="M9 6l6 6-6 6"/></svg>',
    ];
    return $icons[ $name ] ?? '';
}

/**
 * Pill button (renders as <a> or <button>).
 */
function luminary_pill( $label, $opts = [] ) {
    $o = wp_parse_args( $opts, [
        'variant' => 'primary', 'icon' => '', 'href' => '', 'class' => '', 'style' => '',
    ] );
    $cls = 'pill pill-' . esc_attr( $o['variant'] ) . ' ' . esc_attr( $o['class'] );
    $style = $o['style'] ? ' style="' . esc_attr( $o['style'] ) . '"' : '';
    $inner = '<span>' . esc_html( $label ) . '</span>';
    if ( $o['icon'] ) $inner .= luminary_icon( $o['icon'], 14 );
    if ( $o['href'] ) {
        echo '<a class="' . $cls . '" href="' . esc_url( $o['href'] ) . '"' . $style . '>' . $inner . '</a>';
    } else {
        echo '<button type="button" class="' . $cls . '"' . $style . '>' . $inner . '</button>';
    }
}

function luminary_eyebrow( $text, $color = '' ) {
    $style = $color ? ' style="color:' . esc_attr( $color ) . '"' : '';
    echo '<div class="eyebrow"' . $style . '>' . esc_html( $text ) . '</div>';
}

/**
 * Section header — eyebrow, italicized words inside the title, optional subtitle.
 */
function luminary_section_header( $args = [] ) {
    $a = wp_parse_args( $args, [
        'eyebrow'  => '', 'title' => '', 'subtitle' => '',
        'align'    => 'left',
        'italic'   => [], // list of word slugs (lowercased, punctuation stripped) to italicize
    ] );
    $align_cls = $a['align'] === 'center' ? 'center' : '';
    echo '<div class="section-header ' . $align_cls . '">';
    if ( $a['eyebrow'] ) luminary_eyebrow( $a['eyebrow'] );
    echo '<h2 class="serif">';
    $words = explode( ' ', $a['title'] );
    foreach ( $words as $i => $w ) {
        $slug = strtolower( preg_replace( '/[^\w]/', '', $w ) );
        if ( in_array( $slug, $a['italic'], true ) ) {
            echo '<em>' . esc_html( $w ) . '</em>';
        } else {
            echo esc_html( $w );
        }
        if ( $i < count( $words ) - 1 ) echo ' ';
    }
    echo '</h2>';
    if ( $a['subtitle'] ) echo '<p class="subtitle">' . esc_html( $a['subtitle'] ) . '</p>';
    echo '</div>';
}

/**
 * Testimonial card.
 */
function luminary_testimonial_card( $t, $compact = false ) {
    $size = $compact ? 280 : 340;
    $pad  = $compact ? '20px' : '28px';
    ?>
    <div class="testi-card<?php echo $compact ? ' compact' : ''; ?>"
         style="background:rgba(255,251,242,.82);backdrop-filter:blur(14px);border-radius:24px;border:1px solid rgba(255,255,255,.7);box-shadow:0 20px 60px -20px rgba(61,44,44,.2);padding:<?php echo $pad; ?>;width:<?php echo $size; ?>px;">
        <div style="display:flex;align-items:center;gap:12px;margin-bottom:<?php echo $compact ? 14 : 18; ?>px;">
            <div style="position:relative;width:56px;height:56px;flex-shrink:0;">
                <?php luminary_plate( [
                    'variant' => $t['plate'] ?? '',
                    'img'     => $t['img'] ?? '',
                    'alt'     => $t['name'] ?? '',
                    'style'   => 'width:56px;height:56px;border-radius:50%;',
                ] ); ?>
            </div>
            <div>
                <div class="eyebrow">Meet a Member</div>
                <div class="serif" style="font-size:15px;font-style:italic;margin-top:2px;color:var(--charcoal-soft);"><?php echo esc_html( $t['role'] ); ?></div>
            </div>
        </div>
        <p class="serif" style="font-size:<?php echo $compact ? 16 : 18; ?>px;line-height:1.45;font-style:italic;color:var(--charcoal);margin-bottom:<?php echo $compact ? 12 : 16; ?>px;">
            &ldquo;<?php echo esc_html( $t['quote'] ); ?>&rdquo;
        </p>
        <div style="display:flex;justify-content:space-between;align-items:center;">
            <div style="font-size:12px;font-weight:500;letter-spacing:.04em;color:var(--charcoal);">— <?php echo esc_html( $t['name'] ); ?></div>
            <div style="display:flex;gap:10px;color:var(--charcoal-muted);">
                <a href="#"><?php echo luminary_icon( 'linkedin', 14 ); ?></a>
                <a href="#"><?php echo luminary_icon( 'instagram', 14 ); ?></a>
            </div>
        </div>
    </div>
    <?php
}

/**
 * Polylang language switcher.
 * Renders nothing if Polylang is not active. Markup matches site style.
 * Use: <?php luminary_language_switcher(); ?> in header.php.
 */
function luminary_language_switcher() {
    if ( ! function_exists( 'pll_the_languages' ) || ! function_exists( 'pll_current_language' ) ) {
        return;
    }
    $langs = pll_the_languages( [
        'raw'              => 1,
        'hide_if_empty'    => 0,
        'display_names_as' => 'slug',
        'echo'             => 0,
    ] );
    if ( ! is_array( $langs ) || empty( $langs ) ) return;

    echo '<div class="lang-switch">';
    $items = array_values( $langs );
    $total = count( $items );
    foreach ( $items as $i => $lang ) {
        $is_current = ! empty( $lang['current_lang'] );
        $url        = ! empty( $lang['no_translation'] ) ? home_url( '/' ) : ( $lang['url'] ?? '#' );
        $slug       = isset( $lang['slug'] ) ? strtoupper( $lang['slug'] ) : '';
        $cls        = 'lang-btn' . ( $is_current ? ' lang-btn--active' : '' );
        printf(
            '<a class="%s" href="%s" hreflang="%s" lang="%s">%s</a>',
            esc_attr( $cls ),
            esc_url( $url ),
            esc_attr( $lang['locale'] ?? $lang['slug'] ?? '' ),
            esc_attr( $lang['locale'] ?? $lang['slug'] ?? '' ),
            esc_html( $slug )
        );
        if ( $i < $total - 1 ) {
            echo '<span class="lang-sep">/</span>';
        }
    }
    echo '</div>';
}
