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

<header class="site-header" id="site-header" role="banner">
  <div class="header-inner">

    <!-- Logo -->
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header-logo" aria-label="<?php bloginfo( 'name' ); ?>">
      <img
        src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/logo-scanpro.svg' ); ?>"
        alt="Scan Pro"
        height="40"
        width="auto"
      >
    </a>

    <!-- Navegação principal -->
    <nav class="header-nav" id="primary-nav" aria-label="<?php _e( 'Hauptnavigation', 'scanpro-child' ); ?>">
      <ul>
        <li>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <?php _e( 'Startseite', 'scanpro-child' ); ?>
          </a>
        </li>

        <li class="has-dropdown">
          <a href="<?php echo esc_url( home_url( '/shop' ) ); ?>">
            <?php _e( 'Produkte', 'scanpro-child' ); ?>
            <span class="dropdown-arrow" aria-hidden="true">&#9660;</span>
          </a>
          <ul class="dropdown">
            <li>
              <a href="<?php echo esc_url( home_url( '/produktkategorie/lueftung' ) ); ?>">
                <?php _e( 'Lüftung', 'scanpro-child' ); ?>
              </a>
            </li>
            <li>
              <a href="<?php echo esc_url( home_url( '/produktkategorie/waermerueckgewinnung' ) ); ?>">
                <?php _e( 'Wärmerückgewinnung', 'scanpro-child' ); ?>
              </a>
            </li>
            <li>
              <a href="<?php echo esc_url( home_url( '/produktkategorie/rauchsauger' ) ); ?>">
                <?php _e( 'Rauchsauger', 'scanpro-child' ); ?>
              </a>
            </li>
            <li>
              <a href="<?php echo esc_url( home_url( '/produktkategorie/filter' ) ); ?>">
                <?php _e( 'Filter', 'scanpro-child' ); ?>
              </a>
            </li>
            <li>
              <a href="<?php echo esc_url( home_url( '/produktkategorie/zubehoer' ) ); ?>">
                <?php _e( 'Zubehör', 'scanpro-child' ); ?>
              </a>
            </li>
          </ul>
        </li>

        <li>
          <a href="<?php echo esc_url( home_url( '/ueber-uns' ) ); ?>">
            <?php _e( 'Über uns', 'scanpro-child' ); ?>
          </a>
        </li>
        <li>
          <a href="<?php echo esc_url( home_url( '/referenzen' ) ); ?>">
            <?php _e( 'Referenzen', 'scanpro-child' ); ?>
          </a>
        </li>
        <li>
          <a href="<?php echo esc_url( home_url( '/kontakt' ) ); ?>">
            <?php _e( 'Kontakt', 'scanpro-child' ); ?>
          </a>
        </li>
      </ul>
    </nav>

    <!-- CTA -->
    <a href="<?php echo esc_url( home_url( '/kontakt' ) ); ?>" class="btn btn-primary header-cta">
      <?php _e( 'Offerte anfragen', 'scanpro-child' ); ?>
    </a>

    <!-- Hamburger mobile -->
    <button class="hamburger" id="hamburger" aria-label="<?php _e( 'Menü öffnen', 'scanpro-child' ); ?>" aria-expanded="false" aria-controls="primary-nav">
      <span></span>
      <span></span>
      <span></span>
    </button>

  </div>
</header>

<div class="site-content-wrapper">
