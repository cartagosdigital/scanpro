<?php
/**
 * Template Name: Wissen — Regulierungen
 */
get_header();
?>
<main class="wissen-main" id="main" role="main">

  <section class="page-hero">
    <div class="container">
<span class="section-label"><?php _e( 'WISSEN', 'scanpro-child' ); ?></span>
      <h1><?php _e( 'Normen und Regulierungen', 'scanpro-child' ); ?></h1>
      <p><?php _e( 'Ein Überblick über die massgeblichen Schweizer und europäischen Normen für die Planung und den Betrieb von Lüftungsanlagen.', 'scanpro-child' ); ?></p>
    </div>
  </section>

  <section class="wissen-content-section">
    <div class="container">
      <div class="wissen-content-grid">

        <div class="wissen-text">

          <p class="wissen-intro-text">
            <?php _e( 'Normen und Richtlinien bilden das technische Fundament für die Planung, Auslegung und den Betrieb von Lüftungsanlagen. Sie definieren Mindestanforderungen an Luftqualität, Energieeffizienz, Schallschutz und Hygiene — und schaffen damit die Grundlage für gesunde, komfortable und wirtschaftliche Gebäude. In der Schweiz gelten neben den europäischen EN-Normen eigene SIA-Richtlinien, die in vielen Fällen weitergehende oder präzisere Anforderungen stellen.', 'scanpro-child' ); ?>
          </p>

          <?php
          $normen = [
            [
              'code'  => 'SIA 382/1',
              'titel' => __( 'Lüftungs- und Klimaanlagen — Allgemeine Grundlagen und Anforderungen', 'scanpro-child' ),
              'desc'  => __( 'Die zentrale Schweizer Norm für Lüftungs- und Klimaanlagen. Sie definiert Anforderungen an Raumluftqualität, thermischen Komfort, Energieeffizienz, Schallschutz und Hygiene für Neubauten und Sanierungen. Grundlage für nahezu alle Lüftungsplanungen in der Schweiz.', 'scanpro-child' ),
              'gilt'  => __( 'Wohn-, Büro- und Gewerbegebäude', 'scanpro-child' ),
            ],
            [
              'code'  => 'SIA 382/4',
              'titel' => __( 'Lüftungs- und Klimaanlagen — Berechnung der Kühllast', 'scanpro-child' ),
              'desc'  => __( 'Ergänzung zu SIA 382/1 mit spezifischen Berechnungsmethoden für Kühllast und sommerlichen Wärmeschutz. Relevant für Gebäude mit mechanischer Kühlung oder erhöhten thermischen Lasten.', 'scanpro-child' ),
              'gilt'  => __( 'Gebäude mit Kühlung oder erhöhten Wärmelasten', 'scanpro-child' ),
            ],
            [
              'code'  => 'SWKI VA104-01',
              'titel' => __( 'Lüftung von Schulen und Kindergärten', 'scanpro-child' ),
              'desc'  => __( 'Schweizer Richtlinie speziell für Bildungsbauten. Legt Anforderungen an Luftvolumenstrom, CO₂-Grenzwerte, Schallschutz und Regelung in Klassenräumen, Turnhallen, Mensen und Sanitärbereichen fest. Empfiehlt bedarfsgeregelte Systeme (DCV).', 'scanpro-child' ),
              'gilt'  => __( 'Schulen, Kindergärten, Bildungseinrichtungen', 'scanpro-child' ),
            ],
            [
              'code'  => 'EN 16798-1',
              'titel' => __( 'Eingangsparameter für das Innenraumklima zur Energieeffizienz von Gebäuden', 'scanpro-child' ),
              'desc'  => __( 'Europäische Norm für die Auslegung von Gebäudetechnik bezüglich Innenraumklima. Definiert Kategorien (I–IV) für Raumluftqualität, Temperatur und Feuchte. In der Schweiz ergänzend zu den SIA-Normen angewendet.', 'scanpro-child' ),
              'gilt'  => __( 'Alle Nichtwohngebäude', 'scanpro-child' ),
            ],
            [
              'code'  => 'EN 16798-3',
              'titel' => __( 'Leistungsanforderungen an Lüftungs- und Klimaanlagen', 'scanpro-child' ),
              'desc'  => __( 'Legt die technischen Leistungsanforderungen an raumlufttechnische Anlagen fest: Energieeffizienz, Filteranforderungen, Wärmerückgewinnung und Betriebsbedingungen. Basis für die CE-Kennzeichnung von Lüftungsgeräten.', 'scanpro-child' ),
              'gilt'  => __( 'Lüftungsgeräte und RLT-Anlagen', 'scanpro-child' ),
            ],
            [
              'code'  => 'ISO 16890',
              'titel' => __( 'Luftfilter für die allgemeine Raumlufttechnik', 'scanpro-child' ),
              'desc'  => __( 'Klassifiziert Luftfilter nach ihrer Abscheideeffizienz für Partikel unterschiedlicher Grösse: ePM1 (< 1 µm), ePM2,5 (< 2,5 µm) und ePM10 (< 10 µm). Hat die ältere EN 779 abgelöst und ermöglicht eine praxisnahe Filterwahl.', 'scanpro-child' ),
              'gilt'  => __( 'Alle Lüftungsanlagen mit Aussenluftfilterung', 'scanpro-child' ),
            ],
            [
              'code'  => 'EU Ecodesign (ErP)',
              'titel' => __( 'Ökodesign-Anforderungen an Lüftungsgeräte', 'scanpro-child' ),
              'desc'  => __( 'EU-Verordnung, die Mindestanforderungen an die Energieeffizienz von Wohnungslüftungsgeräten und gewerblichen RLT-Anlagen definiert. Vorschreibt u.a. Mindest-Wärmerückgewinnungsgrade und maximale spezifische Leistungsaufnahmen (SFP). Alle Scan Pro Produkte erfüllen diese Anforderungen.', 'scanpro-child' ),
              'gilt'  => __( 'Alle Lüftungsgeräte für den EU-/CH-Markt', 'scanpro-child' ),
            ],
          ];

          foreach ( $normen as $norm ) : ?>
            <div class="norm-card">
              <div class="norm-card-header">
                <span class="norm-code"><?php echo esc_html( $norm['code'] ); ?></span>
                <h3><?php echo esc_html( $norm['titel'] ); ?></h3>
              </div>
              <p><?php echo esc_html( $norm['desc'] ); ?></p>
              <div class="norm-card-footer">
                <span class="norm-gilt-label"><?php _e( 'Gilt für:', 'scanpro-child' ); ?></span>
                <span class="norm-gilt"><?php echo esc_html( $norm['gilt'] ); ?></span>
              </div>
            </div>
          <?php endforeach; ?>

          <div class="wissen-cta-inline">
            <p><?php _e( 'Fragen zur normengerechten Auslegung Ihrer Anlage?', 'scanpro-child' ); ?></p>
            <a href="<?php echo esc_url( home_url( '/kontakt' ) ); ?>" class="btn btn-primary"><?php _e( 'Fachberatung anfragen', 'scanpro-child' ); ?></a>
          </div>

        </div>

        <?php scanpro_wissen_sidebar(); ?>

      </div>
    </div>
  </section>

</main>
<?php get_footer(); ?>
