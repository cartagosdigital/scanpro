<?php
/**
 * Template Name: Einsatzbereich Single
 * Template reutilizável para as subpáginas de cada área de aplicação:
 * Wohnen, Gewerbe, Industrie, Bildungseinrichtungen, Gastronomie.
 */

get_header();

$parent_id = wp_get_post_parent_id( get_the_ID() );
$siblings  = $parent_id
    ? get_pages( [ 'parent' => $parent_id, 'sort_column' => 'menu_order' ] )
    : [];

// Mapear slug da subpágina para categoria de produto WooCommerce
$slug_to_cat = [
    'wohnen'                => 'wohnen',
    'gewerbe'               => 'gewerbe',
    'industrie'             => 'industrie',
    'bildungseinrichtungen' => 'bildungseinrichtungen',
    'gastronomie'           => 'gastronomie',
];
$current_slug = get_post_field( 'post_name', get_the_ID() );
$cat_slug     = $slug_to_cat[ $current_slug ] ?? '';
?>

<main class="einsatz-single-main" id="main" role="main">

  <!-- =============================================
       HERO COM BREADCRUMB
       ============================================= -->
  <section class="page-hero page-hero--single">
    <div class="container">
      <nav class="einsatz-breadcrumb" aria-label="<?php _e( 'Brotkrümelnavigation', 'scanpro-child' ); ?>">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Startseite', 'scanpro-child' ); ?></a>
        <span aria-hidden="true">/</span>
        <?php if ( $parent_id ) : ?>
          <a href="<?php echo esc_url( get_permalink( $parent_id ) ); ?>"><?php _e( 'Einsatzbereiche', 'scanpro-child' ); ?></a>
          <span aria-hidden="true">/</span>
        <?php endif; ?>
        <span aria-current="page"><?php the_title(); ?></span>
      </nav>
      <span class="section-label"><?php _e( 'EINSATZBEREICHE', 'scanpro-child' ); ?></span>
      <h1><?php the_title(); ?></h1>
    </div>
  </section>

  <!-- =============================================
       CONTEÚDO + SIDEBAR
       ============================================= -->
  <section class="einsatz-content-section">
    <div class="container">
      <div class="einsatz-content-grid">

        <!-- Texto do editor WordPress -->
        <div class="einsatz-text">
          <?php the_content(); ?>

          <?php if ( ! get_the_content() && current_user_can( 'edit_posts' ) ) : ?>
            <p style="color: var(--color-muted); font-style: italic; font-size: 14px;">
              <?php _e( 'Seite bearbeiten und Inhalt hinzufügen.', 'scanpro-child' ); ?>
            </p>
          <?php endif; ?>
        </div>

        <!-- Sidebar: navegação entre áreas -->
        <?php if ( ! empty( $siblings ) ) : ?>
        <aside class="einsatz-sidebar" aria-label="<?php _e( 'Weitere Einsatzbereiche', 'scanpro-child' ); ?>">
          <h4><?php _e( 'Weitere Einsatzbereiche', 'scanpro-child' ); ?></h4>
          <ul class="einsatz-nav">
            <?php foreach ( $siblings as $sibling ) : ?>
            <li class="<?php echo $sibling->ID === get_the_ID() ? 'active' : ''; ?>">
              <a href="<?php echo esc_url( get_permalink( $sibling->ID ) ); ?>">
                <?php echo esc_html( $sibling->post_title ); ?>
              </a>
            </li>
            <?php endforeach; ?>
          </ul>
        </aside>
        <?php endif; ?>

      </div>
    </div>
  </section>

  <!-- =============================================
       GALERIA DE IMAGENS
       Adicionar via bloco Galeria no editor ou ACF
       ============================================= -->
  <?php
  $images = get_attached_media( 'image', get_the_ID() );
  ?>
  <section class="einsatz-gallery-section">
    <div class="container">
      <h2><?php _e( 'Referenzbilder', 'scanpro-child' ); ?></h2>

      <?php if ( ! empty( $images ) ) : ?>
        <div class="einsatz-gallery-grid">
          <?php foreach ( $images as $img ) : ?>
          <div class="einsatz-gallery-item">
            <?php echo wp_get_attachment_image( $img->ID, 'medium_large', false, [ 'class' => 'einsatz-gallery-img', 'loading' => 'lazy' ] ); ?>
          </div>
          <?php endforeach; ?>
        </div>
      <?php else : ?>
        <!-- Placeholder — substituir adicionando imagens à página no admin -->
        <div class="einsatz-gallery-placeholder">
          <?php for ( $i = 0; $i < 3; $i++ ) : ?>
          <div class="einsatz-gallery-placeholder-item" aria-hidden="true"></div>
          <?php endfor; ?>
        </div>
        <?php if ( current_user_can( 'edit_posts' ) ) : ?>
          <p style="color: var(--color-muted); font-size: 13px; margin-top: 16px; font-style: italic;">
            <?php _e( 'Bilder über den WordPress-Editor hinzufügen (Galerie-Block) oder per ACF-Galerie-Feld.', 'scanpro-child' ); ?>
          </p>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </section>

  <!-- =============================================
       PRODUTOS RELACIONADOS (WooCommerce)
       ============================================= -->
  <?php if ( class_exists( 'WooCommerce' ) ) :
    $query_args = [
        'post_type'      => 'product',
        'posts_per_page' => 3,
        'post_status'    => 'publish',
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    ];
    if ( $cat_slug ) {
        $query_args['tax_query'] = [ [
            'taxonomy' => 'product_cat',
            'field'    => 'slug',
            'terms'    => $cat_slug,
        ] ];
    }
    $related = new WP_Query( $query_args );
  ?>
  <section class="einsatz-products-section">
    <div class="container">
      <span class="section-label"><?php _e( 'PASSENDE PRODUKTE', 'scanpro-child' ); ?></span>
      <h2 class="section-title"><?php _e( 'Empfohlene Produkte', 'scanpro-child' ); ?></h2>

      <?php if ( $related->have_posts() ) : ?>
        <div class="products-grid">
          <?php while ( $related->have_posts() ) : $related->the_post();
            global $product; ?>
            <div class="product-card">
              <a href="<?php the_permalink(); ?>" class="product-card-img-link" tabindex="-1" aria-hidden="true">
                <div class="product-card-img">
                  <?php if ( has_post_thumbnail() ) :
                    the_post_thumbnail( 'medium', [ 'loading' => 'lazy' ] );
                  else : ?>
                    <div class="product-img-placeholder"></div>
                  <?php endif; ?>
                </div>
              </a>
              <div class="product-card-body">
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
          <?php endwhile;
          wp_reset_postdata(); ?>
        </div>
        <div style="text-align: center; margin-top: 36px;">
          <a href="<?php echo esc_url( home_url( '/shop' ) ); ?>" class="btn btn-outline-dark">
            <?php _e( 'Alle Produkte ansehen →', 'scanpro-child' ); ?>
          </a>
        </div>
      <?php else : ?>
        <p style="color: var(--color-muted);"><?php _e( 'Produkte folgen in Kürze.', 'scanpro-child' ); ?></p>
      <?php endif; ?>
    </div>
  </section>
  <?php endif; ?>

  <!-- =============================================
       CTA FINAL
       ============================================= -->
  <section class="cta-section" aria-label="<?php _e( 'Kontaktaufforderung', 'scanpro-child' ); ?>">
    <div class="container cta-content">
      <h2><?php _e( 'Interesse an unseren Lösungen?', 'scanpro-child' ); ?></h2>
      <p><?php _e( 'Kontaktieren Sie uns für eine individuelle Beratung und ein massgeschneidertes Angebot.', 'scanpro-child' ); ?></p>
      <a href="<?php echo esc_url( home_url( '/kontakt' ) ); ?>" class="btn btn-white">
        <?php _e( 'Kostenlose Offerte anfragen', 'scanpro-child' ); ?>
      </a>
    </div>
  </section>

</main>

<?php get_footer(); ?>
