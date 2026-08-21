<?php
/**
 * Template da página inicial (Home) — Scan Pro Child
 *
 * Seções:
 *  1. Hero full-width
 *  2. Estatísticas (strip escuro)
 *  3. Über Scan Pro (split layout)
 *  4. Grid de produtos com filtros
 *  5. Parceiros oficiais
 *  6. Diferenciais (3 colunas)
 *  7. CTA final
 */

get_header();
?>

<!-- =============================================
     SEÇÃO 1: HERO + STATS INTEGRADOS
     ============================================= -->
<section class="hero" id="hero">

  <!-- Conteúdo do hero sobre a imagem de fundo full-width -->
  <div class="hero-body">

    <img
      class="hero-img"
      src="https://lp.scanpro.ch/wp-content/uploads/2026/07/ChatGPT-Image-17-de-jul.-de-2026-07_21_57.png"
      alt=""
      aria-hidden="true"
    >

    <div class="container">
      <div class="hero-text">
        <div class="hero-eyebrow">
          <span class="hero-eyebrow-text">
            <?php _e( 'Energieeffizienz mit europäischer Technologie', 'scanpro-child' ); ?>
          </span>
        </div>
        <h1>
          <?php _e( 'Intelligente', 'scanpro-child' ); ?>
          <em><?php _e( 'Lüftungslösungen', 'scanpro-child' ); ?></em>
          <?php _e( 'und Wärmerückgewinnung', 'scanpro-child' ); ?>
        </h1>
        <div class="hero-divider" aria-hidden="true"></div>
        <p>
          <?php _e( 'Offizieller Vertriebspartner von Exhausto, exodraft und Thermomatic. Zertifizierte Systeme für Wohn-, Gewerbe- und Industriegebäude.', 'scanpro-child' ); ?>
        </p>
        <div class="hero-actions">
          <a href="<?php echo esc_url( home_url( '/produkte' ) ); ?>" class="btn btn-primary">
            <?php _e( 'Produkte ansehen', 'scanpro-child' ); ?>
          </a>
          <a href="<?php echo esc_url( home_url( '/kontakt' ) ); ?>" class="btn btn-outline-dark">
            <?php _e( 'Experten kontaktieren', 'scanpro-child' ); ?>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Barra de estatísticas -->
  <div class="hero-stats" aria-label="<?php _e( 'Kennzahlen', 'scanpro-child' ); ?>">
    <div class="container">
      <div class="stats-grid">
        <div class="stat-item">
          <div class="stat-number">+50</div>
          <div class="stat-label"><?php _e( 'Jahre Erfahrung', 'scanpro-child' ); ?></div>
        </div>
        <div class="stat-item">
          <div class="stat-number">95%</div>
          <div class="stat-label"><?php _e( 'Wärmerückgewinnung möglich', 'scanpro-child' ); ?></div>
        </div>
        <div class="stat-item">
          <div class="stat-number">99,5%</div>
          <div class="stat-label"><?php _e( 'Reduktion schädlicher Partikel', 'scanpro-child' ); ?></div>
        </div>
      </div>
    </div>
  </div>

</section>

<!-- =============================================
     SEÇÃO 2: ÜBER SCAN PRO (split layout)
     ============================================= -->
<section class="about-section">
  <div class="container">
    <div class="split-section">

      <!-- Imagem -->
      <div class="split-image">
        <img
          src="https://lp.scanpro.ch/wp-content/uploads/2025/10/Design-sem-nome-2025-10-07T172817.842.png"
          alt="<?php _e( 'Scan Pro — Lüftungstechnik Schweiz', 'scanpro-child' ); ?>"
          loading="lazy"
        >
      </div>

      <!-- Texto -->
      <div class="split-text">
        <span class="section-label"><?php _e( 'ÜBER SCAN PRO', 'scanpro-child' ); ?></span>
        <h2 class="section-title">
          <?php _e( 'Schweizer Spezialisten für Lüftungssysteme seit 1970', 'scanpro-child' ); ?>
        </h2>
        <p>
          <?php _e( 'Seit über 50 Jahren steht die Scan-Pro AG für innovative Lüftungslösungen und höchste Fachkompetenz in der Gebäudetechnik. Als Schweizer Spezialist beliefern wir Fachpartner und Planer mit energieeffizienten, hochwertigen Produkten.', 'scanpro-child' ); ?>
        </p>
        <p>
          <?php _e( 'Wir sind offizieller Vertriebspartner von Exhausto, exodraft und Thermomatic.', 'scanpro-child' ); ?>
        </p>
        <a href="<?php echo esc_url( home_url( '/ueber-uns' ) ); ?>" class="btn btn-outline-dark">
          <?php _e( 'Mehr erfahren →', 'scanpro-child' ); ?>
        </a>
      </div>

    </div>
  </div>
</section>

<!-- =============================================
     SEÇÃO 3: GRID DE PRODUTOS COM FILTROS
     ============================================= -->
<section class="products-section" id="produkte">
  <div class="container">
    <span class="section-label"><?php _e( 'PRODUKTE', 'scanpro-child' ); ?></span>
    <h2 class="section-title"><?php _e( 'Unsere Produkte', 'scanpro-child' ); ?></h2>

    <!-- Filtros de categoria — busca dinâmica no WooCommerce para nunca
         ficar desatualizado quando categorias forem criadas/removidas -->
    <div class="product-filters" role="group" aria-label="<?php _e( 'Produktfilter', 'scanpro-child' ); ?>">
      <button class="filter-btn active" data-filter="all" aria-pressed="true">
        <?php _e( 'Alle', 'scanpro-child' ); ?>
      </button>
      <?php
      $home_filter_parent = get_term_by( 'slug', 'produkte', 'product_cat' );
      $home_filter_cats    = $home_filter_parent
        ? get_terms( [ 'taxonomy' => 'product_cat', 'parent' => $home_filter_parent->term_id, 'hide_empty' => true, 'orderby' => 'name' ] )
        : [];
      if ( ! empty( $home_filter_cats ) && ! is_wp_error( $home_filter_cats ) ) :
          foreach ( $home_filter_cats as $home_filter_cat ) :
      ?>
      <button class="filter-btn" data-filter="<?php echo esc_attr( $home_filter_cat->slug ); ?>" aria-pressed="false">
        <?php echo esc_html( $home_filter_cat->name ); ?>
      </button>
      <?php
          endforeach;
      endif;
      ?>
    </div>

    <!-- Grid de produtos via WooCommerce -->
    <div class="products-grid" id="products-grid">
      <?php
      if ( class_exists( 'WooCommerce' ) ) :
          // Busca alguns produtos de CADA categoria (não só os mais recentes no
          // geral), senão a maioria dos filtros fica sem nenhum resultado visível
          // quando os produtos exibidos por acaso são todos da mesma categoria.
          // No JS (product-filter.js), a visualização mostra só os 3 primeiros
          // resultados do filtro ativo por vez — isto aqui é só o "estoque" de
          // onde esses 3 são escolhidos, por isso buscamos mais que 3 ao todo.
          $home_products_by_cat = [];
          $home_product_ids     = [];
          $home_per_cat         = 3;

          if ( ! empty( $home_filter_cats ) ) {
              foreach ( $home_filter_cats as $home_filter_cat ) {
                  $cat_query = new WP_Query( [
                      'post_type'      => 'product',
                      'posts_per_page' => $home_per_cat,
                      'orderby'        => 'menu_order',
                      'order'          => 'ASC',
                      'post_status'    => 'publish',
                      'post__not_in'   => ! empty( $home_product_ids ) ? $home_product_ids : [ 0 ],
                      'tax_query'      => [ [
                          'taxonomy' => 'product_cat',
                          'field'    => 'term_id',
                          'terms'    => $home_filter_cat->term_id,
                      ] ],
                  ] );
                  if ( $cat_query->posts ) {
                      $home_products_by_cat[ $home_filter_cat->term_id ] = $cat_query->posts;
                      foreach ( $cat_query->posts as $cat_product ) {
                          $home_product_ids[] = $cat_product->ID;
                      }
                  }
              }
          }

          // Intercala os produtos entre categorias (1º de cada categoria, depois
          // o 2º de cada, etc.) para que os 3 primeiros já mostrem variedade
          $home_products = [];
          $home_max_len  = $home_products_by_cat ? max( array_map( 'count', $home_products_by_cat ) ) : 0;
          for ( $i = 0; $i < $home_max_len; $i++ ) {
              foreach ( $home_products_by_cat as $cat_products ) {
                  if ( isset( $cat_products[ $i ] ) ) {
                      $home_products[] = $cat_products[ $i ];
                  }
              }
          }

          // Sem categorias configuradas (ou nenhum produto categorizado): mostra os mais recentes
          if ( empty( $home_products ) ) {
              $fallback_query = new WP_Query( [
                  'post_type'      => 'product',
                  'posts_per_page' => 6,
                  'orderby'        => 'menu_order',
                  'order'          => 'ASC',
                  'post_status'    => 'publish',
              ] );
              $home_products = $fallback_query->posts;
          }

          if ( ! empty( $home_products ) ) :
              global $post;
              foreach ( $home_products as $home_product_post ) :
                  $post = $home_product_post;
                  setup_postdata( $post );
                  $cats      = get_the_terms( get_the_ID(), 'product_cat' );
                  $cat_name  = $cats && ! is_wp_error( $cats ) ? $cats[0]->name : '';
                  // Junta o slug de cada categoria atribuída + o de todas as
                  // categorias-mãe, para o filtro casar tanto com botões de
                  // categoria principal quanto de subcategoria
                  $cat_slugs = [];
                  if ( $cats && ! is_wp_error( $cats ) ) {
                      foreach ( $cats as $cat ) {
                          $cat_slugs[] = $cat->slug;
                          foreach ( get_ancestors( $cat->term_id, 'product_cat' ) as $ancestor_id ) {
                              $ancestor = get_term( $ancestor_id, 'product_cat' );
                              if ( $ancestor && ! is_wp_error( $ancestor ) ) {
                                  $cat_slugs[] = $ancestor->slug;
                              }
                          }
                      }
                      $cat_slugs = array_unique( $cat_slugs );
                  }
              ?>
              <div class="product-card" data-category="<?php echo esc_attr( implode( ' ', $cat_slugs ) ); ?>">
                <a href="<?php the_permalink(); ?>" class="product-card-img-link" tabindex="-1" aria-hidden="true">
                  <div class="product-card-img">
                    <?php if ( has_post_thumbnail() ) : ?>
                      <?php the_post_thumbnail( 'medium', [ 'loading' => 'lazy' ] ); ?>
                    <?php else : ?>
                      <!-- Substituir por imagem real do produto -->
                      <div class="product-img-placeholder"></div>
                    <?php endif; ?>
                  </div>
                </a>
                <div class="product-card-body">
                  <?php if ( $cat_name ) : ?>
                    <span class="product-card-category"><?php echo esc_html( $cat_name ); ?></span>
                  <?php endif; ?>
                  <h3 class="product-card-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  </h3>
                  <a href="<?php the_permalink(); ?>" class="btn btn-primary product-card-btn">
                    <?php _e( 'Produkt ansehen', 'scanpro-child' ); ?>
                  </a>
                </div>
              </div>
              <?php
              endforeach;
              wp_reset_postdata();
          else :
          ?>
          <p class="no-products-notice">
            <?php _e( 'Keine Produkte gefunden.', 'scanpro-child' ); ?>
          </p>
          <?php
          endif;
      endif;
      ?>
    </div><!-- .products-grid -->

    <div class="products-more">
      <a href="<?php echo esc_url( home_url( '/produkte' ) ); ?>" class="btn btn-outline-dark">
        <?php _e( 'Alle Produkte anzeigen →', 'scanpro-child' ); ?>
      </a>
    </div>

  </div>
</section>

<!-- =============================================
     SEÇÃO 4: PARCEIROS OFICIAIS
     ============================================= -->
<section class="partners-section">
  <div class="container">
    <h2 class="partners-title"><?php _e( 'Offizielle Partner', 'scanpro-child' ); ?></h2>
    <div class="partners-grid" aria-label="<?php _e( 'Partnermarken', 'scanpro-child' ); ?>">
      <div class="partner-logo-item">
        <img
          src="https://lp.scanpro.ch/wp-content/uploads/2025/11/exhausto_logo-scaled.png"
          alt="Exhausto"
          loading="lazy"
        >
      </div>
      <div class="partner-logo-item">
        <img
          src="https://lp.scanpro.ch/wp-content/uploads/2025/11/exodraft-logo-blue_wb.png"
          alt="exodraft"
          loading="lazy"
        >
      </div>
      <div class="partner-logo-item">
        <img
          src="https://lp.scanpro.ch/wp-content/uploads/2026/07/Logo_Thermomatic-scaled.png"
          alt="Thermomatic"
          loading="lazy"
        >
      </div>
    </div>
  </div>
</section>

<!-- =============================================
     SEÇÃO 5: EINSATZBEREICHE
     ============================================= -->
<section class="home-einsatz-section">
  <div class="container">
    <span class="section-label"><?php _e( 'ANWENDUNGEN', 'scanpro-child' ); ?></span>
    <h2 class="section-title">
      <?php _e( 'Unsere', 'scanpro-child' ); ?>
      <em><?php _e( 'Einsatzbereiche', 'scanpro-child' ); ?></em>
    </h2>
    <p class="section-intro">
      <?php _e( 'Von der Wohnanlage bis zur Industriehalle — unsere Systeme werden in den unterschiedlichsten Bereichen eingesetzt.', 'scanpro-child' ); ?>
    </p>

    <div class="home-einsatz-grid">
      <?php
      $areas_home = [
          [ 'title' => __( 'Wohnen', 'scanpro-child' ),                 'slug' => 'wohnen' ],
          [ 'title' => __( 'Gewerbe', 'scanpro-child' ),                'slug' => 'gewerbe' ],
          [ 'title' => __( 'Industrie', 'scanpro-child' ),              'slug' => 'industrie' ],
          [ 'title' => __( 'Bildungseinrichtungen', 'scanpro-child' ),  'slug' => 'bildungseinrichtungen' ],
          [ 'title' => __( 'Gastronomie', 'scanpro-child' ),            'slug' => 'gastronomie' ],
      ];
      foreach ( $areas_home as $a ) :
          $page = get_page_by_path( 'einsatzbereiche/' . $a['slug'] );
          $url  = $page ? get_permalink( $page->ID ) : esc_url( home_url( '/einsatzbereiche' ) );
      ?>
      <a href="<?php echo esc_url( $url ); ?>"
         class="home-einsatz-card"
         aria-label="<?php echo esc_attr( $a['title'] ); ?>">
        <div class="home-einsatz-card-bg home-einsatz-<?php echo esc_attr( $a['slug'] ); ?>"></div>
        <div class="home-einsatz-card-overlay">
          <span><?php echo esc_html( $a['title'] ); ?></span>
        </div>
      </a>
      <?php endforeach; ?>
    </div>

    <div class="text-center" style="margin-top: 44px;">
      <a href="<?php echo esc_url( home_url( '/einsatzbereiche' ) ); ?>" class="btn btn-outline-dark">
        <?php _e( 'Alle Einsatzbereiche ansehen →', 'scanpro-child' ); ?>
      </a>
    </div>
  </div>
</section>
<!-- /einsatzbereiche -->

<!-- =============================================
     SEÇÃO 6: DIFERENCIAIS (3 colunas)
     ============================================= -->
<section class="features-section">
  <div class="container">
    <span class="section-label"><?php _e( 'WARUM SCAN PRO?', 'scanpro-child' ); ?></span>
    <h2 class="section-title"><?php _e( 'Spezialisten für Lüftungstechnik', 'scanpro-child' ); ?></h2>

    <div class="features-grid">

      <div class="feature-card">
        <div class="feature-icon" aria-hidden="true">
          <!-- Ícone: suporte técnico — substituir por SVG real -->
          <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <circle cx="24" cy="24" r="23" stroke="currentColor" stroke-width="2"/>
            <path d="M16 24h16M24 16v16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
          </svg>
        </div>
        <h3 class="feature-title"><?php _e( 'Technischer Support', 'scanpro-child' ); ?></h3>
        <p class="feature-text">
          <?php _e( 'Unser Team verfügt über jahrzehntelange Erfahrung in der Lüftungstechnik und steht Ihnen mit kompetentem Fachwissen zur Seite.', 'scanpro-child' ); ?>
        </p>
      </div>

      <div class="feature-card">
        <div class="feature-icon" aria-hidden="true">
          <!-- Ícone: certificação — substituir por SVG real -->
          <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <circle cx="24" cy="24" r="23" stroke="currentColor" stroke-width="2"/>
            <path d="M16 24l6 6 10-12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
        <h3 class="feature-title"><?php _e( 'Zertifizierte Produkte', 'scanpro-child' ); ?></h3>
        <p class="feature-text">
          <?php _e( 'Alle Produkte entsprechen europäischen Normen für Energieeffizienz und Luftqualität und sind nach höchsten Standards zertifiziert.', 'scanpro-child' ); ?>
        </p>
      </div>

      <div class="feature-card">
        <div class="feature-icon" aria-hidden="true">
          <!-- Ícone: entrega — substituir por SVG real -->
          <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <circle cx="24" cy="24" r="23" stroke="currentColor" stroke-width="2"/>
            <path d="M14 24h12l4-8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <circle cx="18" cy="32" r="2" fill="currentColor"/>
            <circle cx="30" cy="32" r="2" fill="currentColor"/>
          </svg>
        </div>
        <h3 class="feature-title"><?php _e( 'Schnelle Lieferung', 'scanpro-child' ); ?></h3>
        <p class="feature-text">
          <?php _e( 'Lokales Lager in der Schweiz für eine zuverlässige und schnelle Auftragsabwicklung direkt an Ihren Standort.', 'scanpro-child' ); ?>
        </p>
      </div>

    </div>
  </div>
</section>

<!-- =============================================
     SEÇÃO 6: CTA FINAL
     ============================================= -->
<section class="cta-section" aria-label="<?php _e( 'Kontaktaufforderung', 'scanpro-child' ); ?>">
  <div class="container cta-content">
    <h2><?php _e( 'Bereit, Ihre Lüftung zu optimieren?', 'scanpro-child' ); ?></h2>
    <p>
      <?php _e( 'Kontaktieren Sie uns und erhalten Sie ein massgeschneidertes Angebot für Ihr Projekt.', 'scanpro-child' ); ?>
    </p>
    <a href="<?php echo esc_url( home_url( '/kontakt' ) ); ?>" class="btn btn-white">
      <?php _e( 'Kostenlose Offerte anfragen', 'scanpro-child' ); ?>
    </a>
  </div>
</section>

<?php get_footer(); ?>
