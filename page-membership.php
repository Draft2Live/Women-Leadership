<?php
/**
 * Template Name: Luminary — Membership
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
$tiers = luminary( 'tiers' );
$faqs  = luminary( 'faqs' );
?>

<div style="padding-top:140px;">
    <div class="container">
        <div style="max-width:900px; margin-bottom:60px;">
            <?php luminary_eyebrow( 'Membership' ); ?>
            <h1 class="serif" style="font-size:clamp(48px,7vw,104px); line-height:0.95; font-weight:300; letter-spacing:-0.03em; margin-top:18px;">
                Three tiers, <em style="color:var(--coral-deep);">one community.</em>
            </h1>
            <p style="margin-top:28px; font-size:18px; line-height:1.55; color:var(--charcoal-soft); max-width:620px;">
                Most members start at Circle and grow into Collective. Inner Circle is by nomination only. You can&rsquo;t buy your way in — but if you&rsquo;re right, you&rsquo;re welcome.
            </p>
        </div>

        <div class="tiers-grid" style="display:grid; grid-template-columns:repeat(3,1fr); gap:24px; align-items:stretch;">
            <?php foreach ( $tiers as $t ) :
                $featured = ! empty( $t['featured'] );
            ?>
                <div style="position:relative; background:var(--ivory-pale); border-radius:28px; padding:32px; border:1px solid <?php echo $featured ? 'var(--coral)' : 'rgba(61,44,44,0.08)'; ?>; display:flex; flex-direction:column; box-shadow:<?php echo $featured ? '0 30px 80px -30px rgba(255,140,105,0.4)' : 'none'; ?>;">
                    <?php if ( $featured ) : ?>
                        <div style="position:absolute; top:-14px; left:50%; transform:translateX(-50%); padding:6px 16px; border-radius:999px; background:var(--coral); color:var(--ivory-pale); font-size:10px; letter-spacing:0.2em; text-transform:uppercase; font-weight:500;">Most chosen</div>
                    <?php endif; ?>
                    <?php luminary_plate( [
                        'variant' => $t['plate'],
                        'img'     => $t['img'],
                        'alt'     => $t['name'],
                        'style'   => 'aspect-ratio:3/2; border-radius:20px; margin-bottom:24px;',
                    ] ); ?>
                    <h3 class="serif" style="font-size:36px; font-weight:300; letter-spacing:-0.02em;"><?php echo esc_html( $t['name'] ); ?></h3>
                    <div style="display:flex; align-items:baseline; gap:8px; margin-top:12px;">
                        <span class="serif" style="font-size:44px; font-weight:300; letter-spacing:-0.02em;"><?php echo esc_html( $t['price'] ); ?></span>
                        <span style="font-size:13px; color:var(--charcoal-muted);"><?php echo esc_html( $t['cadence'] ); ?></span>
                    </div>
                    <p style="margin-top:14px; font-size:15px; line-height:1.55; color:var(--charcoal-soft);"><?php echo esc_html( $t['summary'] ); ?></p>

                    <ul style="margin-top:24px; padding:0; list-style:none; display:flex; flex-direction:column; gap:10px; flex:1;">
                        <?php foreach ( $t['features'] as $f ) : ?>
                            <li style="display:flex; align-items:flex-start; gap:10px; font-size:14px; line-height:1.5; color:<?php echo $f['included'] ? 'var(--charcoal)' : 'var(--charcoal-muted)'; ?>; <?php echo $f['included'] ? '' : 'text-decoration:line-through;'; ?>">
                                <span style="flex-shrink:0; margin-top:3px; color:<?php echo $f['included'] ? 'var(--coral)' : 'var(--charcoal-muted)'; ?>;"><?php echo luminary_icon( $f['included'] ? 'check' : 'x', 14 ); ?></span>
                                <span><?php echo esc_html( $f['label'] ); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <div style="margin-top:28px;">
                        <?php luminary_pill( $featured ? 'Apply to Collective' : 'Choose ' . $t['name'], [
                            'variant' => $featured ? 'primary' : 'ghost',
                            'icon'    => 'arrow-right',
                            'href'    => home_url( '/apply/' ),
                        ] ); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div style="margin-top:120px; max-width:820px; margin-left:auto; margin-right:auto;">
            <?php luminary_section_header( [
                'eyebrow' => 'Frequently asked',
                'title'   => 'Questions we get most.',
                'italic'  => [ 'most.' ],
                'align'   => 'center',
            ] ); ?>
            <div style="margin-top:48px; display:flex; flex-direction:column; gap:4px;">
                <?php foreach ( $faqs as $f ) : ?>
                    <details style="padding:22px 24px; background:var(--ivory-pale); border-radius:16px; border:1px solid rgba(61,44,44,0.06);">
                        <summary class="serif" style="cursor:pointer; font-size:20px; font-weight:400; letter-spacing:-0.01em; list-style:none; display:flex; justify-content:space-between; align-items:center; gap:16px;">
                            <span><?php echo esc_html( $f['q'] ); ?></span>
                            <span style="color:var(--coral-deep); font-size:22px; line-height:1;">+</span>
                        </summary>
                        <p style="margin-top:14px; font-size:15px; line-height:1.6; color:var(--charcoal-soft);"><?php echo esc_html( $f['a'] ); ?></p>
                    </details>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div style="margin-top:120px;"><?php get_template_part( 'template-parts/cta' ); ?></div>
</div>

<style>
@media (max-width:960px) { .tiers-grid { grid-template-columns:1fr !important; } }
</style>

<?php get_footer();
