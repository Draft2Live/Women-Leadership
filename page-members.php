<?php
/**
 * Template Name: Luminary — Members
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
$members = luminary( 'members' );
?>

<div style="padding-top:140px;">
    <div class="container">
        <div style="max-width:900px; margin-bottom:60px;">
            <?php luminary_eyebrow( 'The collective' ); ?>
            <h1 class="serif" style="font-size:clamp(48px,7vw,104px); line-height:0.95; font-weight:300; letter-spacing:-0.03em; margin-top:18px;">
                A directory of <em style="color:var(--coral-deep);">women worth knowing.</em>
            </h1>
            <p style="margin-top:28px; font-size:18px; line-height:1.55; color:var(--charcoal-soft); max-width:620px;">
                Twelve hundred and change, across forty-six countries. Each one hand-reviewed, each one here because another member recognized the work.
            </p>
        </div>

        <div class="members-grid" style="display:grid; grid-template-columns:repeat(4,1fr); gap:28px;">
            <?php foreach ( $members as $m ) : ?>
                <div style="display:block; text-align:left;">
                    <div style="position:relative;">
                        <?php
                        $inner = '<div style="position:absolute; inset:0; border-radius:20px; background:linear-gradient(180deg, transparent 30%, rgba(61,44,44,0.75)); display:flex; align-items:flex-end; padding:20px; opacity:0; transition:opacity 0.4s;" class="m-hover"><p class="serif" style="font-size:14px; font-style:italic; color:var(--ivory-pale); line-height:1.4; margin:0;">&ldquo;' . esc_html( $m['quote'] ) . '&rdquo;</p></div>';
                        luminary_plate( [
                            'variant' => $m['plate'],
                            'img'     => $m['img'],
                            'alt'     => $m['name'],
                            'style'   => 'aspect-ratio:4/5; border-radius:20px;',
                            'inner'   => $inner,
                        ] );
                        ?>
                    </div>
                    <div style="padding-top:14px;">
                        <div class="serif" style="font-size:18px; letter-spacing:-0.01em;"><?php echo esc_html( $m['name'] ); ?></div>
                        <div style="font-size:12px; color:var(--charcoal-soft); margin-top:4px;"><?php echo esc_html( $m['role'] ); ?></div>
                        <div style="font-size:12px; color:var(--charcoal-muted); margin-top:2px; font-family:var(--serif); font-style:italic;"><?php echo esc_html( $m['company'] ); ?></div>
                        <div style="margin-top:10px; display:flex; gap:6px; flex-wrap:wrap;">
                            <span style="font-size:10px; padding:3px 8px; background:var(--ivory-deep); border-radius:999px; letter-spacing:0.06em;"><?php echo esc_html( $m['industry'] ); ?></span>
                            <span style="font-size:10px; padding:3px 8px; background:var(--ivory-deep); border-radius:999px; letter-spacing:0.06em;"><?php echo esc_html( $m['region'] ); ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div style="margin-top:120px;"><?php get_template_part( 'template-parts/cta' ); ?></div>
</div>

<style>
@media (max-width:1100px) { .members-grid { grid-template-columns:repeat(3,1fr) !important; } }
@media (max-width:720px)  { .members-grid { grid-template-columns:repeat(2,1fr) !important; gap:20px !important; } }
</style>

<?php get_footer();
