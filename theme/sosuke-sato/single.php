<?php get_header(); ?>

<div class="page-wrap">
  <?php while ( have_posts() ) : the_post(); ?>

    <div class="single-content">
      <p class="post-meta"><?php echo get_the_date( 'Y.m.d' ); ?></p>
      <h1><?php the_title(); ?></h1>

      <?php if ( has_post_thumbnail() ) : ?>
        <figure style="margin: 32px 0; border-radius: var(--radius); overflow: hidden;">
          <?php the_post_thumbnail( 'large' ); ?>
        </figure>
      <?php endif; ?>

      <div class="entry-content">
        <?php the_content(); ?>
      </div>

      <div style="margin-top: 48px; padding-top: 24px; border-top: 1px solid var(--border);">
        <?php the_post_navigation( [
          'prev_text' => '← %title',
          'next_text' => '%title →',
        ] ); ?>
      </div>
    </div>

  <?php endwhile; ?>
</div>

<?php get_footer(); ?>
