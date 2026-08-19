<?php
/**
 * Template Name: Wissen — FAQ
 */
get_header();
?>
<main class="wissen-main" id="main" role="main">

  <section class="page-hero">
    <div class="container">
<span class="section-label"><?php _e( 'WISSEN', 'scanpro-child' ); ?></span>
      <h1><?php _e( 'Häufig gestellte Fragen', 'scanpro-child' ); ?></h1>
      <p><?php _e( 'Antworten auf die wichtigsten Fragen rund um Lüftungsanlagen, Produkte und Bestellungen.', 'scanpro-child' ); ?></p>
    </div>
  </section>

  <section class="wissen-content-section">
    <div class="container">
      <div class="wissen-content-grid">

        <div class="wissen-text">

          <?php
          $faq_gruppen = [
            [
              'title' => __( 'Planung und Auslegung', 'scanpro-child' ),
              'items' => [
                [
                  'q' => __( 'Wie wähle ich das richtige Lüftungskonzept für mein Projekt?', 'scanpro-child' ),
                  'a' => __( 'Die Wahl des richtigen Systems hängt von mehreren Faktoren ab: Gebäudetyp, Nutzung, Belegungszahl, Raumgrösse und Energieziele. Zentrale Anlagen eignen sich für grössere Gebäude mit einheitlichem Lüftungsbedarf, dezentrale Lösungen bieten Flexibilität bei Sanierungen oder unterschiedlichen Nutzungszonen. Unsere Fachberater unterstützen Sie bei der Systemwahl — kontaktieren Sie uns gerne.', 'scanpro-child' ),
                ],
                [
                  'q' => __( 'Welche Normen gelten in der Schweiz für Lüftungsanlagen?', 'scanpro-child' ),
                  'a' => __( 'In der Schweiz gelten primär die SIA 382/1 (Lüftungs- und Klimaanlagen), SIA 382/4 (Raumklima für Personen) sowie die europäische Norm EN 16798. Für Schulen gilt zusätzlich SWKI VA104-01. Eine Übersicht finden Sie auf unserer Seite Regulierungen.', 'scanpro-child' ),
                ],
                [
                  'q' => __( 'Wie berechne ich den benötigten Aussenluftvolumenstrom?', 'scanpro-child' ),
                  'a' => __( 'Als Richtwert gilt: 25–36 m³/h pro Person gemäss SIA 382/1 (Kategorie II). Zusätzlich wird ein gebäudebezogener Volumenstrom je m² Nutzfläche berücksichtigt, abhängig von der Emissionsbelastung des Gebäudes. Für eine genaue Auslegung stehen wir Ihnen gerne zur Verfügung.', 'scanpro-child' ),
                ],
                [
                  'q' => __( 'Welche Regelungsvariante ist für mein Gebäude am sinnvollsten?', 'scanpro-child' ),
                  'a' => __( 'Das hängt von der Nutzungsstruktur ab. Für gleichmässig genutzte Räume genügt oft eine CAV-Regelung (Zeitprogramm). Bei wechselnder Belegung empfehlen wir DCV (bedarfsgeregelt nach CO₂ oder Präsenz), das Energie spart und die Luftqualität optimiert. Details finden Sie unter Regelung von Luftmengen.', 'scanpro-child' ),
                ],
              ],
            ],
            [
              'title' => __( 'Normen und Zertifizierungen', 'scanpro-child' ),
              'items' => [
                [
                  'q' => __( 'Was bedeutet die Filternorm ISO 16890?', 'scanpro-child' ),
                  'a' => __( 'ISO 16890 ersetzt die ältere EN 779 und klassifiziert Filter nach ihrer Effizienz bei der Abscheidung von Partikeln verschiedener Grösse (ePM1, ePM2,5, ePM10). Für Lüftungsanlagen in Wohn- und Bürogebäuden empfehlen wir mindestens ePM1 50 %.', 'scanpro-child' ),
                ],
                [
                  'q' => __( 'Was ist die Ecodesign-Verordnung und was bedeutet sie für Lüftungsgeräte?', 'scanpro-child' ),
                  'a' => __( 'Die EU-Ecodesign-Verordnung (ErP) legt Mindestanforderungen an die Energieeffizienz von Lüftungsgeräten fest. Wohnungslüftungsgeräte müssen einen Wärmerückgewinnungsgrad von mindestens 73 % und spezifische Leistungsaufnahmen (SFP) einhalten. Alle unsere Produkte erfüllen diese Anforderungen.', 'scanpro-child' ),
                ],
                [
                  'q' => __( 'Müssen Lüftungsanlagen regelmässig gewartet werden?', 'scanpro-child' ),
                  'a' => __( 'Ja. Gemäss SIA 382/1 und den Herstellervorgaben sind regelmässige Filterwechsel, Reinigungen und Funktionsprüfungen vorgeschrieben. Der Intervall richtet sich nach Gerätetyp, Filterklasse und Nutzungsintensität — in der Regel jährlich bis halbjährlich.', 'scanpro-child' ),
                ],
              ],
            ],
            [
              'title' => __( 'Produkte und Bestellungen', 'scanpro-child' ),
              'items' => [
                [
                  'q' => __( 'Wie kann ich ein Produkt bestellen?', 'scanpro-child' ),
                  'a' => __( 'Sie können Produkte direkt in unserem Online-Shop bestellen oder eine Anfrage über unser Kontaktformular stellen. Für grössere Projekte oder individuelle Konfigurationen empfehlen wir eine persönliche Beratung — wir erstellen Ihnen gerne ein massgeschneidertes Angebot.', 'scanpro-child' ),
                ],
                [
                  'q' => __( 'Wie lange dauert die Lieferung?', 'scanpro-child' ),
                  'a' => __( 'Lagerware wird in der Regel innerhalb von 3–5 Werktagen geliefert. Bei Sonderkonfigurationen oder Grossgeräten kann die Lieferzeit variieren. Unsere Bestellseite gibt Ihnen aktuelle Informationen zu Verfügbarkeit und Lieferzeiten.', 'scanpro-child' ),
                ],
                [
                  'q' => __( 'Wo finde ich technische Unterlagen, Montageanweisungen und CAD-Daten?', 'scanpro-child' ),
                  'a' => __( 'Technische Datenblätter, Montageanweisungen und CAD-Dateien sind auf der jeweiligen Produktseite im Shop verfügbar. Für ältere Modelle oder weiterführende Unterlagen kontaktieren Sie uns direkt.', 'scanpro-child' ),
                ],
                [
                  'q' => __( 'Was tun, wenn ein Gerät zu gross für den Transportweg ist?', 'scanpro-child' ),
                  'a' => __( 'Manche Geräte können in Einzelteilen angeliefert und vor Ort montiert werden. Sprechen Sie uns bei der Bestellung an — wir prüfen gemeinsam mit Ihnen die beste Lösung für Ihren Einbauort.', 'scanpro-child' ),
                ],
              ],
            ],
          ];

          foreach ( $faq_gruppen as $gruppe ) : ?>
            <div class="faq-gruppe">
              <h2><?php echo esc_html( $gruppe['title'] ); ?></h2>
              <div class="faq-accordion">
                <?php foreach ( $gruppe['items'] as $item ) : ?>
                  <div class="faq-item">
                    <button class="faq-question" aria-expanded="false" type="button">
                      <?php echo esc_html( $item['q'] ); ?>
                      <span class="faq-icon" aria-hidden="true">+</span>
                    </button>
                    <div class="faq-answer">
                      <p><?php echo esc_html( $item['a'] ); ?></p>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endforeach; ?>

          <div class="wissen-cta-inline">
            <p><?php _e( 'Ihre Frage ist nicht dabei?', 'scanpro-child' ); ?></p>
            <a href="<?php echo esc_url( home_url( '/kontakt' ) ); ?>" class="btn btn-primary"><?php _e( 'Direkt anfragen', 'scanpro-child' ); ?></a>
          </div>

        </div>

        <?php scanpro_wissen_sidebar(); ?>

      </div>
    </div>
  </section>

</main>
<?php get_footer(); ?>
