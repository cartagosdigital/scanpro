<?php
/**
 * Template Name: Wissen — Regelung von Luftmengen
 */
get_header();
?>
<main class="wissen-main" id="main" role="main">

  <section class="page-hero">
    <div class="container">
<span class="section-label"><?php _e( 'WISSEN', 'scanpro-child' ); ?></span>
      <h1><?php _e( 'Regelung von Luftmengen', 'scanpro-child' ); ?></h1>
      <p><?php _e( 'CAV, VAV, DCV oder aDCV — die richtige Regelungsvariante spart Energie und sichert optimale Luftqualität.', 'scanpro-child' ); ?></p>
    </div>
  </section>

  <section class="wissen-content-section">
    <div class="container">
      <div class="wissen-content-grid">

        <div class="wissen-text">

          <p class="wissen-intro-text">
            <?php _e( 'In den meisten Gebäuden variiert die Raumauslastung im Tagesverlauf erheblich. Büros sind morgens teilweise leer, Sitzungszimmer werden nur stundenweise genutzt, Schulräume wechseln zwischen Vollbetrieb und Leerpausen. Eine Lüftungsanlage, die immer mit maximaler Leistung läuft, verschwendet Energie — und verursacht unnötige Kosten.', 'scanpro-child' ); ?>
          </p>
          <p class="wissen-intro-text">
            <?php _e( 'Die Lösung liegt in einer bedarfsgerechten Regelung. Die folgenden vier Varianten stehen zur Verfügung — sie können einzeln oder kombiniert eingesetzt werden.', 'scanpro-child' ); ?>
          </p>

          <?php
          $varianten = [
            [
              'kuerzel'    => 'CAV',
              'name'       => __( 'Constant Air Volume — Konstante Luftmenge', 'scanpro-child' ),
              'desc'       => __( 'Die einfachste Regelungsform: Die Anlage läuft nach einem festen Zeitprogramm — zum Beispiel von 07:00 bis 18:00 Uhr. Innerhalb dieser Zeiten wird eine konstante Luftmenge gefördert, unabhängig davon, wie viele Personen sich im Raum befinden.', 'scanpro-child' ),
              'empfehlung' => __( 'Empfohlen für Räume mit gleichmässiger Nutzung und geringer Belegungsschwankung, z.B. Korridore, Treppenhäuser, Kopierbereiche und Sanitärräume.', 'scanpro-child' ),
              'vorteile'   => [
                __( 'Einfache Installation und Inbetriebnahme', 'scanpro-child' ),
                __( 'Geringe Investitionskosten', 'scanpro-child' ),
                __( 'Robust und wartungsarm', 'scanpro-child' ),
              ],
              'nachteile'  => [
                __( 'Keine Anpassung an tatsächliche Belegung', 'scanpro-child' ),
                __( 'Höherer Energieverbrauch bei Unterbelegung', 'scanpro-child' ),
              ],
            ],
            [
              'kuerzel'    => 'VAV',
              'name'       => __( 'Variable Air Volume — Variable Luftmenge', 'scanpro-child' ),
              'desc'       => __( 'Die VAV-Regelung ermöglicht das Schalten zwischen zwei Leistungsstufen: einer Mindestluftmenge und einer Maximalluftmenge. Die Umschaltung erfolgt nach Zeitprogramm oder manuell — nicht in Echtzeit nach tatsächlicher Belegung. Drucksensoren im Kanalsystem sorgen für eine gleichmässige Verteilung.', 'scanpro-child' ),
              'empfehlung' => __( 'Empfohlen für Räume mit planbarer, aber wechselnder Nutzung, z.B. Sitzungszimmer mit festen Belegungszeiten oder Schulräume mit bekanntem Stundenplan.', 'scanpro-child' ),
              'vorteile'   => [
                __( 'Flexibler als CAV', 'scanpro-child' ),
                __( 'Energieeinsparung in Niedriglastzeiten', 'scanpro-child' ),
                __( 'Gut planbar bei bekannten Nutzungszeiten', 'scanpro-child' ),
              ],
              'nachteile'  => [
                __( 'Keine Reaktion auf ungeplante Belegungsänderungen', 'scanpro-child' ),
                __( 'Wochenplan muss bei Nutzungsänderungen aktualisiert werden', 'scanpro-child' ),
              ],
            ],
            [
              'kuerzel'    => 'DCV',
              'name'       => __( 'Demand-Controlled Ventilation — Bedarfsgeregelte Luftmenge', 'scanpro-child' ),
              'desc'       => __( 'DCV reagiert in Echtzeit auf die tatsächliche Raumauslastung. CO₂-Sensoren, Präsenzmelder oder Feuchtesensoren erfassen den aktuellen Lüftungsbedarf und passen den Volumenstrom stufenlos an. Das System fördert genau so viel Luft wie aktuell benötigt wird — nicht mehr und nicht weniger.', 'scanpro-child' ),
              'empfehlung' => __( 'Empfohlen für Büros, Schulen, Hotels und alle Räume mit stark schwankender, schlecht vorhersehbarer Belegung.', 'scanpro-child' ),
              'vorteile'   => [
                __( 'Maximale Energieeinsparung', 'scanpro-child' ),
                __( 'Optimale Luftqualität zu jeder Zeit', 'scanpro-child' ),
                __( 'Automatische Anpassung — kein manuelles Eingreifen nötig', 'scanpro-child' ),
              ],
              'nachteile'  => [
                __( 'Höhere Investitionskosten durch Sensorik', 'scanpro-child' ),
                __( 'Regelmässige Kalibrierung der Sensoren empfohlen', 'scanpro-child' ),
              ],
            ],
            [
              'kuerzel'    => 'aDCV',
              'name'       => __( 'Adaptive Demand-Controlled Ventilation — Adaptive Druckregelung', 'scanpro-child' ),
              'desc'       => __( 'Die aDCV-Technologie geht einen Schritt weiter als DCV: Sie optimiert nicht nur den Volumenstrom pro Raum, sondern senkt gleichzeitig den Anlagendruck, wenn weniger Luftleistung benötigt wird. Das Lüftungsgerät arbeitet damit immer am energetisch günstigsten Betriebspunkt — und das vollautomatisch.', 'scanpro-child' ),
              'empfehlung' => __( 'Empfohlen für grössere Anlagen mit mehreren Zonen und hohem Energieeinsparpotenzial, z.B. Bürogebäude, Schulen und Gewerbeanlagen.', 'scanpro-child' ),
              'vorteile'   => [
                __( 'Energieeinsparung bis zu 43 % gegenüber VAV mit Konstantdruck', 'scanpro-child' ),
                __( 'Bis zu 19 % Einsparung gegenüber konventionellem DCV', 'scanpro-child' ),
                __( 'Maximaler Komfort bei minimalem Energieeinsatz', 'scanpro-child' ),
              ],
              'nachteile'  => [
                __( 'Höchste Investitionskosten der vier Varianten', 'scanpro-child' ),
                __( 'Komplexere Inbetriebnahme — Fachplanung empfohlen', 'scanpro-child' ),
              ],
            ],
          ];

          foreach ( $varianten as $v ) : ?>
            <div class="regelung-card">
              <div class="regelung-card-header">
                <span class="regelung-kuerzel"><?php echo esc_html( $v['kuerzel'] ); ?></span>
                <h3><?php echo esc_html( $v['name'] ); ?></h3>
              </div>
              <p><?php echo esc_html( $v['desc'] ); ?></p>
              <p class="regelung-empfehlung"><strong><?php _e( 'Empfehlung:', 'scanpro-child' ); ?></strong> <?php echo esc_html( $v['empfehlung'] ); ?></p>
              <div class="regelung-pros-cons">
                <div class="regelung-pros">
                  <h4><?php _e( 'Vorteile', 'scanpro-child' ); ?></h4>
                  <ul>
                    <?php foreach ( $v['vorteile'] as $vt ) : ?>
                      <li><?php echo esc_html( $vt ); ?></li>
                    <?php endforeach; ?>
                  </ul>
                </div>
                <div class="regelung-cons">
                  <h4><?php _e( 'Nachteile', 'scanpro-child' ); ?></h4>
                  <ul>
                    <?php foreach ( $v['nachteile'] as $nt ) : ?>
                      <li><?php echo esc_html( $nt ); ?></li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>
            </div>
          <?php endforeach; ?>

          <div class="wissen-cta-inline">
            <p><?php _e( 'Nicht sicher, welche Regelung zu Ihrem Projekt passt?', 'scanpro-child' ); ?></p>
            <a href="<?php echo esc_url( home_url( '/kontakt' ) ); ?>" class="btn btn-primary"><?php _e( 'Beratung anfragen', 'scanpro-child' ); ?></a>
          </div>

        </div>

        <?php scanpro_wissen_sidebar(); ?>

      </div>
    </div>
  </section>

</main>
<?php get_footer(); ?>
