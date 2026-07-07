<?php get_header(); ?>

<div class="page-wrap">
  <?php while ( have_posts() ) : the_post(); ?>

    <div class="page-hero">
      <h1><?php the_title(); ?></h1>
    </div>

    <div class="single-content">
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
    </div>

  <?php endwhile; ?>
</div>

<?php get_footer(); ?>
