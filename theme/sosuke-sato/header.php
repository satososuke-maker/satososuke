<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" id="site-header">
  <div class="container nav-inner">

    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-logo">佐藤聡介</a>

    <nav class="nav-menu" aria-label="メインナビゲーション">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">HOME</a>
      <a href="<?php echo esc_url( sosuke_page_url( 'profile' ) ); ?>">プロフィール</a>
      <a href="<?php echo esc_url( sosuke_page_url( 'activities' ) ); ?>">活動</a>
      <a href="<?php echo esc_url( sosuke_page_url( 'contact' ) ); ?>" class="nav-contact">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="15" height="15" aria-hidden="true">
          <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h14a1 1 0 001-1V5a1 1 0 00-1-1H3zm0 2.382l7 4.2 7-4.2V15H3V6.382zM10 9.618L3.764 6h12.472L10 9.618z"/>
        </svg>
        お問い合わせ
      </a>
    </nav>

    <button class="nav-toggle" id="nav-toggle" aria-label="メニューを開く" aria-expanded="false">
      <span></span><span></span><span></span>
    </button>

  </div>
</header>

<nav class="nav-mobile" id="nav-mobile" aria-label="モバイルナビゲーション">
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-mobile-link">HOME</a>
  <a href="<?php echo esc_url( sosuke_page_url( 'profile' ) ); ?>" class="nav-mobile-link">プロフィール</a>
  <a href="<?php echo esc_url( sosuke_page_url( 'activities' ) ); ?>" class="nav-mobile-link">活動</a>
  <a href="<?php echo esc_url( sosuke_page_url( 'contact' ) ); ?>" class="nav-mobile-link">お問い合わせ</a>
</nav>
