<?php
/**
 * Fallback template — renders the blog index when no more specific
 * template (home.php, archive.php, single.php, 404.php) exists.
 *
 * For WordPress this file MUST exist in any theme.
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>

<div style="padding:140px 0 80px;">
    <div class="container">
        <header style="max-width:900px; margin:0 auto 60px;">
            <?php luminary_eyebrow( __( 'Journal', 'luminary' ) ); ?>
            <h1 class="serif" style="font-size:clamp(48px,7vw,96px); line-height:0.98; font-weight:300; letter-spacing:-0.025em; margin-top:18px;">
                <?php
                if ( is_search() ) {
                    /* translators: %s: search query */
                    printf( esc_html__( 'Search results for &ldquo;%s&rdquo;', 'luminary' ), esc_html( get_search_query() ) );
                } else {
                    esc_html_e( 'Field notes from the collective.', 'luminary' );
                }
                ?>
            </h1>
        </header>

        <?php if ( have_posts() ) : ?>
            <div class="post-grid" style="display:grid; grid-template-columns:repeat(3,1fr); gap:32px;">
                <?php while ( have_posts() ) : the_post();
                    $cats = get_the_category();
                    $primary_cat = ! empty( $cats ) ? $cats[0] : null;
                    $tags = get_the_tags();
                ?>
                    <article style="display:flex; flex-direction:column; background:var(--ivory-pale); border-radius:24px; overflow:hidden; border:1px solid rgba(61,44,44,0.06);">
                        <a href="<?php the_permalink(); ?>" style="display:block;">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div style="aspect-ratio:16/10; overflow:hidden;">
                                    <?php the_post_thumbnail( 'medium_large', [ 'style' => 'width:100%; height:100%; object-fit:cover;' ] ); ?>
                                </div>
                            <?php else : ?>
                                <div class="plate v-blush" style="aspect-ratio:16/10; border-radius:0;"></div>
                            <?php endif; ?>
                        </a>
                        <div style="padding:24px; display:flex; flex-direction:column; flex:1;">
                            <div style="display:flex; gap:10px; align-items:center; font-size:11px; letter-spacing:0.12em; text-transform:uppercase; color:var(--charcoal-muted); margin-bottom:12px;">
                                <?php if ( $primary_cat ) : ?>
                                    <a href="<?php echo esc_url( get_category_link( $primary_cat ) ); ?>" style="color:var(--coral-deep); font-weight:500;">
                                        <?php echo esc_html( $primary_cat->name ); ?>
                                    </a>
                                    <span>·</span>
                                <?php endif; ?>
                                <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
                            </div>
                            <h2 class="serif" style="font-size:24px; font-weight:400; line-height:1.2; letter-spacing:-0.01em;">
                                <a href="<?php the_permalink(); ?>" style="color:inherit;"><?php the_title(); ?></a>
                            </h2>
                            <p style="margin-top:12px; font-size:14px; line-height:1.55; color:var(--charcoal-soft); flex:1;">
                                <?php echo esc_html( wp_trim_words( get_the_excerpt(), 26 ) ); ?>
                            </p>
                            <div style="margin-top:18px; padding-top:14px; border-top:1px solid rgba(61,44,44,0.08); display:flex; justify-content:space-between; align-items:center; gap:12px;">
                                <span style="font-size:13px; color:var(--charcoal); font-family:var(--serif); font-style:italic;"><?php echo esc_html( get_the_author() ); ?></span>
                                <?php if ( $tags ) : ?>
                                    <div style="display:flex; gap:6px; flex-wrap:wrap; justify-content:flex-end;">
                                        <?php foreach ( array_slice( $tags, 0, 2 ) as $tag ) : ?>
                                            <a href="<?php echo esc_url( get_tag_link( $tag ) ); ?>" style="font-size:10px; padding:3px 8px; background:var(--ivory-deep); border-radius:999px; color:var(--charcoal-muted); letter-spacing:0.04em;">
                                                #<?php echo esc_html( $tag->name ); ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <div style="margin-top:60px;">
                <?php
                the_posts_pagination( [
                    'prev_text' => __( '← Newer', 'luminary' ),
                    'next_text' => __( 'Older →', 'luminary' ),
                    'mid_size'  => 1,
                ] );
                ?>
            </div>
        <?php else : ?>
            <div style="text-align:center; padding:80px 20px; color:var(--charcoal-muted);">
                <h2 class="serif" style="font-size:32px; font-style:italic; color:var(--coral-deep); font-weight:300;">
                    <?php esc_html_e( 'Nothing here yet.', 'luminary' ); ?>
                </h2>
                <p style="margin-top:12px;"><?php esc_html_e( 'Try one of the pages in the navigation, or check back soon.', 'luminary' ); ?></p>
            </div>
        <?php endif; ?>
    </div>
</div>

<style>
@media (max-width:1100px) { .post-grid { grid-template-columns:repeat(2,1fr) !important; } }
@media (max-width:680px)  { .post-grid { grid-template-columns:1fr !important; } }

.nav-links { display: flex; gap: 8px; justify-content: center; }
.nav-links .page-numbers {
  display: inline-flex; align-items: center; justify-content: center;
  min-width: 44px; height: 44px; padding: 0 14px;
  border-radius: 999px; background: var(--ivory-pale);
  border: 1px solid rgba(61,44,44,0.08);
  font-size: 14px; color: var(--charcoal); transition: all 0.2s;
}
.nav-links .page-numbers:hover { background: var(--peach-light); }
.nav-links .page-numbers.current { background: var(--coral); color: var(--ivory-pale); border-color: var(--coral); }
</style>

<?php get_footer();
