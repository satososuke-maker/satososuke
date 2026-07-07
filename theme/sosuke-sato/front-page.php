<?php get_header(); ?>

<?php
/* ---- Customizer values ---- */
$profile_image  = sosuke_get( 'profile_image',  '' );
$tagline        = sosuke_get( 'profile_tagline', '事業・音楽・旅行・野菜作り・キックボクシング' );
$about_bio      = sosuke_get( 'about_bio',       '日々さまざまな挑戦を楽しみながら生きています。事業を通じて社会に価値を届け、音楽で心を動かし、旅で視野を広げ、農業で土に向き合い、キックボクシングで心身を鍛えています。' );

$sns_x          = sosuke_get( 'sns_x',          'https://x.com/Sosuke_Sato' );
$sns_instagram  = sosuke_get( 'sns_instagram',   'https://www.instagram.com/' );
$sns_linktree   = sosuke_get( 'sns_linktree',    'https://linktr.ee/sosukesato' );

$activities = [
	[
		'icon'    => '💼',
		'name'    => '事業',
		'name_en' => 'Business',
		'desc'    => sosuke_get( 'activity_business', '起業・事業開発・経営に取り組んでいます。アイデアを形にすることが好きです。' ),
	],
	[
		'icon'    => '🎵',
		'name'    => '音楽活動',
		'name_en' => 'Music',
		'desc'    => sosuke_get( 'activity_music', '音楽を通じて人と繋がり、表現することを大切にしています。' ),
	],
	[
		'icon'    => '✈️',
		'name'    => '旅行',
		'name_en' => 'Travel',
		'desc'    => sosuke_get( 'activity_travel', '国内外を旅しながら、新しい文化や人との出会いを探求しています。' ),
	],
	[
		'icon'    => '🌱',
		'name'    => '野菜作り',
		'name_en' => 'Farming',
		'desc'    => sosuke_get( 'activity_farming', '自分で野菜を育て、土と向き合う豊かな時間を楽しんでいます。' ),
	],
	[
		'icon'    => '🥊',
		'name'    => 'キックボクシング',
		'name_en' => 'Kickboxing',
		'desc'    => sosuke_get( 'activity_kickboxing', '心身を鍛えながら、精神力と集中力を高めています。' ),
	],
];
?>

<!-- ============================================================
     HERO
     ============================================================ -->
<section class="hero" id="hero">
  <div class="hero-content">

    <div class="hero-avatar">
      <?php if ( $profile_image ) : ?>
        <img src="<?php echo esc_url( $profile_image ); ?>" alt="佐藤聡介" loading="eager">
      <?php else : ?>
        🧑
      <?php endif; ?>
    </div>

    <h1 class="hero-name">佐藤聡介</h1>
    <p class="hero-name-en">Sosuke Sato</p>

    <p class="hero-tagline"><?php echo esc_html( $tagline ); ?></p>

    <div class="hero-social">

      <?php if ( $sns_x ) : ?>
      <a href="<?php echo esc_url( $sns_x ); ?>" target="_blank" rel="noopener" aria-label="X (Twitter)">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
          <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
        </svg>
      </a>
      <?php endif; ?>

      <?php if ( $sns_instagram ) : ?>
      <a href="<?php echo esc_url( $sns_instagram ); ?>" target="_blank" rel="noopener" aria-label="Instagram">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
          <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
        </svg>
      </a>
      <?php endif; ?>

      <?php if ( $sns_linktree ) : ?>
      <a href="<?php echo esc_url( $sns_linktree ); ?>" target="_blank" rel="noopener" aria-label="Linktree">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
          <path d="M13.51 5.3l3.137-3.137 1.367 1.367L14.878 6.667h3.845v1.932h-3.835l3.136 3.137-1.366 1.366L12 8.445l-4.658 4.657-1.366-1.366 3.136-3.137H5.277V6.667h3.845L5.986 3.53 7.353 2.163 10.49 5.3V2h2.02v3.3zM10.49 13.5h2.02V22h-2.02v-8.5z"/>
        </svg>
      </a>
      <?php endif; ?>

    </div>
  </div>

  <div class="hero-scroll" aria-hidden="true">
    <span>Scroll</span>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
      <path d="M12 5v14M5 12l7 7 7-7"/>
    </svg>
  </div>
</section>


<!-- ============================================================
     ABOUT
     ============================================================ -->
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
          <span class="tag">旅行</span>
          <span class="tag">野菜作り</span>
          <span class="tag">キックボクシング</span>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ============================================================
     ACTIVITIES
     ============================================================ -->
<section class="activities" id="activities">
  <div class="container">

    <div class="section-header">
      <span class="section-label">Activities</span>
      <h2 class="section-title">日々の活動</h2>
      <p class="section-desc">さまざまな分野で挑戦し続けています。</p>
    </div>

    <div class="activities-grid">
      <?php foreach ( $activities as $act ) : ?>
      <div class="activity-card">
        <div class="activity-card-inner">
          <span class="activity-icon"><?php echo $act['icon']; ?></span>
          <h3 class="activity-name"><?php echo esc_html( $act['name'] ); ?></h3>
          <p class="activity-name-en"><?php echo esc_html( $act['name_en'] ); ?></p>
          <p class="activity-desc"><?php echo esc_html( $act['desc'] ); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>


<!-- ============================================================
     SOCIAL / CONTACT
     ============================================================ -->
<section class="social-section" id="contact">
  <div class="container">

    <div class="section-header">
      <span class="section-label">Contact</span>
      <h2 class="section-title">フォロー・連絡</h2>
      <p class="section-desc">各SNSでつながりましょう。</p>
    </div>

    <div class="social-links-row">

      <?php if ( $sns_x ) : ?>
      <a href="<?php echo esc_url( $sns_x ); ?>" class="social-link-card" target="_blank" rel="noopener">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
          <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
        </svg>
        <span>X (Twitter)</span>
      </a>
      <?php endif; ?>

      <?php if ( $sns_instagram ) : ?>
      <a href="<?php echo esc_url( $sns_instagram ); ?>" class="social-link-card" target="_blank" rel="noopener">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
          <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
        </svg>
        <span>Instagram</span>
      </a>
      <?php endif; ?>

      <?php if ( $sns_linktree ) : ?>
      <a href="<?php echo esc_url( $sns_linktree ); ?>" class="social-link-card" target="_blank" rel="noopener">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
          <path d="M13.51 5.3l3.137-3.137 1.367 1.367L14.878 6.667h3.845v1.932h-3.835l3.136 3.137-1.366 1.366L12 8.445l-4.658 4.657-1.366-1.366 3.136-3.137H5.277V6.667h3.845L5.986 3.53 7.353 2.163 10.49 5.3V2h2.02v3.3zM10.49 13.5h2.02V22h-2.02v-8.5z"/>
        </svg>
        <span>Linktree</span>
      </a>
      <?php endif; ?>

    </div>
  </div>
</section>

<?php get_footer(); ?>
