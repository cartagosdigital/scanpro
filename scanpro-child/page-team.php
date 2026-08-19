<?php
/**
 * Template Name: Team
 * Seite: Unser Team — Ansprechpartner der Scan-Pro AG
 */

get_header();
?>

<main class="site-main" id="main" role="main">

  <!-- Hero -->
  <section class="page-hero">
    <div class="container">
      <span class="section-label"><?php _e( 'UNSER TEAM', 'scanpro-child' ); ?></span>
      <h1><?php _e( 'Ansprechpartner', 'scanpro-child' ); ?></h1>
      <p><?php _e( 'Persönliche Beratung durch erfahrene Fachleute — wir sind für Sie da.', 'scanpro-child' ); ?></p>
    </div>
  </section>

  <!-- Team Grid -->
  <section class="team-section">
    <div class="container">
      <div class="team-grid">

        <!-- Mark von Borries -->
        <article class="team-card reveal-fade">
          <div class="team-card-photo">
            <img
              src="https://lp.scanpro.ch/wp-content/uploads/2026/07/CroppedImage300200-Photo-Mark-Studio-copy-2.jpeg"
              alt="Mark von Borries"
              loading="lazy"
            >
          </div>
          <div class="team-card-body">
            <h2 class="team-card-name">Mark von Borries</h2>
            <span class="team-card-role"><?php _e( 'Geschäftsleitung', 'scanpro-child' ); ?></span>
            <a href="mailto:info@scanpro.ch" class="team-card-contact">
              <?php _e( 'Kontakt aufnehmen', 'scanpro-child' ); ?> →
            </a>
          </div>
        </article>

        <!-- Andreas Lehmann -->
        <article class="team-card reveal-fade">
          <div class="team-card-photo">
            <img
              src="https://lp.scanpro.ch/wp-content/uploads/2026/07/images-5.jpeg"
              alt="Andreas Lehmann"
              loading="lazy"
            >
          </div>
          <div class="team-card-body">
            <h2 class="team-card-name">Andreas Lehmann</h2>
            <span class="team-card-role"><?php _e( 'Technik', 'scanpro-child' ); ?></span>
            <a href="mailto:info@scanpro.ch" class="team-card-contact">
              <?php _e( 'Kontakt aufnehmen', 'scanpro-child' ); ?> →
            </a>
          </div>
        </article>

        <!-- Sonja Bühler -->
        <article class="team-card reveal-fade">
          <div class="team-card-photo">
            <img
              src="https://lp.scanpro.ch/wp-content/uploads/2026/07/CroppedImage300200-buehler.jpg"
              alt="Sonja Bühler"
              loading="lazy"
            >
          </div>
          <div class="team-card-body">
            <h2 class="team-card-name">Sonja Bühler</h2>
            <span class="team-card-role"><?php _e( 'Administration', 'scanpro-child' ); ?></span>
            <a href="mailto:info@scanpro.ch" class="team-card-contact">
              <?php _e( 'Kontakt aufnehmen', 'scanpro-child' ); ?> →
            </a>
          </div>
        </article>

        <!-- Priscila Kirsner -->
        <article class="team-card reveal-fade">
          <div class="team-card-photo">
            <img
              src="https://lp.scanpro.ch/wp-content/uploads/2026/07/CroppedImage300200-WhatsApp-Image-2025-09-16-at-12.57.41.jpeg"
              alt="Priscila Kirsner"
              loading="lazy"
            >
          </div>
          <div class="team-card-body">
            <h2 class="team-card-name">Priscila Kirsner</h2>
            <span class="team-card-role"><?php _e( 'Marketing', 'scanpro-child' ); ?></span>
            <a href="mailto:info@scanpro.ch" class="team-card-contact">
              <?php _e( 'Kontakt aufnehmen', 'scanpro-child' ); ?> →
            </a>
          </div>
        </article>

      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="cta-section" aria-label="<?php _e( 'Kontaktaufforderung', 'scanpro-child' ); ?>">
    <div class="container cta-content">
      <h2><?php _e( 'Haben Sie Fragen?', 'scanpro-child' ); ?></h2>
      <p><?php _e( 'Unser Team steht Ihnen gerne zur Verfügung — wir freuen uns auf Ihre Anfrage.', 'scanpro-child' ); ?></p>
      <a href="<?php echo esc_url( home_url( '/kontakt' ) ); ?>" class="btn btn-white">
        <?php _e( 'Jetzt Kontakt aufnehmen', 'scanpro-child' ); ?>
      </a>
    </div>
  </section>

</main>

<?php get_footer(); ?>
