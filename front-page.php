<?php
/**
 * Home page — hero, press, featured members, programs preview, testimonials, summits, CTA.
 */
if ( ! defined( 'ABSPATH' ) ) exit;

get_header();

$d = luminary_data();
$testi  = $d['testimonials'];
$members = array_slice( $d['members'], 0, 6 );
$programs = $d['programs'];
$upcoming = array_values( array_filter( $d['summits'], fn( $s ) => $s['status'] === 'upcoming' ) );
?>

<section style="position:relative; min-height:100vh; padding-top:120px; overflow:hidden;">
    <div style="position:absolute; top:-10%; right:-15%; width:900px; height:900px; border-radius:50%; background:radial-gradient(circle, rgba(232,184,107,0.35), transparent 60%); pointer-events:none;"></div>
    <div style="position:absolute; bottom:10%; left:-10%; width:600px; height:600px; border-radius:50%; background:radial-gradient(circle, rgba(244,194,194,0.3), transparent 60%); pointer-events:none;"></div>

    <div class="container" style="position:relative;">
        <div class="hero-grid" style="display:grid; grid-template-columns:80px minmax(0,1fr) minmax(0,440px); gap:40px; align-items:center;">
            <div class="hero-rail" style="display:flex; flex-direction:column; align-items:center; gap:24px; height:520px; justify-content:center;">
                <div class="serif" style="writing-mode:vertical-rl; transform:rotate(180deg); font-size:clamp(40px,6vw,72px); letter-spacing:0.04em; font-style:italic; color:var(--coral-deep); font-weight:300; line-height:1;">RISE &amp;</div>
                <div style="width:1px; height:40px; background:var(--honey);"></div>
                <div class="serif" style="writing-mode:vertical-rl; transform:rotate(180deg); font-size:clamp(40px,6vw,72px); letter-spacing:0.04em; font-style:italic; color:transparent; -webkit-text-stroke:1.2px var(--coral-deep); font-weight:300; line-height:1;">SHINE</div>
            </div>

            <div style="position:relative;">
                <?php luminary_eyebrow( 'The Collective — Est. 2020' ); ?>
                <h1 class="serif" style="font-size:clamp(48px,6.4vw,104px); line-height:0.95; font-weight:300; letter-spacing:-0.03em; margin-top:18px; text-transform:uppercase;">
                    A home<br>
                    for women<br>
                    <span style="font-style:italic; font-weight:300; text-transform:none; color:var(--coral-deep);">who are rising.</span>
                </h1>
                <p style="margin-top:28px; max-width:460px; font-size:17px; line-height:1.55; color:var(--charcoal-soft);">
                    Luminary is a private collective for executives, founders, and creatives who&rsquo;ve outgrown the room. Mentorship that takes itself seriously. Retreats that don&rsquo;t. A network that shows up before you ask.
                </p>
                <div style="margin-top:28px; display:flex; gap:12px; align-items:center; flex-wrap:wrap;">
                    <?php luminary_pill( 'Apply to Join',   [ 'variant' => 'primary', 'icon' => 'arrow-right', 'href' => home_url( '/apply/' ) ] ); ?>
                    <?php luminary_pill( 'Tour the programs', [ 'variant' => 'ghost', 'icon' => 'play', 'href' => home_url( '/programs/' ) ] ); ?>
                </div>
            </div>

            <div class="hero-portrait-col" style="position:relative;">
                <?php
                ob_start();
                ?>
                <div class="hero-testimonial" style="position:absolute; bottom:-36px; right:-24px; z-index:3;">
                    <?php luminary_testimonial_card( $testi[0], true ); ?>
                </div>
                <?php
                $inner = ob_get_clean();
                luminary_plate( [
                    'variant' => 'v-coral',
                    'img'     => 'hero-portrait',
                    'alt'     => 'Luminary hero portrait',
                    'style'   => 'aspect-ratio:3/4; border-radius:28px; border:1px solid rgba(255,255,255,0.6); box-shadow:0 40px 80px -30px rgba(61,44,44,0.25);',
                    'inner'   => $inner,
                ] );
                ?>
            </div>
        </div>

        <div class="hero-stats-row" style="margin-top:90px; display:grid; grid-template-columns:repeat(3,1fr) auto; gap:40px; align-items:end;">
            <?php foreach ( [
                [ '1,284',  'members worldwide' ],
                [ '46',     'countries represented' ],
                [ '12 yrs', 'median leadership tenure' ],
            ] as $s ) : ?>
                <div>
                    <div class="serif" style="font-size:44px; font-weight:300; letter-spacing:-0.02em; line-height:1;"><?php echo esc_html( $s[0] ); ?></div>
                    <div style="font-size:12px; letter-spacing:0.08em; text-transform:uppercase; color:var(--charcoal-muted); margin-top:8px;"><?php echo esc_html( $s[1] ); ?></div>
                </div>
            <?php endforeach; ?>
            <div style="display:flex; gap:14px; color:var(--charcoal-muted); justify-self:end;">
                <?php foreach ( [ 'linkedin', 'instagram', 'spotify' ] as $i ) : ?>
                    <a href="#" style="width:42px; height:42px; border-radius:50%; border:1px solid rgba(61,44,44,0.15); display:flex; align-items:center; justify-content:center;"><?php echo luminary_icon( $i, 14 ); ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<section style="padding:80px 0 40px;">
    <div class="container">
        <div style="text-align:center; margin-bottom:32px;"><?php luminary_eyebrow( 'As featured in' ); ?></div>
        <div style="display:flex; flex-wrap:wrap; justify-content:center; gap:clamp(24px,5vw,60px); align-items:center; opacity:0.7;">
            <?php foreach ( luminary( 'press' ) as $p ) : ?>
                <div class="serif" style="font-size:clamp(18px,2.2vw,26px); font-style:italic; font-weight:300; color:var(--charcoal);"><?php echo esc_html( $p ); ?></div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section style="padding:100px 0; position:relative;">
    <div class="container">
        <div class="band-head" style="display:grid; grid-template-columns:1fr 1fr; gap:40px; align-items:end; margin-bottom:48px;">
            <?php luminary_section_header( [
                'eyebrow' => 'Meet the collective',
                'title'   => "Women we're paying attention to",
                'italic'  => [ 'attention', 'to' ],
            ] ); ?>
            <div style="justify-self:end;">
                <div style="font-size:13px; color:var(--charcoal-muted); letter-spacing:0.06em; text-transform:uppercase;">
                    1,284 members · 46 countries
                </div>
            </div>
        </div>
        <div class="band-grid" style="display:grid; grid-template-columns:repeat(6,1fr); gap:16px;">
            <?php foreach ( $members as $i => $m ) : ?>
                <div style="position:relative;">
                    <?php luminary_plate( [
                        'variant' => $m['plate'],
                        'img'     => $m['img'],
                        'alt'     => $m['name'],
                        'style'   => 'aspect-ratio:3/4; border-radius:20px; margin-bottom:12px; transform:' . ( $i % 2 ? 'translateY(32px)' : 'translateY(0)' ) . ';',
                    ] ); ?>
                    <div style="transform:<?php echo $i % 2 ? 'translateY(32px)' : 'translateY(0)'; ?>;">
                        <div class="serif" style="font-size:16px; font-style:italic;"><?php echo esc_html( $m['name'] ); ?></div>
                        <div style="font-size:11px; color:var(--charcoal-muted); letter-spacing:0.06em; text-transform:uppercase; margin-top:2px;"><?php echo esc_html( $m['company'] ); ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section style="padding:120px 0; background:linear-gradient(180deg, transparent 0%, var(--ivory-deep) 30%, var(--ivory-deep) 70%, transparent 100%);">
    <div class="container">
        <div class="band-head" style="display:grid; grid-template-columns:1fr 1fr; gap:60px; margin-bottom:60px;">
            <?php luminary_section_header( [
                'eyebrow' => 'The work',
                'title'   => 'Four programs, one philosophy.',
                'italic'  => [ 'one', 'philosophy.' ],
            ] ); ?>
            <div style="align-self:end; max-width:420px;">
                <p style="font-size:17px; line-height:1.55; color:var(--charcoal-soft);">
                    We don&rsquo;t sell courses. We build rooms — small, selective, and careful about who&rsquo;s in them. Every program exists to answer a question you&rsquo;ve been sitting with.
                </p>
            </div>
        </div>
        <div class="programs-preview-grid" style="display:grid; grid-template-columns:repeat(2,1fr); gap:24px;">
            <?php foreach ( $programs as $p ) : ?>
                <a href="<?php echo esc_url( home_url( '/programs/' ) ); ?>" style="display:block; width:100%; background:var(--ivory-pale); border:1px solid rgba(61,44,44,0.06); border-radius:28px; overflow:hidden;">
                    <?php luminary_plate( [
                        'variant' => $p['plate'],
                        'img'     => $p['img'],
                        'alt'     => $p['name'],
                        'style'   => 'aspect-ratio:16/9; border-radius:0;',
                    ] ); ?>
                    <div style="padding:28px;">
                        <div style="display:flex; justify-content:space-between; align-items:baseline; margin-bottom:12px;">
                            <div class="eyebrow"><?php echo esc_html( $p['kicker'] ); ?></div>
                            <span style="font-size:12px; color:var(--charcoal-muted);"><?php echo esc_html( $p['duration'] ); ?></span>
                        </div>
                        <h3 class="serif" style="font-size:28px; font-weight:400; letter-spacing:-0.01em;"><?php echo esc_html( $p['name'] ); ?></h3>
                        <p style="margin-top:10px; font-size:15px; line-height:1.55; color:var(--charcoal-soft);"><?php echo esc_html( $p['description'] ); ?></p>
                        <div style="margin-top:20px; padding-top:16px; border-top:1px dashed rgba(61,44,44,0.15); display:flex; justify-content:space-between; align-items:center;">
                            <span style="font-size:12px; letter-spacing:0.08em; text-transform:uppercase; color:var(--charcoal-muted);"><?php echo esc_html( $p['next'] ); ?></span>
                            <span style="font-size:13px; font-weight:500; color:var(--coral-deep); display:flex; align-items:center; gap:6px;">Learn more <?php echo luminary_icon( 'arrow-up-right', 14 ); ?></span>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section style="padding:120px 0; position:relative; overflow:hidden;">
    <div style="position:absolute; top:50%; left:-10%; transform:translateY(-50%); width:500px; height:500px; border-radius:50%; background:radial-gradient(circle, rgba(255,181,167,0.25), transparent 60%); pointer-events:none;"></div>
    <div class="container" style="position:relative;">
        <div style="text-align:center; margin-bottom:50px;">
            <?php luminary_eyebrow( 'In their words' ); ?>
        </div>
        <div style="max-width:900px; margin:0 auto; text-align:center;">
            <blockquote class="serif" style="font-size:clamp(28px,4vw,48px); line-height:1.2; font-style:italic; font-weight:300; margin:0; letter-spacing:-0.015em;">
                <span style="color:var(--coral-deep); font-size:1.2em;">&ldquo;</span>
                <?php echo esc_html( $testi[0]['quote'] ); ?>
                <span style="color:var(--coral-deep); font-size:1.2em;">&rdquo;</span>
            </blockquote>
            <div style="margin-top:30px; display:flex; align-items:center; justify-content:center; gap:14px;">
                <?php luminary_plate( [
                    'variant' => $testi[0]['plate'],
                    'img'     => $testi[0]['img'],
                    'alt'     => $testi[0]['name'],
                    'style'   => 'width:48px; height:48px; border-radius:50%;',
                ] ); ?>
                <div style="text-align:left;">
                    <div style="font-size:14px; font-weight:500;"><?php echo esc_html( $testi[0]['name'] ); ?></div>
                    <div style="font-size:12px; color:var(--charcoal-muted); letter-spacing:0.04em;"><?php echo esc_html( $testi[0]['role'] ); ?></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section style="padding:120px 0;">
    <div class="container">
        <div class="band-head" style="display:grid; grid-template-columns:1fr 1fr; gap:60px; margin-bottom:50px;">
            <?php luminary_section_header( [
                'eyebrow' => 'Gatherings',
                'title'   => 'Where the collective meets.',
                'italic'  => [ 'meets.' ],
            ] ); ?>
            <div style="align-self:end; justify-self:end;">
                <?php luminary_pill( 'All summits', [ 'variant' => 'ghost', 'icon' => 'arrow-right', 'href' => home_url( '/summits/' ) ] ); ?>
            </div>
        </div>
        <div class="summits-grid" style="display:grid; grid-template-columns:repeat(3,1fr); gap:20px;">
            <?php foreach ( $upcoming as $s ) : ?>
                <div style="background:var(--ivory-pale); border-radius:24px; overflow:hidden; border:1px solid rgba(61,44,44,0.06);">
                    <?php
                    $inner = '<div style="position:absolute; top:16px; left:16px; padding:6px 12px; border-radius:999px; background:rgba(255,251,242,0.9); backdrop-filter:blur(8px); font-size:10px; letter-spacing:0.12em; text-transform:uppercase; font-weight:500;">' . esc_html( $s['date'] ) . '</div>';
                    luminary_plate( [
                        'variant' => $s['plate'],
                        'img'     => $s['img'],
                        'alt'     => $s['title'],
                        'style'   => 'aspect-ratio:5/4; border-radius:0;',
                        'inner'   => $inner,
                    ] );
                    ?>
                    <div style="padding:24px;">
                        <div class="serif" style="font-size:24px; font-style:italic; color:var(--coral-deep);"><?php echo esc_html( $s['title'] ); ?></div>
                        <div class="serif" style="font-size:18px; margin-top:4px;"><?php echo esc_html( $s['city'] ); ?></div>
                        <div style="font-size:13px; color:var(--charcoal-muted); margin-top:8px;"><?php echo esc_html( $s['venue'] ); ?></div>
                        <div style="margin-top:16px; padding-top:14px; border-top:1px solid rgba(61,44,44,0.08); display:flex; justify-content:space-between; align-items:center;">
                            <span style="font-size:12px; color:var(--charcoal-muted);"><?php echo esc_html( $s['spots'] ); ?></span>
                            <a href="<?php echo esc_url( home_url( '/summits/' ) ); ?>" style="font-size:13px; color:var(--coral-deep); font-weight:500; display:flex; align-items:center; gap:6px;">RSVP <?php echo luminary_icon( 'arrow-up-right', 12 ); ?></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php get_template_part( 'template-parts/cta' ); ?>

<style>
@media (max-width:1100px) { .hero-grid { grid-template-columns:60px minmax(0,1fr) minmax(0,360px) !important; gap:28px !important; } }
@media (max-width:900px)  {
    .hero-grid { grid-template-columns:1fr !important; gap:32px !important; }
    .hero-rail { display:none !important; }
    .hero-portrait-col { max-width:460px; }
    .hero-stats-row { grid-template-columns:1fr 1fr !important; gap:24px !important; }
    .hero-testimonial { position:static !important; margin-top:20px; }
    .band-head { grid-template-columns:1fr !important; gap:12px !important; }
    .band-grid { grid-template-columns:repeat(2,1fr) !important; }
    .band-grid > * > div { transform:none !important; }
    .programs-preview-grid { grid-template-columns:1fr !important; }
    .summits-grid { grid-template-columns:1fr !important; }
}
</style>

<?php get_footer();
