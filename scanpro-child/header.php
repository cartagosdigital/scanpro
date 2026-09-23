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

  <!-- — ANDAR SUPERIOR: utilidade, idioma — -->
  <div class="header-topbar">
    <div class="header-topbar-inner">

      <nav class="header-topbar-nav" aria-label="<?php _e( 'Sekundärnavigation', 'scanpro-child' ); ?>">
        <a href="<?php echo esc_url( home_url( '/ueber-uns' ) ); ?>"><?php _e( 'Über uns', 'scanpro-child' ); ?></a>
        <a href="<?php echo esc_url( home_url( '/team' ) ); ?>"><?php _e( 'Team', 'scanpro-child' ); ?></a>
        <a href="<?php echo esc_url( home_url( '/referenzen' ) ); ?>"><?php _e( 'Referenzen', 'scanpro-child' ); ?></a>
      </nav>

      <!-- Seletor de idioma -->
      <div class="header-lang-selector has-dropdown">
        <button class="lang-toggle" type="button" aria-haspopup="true" aria-label="<?php _e( 'Sprache wählen', 'scanpro-child' ); ?>">
          <span class="lang-code">DE</span>
          <span class="lang-arrow" aria-hidden="true">&#9660;</span>
        </button>
        <ul class="dropdown lang-dropdown">
          <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="lang-active"><?php _e( 'Deutsch', 'scanpro-child' ); ?></a></li>
          <li><a href="#"><?php _e( 'Français', 'scanpro-child' ); ?></a></li>
          <li><a href="#"><?php _e( 'English', 'scanpro-child' ); ?></a></li>
        </ul>
      </div>

    </div>
  </div><!-- .header-topbar -->

  <!-- — ANDAR PRINCIPAL: logo, nav, CTA — -->
  <div class="header-main">
    <div class="header-inner">

      <!-- Logo -->
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header-logo" aria-label="<?php bloginfo( 'name' ); ?>">
        <img
          src="https://lp.scanpro.ch/wp-content/uploads/2025/10/logo-Scan-Pro-1.png"
          alt="Scan-Pro"
          height="40"
          width="auto"
        >
      </a>

      <!-- Navegação principal -->
      <nav class="header-nav" id="primary-nav" aria-label="<?php _e( 'Hauptnavigation', 'scanpro-child' ); ?>">
        <ul>

          <li>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Startseite', 'scanpro-child' ); ?></a>
          </li>

          <!-- Produkte — mega-menu -->
          <li class="has-dropdown has-megamenu">
            <a href="<?php echo esc_url( home_url( '/produkte' ) ); ?>">
              <?php _e( 'Produkte', 'scanpro-child' ); ?>
              <span class="dropdown-arrow" aria-hidden="true">&#9660;</span>
            </a>
            <div class="dropdown mega-dropdown">
              <div class="mega-dropdown-inner">
                <?php
                // Categorias principais buscadas dinamicamente no WooCommerce
                // (produtos filhos de "produkte"), divididas em 2 colunas
                $mega_parent = get_term_by( 'slug', 'produkte', 'product_cat' );
                $mega_cats   = $mega_parent
                  ? get_terms( [ 'taxonomy' => 'product_cat', 'parent' => $mega_parent->term_id, 'hide_empty' => true, 'orderby' => 'menu_order', 'order' => 'ASC' ] )
                  : [];
                $mega_cats   = ( ! empty( $mega_cats ) && ! is_wp_error( $mega_cats ) ) ? $mega_cats : [];
                $mega_split  = (int) ceil( count( $mega_cats ) / 2 );
                $mega_cols   = [ array_slice( $mega_cats, 0, $mega_split ), array_slice( $mega_cats, $mega_split ) ];

                foreach ( $mega_cols as $mega_col ) :
                    if ( empty( $mega_col ) ) continue;
                ?>
                <div class="mega-col">
                  <?php foreach ( $mega_col as $mega_cat ) :
                      $mega_subs = get_terms( [ 'taxonomy' => 'product_cat', 'parent' => $mega_cat->term_id, 'hide_empty' => true, 'orderby' => 'menu_order', 'order' => 'ASC' ] );
                  ?>
                  <div class="mega-group">
                    <a class="mega-group-title" href="<?php echo esc_url( get_term_link( $mega_cat ) ); ?>">
                      <?php echo esc_html( $mega_cat->name ); ?>
                    </a>
                    <?php if ( ! empty( $mega_subs ) && ! is_wp_error( $mega_subs ) ) : ?>
                    <ul>
                      <?php foreach ( $mega_subs as $mega_sub ) : ?>
                      <li><a href="<?php echo esc_url( get_term_link( $mega_sub ) ); ?>"><?php echo esc_html( $mega_sub->name ); ?></a></li>
                      <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                  </div>
                  <?php endforeach; ?>
                </div><!-- .mega-col -->
                <?php endforeach; ?>
              </div><!-- .mega-dropdown-inner -->
              <div class="mega-dropdown-footer">
                <a href="<?php echo esc_url( home_url( '/produkte' ) ); ?>">
                  <?php _e( 'Alle Produkte ansehen', 'scanpro-child' ); ?> →
                </a>
              </div>
            </div><!-- .mega-dropdown -->
          </li>

          <!-- Einsatzbereiche — dropdown simples -->
          <li class="has-dropdown">
            <a href="<?php echo esc_url( home_url( '/einsatzbereiche' ) ); ?>">
              <?php _e( 'Einsatzbereiche', 'scanpro-child' ); ?>
              <span class="dropdown-arrow" aria-hidden="true">&#9660;</span>
            </a>
            <ul class="dropdown">
              <li><a href="<?php echo esc_url( home_url( '/einsatzbereiche/wohnen' ) ); ?>"><?php _e( 'Wohnen', 'scanpro-child' ); ?></a></li>
              <li><a href="<?php echo esc_url( home_url( '/einsatzbereiche/gewerbe' ) ); ?>"><?php _e( 'Gewerbe', 'scanpro-child' ); ?></a></li>
              <li><a href="<?php echo esc_url( home_url( '/einsatzbereiche/industrie' ) ); ?>"><?php _e( 'Industrie', 'scanpro-child' ); ?></a></li>
              <li><a href="<?php echo esc_url( home_url( '/einsatzbereiche/bildungseinrichtungen' ) ); ?>"><?php _e( 'Bildungseinrichtungen', 'scanpro-child' ); ?></a></li>
              <li><a href="<?php echo esc_url( home_url( '/einsatzbereiche/gastronomie' ) ); ?>"><?php _e( 'Gastronomie', 'scanpro-child' ); ?></a></li>
            </ul>
          </li>

          <!-- Wissen — dropdown simples -->
          <li class="has-dropdown">
            <a href="<?php echo esc_url( home_url( '/wissen' ) ); ?>">
              <?php _e( 'Wissen', 'scanpro-child' ); ?>
              <span class="dropdown-arrow" aria-hidden="true">&#9660;</span>
            </a>
            <ul class="dropdown">
              <li><a href="<?php echo esc_url( home_url( '/wissen/co2' ) ); ?>">CO&#8322;</a></li>
              <li><a href="<?php echo esc_url( home_url( '/wissen/faq' ) ); ?>">FAQ</a></li>
              <li><a href="<?php echo esc_url( home_url( '/wissen/blog' ) ); ?>"><?php _e( 'Blog', 'scanpro-child' ); ?></a></li>
              <li><a href="<?php echo esc_url( home_url( '/wissen/regulierungen' ) ); ?>"><?php _e( 'Regulierungen', 'scanpro-child' ); ?></a></li>
              <li><a href="<?php echo esc_url( home_url( '/wissen/regelung-von-luftmengen' ) ); ?>"><?php _e( 'Regelung von Luftmengen', 'scanpro-child' ); ?></a></li>
            </ul>
          </li>

          <li>
            <a href="<?php echo esc_url( home_url( '/kontakt' ) ); ?>"><?php _e( 'Kontakt', 'scanpro-child' ); ?></a>
          </li>

          <!-- Visível apenas no menu mobile -->
          <li class="nav-mobile-only">
            <a href="<?php echo esc_url( home_url( '/ueber-uns' ) ); ?>"><?php _e( 'Über uns', 'scanpro-child' ); ?></a>
          </li>
          <li class="nav-mobile-only">
            <a href="<?php echo esc_url( home_url( '/referenzen' ) ); ?>"><?php _e( 'Referenzen', 'scanpro-child' ); ?></a>
          </li>

        </ul>
      </nav>

      <!-- CTA -->
      <a href="<?php echo esc_url( home_url( '/kontakt' ) ); ?>" class="btn btn-primary header-cta">
        <?php _e( 'Offerte anfragen', 'scanpro-child' ); ?>
      </a>

      <!-- Hamburger mobile -->
      <button class="hamburger" id="hamburger"
        aria-label="<?php _e( 'Menü öffnen', 'scanpro-child' ); ?>"
        aria-expanded="false"
        aria-controls="primary-nav">
        <span></span>
        <span></span>
        <span></span>
      </button>

    </div>
  </div><!-- .header-main -->

</header>

<div class="site-content-wrapper">
