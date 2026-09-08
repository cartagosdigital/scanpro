<?php
/**
 * Template: Über uns — Scan Pro Child
 * Slug da página: ueber-uns
 */

get_header();
?>

<main class="site-main" id="main" role="main">

  <!-- Hero -->
  <section class="page-hero">
    <div class="container">
<span class="section-label"><?php _e( 'ÜBER UNS', 'scanpro-child' ); ?></span>
      <h1><?php _e( 'Über uns', 'scanpro-child' ); ?></h1>
      <p><?php _e( 'Ihr Schweizer Spezialist für Lüftungstechnik seit 1975', 'scanpro-child' ); ?></p>
    </div>
  </section>

  <!-- História -->
  <section class="bg-white">
    <div class="container">
      <div class="split-section">

        <div class="split-text">
          <span class="section-label"><?php _e( 'UNSERE GESCHICHTE', 'scanpro-child' ); ?></span>
          <h2 class="section-title">
            <?php _e( 'Über 50 Jahre Kompetenz in der Lüftungstechnik', 'scanpro-child' ); ?>
          </h2>
          <p>
            <?php _e( 'Die Scan-Pro AG wurde 1975 gegründet, um dem steigenden Bedarf an Rauchsaugern für Cheminées gerecht zu werden. Die Ölkrise der 1970er Jahre führte zu einem erheblichen Boom im Kamin- und Cheminéebau, da die Menschen aufgrund der stark steigenden Öl- und Heizkosten nach alternativen Heizmethoden suchten. Durch den Vertrieb von Rauchsaugern des dänischen Pioniers Exhausto entstand die Scan-Pro AG (<strong>Scan</strong>dinavian <strong>Pro</strong>ducts).', 'scanpro-child' ); ?>
          </p>
          <p>
            <?php _e( 'Angesichts der sich verschärfenden Energiekrise in Europa entwickelte Exhausto die erste Generation des VEX, ein Wärmerückgewinnungsgerät, das ein energieeffizienteres Raumklima schuf als bisher mit einfachen Abluftanlagen möglich war. Die Scan-Pro AG positionierte sich im Schweizer Markt erfolgreich im Bereich Energieeffizienz und gesundes Raumklima.', 'scanpro-child' ); ?>
          </p>
          <p>
            <?php _e( 'Im Jahr 2007 wurde Exhausto aufgeteilt, und die Rauchsauger wurden unter der Marke Exodraft weitergeführt. Nach über 50 Jahren bleibt unsere Kernmission für Energieeffizienz und gesunde Raumluft unverändert. Mit neuen Produkten und Technologien bieten wir unseren Kunden Innovation und Flexibilität.', 'scanpro-child' ); ?>
          </p>
          <a href="<?php echo esc_url( home_url( '/kontakt' ) ); ?>" class="btn btn-outline-dark">
            <?php _e( 'Kontakt aufnehmen', 'scanpro-child' ); ?>
          </a>
        </div>

        <div class="split-image">
          <img
            src="https://lp.scanpro.ch/wp-content/uploads/2026/09/VEX4000-Baustelle.png"
            alt="<?php _e( 'Scan Pro — Team und Technik', 'scanpro-child' ); ?>"
            loading="lazy"
          >
        </div>

      </div>

      <!-- Zeitleiste — Meilensteine der Firmengeschichte.
           Meilensteine ohne 'img' werden ohne Bildfläche ausgegeben. -->
      <div class="geschichte-timeline">
        <?php
        $geschichte_milestones = [
          [
            'year'    => '1957',
            'caption' => __( 'Erste Rauchsauger', 'scanpro-child' ),
            'img'     => 'https://azure-skunk-391096.hostingersite.com/wp-content/uploads/2026/09/Rauchsauger-alt.png',
          ],
          [
            'year'    => '1978',
            'caption' => __( 'Erster VEX (Serie VEX 1 – 5)', 'scanpro-child' ),
            'img'     => 'https://azure-skunk-391096.hostingersite.com/wp-content/uploads/2026/09/VEX1-5-alt.png',
          ],
          [
            'year'    => '1993',
            'caption' => __( 'Nachfolge Serie VEX1.5 – 5.5', 'scanpro-child' ),
            'img'     => 'https://azure-skunk-391096.hostingersite.com/wp-content/uploads/2026/09/VEX-.5.jpg',
          ],
          [
            'year'    => '2000',
            'caption' => __( 'Neue Generation VEX100', 'scanpro-child' ),
          ],
          [
            'year'    => '2017',
            'caption' => __( 'VEX100 mit effizienterem Gegenstromwärmetauscher', 'scanpro-child' ),
          ],
        ];
        foreach ( $geschichte_milestones as $milestone ) :
          $has_img = ! empty( $milestone['img'] );
        ?>
        <div class="geschichte-timeline-item<?php echo $has_img ? '' : ' geschichte-timeline-item--no-img'; ?>">
          <?php if ( $has_img ) : ?>
          <div class="geschichte-timeline-img">
            <img
              src="<?php echo esc_url( $milestone['img'] ); ?>"
              alt="<?php echo esc_attr( sprintf( '%s — %s', $milestone['year'], $milestone['caption'] ) ); ?>"
              loading="lazy"
            >
          </div>
          <?php endif; ?>
          <span class="geschichte-timeline-year"><?php echo esc_html( $milestone['year'] ); ?></span>
          <p class="geschichte-timeline-caption"><?php echo esc_html( $milestone['caption'] ); ?></p>
        </div>
        <?php endforeach; ?>
      </div>

    </div>
  </section>

  <!-- Valores -->
  <section class="features-section bg-light">
    <div class="container">
      <span class="section-label"><?php _e( 'UNSERE WERTE', 'scanpro-child' ); ?></span>
      <h2 class="section-title"><?php _e( 'Was uns antreibt', 'scanpro-child' ); ?></h2>
      <div class="features-grid features-grid--4">

        <div class="feature-card reveal-fade">
          <h3 class="feature-title"><?php _e( 'Qualität', 'scanpro-child' ); ?></h3>
          <p class="feature-text">
            <?php _e( 'Wir liefern ausschliesslich Produkte, die europäischen Qualitätsnormen entsprechen und von führenden Herstellern zertifiziert sind.', 'scanpro-child' ); ?>
          </p>
        </div>

        <div class="feature-card reveal-fade">
          <h3 class="feature-title"><?php _e( 'Fachkompetenz', 'scanpro-child' ); ?></h3>
          <p class="feature-text">
            <?php _e( 'Unser Team aus erfahrenen Technikern berät Sie professionell und findet die passende Lösung für Ihr Projekt.', 'scanpro-child' ); ?>
          </p>
        </div>

        <div class="feature-card reveal-fade">
          <h3 class="feature-title"><?php _e( 'Zuverlässigkeit', 'scanpro-child' ); ?></h3>
          <p class="feature-text">
            <?php _e( 'Schnelle Lieferung und kompetenter technischer Support nach dem Kauf. Mehr als nur Verkaufen, bieten wir unseren Kunden technischen Dienst, Garantie-Reparaturen, Service und Geräteumrüstung.', 'scanpro-child' ); ?>
          </p>
        </div>

        <div class="feature-card reveal-fade">
          <h3 class="feature-title"><?php _e( 'Innovation', 'scanpro-child' ); ?></h3>
          <p class="feature-text">
            <?php _e( 'Indem wir aktiv an Seminaren, Messen und dem Gebäudetechnik Forum teilnehmen, entwickeln wir innovative Produkte und Lösungen, die genau auf die Bedürfnisse unserer Kunden zugeschnitten sind.', 'scanpro-child' ); ?>
          </p>
        </div>

      </div>
    </div>
  </section>

  <!-- Zitat -->
  <section class="ueber-quote-section">
    <div class="container">
      <div class="ueber-quote-card reveal-fade">
        <div class="ueber-quote-photo">
          <img
            src="https://lp.scanpro.ch/wp-content/uploads/2026/08/F8860D54-D133-4841-856E-3334FF59B837.png"
            alt="Mark von Borries"
            loading="lazy"
          >
        </div>
        <div class="ueber-quote-body">
          <span class="ueber-quote-mark" aria-hidden="true">&#8220;</span>
          <blockquote>
            <p><?php _e( 'Ich verwende den Begriff „Komfortlüftung“ ungern, da gesunde Raumluft ein Grundbedürfnis für die Gesundheit ist und nicht als Komfort oder Luxus betrachtet werden sollte.', 'scanpro-child' ); ?></p>
          </blockquote>
          <cite>
            <span class="ueber-quote-name">Mark von Borries</span>
            <span class="ueber-quote-role"><?php _e( 'Geschäftsleiter der Scan-Pro AG', 'scanpro-child' ); ?></span>
          </cite>
        </div>
      </div>
    </div>
  </section>

  <!-- Parceiros -->
  <section class="partners-section bg-white">
    <div class="container">
      <span class="section-label text-center" style="text-align:center"><?php _e( 'PARTNER', 'scanpro-child' ); ?></span>
      <h2 class="partners-title"><?php _e( 'Offizielle Partner', 'scanpro-child' ); ?></h2>
      <div class="partners-grid">
        <div class="partner-logo-item">
          <img src="https://lp.scanpro.ch/wp-content/uploads/2025/11/exhausto_logo-scaled.png" alt="Exhausto" loading="lazy">
        </div>
        <div class="partner-logo-item">
          <img src="https://lp.scanpro.ch/wp-content/uploads/2025/11/exodraft-logo-blue_wb.png" alt="exodraft" loading="lazy">
        </div>
        <div class="partner-logo-item">
          <img src="https://lp.scanpro.ch/wp-content/uploads/2026/07/Logo_Thermomatic-scaled.png" alt="Thermomatic" loading="lazy">
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="cta-section">
    <div class="container cta-content">
      <h2><?php _e( 'Lernen Sie uns persönlich kennen', 'scanpro-child' ); ?></h2>
      <p><?php _e( 'Wir freuen uns auf Ihre Anfrage und beraten Sie gerne.', 'scanpro-child' ); ?></p>
      <a href="<?php echo esc_url( home_url( '/kontakt' ) ); ?>" class="btn btn-white">
        <?php _e( 'Kontakt aufnehmen', 'scanpro-child' ); ?>
      </a>
    </div>
  </section>

</main>

<?php get_footer(); ?>
