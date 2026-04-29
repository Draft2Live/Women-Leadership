<?php
/**
 * Final call-to-action — used on multiple pages.
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<section style="padding:120px 0 60px; position:relative;">
    <div class="container">
        <div style="position:relative; border-radius:40px; overflow:hidden; background:linear-gradient(135deg, var(--peach) 0%, var(--coral) 60%, var(--honey) 120%); padding:clamp(60px,8vw,120px) clamp(32px,6vw,80px); text-align:center; color:var(--charcoal);">
            <div style="position:absolute; top:-30%; right:-10%; width:500px; height:500px; border-radius:50%; background:radial-gradient(circle, rgba(255,251,242,0.5), transparent 60%);"></div>
            <div style="position:relative;">
                <div style="display:inline-flex; padding:6px 14px; border-radius:999px; background:rgba(255,251,242,0.7); margin-bottom:24px; font-size:11px; letter-spacing:0.2em; text-transform:uppercase; font-weight:500;">
                    Applications open for Spring 2026
                </div>
                <h2 class="serif" style="font-size:clamp(44px,7vw,100px); line-height:0.95; font-weight:300; letter-spacing:-0.03em; color:var(--charcoal);">
                    The room is <em style="font-style:italic;">waiting.</em>
                </h2>
                <p style="margin:24px auto 0; max-width:560px; font-size:17px; line-height:1.55; color:rgba(61,44,44,0.85);">
                    Applications take about fifteen minutes. We read every one. If you&rsquo;re right for the collective, we&rsquo;ll know — and so will you.
                </p>
                <div style="margin-top:40px; display:flex; justify-content:center; gap:14px; flex-wrap:wrap;">
                    <a class="pill" href="<?php echo esc_url( home_url( '/apply/' ) ); ?>" style="background:var(--charcoal); color:var(--ivory-pale); padding:16px 28px;">
                        <span>Apply to the collective</span>
                        <?php echo luminary_icon( 'arrow-right', 14 ); ?>
                    </a>
                    <a class="pill pill-ivory" href="<?php echo esc_url( home_url( '/membership/' ) ); ?>" style="padding:16px 28px;">
                        <span>Compare tiers</span>
                        <?php echo luminary_icon( 'arrow-up-right', 14 ); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
