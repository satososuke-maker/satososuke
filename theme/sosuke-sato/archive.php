<?php get_header(); ?>

<div class="page-wrap">
  <div class="page-hero">
    <h1><?php the_archive_title(); ?></h1>
  </div>

  <div class="page-content">
    <div class="container">
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
        <p style="text-align:center;color:var(--text-muted);padding:80px 0;">投稿が見つかりません。</p>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>
