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
      <?php if ( is_front_page() ) : ?>
        <a href="#about">About</a>
        <a href="#activities">Activities</a>
        <a href="#contact">Contact</a>
      <?php else : ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
        <a href="<?php echo esc_url( home_url( '/#activities' ) ); ?>">Activities</a>
        <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">Contact</a>
      <?php endif; ?>
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
  <?php if ( is_front_page() ) : ?>
    <a href="#about" class="nav-mobile-link">About</a>
    <a href="#activities" class="nav-mobile-link">Activities</a>
    <a href="#contact" class="nav-mobile-link">Contact</a>
  <?php else : ?>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-mobile-link">Home</a>
    <a href="<?php echo esc_url( home_url( '/#activities' ) ); ?>" class="nav-mobile-link">Activities</a>
    <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="nav-mobile-link">Contact</a>
  <?php endif; ?>
</nav>
