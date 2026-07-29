<?php
get_header();

$term         = get_queried_object();
$meta         = sosuke_activity_meta( $term->slug );
$desc         = $meta['customizer_key'] ? sosuke_get( $meta['customizer_key'], '' ) : $term->description;
$page_content = get_term_meta( $term->term_id, 'sosuke_page_content', true );
?>

<div class="page-wrap">
  <div class="page-hero">
    <h1><?php echo $meta['icon']; ?> <?php echo esc_html( $term->name ); ?></h1>
  </div>

  <?php
  $all_slugs = [ 'business', 'music', 'travel', 'farming', 'eating', 'kickboxing' ];
  $other_slugs = array_diff( $all_slugs, [ $term->slug ] );
  ?>
  <div class="activity-nav">
    <?php foreach ( $other_slugs as $slug ) :
      $m = sosuke_activity_meta( $slug );
      $t = get_term_by( 'slug', $slug, 'activity_category' );
      if ( ! $t ) continue;
    ?>
      <a href="<?php echo esc_url( get_term_link( $t ) ); ?>" class="activity-nav-item">
        <span class="activity-nav-icon"><?php echo $m['icon']; ?></span>
        <span class="activity-nav-label"><?php echo esc_html( $m['label'] ); ?></span>
      </a>
    <?php endforeach; ?>
  </div>

  <?php if ( $term->slug === 'business' ) : ?>
  <p class="activity-nav-note">その他、SNS運用、動画制作、Web広告運用、SaaSの営業代行、ITを活用した業務改善など、<br>デジタルマーケティング・DX全域でお仕事をしております。</p>
  <?php endif; ?>

  <div class="page-content">
    <div class="container">

      <?php if ( $desc ) : ?>
      <p class="taxonomy-desc"><?php echo esc_html( $desc ); ?></p>
      <?php endif; ?>

      <?php if ( $page_content ) : ?>
      <div class="taxonomy-content entry-content">
        <?php echo wp_kses_post( $page_content ); ?>
      </div>
      <?php endif; ?>

      <?php if ( have_posts() ) : ?>

        <h2 class="section-heading">おしらせ</h2>

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
