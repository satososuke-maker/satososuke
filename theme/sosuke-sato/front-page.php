<?php get_header(); ?>

<?php
/* ---- Customizer values ---- */
$profile_image  = sosuke_get( 'profile_image',  '' );
$tagline        = sosuke_get( 'profile_tagline', '事業・音楽・旅行・野菜作り・キックボクシング' );

$sns_x          = sosuke_get( 'sns_x',          'https://x.com/Sosuke_Sato' );
$sns_instagram  = sosuke_get( 'sns_instagram',   'https://www.instagram.com/' );
$sns_linktree   = sosuke_get( 'sns_linktree',    'https://linktr.ee/sosukesato' );

$nav_cards = [
	[
		'icon' => '🧑',
		'title' => 'プロフィール',
		'desc'  => '佐藤聡介について',
		'url'   => sosuke_page_url( 'profile' ),
	],
	[
		'icon' => '🗂️',
		'title' => '活動',
		'desc'  => '事業・音楽活動・旅行記・野菜作り・キックボクシング',
		'url'   => sosuke_page_url( 'activities' ),
	],
	[
		'icon' => '✉️',
		'title' => 'コンタクト',
		'desc'  => 'SNS・お問い合わせ',
		'url'   => sosuke_page_url( 'contact' ),
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
     NAVIGATION CARDS: プロフィール / 活動 / コンタクト
     ============================================================ -->
<section class="explore" id="explore">
  <div class="container">

    <div class="section-header">
      <span class="section-label">Explore</span>
      <h2 class="section-title">サイト内をめぐる</h2>
    </div>

    <div class="explore-grid">
      <?php foreach ( $nav_cards as $card ) : ?>
      <a class="explore-card" href="<?php echo esc_url( $card['url'] ); ?>">
        <span class="explore-icon"><?php echo $card['icon']; ?></span>
        <h3 class="explore-title"><?php echo esc_html( $card['title'] ); ?></h3>
        <p class="explore-desc"><?php echo esc_html( $card['desc'] ); ?></p>
        <span class="explore-arrow" aria-hidden="true">→</span>
      </a>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<?php get_footer(); ?>
