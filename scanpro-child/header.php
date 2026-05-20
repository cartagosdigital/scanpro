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
        src="https://lp.scanpro.ch/wp-content/uploads/2025/10/logo-Scan-Pro-1.png"
        alt="Scan Pro"
        height="44"
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

        <li class="has-dropdown has-megamenu">
          <a href="<?php echo esc_url( home_url( '/shop' ) ); ?>">
            <?php _e( 'Produkte', 'scanpro-child' ); ?>
            <span class="dropdown-arrow" aria-hidden="true">&#9660;</span>
          </a>
          <div class="dropdown mega-dropdown">
            <div class="mega-dropdown-inner">

              <!-- Spalte 1 -->
              <div class="mega-col">
                <div class="mega-group">
                  <a class="mega-group-title" href="<?php echo esc_url( home_url( '/produktkategorie/lueftungsgeraete' ) ); ?>">
                    <?php _e( 'Lüftungsgeräte', 'scanpro-child' ); ?>
                  </a>
                  <ul>
                    <li><a href="<?php echo esc_url( home_url( '/produktkategorie/kompakte-lueftungsgeraete' ) ); ?>"><?php _e( 'Kompakte Lüftungsgeräte', 'scanpro-child' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/produktkategorie/dezentrale-lueftungsgeraete' ) ); ?>"><?php _e( 'Dezentrale Lüftungsgeräte', 'scanpro-child' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/produktkategorie/modulare-lueftungsgeraete' ) ); ?>"><?php _e( 'Modulare Lüftungsgeräte', 'scanpro-child' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/produktkategorie/automatik-fuer-lueftungsgeraete' ) ); ?>"><?php _e( 'Automatik', 'scanpro-child' ); ?></a></li>
                  </ul>
                </div>
                <div class="mega-group">
                  <a class="mega-group-title" href="<?php echo esc_url( home_url( '/produktkategorie/ventilatoren' ) ); ?>">
                    <?php _e( 'Ventilatoren', 'scanpro-child' ); ?>
                  </a>
                  <ul>
                    <li><a href="<?php echo esc_url( home_url( '/produktkategorie/boxventilatoren' ) ); ?>"><?php _e( 'Boxventilatoren', 'scanpro-child' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/produktkategorie/dach-und-wandventilatoren' ) ); ?>"><?php _e( 'Dach- &amp; Wandventilatoren', 'scanpro-child' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/produktkategorie/dachdurchfuehrungen' ) ); ?>"><?php _e( 'Dachdurchführungen', 'scanpro-child' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/produktkategorie/regelung-fuer-ventilatoren' ) ); ?>"><?php _e( 'Regelung', 'scanpro-child' ); ?></a></li>
                  </ul>
                </div>
                <div class="mega-group">
                  <a class="mega-group-title" href="<?php echo esc_url( home_url( '/produktkategorie/kuehl-und-heizregister' ) ); ?>">
                    <?php _e( 'Kühl- &amp; Heizregister', 'scanpro-child' ); ?>
                  </a>
                  <ul>
                    <li><a href="<?php echo esc_url( home_url( '/produktkategorie/dx-register' ) ); ?>"><?php _e( 'DX-Register', 'scanpro-child' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/produktkategorie/elektroregister' ) ); ?>"><?php _e( 'Elektroregister', 'scanpro-child' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/produktkategorie/wasserregister' ) ); ?>"><?php _e( 'Wasserregister', 'scanpro-child' ); ?></a></li>
                  </ul>
                </div>
              </div><!-- .mega-col -->

              <!-- Spalte 2 -->
              <div class="mega-col">
                <div class="mega-group">
                  <a class="mega-group-title" href="<?php echo esc_url( home_url( '/produktkategorie/luftdurchlaesse-gitter-und-dachhauben' ) ); ?>">
                    <?php _e( 'Luftdurchlässe &amp; Gitter', 'scanpro-child' ); ?>
                  </a>
                  <ul>
                    <li><a href="<?php echo esc_url( home_url( '/produktkategorie/luftdurchlaesse' ) ); ?>"><?php _e( 'Luftdurchlässe', 'scanpro-child' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/produktkategorie/dachhauben' ) ); ?>"><?php _e( 'Dachhauben', 'scanpro-child' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/produktkategorie/wetterschutzgitter' ) ); ?>"><?php _e( 'Wetterschutzgitter', 'scanpro-child' ); ?></a></li>
                  </ul>
                </div>
                <div class="mega-group">
                  <a class="mega-group-title" href="<?php echo esc_url( home_url( '/produktkategorie/volumenstromregler-und-stellklappen' ) ); ?>">
                    <?php _e( 'Volumenstromregler', 'scanpro-child' ); ?>
                  </a>
                  <ul>
                    <li><a href="<?php echo esc_url( home_url( '/produktkategorie/konstante-volumenstromregler' ) ); ?>"><?php _e( 'Konstante Volumenstromregler', 'scanpro-child' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/produktkategorie/variable-volumenstromregler' ) ); ?>"><?php _e( 'Variable Volumenstromregler', 'scanpro-child' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/produktkategorie/stellklappen' ) ); ?>"><?php _e( 'Stellklappen', 'scanpro-child' ); ?></a></li>
                  </ul>
                </div>
                <div class="mega-group">
                  <a class="mega-group-title" href="<?php echo esc_url( home_url( '/produktkategorie/brandschutzkomponenten' ) ); ?>">
                    <?php _e( 'Brandschutzkomponenten', 'scanpro-child' ); ?>
                  </a>
                  <ul>
                    <li><a href="<?php echo esc_url( home_url( '/produktkategorie/kompaktsteuerung' ) ); ?>"><?php _e( 'Kompaktsteuerung', 'scanpro-child' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/produktkategorie/rauchmelder' ) ); ?>"><?php _e( 'Rauchmelder', 'scanpro-child' ); ?></a></li>
                  </ul>
                </div>
              </div><!-- .mega-col -->

            </div><!-- .mega-dropdown-inner -->

            <div class="mega-dropdown-footer">
              <a href="<?php echo esc_url( home_url( '/shop' ) ); ?>">
                <?php _e( 'Alle Produkte ansehen', 'scanpro-child' ); ?> →
              </a>
            </div>
          </div><!-- .mega-dropdown -->
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
