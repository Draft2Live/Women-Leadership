<?php
/**
 * Template Name: Luminary — Apply
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>

<div style="padding:140px 0 80px;">
    <div class="container">
        <div class="apply-grid" style="display:grid; grid-template-columns:1fr 1fr; gap:80px; align-items:start;">
            <div>
                <?php luminary_eyebrow( 'Application' ); ?>
                <h1 class="serif" style="font-size:clamp(48px,6vw,88px); line-height:0.98; font-weight:300; letter-spacing:-0.03em; margin-top:18px;">
                    Tell us about <em style="color:var(--coral-deep);">the work.</em>
                </h1>
                <p style="margin-top:28px; font-size:17px; line-height:1.6; color:var(--charcoal-soft); max-width:460px;">
                    Applications take about fifteen minutes. A real human reads every answer. You&rsquo;ll hear back within two weeks — three for Inner Circle.
                </p>
                <div style="margin-top:40px; padding:24px 28px; background:var(--ivory-pale); border-radius:20px; border:1px dashed rgba(232,184,107,0.6);">
                    <div style="font-size:11px; letter-spacing:0.16em; text-transform:uppercase; color:var(--charcoal-muted); font-weight:500; margin-bottom:12px;">What we look for</div>
                    <ul style="margin:0; padding:0; list-style:none; display:flex; flex-direction:column; gap:8px; font-size:15px; line-height:1.5; color:var(--charcoal);">
                        <li>· A decision you&rsquo;re wrestling with — not a resume.</li>
                        <li>· Work we can point to, at any scale.</li>
                        <li>· A willingness to show up for other members.</li>
                    </ul>
                </div>
            </div>

            <form style="background:var(--ivory-pale); border-radius:28px; padding:40px; border:1px solid rgba(61,44,44,0.06); display:flex; flex-direction:column; gap:20px;">
                <?php
                $fields = [
                    [ 'name',    'Your name',            'text' ],
                    [ 'email',   'Email',                'email' ],
                    [ 'company', 'Company / project',    'text' ],
                    [ 'role',    'Role',                 'text' ],
                    [ 'url',     'LinkedIn or website',  'url' ],
                ];
                foreach ( $fields as $f ) : ?>
                    <label style="display:flex; flex-direction:column; gap:6px;">
                        <span style="font-size:11px; letter-spacing:0.14em; text-transform:uppercase; color:var(--charcoal-muted); font-weight:500;"><?php echo esc_html( $f[1] ); ?></span>
                        <input type="<?php echo esc_attr( $f[2] ); ?>" name="<?php echo esc_attr( $f[0] ); ?>" style="padding:12px 14px; background:var(--ivory); border:1px solid rgba(61,44,44,0.08); border-radius:12px; font-size:15px;" />
                    </label>
                <?php endforeach; ?>
                <label style="display:flex; flex-direction:column; gap:6px;">
                    <span style="font-size:11px; letter-spacing:0.14em; text-transform:uppercase; color:var(--charcoal-muted); font-weight:500;">What are you sitting with right now?</span>
                    <textarea name="question" rows="5" style="padding:12px 14px; background:var(--ivory); border:1px solid rgba(61,44,44,0.08); border-radius:12px; font-size:15px; resize:vertical; font-family:inherit;"></textarea>
                </label>
                <div style="margin-top:8px;">
                    <?php luminary_pill( 'Submit application', [ 'variant' => 'primary', 'icon' => 'arrow-right' ] ); ?>
                </div>
                <p style="font-size:12px; color:var(--charcoal-muted); line-height:1.6; margin-top:8px;">
                    By submitting, you agree to our <a href="#" style="color:var(--coral-deep);">privacy policy</a>. Your answers are read only by the admissions team.
                </p>
            </form>
        </div>
    </div>
</div>

<style>
@media (max-width:900px) { .apply-grid { grid-template-columns:1fr !important; gap:48px !important; } }
</style>

<?php get_footer();
