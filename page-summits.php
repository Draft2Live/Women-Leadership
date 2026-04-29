<?php
/**
 * Template Name: Luminary — Summits
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
$summits = luminary( 'summits' );
?>

<div style="padding-top:140px;">
    <div class="container">
        <div style="max-width:900px; margin-bottom:60px;">
            <?php luminary_eyebrow( 'Summits & gatherings' ); ?>
            <h1 class="serif" style="font-size:clamp(48px,7vw,104px); line-height:0.95; font-weight:300; letter-spacing:-0.03em; margin-top:18px;">
                Places we&rsquo;ve been <em style="color:var(--coral-deep);">and where we&rsquo;re going.</em>
            </h1>
            <p style="margin-top:28px; font-size:18px; line-height:1.55; color:var(--charcoal-soft); max-width:620px;">
                Three major summits a year, plus smaller salons scattered across the globe. Every gathering is small enough to know everyone&rsquo;s name by the end of dinner.
            </p>
        </div>

        <div class="summits-list" style="display:grid; grid-template-columns:repeat(2,1fr); gap:28px;">
            <?php foreach ( $summits as $s ) : ?>
                <article class="summit-card" style="background:var(--ivory-pale); border-radius:28px; overflow:hidden; border:1px solid rgba(61,44,44,0.06); display:grid; grid-template-columns:200px 1fr;">
                    <?php luminary_plate( [
                        'variant' => $s['plate'],
                        'img'     => $s['img'],
                        'alt'     => $s['title'],
                        'style'   => 'border-radius:0; min-height:260px;',
                    ] ); ?>
                    <div style="padding:28px; display:flex; flex-direction:column;">
                        <div style="display:flex; justify-content:space-between; align-items:flex-start; gap:12px;">
                            <div>
                                <?php luminary_eyebrow( $s['subtitle'] ); ?>
                                <h3 class="serif" style="font-size:30px; font-weight:400; margin-top:4px; letter-spacing:-0.015em;"><?php echo esc_html( $s['title'] ); ?></h3>
                            </div>
                            <span style="padding:4px 10px; border-radius:999px; background:<?php echo $s['status'] === 'upcoming' ? 'var(--coral)' : 'rgba(61,44,44,0.08)'; ?>; color:<?php echo $s['status'] === 'upcoming' ? 'var(--ivory-pale)' : 'var(--charcoal-muted)'; ?>; font-size:10px; letter-spacing:0.14em; text-transform:uppercase; font-weight:500; white-space:nowrap;">
                                <?php echo $s['status'] === 'upcoming' ? 'Open' : 'Archived'; ?>
                            </span>
                        </div>
                        <div style="margin-top:16px; display:flex; flex-direction:column; gap:8px; font-size:14px; color:var(--charcoal-soft);">
                            <div style="display:flex; align-items:center; gap:8px;"><?php echo luminary_icon( 'calendar', 14 ); ?> <?php echo esc_html( $s['date'] ); ?></div>
                            <div style="display:flex; align-items:center; gap:8px;"><?php echo luminary_icon( 'pin', 14 ); ?> <?php echo esc_html( $s['city'] ); ?> · <?php echo esc_html( $s['venue'] ); ?></div>
                        </div>
                        <?php if ( $s['status'] === 'upcoming' && ! empty( $s['spots'] ) ) : ?>
                            <div style="margin-top:auto; padding-top:18px; display:flex; justify-content:space-between; align-items:center; gap:12px;">
                                <span style="font-size:12px; color:var(--charcoal-muted);"><?php echo esc_html( $s['spots'] ); ?></span>
                                <?php luminary_pill( 'RSVP', [ 'variant' => 'primary', 'icon' => 'arrow-right', 'href' => home_url( '/apply/' ) ] ); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>

    <div style="margin-top:120px;"><?php get_template_part( 'template-parts/cta' ); ?></div>
</div>

<style>
@media (max-width:1100px) { .summits-list { grid-template-columns:1fr !important; } }
@media (max-width:640px)  { .summit-card { grid-template-columns:1fr !important; } .summit-card > .plate { min-height:220px !important; } }
</style>

<?php get_footer();
