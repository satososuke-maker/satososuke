<?php
get_header();

$term = get_queried_object();
$meta = sosuke_activity_meta( $term->slug );
$desc = $meta['customizer_key'] ? sosuke_get( $meta['customizer_key'], '' ) : $term->description;
?>

<div class="page-wrap">
  <div class="page-hero">
    <p class="breadcrumb">
      <a href="<?php echo esc_url( sosuke_page_url( 'activities' ) ); ?>">活動</a> /
    </p>
    <h1><?php echo $meta['icon']; ?> <?php echo esc_html( $term->name ); ?></h1>
  </div>

  <div class="page-content">
    <div class="container">

      <?php if ( $desc ) : ?>
      <p class="taxonomy-desc"><?php echo esc_html( $desc ); ?></p>
      <?php endif; ?>

      <?php if ( have_posts() ) : ?>

        <div class="posts-grid">
          <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
              <?php if ( has_post_thumbnail() ) : ?>
                <a href="<?php the_permalink(); ?>" class="post-card-thumb">
                  <?php the_post_thumbnail( 'medium_large' ); ?>
                </a>
              <?php endif; ?>
              <div class="post-card-body">
                <p class="post-card-date"><?php echo get_the_date( 'Y.m.d' ); ?></p>
                <h2 class="post-card-title">
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
                <p class="post-card-excerpt"><?php the_excerpt(); ?></p>
              </div>
            </article>
          <?php endwhile; ?>
        </div>

        <?php the_posts_navigation(); ?>

      <?php else : ?>
        <p style="text-align:center;color:var(--text-muted);padding:80px 0;">まだ記事がありません。</p>
      <?php endif; ?>

    </div>
  </div>
</div>

<?php get_footer(); ?>
