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

<header class="site-header transparent" id="site-header">
  <div class="container nav-inner">

    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-logo">
      佐藤聡介
    </a>

    <!-- Desktop nav -->
    <nav class="nav-menu" aria-label="メインナビゲーション">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
      <a href="<?php echo esc_url( sosuke_page_url( 'profile' ) ); ?>">プロフィール</a>
      <a href="<?php echo esc_url( sosuke_page_url( 'activities' ) ); ?>">活動</a>
      <a href="<?php echo esc_url( sosuke_page_url( 'contact' ) ); ?>">コンタクト</a>
    </nav>

    <!-- Mobile toggle -->
    <button class="nav-toggle" id="nav-toggle" aria-label="メニューを開く" aria-expanded="false">
      <span></span>
      <span></span>
      <span></span>
    </button>

  </div>
</header>

<!-- Mobile nav overlay -->
<nav class="nav-mobile" id="nav-mobile" aria-label="モバイルナビゲーション">
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-mobile-link">Home</a>
  <a href="<?php echo esc_url( sosuke_page_url( 'profile' ) ); ?>" class="nav-mobile-link">プロフィール</a>
  <a href="<?php echo esc_url( sosuke_page_url( 'activities' ) ); ?>" class="nav-mobile-link">活動</a>
  <a href="<?php echo esc_url( sosuke_page_url( 'contact' ) ); ?>" class="nav-mobile-link">コンタクト</a>
</nav>
