<?php
/* Template Name: コンタクト */
get_header();

$sns_x         = sosuke_get( 'sns_x',         'https://x.com/Sosuke_Sato' );
$sns_instagram = sosuke_get( 'sns_instagram',  'https://www.instagram.com/' );
$sns_linktree  = sosuke_get( 'sns_linktree',   'https://linktr.ee/sosukesato' );
$contact_email = sosuke_get( 'contact_email',  '' );
?>

<div class="page-wrap">
  <div class="page-hero">
    <h1>コンタクト</h1>
  </div>

  <section class="social-section" id="contact">
    <div class="container">

      <div class="section-header">
        <span class="section-label">Contact</span>
        <h2 class="section-title">フォロー・連絡</h2>
        <p class="section-desc">各SNSでつながりましょう。</p>
      </div>

      <div class="social-links-row">

        <?php if ( $contact_email ) : ?>
        <a href="mailto:<?php echo esc_attr( $contact_email ); ?>" class="social-link-card">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M4 4h16v16H4z"/>
            <path d="M22 6l-10 7L2 6"/>
          </svg>
          <span>Email</span>
        </a>
        <?php endif; ?>

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
</div>

<?php get_footer(); ?>
