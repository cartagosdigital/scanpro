<?php
/**
 * Template Name: Einsatzbereiche
 * Página principal das áreas de aplicação dos produtos Scan Pro.
 */

get_header();

$areas = [
    [
        'title' => __( 'Wohnen', 'scanpro-child' ),
        'slug'  => 'wohnen',
        'desc'  => __( 'Effiziente Lüftungslösungen für Einfamilienhäuser, Mehrfamilienhäuser und Wohnanlagen mit hohem Komfort und niedrigem Energieverbrauch.', 'scanpro-child' ),
    ],
    [
        'title' => __( 'Gewerbe', 'scanpro-child' ),
        'slug'  => 'gewerbe',
        'desc'  => __( 'Massgeschneiderte Lüftungssysteme für Büros, Verkaufsflächen und gewerbliche Liegenschaften mit Anforderungen an Luftqualität und Energieeffizienz.', 'scanpro-child' ),
    ],
    [
        'title' => __( 'Industrie', 'scanpro-child' ),
        'slug'  => 'industrie',
        'desc'  => __( 'Robuste Lüftungs- und Absauglösungen für industrielle Umgebungen, Produktionshallen und technisch anspruchsvolle Anlagen.', 'scanpro-child' ),
    ],
    [
        'title' => __( 'Bildungseinrichtungen', 'scanpro-child' ),
        'slug'  => 'bildungseinrichtungen',
        'desc'  => __( 'Gesunde Raumluft für Schulen, Kindergärten und Universitäten — leise, energieeffizient und wartungsarm.', 'scanpro-child' ),
    ],
    [
        'title' => __( 'Gastronomie', 'scanpro-child' ),
        'slug'  => 'gastronomie',
        'desc'  => __( 'Leistungsstarke Abluft- und Lüftungssysteme für Restaurants, Küchen und Gastronomiebetriebe — zuverlässig und normkonform.', 'scanpro-child' ),
    ],
];
?>

<main class="einsatz-main" id="main" role="main">

  <!-- =============================================
       HERO DA PÁGINA
       ============================================= -->
  <section class="page-hero">
    <div class="container">
      <nav class="einsatz-breadcrumb" aria-label="<?php _e( 'Brotkrümelnavigation', 'scanpro-child' ); ?>">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Startseite', 'scanpro-child' ); ?></a>
        <span aria-hidden="true">/</span>
        <span aria-current="page"><?php _e( 'Einsatzbereiche', 'scanpro-child' ); ?></span>
      </nav>
      <span class="section-label"><?php _e( 'ANWENDUNGEN', 'scanpro-child' ); ?></span>
      <h1><?php _e( 'Einsatzbereiche', 'scanpro-child' ); ?></h1>
      <p>
        <?php _e( 'Unsere Lüftungs- und Wärmerückgewinnungssysteme sind für eine Vielzahl von Anwendungsbereichen geeignet — vom Wohngebäude bis zur Industrieanlage.', 'scanpro-child' ); ?>
      </p>
    </div>
  </section>

  <!-- =============================================
       GRID DAS 5 ÁREAS
       ============================================= -->
  <section class="einsatz-grid-section">
    <div class="container">
      <div class="einsatz-grid">

        <?php foreach ( $areas as $area ) :
            $page = get_page_by_path( 'einsatzbereiche/' . $area['slug'] );
            $url  = $page ? get_permalink( $page->ID ) : esc_url( home_url( '/einsatzbereiche' ) );
        ?>
        <a href="<?php echo esc_url( $url ); ?>" class="einsatz-card">
          <div class="einsatz-card-icon einsatz-icon-<?php echo esc_attr( $area['slug'] ); ?>">
            <!-- Substituir por imagem ou ícone real de cada área -->
            <div class="einsatz-icon-placeholder" aria-hidden="true"></div>
          </div>
          <div class="einsatz-card-body">
            <h3><?php echo esc_html( $area['title'] ); ?></h3>
            <p><?php echo esc_html( $area['desc'] ); ?></p>
            <span class="einsatz-card-link"><?php _e( 'Mehr erfahren →', 'scanpro-child' ); ?></span>
          </div>
        </a>
        <?php endforeach; ?>

      </div>
    </div>
  </section>

  <!-- =============================================
       CTA FINAL
       ============================================= -->
  <section class="cta-section" aria-label="<?php _e( 'Kontaktaufforderung', 'scanpro-child' ); ?>">
    <div class="container cta-content">
      <h2><?php _e( 'Bereit, Ihre Lüftung zu optimieren?', 'scanpro-child' ); ?></h2>
      <p><?php _e( 'Kontaktieren Sie uns und erhalten Sie ein massgeschneidertes Angebot für Ihr Projekt.', 'scanpro-child' ); ?></p>
      <a href="<?php echo esc_url( home_url( '/kontakt' ) ); ?>" class="btn btn-white">
        <?php _e( 'Kostenlose Offerte anfragen', 'scanpro-child' ); ?>
      </a>
    </div>
  </section>

</main>

<?php get_footer(); ?>
