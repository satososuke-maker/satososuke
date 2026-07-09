<?php
/* Template Name: プロフィール */
get_header();

$profile_image = sosuke_get( 'profile_image', '' );
$about_bio      = sosuke_get( 'about_bio', '日々さまざまな挑戦を楽しみながら生きています。事業を通じて社会に価値を届け、音楽で心を動かし、旅で視野を広げ、農業で土に向き合い、キックボクシングで心身を鍛えています。' );
?>

<div class="page-wrap">
  <div class="page-hero">
    <h1>プロフィール</h1>
  </div>

  <section class="about" id="about">
    <div class="container">
      <div class="about-inner">

        <div class="about-photo">
          <?php if ( $profile_image ) : ?>
            <img src="<?php echo esc_url( $profile_image ); ?>" alt="佐藤聡介" loading="lazy">
          <?php else : ?>
            🧑
          <?php endif; ?>
        </div>

        <div class="about-text">
          <span class="section-label">About</span>
          <h2 class="section-title">佐藤聡介について</h2>
          <div class="about-body">
            <?php
            foreach ( explode( "\n", $about_bio ) as $para ) {
              $para = trim( $para );
              if ( $para ) {
                echo '<p>' . esc_html( $para ) . '</p>';
              }
            }
            ?>
          </div>
          <div class="about-tags">
            <span class="tag">事業</span>
            <span class="tag">音楽活動</span>
            <span class="tag">旅行記</span>
            <span class="tag">野菜作り</span>
            <span class="tag">キックボクシング</span>
          </div>
        </div>

      </div>
    </div>
  </section>
</div>

<?php get_footer(); ?>
