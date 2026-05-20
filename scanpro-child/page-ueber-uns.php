<?php
/**
 * Template: Über uns (Sobre nós) — Scan Pro Child
 * Slug da página: ueber-uns
 */

get_header();
?>

<main class="site-main" id="main" role="main">

  <!-- Banner da página -->
  <section class="page-banner page-banner--dark">
    <div class="container">
      <nav class="breadcrumb" aria-label="<?php _e( 'Brotkrümelnavigation', 'scanpro-child' ); ?>">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
          <?php _e( 'Startseite', 'scanpro-child' ); ?>
        </a>
        <span aria-hidden="true"> / </span>
        <span aria-current="page"><?php _e( 'Über uns', 'scanpro-child' ); ?></span>
      </nav>
      <h1><?php _e( 'Über uns', 'scanpro-child' ); ?></h1>
      <p class="page-banner-subtitle">
        <?php _e( 'Ihr Schweizer Spezialist für Lüftungstechnik seit 1970', 'scanpro-child' ); ?>
      </p>
    </div>
  </section>

  <!-- História da empresa -->
  <section class="about-story">
    <div class="container">
      <div class="split-section">
        <div class="split-text">
          <span class="section-label"><?php _e( 'UNSERE GESCHICHTE', 'scanpro-child' ); ?></span>
          <h2 class="section-title">
            <?php _e( 'Über 50 Jahre Kompetenz in der Lüftungstechnik', 'scanpro-child' ); ?>
          </h2>
          <p>
            <?php _e( 'Seit über 50 Jahren steht die Scan-Pro AG für innovative Lüftungslösungen und höchste Fachkompetenz in der Gebäudetechnik. Als Schweizer Spezialist beliefern wir Fachpartner und Planer mit energieeffizienten, hochwertigen Produkten.', 'scanpro-child' ); ?>
          </p>
          <p>
            <?php _e( 'Als offizieller Vertriebspartner von Exhausto, Aereco, Aldes und exodraft verfügen wir über ein umfassendes Sortiment an Lüftungssystemen für Wohn-, Gewerbe- und Industriegebäude.', 'scanpro-child' ); ?>
          </p>
          <p>
            <?php _e( 'Unsere Experten begleiten Sie von der Planung über die Lieferung bis hin zur technischen Unterstützung nach dem Kauf — kompetent und zuverlässig.', 'scanpro-child' ); ?>
          </p>
        </div>
        <div class="split-image">
          <!-- Substituir por imagem real da empresa -->
          <div class="split-img-placeholder" aria-hidden="true"></div>
        </div>
      </div>
    </div>
  </section>

  <!-- Valores / Missão -->
  <section class="about-values" style="background: var(--color-secondary);">
    <div class="container">
      <span class="section-label"><?php _e( 'UNSERE WERTE', 'scanpro-child' ); ?></span>
      <h2 class="section-title"><?php _e( 'Was uns antreibt', 'scanpro-child' ); ?></h2>
      <div class="features-grid">

        <div class="feature-card">
          <h3 class="feature-title"><?php _e( 'Qualität', 'scanpro-child' ); ?></h3>
          <p class="feature-text">
            <?php _e( 'Wir liefern ausschliesslich Produkte, die europäischen Qualitätsnormen entsprechen und von führenden Herstellern zertifiziert sind.', 'scanpro-child' ); ?>
          </p>
        </div>

        <div class="feature-card">
          <h3 class="feature-title"><?php _e( 'Fachkompetenz', 'scanpro-child' ); ?></h3>
          <p class="feature-text">
            <?php _e( 'Unser Team aus erfahrenen Lüftungstechnikern berät Sie professionell und findet die passende Lösung für Ihr Projekt.', 'scanpro-child' ); ?>
          </p>
        </div>

        <div class="feature-card">
          <h3 class="feature-title"><?php _e( 'Zuverlässigkeit', 'scanpro-child' ); ?></h3>
          <p class="feature-text">
            <?php _e( 'Schnelle Lieferung aus unserem lokalen Lager und kompetenter technischer Support nach dem Kauf.', 'scanpro-child' ); ?>
          </p>
        </div>

      </div>
    </div>
  </section>

  <!-- Parceiros -->
  <section class="about-partners">
    <div class="container">
      <span class="section-label"><?php _e( 'PARTNER', 'scanpro-child' ); ?></span>
      <h2 class="section-title"><?php _e( 'Offizielle Partner', 'scanpro-child' ); ?></h2>
      <div class="partners-grid">
        <!-- Substituir pelos logos reais -->
        <div class="partner-logo-item"><div class="partner-logo-placeholder">Exhausto</div></div>
        <div class="partner-logo-item"><div class="partner-logo-placeholder">exodraft</div></div>
        <div class="partner-logo-item"><div class="partner-logo-placeholder">Aldes</div></div>
        <div class="partner-logo-item"><div class="partner-logo-placeholder">Aereco</div></div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="cta-section">
    <div class="container cta-content">
      <h2><?php _e( 'Lernen Sie uns persönlich kennen', 'scanpro-child' ); ?></h2>
      <p>
        <?php _e( 'Wir freuen uns auf Ihre Anfrage und beraten Sie gerne.', 'scanpro-child' ); ?>
      </p>
      <a href="<?php echo esc_url( home_url( '/kontakt' ) ); ?>" class="btn btn-white">
        <?php _e( 'Kontakt aufnehmen', 'scanpro-child' ); ?>
      </a>
    </div>
  </section>

</main>

<?php get_footer(); ?>
