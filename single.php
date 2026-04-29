<?php
/**
 * Single post — full article view with author, category, tags, date.
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>

<article style="padding:140px 0 60px;">
    <div class="container" style="max-width:820px;">
        <?php while ( have_posts() ) : the_post();
            $cats = get_the_category();
            $primary_cat = ! empty( $cats ) ? $cats[0] : null;
        ?>
            <header style="margin-bottom:48px;">
                <?php if ( $primary_cat ) : ?>
                    <a href="<?php echo esc_url( get_category_link( $primary_cat ) ); ?>" class="eyebrow" style="text-decoration:none;">
                        <?php echo esc_html( $primary_cat->name ); ?>
                    </a>
                <?php else : ?>
                    <?php luminary_eyebrow( __( 'Journal', 'luminary' ) ); ?>
                <?php endif; ?>

                <h1 class="serif" style="font-size:clamp(40px,5.5vw,76px); line-height:1.04; font-weight:300; letter-spacing:-0.025em; margin-top:18px;">
                    <?php the_title(); ?>
                </h1>

                <div style="margin-top:24px; display:flex; flex-wrap:wrap; gap:16px; align-items:center; font-size:14px; color:var(--charcoal-muted);">
                    <span style="display:flex; align-items:center; gap:8px;">
                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 32, '', '', [ 'style' => 'border-radius:50%;' ] ); ?>
                        <span class="serif" style="font-style:italic; color:var(--charcoal); font-size:16px;">
                            <?php echo esc_html( get_the_author() ); ?>
                        </span>
                    </span>
                    <span>·</span>
                    <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                        <?php echo esc_html( get_the_date() ); ?>
                    </time>
                    <?php if ( $cats ) : ?>
                        <span>·</span>
                        <span>
                            <?php foreach ( $cats as $i => $c ) : ?>
                                <a href="<?php echo esc_url( get_category_link( $c ) ); ?>" style="color:var(--coral-deep);"><?php echo esc_html( $c->name ); ?></a><?php echo $i < count( $cats ) - 1 ? ', ' : ''; ?>
                            <?php endforeach; ?>
                        </span>
                    <?php endif; ?>
                </div>
            </header>

            <?php if ( has_post_thumbnail() ) : ?>
                <figure style="margin:0 0 48px; border-radius:28px; overflow:hidden;">
                    <?php the_post_thumbnail( 'large', [ 'style' => 'width:100%; height:auto; display:block;' ] ); ?>
                </figure>
            <?php endif; ?>

            <div class="entry-content serif" style="font-size:18px; line-height:1.7; color:var(--charcoal); font-weight:400;">
                <?php the_content(); ?>
            </div>

            <?php
            $tags = get_the_tags();
            if ( $tags ) :
            ?>
                <div style="margin-top:48px; padding-top:32px; border-top:1px solid rgba(61,44,44,0.08);">
                    <div class="eyebrow" style="margin-bottom:14px;"><?php esc_html_e( 'Tags', 'luminary' ); ?></div>
                    <div style="display:flex; flex-wrap:wrap; gap:8px;">
                        <?php foreach ( $tags as $tag ) : ?>
                            <a href="<?php echo esc_url( get_tag_link( $tag ) ); ?>" style="font-size:12px; padding:6px 12px; background:var(--ivory-pale); border:1px solid rgba(61,44,44,0.08); border-radius:999px; color:var(--charcoal); letter-spacing:0.04em;">
                                #<?php echo esc_html( $tag->name ); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php
            $author_bio = get_the_author_meta( 'description' );
            if ( $author_bio ) :
            ?>
                <div style="margin-top:48px; padding:28px; background:var(--ivory-pale); border-radius:24px; display:flex; gap:20px; align-items:flex-start;">
                    <div style="flex-shrink:0;">
                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 64, '', '', [ 'style' => 'border-radius:50%;' ] ); ?>
                    </div>
                    <div>
                        <div class="eyebrow"><?php esc_html_e( 'Written by', 'luminary' ); ?></div>
                        <div class="serif" style="font-size:22px; font-style:italic; margin-top:4px; color:var(--charcoal);">
                            <?php echo esc_html( get_the_author() ); ?>
                        </div>
                        <p style="margin-top:8px; font-size:15px; line-height:1.6; color:var(--charcoal-soft);">
                            <?php echo esc_html( $author_bio ); ?>
                        </p>
                    </div>
                </div>
            <?php endif; ?>

            <nav style="margin-top:60px; display:flex; justify-content:space-between; gap:24px; flex-wrap:wrap;">
                <?php
                $prev = get_previous_post();
                $next = get_next_post();
                ?>
                <?php if ( $prev ) : ?>
                    <a href="<?php echo esc_url( get_permalink( $prev ) ); ?>" style="display:flex; flex-direction:column; gap:6px; max-width:45%;">
                        <span class="eyebrow"><?php esc_html_e( '← Previous', 'luminary' ); ?></span>
                        <span class="serif" style="font-size:18px; color:var(--charcoal);"><?php echo esc_html( get_the_title( $prev ) ); ?></span>
                    </a>
                <?php else : ?><span></span><?php endif; ?>
                <?php if ( $next ) : ?>
                    <a href="<?php echo esc_url( get_permalink( $next ) ); ?>" style="display:flex; flex-direction:column; gap:6px; max-width:45%; text-align:right;">
                        <span class="eyebrow"><?php esc_html_e( 'Next →', 'luminary' ); ?></span>
                        <span class="serif" style="font-size:18px; color:var(--charcoal);"><?php echo esc_html( get_the_title( $next ) ); ?></span>
                    </a>
                <?php endif; ?>
            </nav>

            <?php
            if ( comments_open() || get_comments_number() ) {
                echo '<div style="margin-top:80px; padding-top:40px; border-top:1px solid rgba(61,44,44,0.08);">';
                comments_template();
                echo '</div>';
            }
            ?>
        <?php endwhile; ?>
    </div>
</article>

<?php get_footer();
