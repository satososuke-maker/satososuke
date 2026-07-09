<?php
/* Template Name: 活動 */
get_header();

$terms = get_terms( [
	'taxonomy'   => 'activity_category',
	'hide_empty' => false,
] );
?>

<div class="page-wrap">
  <div class="page-hero">
    <h1>活動</h1>
  </div>

  <section class="activities" id="activities">
    <div class="container">

      <div class="section-header">
        <span class="section-label">Activities</span>
        <h2 class="section-title">日々の活動</h2>
        <p class="section-desc">さまざまな分野で挑戦し続けています。カテゴリを選んで記事を見る。</p>
      </div>

      <div class="activities-grid">
        <?php foreach ( $terms as $term ) :
          $meta = sosuke_activity_meta( $term->slug );
          $desc = $meta['customizer_key'] ? sosuke_get( $meta['customizer_key'], '' ) : $term->description;
        ?>
        <a class="activity-card" href="<?php echo esc_url( get_term_link( $term ) ); ?>">
          <div class="activity-card-inner">
            <span class="activity-icon"><?php echo $meta['icon']; ?></span>
            <h3 class="activity-name"><?php echo esc_html( $term->name ); ?></h3>
            <p class="activity-name-en"><?php echo esc_html( $meta['name_en'] ); ?></p>
            <p class="activity-desc"><?php echo esc_html( $desc ); ?></p>
          </div>
        </a>
        <?php endforeach; ?>
      </div>

    </div>
  </section>
</div>

<?php get_footer(); ?>
