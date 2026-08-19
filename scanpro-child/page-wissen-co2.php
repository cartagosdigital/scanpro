<?php
/**
 * Template Name: Wissen — CO2
 */
get_header();
?>
<main class="wissen-main" id="main" role="main">

  <section class="page-hero">
    <div class="container">
<span class="section-label"><?php _e( 'WISSEN', 'scanpro-child' ); ?></span>
      <h1><?php _e( 'CO₂ in Innenräumen', 'scanpro-child' ); ?></h1>
      <p><?php _e( 'Was CO₂ mit uns macht — und warum der Grenzwert von 1.000 ppm so entscheidend ist.', 'scanpro-child' ); ?></p>
    </div>
  </section>

  <section class="wissen-content-section">
    <div class="container">
      <div class="wissen-content-grid">

        <div class="wissen-text">

          <h2><?php _e( 'Wie wirkt CO₂ auf den menschlichen Körper?', 'scanpro-child' ); ?></h2>
          <p><?php _e( 'Die natürliche CO₂-Konzentration in der Aussenluft beträgt rund 400 bis 450 ppm (Teile pro Million). In Innenräumen steigt dieser Wert durch die Atemluft der anwesenden Personen kontinuierlich an — und das mit spürbaren Auswirkungen auf Konzentration, Wohlbefinden und Leistungsfähigkeit.', 'scanpro-child' ); ?></p>
          <p><?php _e( 'CO₂ ist ein natürliches Stoffwechselprodukt des Menschen und an der Regulation von Atmung, Kreislauf und Blutgefässreaktionen beteiligt. Das venöse Blut transportiert CO₂ zur Lunge, wo es über einen Druckausgleich in die Lungenbläschen abgegeben und beim Ausatmen aus dem Körper abgeführt wird. Steigt die CO₂-Konzentration in der Raumluft, wird dieser Austausch ineffizienter.', 'scanpro-child' ); ?></p>

          <div class="wissen-info-box">
            <h3><?php _e( 'CO₂-Konzentration und ihre Wirkung', 'scanpro-child' ); ?></h3>
            <div class="co2-scale">
              <div class="co2-level co2-good">
                <span class="co2-value">400 – 800 ppm</span>
                <span class="co2-label"><?php _e( 'Aussenluftqualität — ausgezeichnetes Innenraumklima', 'scanpro-child' ); ?></span>
              </div>
              <div class="co2-level co2-ok">
                <span class="co2-value">800 – 1.000 ppm</span>
                <span class="co2-label"><?php _e( 'Akzeptabler Bereich — leichte Einschränkungen möglich', 'scanpro-child' ); ?></span>
              </div>
              <div class="co2-level co2-warn">
                <span class="co2-value">1.000 – 1.400 ppm</span>
                <span class="co2-label"><?php _e( 'Erhöhter Wert — Konzentrationsfähigkeit sinkt messbar', 'scanpro-child' ); ?></span>
              </div>
              <div class="co2-level co2-bad">
                <span class="co2-value">&gt; 1.400 ppm</span>
                <span class="co2-label"><?php _e( 'Schlechte Luftqualität — Kopfschmerzen, Müdigkeit, Leistungsabfall', 'scanpro-child' ); ?></span>
              </div>
            </div>
          </div>

          <h2><?php _e( 'Warum ist der Grenzwert von 1.000 ppm so wichtig?', 'scanpro-child' ); ?></h2>
          <p><?php _e( 'Die Schweizer Norm SIA 382/1 sowie die europäische Norm EN 16798-1 definieren 1.000 ppm CO₂ als Richtwert für eine akzeptable Raumluftqualität in Aufenthaltsräumen. Wird dieser Wert dauerhaft überschritten, sinken Konzentrationsfähigkeit und Produktivität nachweislich — mit direkten Auswirkungen auf Lernleistung, Arbeitseffizienz und Wohlbefinden.', 'scanpro-child' ); ?></p>
          <p><?php _e( 'Mit einer richtig ausgelegten und bedarfsgeregelten Lüftungsanlage lässt sich dieser Wert zuverlässig einhalten — unabhängig von der Belegungszahl oder der Jahreszeit.', 'scanpro-child' ); ?></p>

          <h2><?php _e( 'CO₂-Konzentration berechnen', 'scanpro-child' ); ?></h2>
          <p><?php _e( 'Die benötigte Frischluftzufuhr hängt von der Raumgrösse, der Personenzahl und der Nutzungsdauer ab. Als Faustregel gilt:', 'scanpro-child' ); ?></p>

          <div class="wissen-formula-box">
            <p class="formula"><?php _e( 'Benötigter Aussenluftvolumenstrom = Anzahl Personen × 25–36 m³/h pro Person', 'scanpro-child' ); ?></p>
            <p class="formula-note"><?php _e( '(Richtwert gemäss SIA 382/1 und EN 16798-1, Kategorie II)', 'scanpro-child' ); ?></p>
          </div>

          <p><?php _e( 'Für eine präzise Auslegung Ihrer Lüftungsanlage beraten wir Sie gerne persönlich. Kontaktieren Sie uns — wir berechnen den benötigten Volumenstrom für Ihr Projekt.', 'scanpro-child' ); ?></p>

          <a href="<?php echo esc_url( home_url( '/kontakt' ) ); ?>" class="btn btn-primary"><?php _e( 'Beratung anfragen', 'scanpro-child' ); ?></a>

        </div>

        <?php scanpro_wissen_sidebar(); ?>

      </div>
    </div>
  </section>

</main>
<?php get_footer(); ?>
