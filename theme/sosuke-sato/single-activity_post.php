<?php get_header(); ?>

<div class="page-wrap">
  <?php while ( have_posts() ) : the_post();
    $terms = get_the_terms( get_the_ID(), 'activity_category' );
    $term  = $terms && ! is_wp_error( $terms ) ? $terms[0] : null;
  ?>

    <div class="page-hero">
      <p class="breadcrumb">
        <a href="<?php echo esc_url( sosuke_page_url( 'activities' ) ); ?>">活動</a>
        <?php if ( $term ) : ?>
          / <a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo esc_html( $term->name ); ?></a>
        <?php endif; ?>
      </p>
      <h1><?php the_title(); ?></h1>
    </div>

    <div class="single-content">
      <p class="post-meta"><?php echo get_the_date( 'Y.m.d' ); ?></p>

      <?php if ( has_post_thumbnail() ) : ?>
        <figure style="margin: 0 0 32px; border-radius: var(--radius); overflow: hidden;">
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
