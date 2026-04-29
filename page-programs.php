<?php
/**
 * Template Name: Luminary — Programs
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
$programs = luminary( 'programs' );
?>

<div style="padding-top:140px;">
    <div class="container">
        <div style="max-width:900px; margin-bottom:80px;">
            <?php luminary_eyebrow( 'The programs' ); ?>
            <h1 class="serif" style="font-size:clamp(48px,7vw,104px); line-height:0.95; font-weight:300; letter-spacing:-0.03em; margin-top:18px;">
                Rooms built for the <em style="color:var(--coral-deep);">decisions</em> that matter.
            </h1>
            <p style="margin-top:28px; font-size:18px; line-height:1.55; color:var(--charcoal-soft); max-width:620px;">
                Four programs, each selective by design. Choose the shape — a cohort, a pairing, a retreat circle, a sprint — and we&rsquo;ll make sure the people in the room match the work you came to do.
            </p>
        </div>

        <div style="display:flex; flex-direction:column; gap:80px;">
            <?php foreach ( $programs as $i => $p ) : ?>
                <div class="program-row" style="display:grid; grid-template-columns:1fr 1fr; gap:60px; align-items:center;">
                    <div class="program-row-img" style="order:<?php echo $i % 2 ? 2 : 1; ?>;">
                        <?php
                        $inner = '<div style="position:absolute; top:20px; left:20px; padding:8px 14px; border-radius:999px; background:rgba(255,251,242,0.85); backdrop-filter:blur(8px); font-size:10px; letter-spacing:0.2em; text-transform:uppercase; font-weight:500; z-index:2;">' . str_pad( (string)( $i + 1 ), 2, '0', STR_PAD_LEFT ) . ' · ' . esc_html( $p['kicker'] ) . '</div>';
                        luminary_plate( [
                            'variant' => $p['plate'],
                            'img'     => $p['img'],
                            'alt'     => $p['name'],
                            'style'   => 'aspect-ratio:4/5; border-radius:32px; box-shadow:0 40px 80px -30px rgba(61,44,44,0.2);',
                            'inner'   => $inner,
                        ] );
                        ?>
                    </div>
                    <div style="order:<?php echo $i % 2 ? 1 : 2; ?>;">
                        <?php luminary_eyebrow( $p['kicker'] ); ?>
                        <h2 class="serif" style="font-size:clamp(36px,4.5vw,60px); font-weight:300; letter-spacing:-0.02em; margin-top:12px; line-height:1.05;"><?php echo esc_html( $p['name'] ); ?></h2>
                        <p style="margin-top:20px; font-size:17px; line-height:1.6; color:var(--charcoal-soft); max-width:520px;"><?php echo esc_html( $p['description'] ); ?></p>
                        <dl style="margin-top:32px; display:grid; grid-template-columns:1fr 1fr; gap:18px 28px; max-width:460px;">
                            <?php foreach ( [
                                [ 'Duration',    $p['duration'] ],
                                [ 'Cohort',      $p['cohort'] ],
                                [ 'Investment', $p['investment'] ],
                                [ 'Cadence',    $p['cadence'] ],
                            ] as $kv ) : ?>
                                <div>
                                    <dt style="font-size:11px; letter-spacing:0.16em; text-transform:uppercase; color:var(--charcoal-muted); font-weight:500;"><?php echo esc_html( $kv[0] ); ?></dt>
                                    <dd class="serif" style="margin:0; font-size:18px; margin-top:4px;"><?php echo esc_html( $kv[1] ); ?></dd>
                                </div>
                            <?php endforeach; ?>
                        </dl>
                        <div style="margin-top:32px; padding:16px 20px; background:var(--ivory-pale); border-radius:16px; border:1px dashed rgba(232,184,107,0.6); display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:12px;">
                            <span style="font-size:13px; color:var(--charcoal); display:flex; align-items:center; gap:8px;">
                                <?php echo luminary_icon( 'sparkle', 14 ); ?> <?php echo esc_html( $p['next'] ); ?>
                            </span>
                            <?php luminary_pill( 'Apply', [ 'variant' => 'primary', 'icon' => 'arrow-right', 'href' => home_url( '/apply/' ) ] ); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div style="margin-top:120px;"><?php get_template_part( 'template-parts/cta' ); ?></div>
</div>

<style>
@media (max-width:860px) {
    .program-row { grid-template-columns:1fr !important; gap:32px !important; }
    .program-row-img { order:1 !important; }
    .program-row > div:nth-child(2) { order:2 !important; }
}
</style>

<?php get_footer();
