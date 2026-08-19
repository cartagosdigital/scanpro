<?php
/**
 * Template Name: Wissen Hub
 * Página índice da seção Wissen — lista as 5 subpáginas em cards.
 */
get_header();
?>
<main class="wissen-main" id="main" role="main">

  <section class="page-hero">
    <div class="container">
      <span class="section-label"><?php _e( 'WISSEN', 'scanpro-child' ); ?></span>
      <h1><?php _e( 'Fachwissen rund um Lüftungstechnik', 'scanpro-child' ); ?></h1>
      <p><?php _e( 'Hier finden Sie fundierte Informationen zu CO₂, Normen, Regelungsvarianten und häufig gestellten Fragen — aufbereitet von unseren Lüftungsexperten.', 'scanpro-child' ); ?></p>
    </div>
  </section>

  <section class="wissen-hub-section">
    <div class="container">
      <div class="wissen-hub-grid">
        <?php
        $cards = [
          [
            'title' => 'CO₂',
            'desc'  => __( 'Wie wirkt CO₂ auf den menschlichen Körper? Was sind kritische Grenzwerte und wie berechnen Sie die Konzentration in Ihrem Raum?', 'scanpro-child' ),
            'slug'  => 'wissen/co2',
          ],
          [
            'title' => 'FAQ',
            'desc'  => __( 'Antworten auf die häufigsten Fragen zu Lüftungsanlagen, Produkten, Bestellungen und technischen Anforderungen.', 'scanpro-child' ),
            'slug'  => 'wissen/faq',
          ],
          [
            'title' => 'Blog',
            'desc'  => __( 'Aktuelle Beiträge, Neuigkeiten und Fachartikel aus der Welt der Lüftungstechnik.', 'scanpro-child' ),
            'slug'  => 'wissen/blog',
          ],
          [
            'title' => 'Regulierungen',
            'desc'  => __( 'Welche Schweizer und europäischen Normen gelten für Lüftungsanlagen? Ein Überblick über SIA, EN und ISO.', 'scanpro-child' ),
            'slug'  => 'wissen/regulierungen',
          ],
          [
            'title' => 'Regelung von Luftmengen',
            'desc'  => __( 'CAV, VAV, DCV oder aDCV — welche Regelungsvariante passt zu Ihrem Projekt? Wir erklären die Unterschiede.', 'scanpro-child' ),
            'slug'  => 'wissen/regelung-von-luftmengen',
          ],
        ];
        foreach ( $cards as $card ) :
          $page = get_page_by_path( $card['slug'] );
          $url  = $page ? get_permalink( $page->ID ) : '#';
        ?>
          <a href="<?php echo esc_url( $url ); ?>" class="wissen-hub-card">
            <h3><?php echo esc_html( $card['title'] ); ?></h3>
            <p><?php echo esc_html( $card['desc'] ); ?></p>
            <span class="wissen-hub-link"><?php _e( 'Mehr erfahren →', 'scanpro-child' ); ?></span>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

</main>
<?php get_footer(); ?>
