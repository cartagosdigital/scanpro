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
  <div class="hero-bg" aria-hidden="true"></div>

  <div class="hero-body">
    <div class="container">
      <div class="hero-content">
        <span class="hero-label">
          <?php _e( 'Energieeffizienz mit europäischer Technologie', 'scanpro-child' ); ?>
        </span>
        <h1>
          <?php _e( 'Intelligente', 'scanpro-child' ); ?>
          <em><?php _e( 'Lüftungslösungen', 'scanpro-child' ); ?></em>
          <?php _e( 'und Wärmerückgewinnung', 'scanpro-child' ); ?>
        </h1>
        <p>
          <?php _e( 'Offizieller Vertriebspartner von Exhausto, exodraft und Aldes. Zertifizierte Systeme für Wohn-, Gewerbe- und Industriegebäude.', 'scanpro-child' ); ?>
        </p>
        <div class="hero-actions">
          <a href="<?php echo esc_url( home_url( '/shop' ) ); ?>" class="btn btn-primary">
            <?php _e( 'Produkte ansehen', 'scanpro-child' ); ?>
          </a>
          <a href="<?php echo esc_url( home_url( '/kontakt' ) ); ?>" class="btn btn-outline">
            <?php _e( 'Experten kontaktieren', 'scanpro-child' ); ?>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Barra de estatísticas integrada na base do hero -->
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
          <?php _e( 'Wir sind offizieller Vertriebspartner von Exhausto, Aereco, Aldes und exodraft.', 'scanpro-child' ); ?>
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

    <!-- Filtros de categoria -->
    <div class="product-filters" role="group" aria-label="<?php _e( 'Produktfilter', 'scanpro-child' ); ?>">
      <button class="filter-btn active" data-filter="all" aria-pressed="true">
        <?php _e( 'Alle', 'scanpro-child' ); ?>
      </button>
      <button class="filter-btn" data-filter="lueftung" aria-pressed="false">
        <?php _e( 'Lüftung', 'scanpro-child' ); ?>
      </button>
      <button class="filter-btn" data-filter="waermerueckgewinnung" aria-pressed="false">
        <?php _e( 'Wärmerückgewinnung', 'scanpro-child' ); ?>
      </button>
      <button class="filter-btn" data-filter="rauchsauger" aria-pressed="false">
        <?php _e( 'Rauchsauger', 'scanpro-child' ); ?>
      </button>
      <button class="filter-btn" data-filter="filter" aria-pressed="false">
        <?php _e( 'Filter', 'scanpro-child' ); ?>
      </button>
      <button class="filter-btn" data-filter="zubehoer" aria-pressed="false">
        <?php _e( 'Zubehör', 'scanpro-child' ); ?>
      </button>
    </div>

    <!-- Grid de produtos via WooCommerce -->
    <div class="products-grid" id="products-grid">
      <?php
      if ( class_exists( 'WooCommerce' ) ) :
          $args = [
              'post_type'      => 'product',
              'posts_per_page' => 6,
              'orderby'        => 'menu_order',
              'order'          => 'ASC',
              'post_status'    => 'publish',
          ];
          $products = new WP_Query( $args );

          if ( $products->have_posts() ) :
              while ( $products->have_posts() ) :
                  $products->the_post();
                  global $product;
                  $cats     = get_the_terms( get_the_ID(), 'product_cat' );
                  $cat_slug = $cats && ! is_wp_error( $cats ) ? $cats[0]->slug : '';
                  $cat_name = $cats && ! is_wp_error( $cats ) ? $cats[0]->name : '';
              ?>
              <div class="product-card" data-category="<?php echo esc_attr( $cat_slug ); ?>">
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
                  <?php if ( $product->get_price() ) : ?>
                    <div class="product-card-price"><?php echo wp_kses_post( $product->get_price_html() ); ?></div>
                  <?php endif; ?>
                  <a href="<?php the_permalink(); ?>" class="btn btn-primary product-card-btn">
                    <?php _e( 'Produkt ansehen', 'scanpro-child' ); ?>
                  </a>
                </div>
              </div>
              <?php
              endwhile;
              wp_reset_postdata();
          else :
              // Fallback: WooCommerce ativo mas sem produtos cadastrados
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
      <a href="<?php echo esc_url( home_url( '/shop' ) ); ?>" class="btn btn-outline-dark">
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
        <div class="partner-logo-placeholder">Aldes</div>
      </div>
      <div class="partner-logo-item">
        <div class="partner-logo-placeholder">Aereco</div>
      </div>
    </div>
  </div>
</section>

<!-- =============================================
     SEÇÃO 5: DIFERENCIAIS (3 colunas)
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
