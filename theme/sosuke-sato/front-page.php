<?php get_header(); ?>

<?php
$profile_image = sosuke_get( 'profile_image', '' );
$tagline       = sosuke_get( 'profile_tagline', 'お仕事・音楽活動・旅行・野菜作り・食べ歩き・キックボクシング' );
$about_bio     = sosuke_get( 'about_bio',
	"株式会社アソビト代表。（フリーランス）\nサイト制作・運用、SNS運用、動画制作、Web広告運用、SaaSの営業代行など、デジタルマーケティング全域でお仕事をしております。\nドラマー、シンガーソングライターとして楽曲制作・配信も行うほか、国内旅行の動画発信、家庭菜園、食べ歩き、キックボクシングなど、仕事・創作・暮らしを横断して活動・発信をしています。"
);

$sns_x         = sosuke_get( 'sns_x',         'https://x.com/Sosuke_Sato' );
$sns_instagram = sosuke_get( 'sns_instagram',  'https://www.instagram.com/' );
$sns_linktree  = sosuke_get( 'sns_linktree',   'https://linktr.ee/sosukesato' );

/* ---- Activity categories (ordered) ---- */
$activity_terms = get_terms( [
	'taxonomy'   => 'activity_category',
	'hide_empty' => false,
] );
usort( $activity_terms, fn( $a, $b ) =>
	sosuke_get_activity_order( $a->term_id ) <=> sosuke_get_activity_order( $b->term_id )
);

/* ---- Activity descriptions ---- */
$activity_descs = [
	'business'   => 'Web制作・SNS・動画・Web広告など、デジタル領域で事業をしています。',
	'music'      => '楽曲制作、ドラム、ギター、歌を通じて、自分なりの音の表現活動です。',
	'travel'     => '日本各地の場所や食をVLOGで紹介しています。',
	'farming'    => '畑を借りて、野菜作りを学んでおります。',
	'eating'     => '全国津々浦々、行った先の飲食店の情報をブログで発信しております。',
	'kickboxing' => '心身ともに強くなるため体を動かす習慣。',
];

/* ---- News posts ---- */
$news_query = new WP_Query( [
	'post_type'      => 'activity_post',
	'posts_per_page' => 6,
	'post_status'    => 'publish',
	'orderby'        => 'date',
	'order'          => 'DESC',
] );

/* SVG icons */
$svg_x = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>';
$svg_ig = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>';
$svg_lt = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M13.51 5.3l3.137-3.137 1.367 1.367L14.878 6.667h3.845v1.932h-3.835l3.136 3.137-1.366 1.366L12 8.445l-4.658 4.657-1.366-1.366 3.136-3.137H5.277V6.667h3.845L5.986 3.53 7.353 2.163 10.49 5.3V2h2.02v3.3zM10.49 13.5h2.02V22h-2.02v-8.5z"/></svg>';
?>

<!-- ============================================================
     HERO
     ============================================================ -->
<section class="hero">
  <div class="hero-content">

    <h1 class="hero-name">佐藤　聡介</h1>

    <div class="hero-en">
      <span>SOSUKE</span>
      <div class="hero-avatar">
        <?php if ( $profile_image ) : ?>
          <img src="<?php echo esc_url( $profile_image ); ?>" alt="佐藤聡介" loading="eager">
        <?php else : ?>
          🧑
        <?php endif; ?>
      </div>
      <span>SATO</span>
    </div>

    <p class="hero-tagline"><?php echo esc_html( $tagline ); ?></p>

    <div class="hero-social">
      <?php if ( $sns_x ) : ?>
        <a href="<?php echo esc_url( $sns_x ); ?>" target="_blank" rel="noopener" aria-label="X"><?php echo $svg_x; ?></a>
      <?php endif; ?>
      <?php if ( $sns_instagram ) : ?>
        <a href="<?php echo esc_url( $sns_instagram ); ?>" target="_blank" rel="noopener" aria-label="Instagram"><?php echo $svg_ig; ?></a>
      <?php endif; ?>
      <?php if ( $sns_linktree ) : ?>
        <a href="<?php echo esc_url( $sns_linktree ); ?>" target="_blank" rel="noopener" aria-label="Linktree"><?php echo $svg_lt; ?></a>
      <?php endif; ?>
    </div>

  </div>
</section>


<!-- ============================================================
     NEWS / お知らせ
     ============================================================ -->
<section class="news-section" id="news">
  <div class="container">

    <h2 class="sec-title">お知らせ</h2>

    <!-- Filter buttons -->
    <div class="filter-row">
      <button class="filter-btn active" data-filter="all">ALL</button>
      <?php foreach ( $activity_terms as $term ) :
        $meta = sosuke_activity_meta( $term->slug );
      ?>
        <button class="filter-btn" data-filter="<?php echo esc_attr( $term->slug ); ?>">
          <?php echo esc_html( $meta['label'] ?? $term->name ); ?>
        </button>
      <?php endforeach; ?>
    </div>

    <!-- News list -->
    <div class="news-list">
      <?php if ( $news_query->have_posts() ) :
        while ( $news_query->have_posts() ) : $news_query->the_post();
          $terms = get_the_terms( get_the_ID(), 'activity_category' );
          $term  = ( $terms && ! is_wp_error( $terms ) ) ? $terms[0] : null;
          $slug  = $term ? $term->slug : '';
          $meta  = sosuke_activity_meta( $slug );
          $label = $term ? ( $meta['label'] ?? $term->name ) : '';
      ?>
        <div class="news-item" data-category="<?php echo esc_attr( $slug ); ?>">
          <div class="news-meta">
            <time class="news-date" datetime="<?php echo get_the_date( 'Y-m-d' ); ?>">
              <?php echo get_the_date( 'Y年n月j日' ); ?>
            </time>
            <?php if ( $label ) : ?>
              <span class="news-badge"><?php echo esc_html( $label ); ?></span>
            <?php endif; ?>
          </div>
          <h3 class="news-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </h3>
          <?php if ( get_the_excerpt() ) : ?>
            <a href="<?php the_permalink(); ?>" class="news-link"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 30 ) ); ?></a>
          <?php endif; ?>
        </div>
      <?php endwhile; wp_reset_postdata();
      else : ?>
        <p class="news-empty">まだ投稿がありません。</p>
      <?php endif; ?>
    </div>

  </div>
</section>


<!-- ============================================================
     PROFILE / プロフィール
     ============================================================ -->
<section class="profile-section" id="profile">
  <div class="container">

    <h2 class="sec-title">プロフィール</h2>

    <div class="profile-inner">
      <div class="profile-photo">
        <?php if ( $profile_image ) : ?>
          <img src="<?php echo esc_url( $profile_image ); ?>" alt="佐藤聡介" loading="lazy">
        <?php else : ?>
          <span class="profile-placeholder">🧑</span>
        <?php endif; ?>
      </div>
      <div class="profile-text">
        <?php foreach ( explode( "\n", $about_bio ) as $para ) :
          $para = trim( $para );
          if ( $para ) echo '<p>' . esc_html( $para ) . '</p>';
        endforeach; ?>
        <a href="<?php echo esc_url( sosuke_page_url( 'profile' ) ); ?>" class="btn-coral">
          詳細
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="16" height="16"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
        </a>
      </div>
    </div>

  </div>
</section>


<!-- ============================================================
     ACTIVITIES / 活動
     ============================================================ -->
<section class="activity-section" id="activities">
  <div class="container">

    <h2 class="sec-title">活動</h2>

    <div class="activity-grid">
      <?php foreach ( $activity_terms as $term ) :
        $meta = sosuke_activity_meta( $term->slug );
        $desc = $activity_descs[ $term->slug ] ?? $term->description;
      ?>
        <a class="activity-item" href="<?php echo esc_url( get_term_link( $term ) ); ?>">
          <div class="activity-circle"><?php echo $meta['icon']; ?></div>
          <p class="activity-desc"><?php echo esc_html( $desc ); ?></p>
        </a>
      <?php endforeach; ?>
    </div>

    <div class="section-cta">
      <a href="<?php echo esc_url( sosuke_page_url( 'activities' ) ); ?>" class="btn-coral">
        詳細
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="16" height="16"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
      </a>
    </div>

  </div>
</section>

<?php get_footer(); ?>
