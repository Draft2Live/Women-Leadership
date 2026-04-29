<?php
/**
 * Template Name: Luminary — Stories
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
$stories = luminary( 'stories' );
?>

<div style="padding-top:140px;">
    <div class="container">
        <div style="max-width:900px; margin-bottom:60px;">
            <?php luminary_eyebrow( 'Stories & frameworks' ); ?>
            <h1 class="serif" style="font-size:clamp(48px,7vw,104px); line-height:0.95; font-weight:300; letter-spacing:-0.03em; margin-top:18px;">
                Essays, interviews, and <em style="color:var(--coral-deep);">frameworks we lean on.</em>
            </h1>
            <p style="margin-top:28px; font-size:18px; line-height:1.55; color:var(--charcoal-soft); max-width:620px;">
                Written by members, for members, and everyone else who wants to read over our shoulders. No growth hacks. No listicles.
            </p>
        </div>

        <div class="stories-grid" style="display:grid; grid-template-columns:repeat(3,1fr); gap:24px;">
            <?php foreach ( $stories as $s ) :
                $span = $s['size'] === 'wide' ? 2 : 1;
            ?>
                <article style="grid-column:span <?php echo $span; ?>; background:var(--ivory-pale); border-radius:24px; overflow:hidden; border:1px solid rgba(61,44,44,0.06); display:flex; flex-direction:column;">
                    <?php
                    $flex = $s['size'] === 'tall' ? 2 : 1;
                    $minh = $s['size'] === 'tall' ? 320 : 200;
                    $inner = '<div style="position:absolute; top:16px; left:16px; padding:5px 12px; border-radius:999px; background:rgba(255,251,242,0.9); backdrop-filter:blur(6px); font-size:10px; letter-spacing:0.14em; text-transform:uppercase; font-weight:500; z-index:2;">' . esc_html( $s['kicker'] ) . '</div>';
                    luminary_plate( [
                        'variant' => $s['plate'],
                        'img'     => $s['img'],
                        'alt'     => $s['title'],
                        'style'   => 'border-radius:0; flex:' . $flex . '; min-height:' . $minh . 'px;',
                        'inner'   => $inner,
                    ] );
                    ?>
                    <div style="padding:24px; flex:1; display:flex; flex-direction:column;">
                        <h3 class="serif" style="font-size:<?php echo $s['size'] === 'wide' ? 28 : 22; ?>px; font-weight:400; line-height:1.15; letter-spacing:-0.01em;"><?php echo esc_html( $s['title'] ); ?></h3>
                        <p style="margin-top:10px; font-size:14px; line-height:1.55; color:var(--charcoal-soft);"><?php echo esc_html( $s['excerpt'] ); ?></p>
                        <div style="margin-top:auto; padding-top:16px; display:flex; justify-content:space-between; align-items:center; font-size:12px; color:var(--charcoal-muted);">
                            <span class="serif" style="font-style:italic; color:var(--charcoal);"><?php echo esc_html( $s['author'] ); ?></span>
                            <span><?php echo esc_html( $s['readTime'] ); ?> · <?php echo esc_html( $s['date'] ); ?></span>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>

    <div style="margin-top:120px;"><?php get_template_part( 'template-parts/cta' ); ?></div>
</div>

<style>
@media (max-width:960px) {
    .stories-grid { grid-template-columns:repeat(2,1fr) !important; }
    .stories-grid article { grid-column:span 1 !important; }
}
@media (max-width:640px) { .stories-grid { grid-template-columns:1fr !important; } }
</style>

<?php get_footer();
