<?php
/**
 * Shared site footer + closing <body>.
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?>
</main>

<footer class="site-footer">
    <div class="container">
        <div class="site-footer-top">
            <div>
                <div class="site-footer-mark">Luminary</div>
                <p>A home for women who are rising. A private collective of executives, founders, and creatives across 46 countries.</p>
                <div style="margin-top:24px; display:flex; gap:12px; color:var(--charcoal-muted);">
                    <a href="#" aria-label="LinkedIn"><?php echo luminary_icon( 'linkedin', 16 ); ?></a>
                    <a href="#" aria-label="Instagram"><?php echo luminary_icon( 'instagram', 16 ); ?></a>
                    <a href="#" aria-label="Spotify"><?php echo luminary_icon( 'spotify', 16 ); ?></a>
                </div>
            </div>
            <div class="site-footer-cols">
                <div>
                    <h4><?php esc_html_e( 'The Collective', 'luminary' ); ?></h4>
                    <?php
                    if ( has_nav_menu( 'footer' ) ) {
                        wp_nav_menu( [
                            'theme_location' => 'footer',
                            'container'      => false,
                            'items_wrap'     => '%3$s',
                            'walker'         => new Luminary_Footer_Walker(),
                            'depth'          => 1,
                        ] );
                    } else {
                        luminary_footer_menu_fallback();
                    }
                    ?>
                </div>
                <div>
                    <h4><?php esc_html_e( 'Read', 'luminary' ); ?></h4>
                    <a href="<?php echo esc_url( home_url( '/stories/' ) ); ?>"><?php esc_html_e( 'Stories', 'luminary' ); ?></a>
                    <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><?php esc_html_e( 'Blog', 'luminary' ); ?></a>
                    <a href="#"><?php esc_html_e( 'Newsletter', 'luminary' ); ?></a>
                    <a href="#"><?php esc_html_e( 'Press Kit', 'luminary' ); ?></a>
                </div>
                <div>
                    <h4><?php esc_html_e( 'Apply', 'luminary' ); ?></h4>
                    <a href="<?php echo esc_url( home_url( '/apply/' ) ); ?>"><?php esc_html_e( 'Open the application', 'luminary' ); ?></a>
                    <a href="#"><?php esc_html_e( 'Nominate someone', 'luminary' ); ?></a>
                    <a href="#"><?php esc_html_e( 'Corporate sponsorship', 'luminary' ); ?></a>
                </div>
                <div>
                    <h4><?php esc_html_e( 'Reach Us', 'luminary' ); ?></h4>
                    <a href="mailto:hello@luminarycollective.co">hello@luminarycollective.co</a>
                    <a href="mailto:press@luminarycollective.co">press@luminarycollective.co</a>
                </div>
            </div>
        </div>
        <div class="site-footer-bottom">
            <div>© <?php echo date( 'Y' ); ?> Luminary Collective. All rights reserved.</div>
            <div>
                <a href="#">Privacy</a> · <a href="#">Terms</a> · <a href="#">Cookies</a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
