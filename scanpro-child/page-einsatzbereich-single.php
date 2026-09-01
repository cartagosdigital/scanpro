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

$current_slug = get_post_field( 'post_name', get_the_ID() );
?>

<main class="einsatz-single-main" id="main" role="main">

  <!-- =============================================
       HERO COM BREADCRUMB
       ============================================= -->
  <section class="page-hero page-hero--single">
    <div class="container">
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

        <!-- Conteúdo por slug — injectado por scanpro_get_einsatzbereich_content() -->
        <div class="einsatz-text">
          <?php
          echo scanpro_get_einsatzbereich_content( $current_slug );
          ?>
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
       PRODUTOS RELACIONADOS — lista curada por segmento (functions.php),
       resolvida aqui por nome de produto ou por categoria inteira
       ============================================= -->
  <?php if ( class_exists( 'WooCommerce' ) ) :
    $einsatz_specs    = scanpro_get_einsatzbereich_products( $current_slug );
    $einsatz_products = [];

    foreach ( $einsatz_specs as $spec ) {
        if ( 'category' === $spec['type'] ) {
            $term = get_term_by( 'name', $spec['name'], 'product_cat' );
            if ( $term && ! is_wp_error( $term ) ) {
                $einsatz_products[] = [ 'type' => 'category', 'term' => $term ];
            }
            continue;
        }

        $spec_query = new WP_Query( [
            'post_type'      => 'product',
            'posts_per_page' => 1,
            'post_status'    => 'publish',
            's'              => $spec['name'],
        ] );
        if ( $spec_query->have_posts() ) {
            $einsatz_products[] = [ 'type' => 'product', 'post' => $spec_query->posts[0] ];
        }
    }
  ?>
  <section class="einsatz-products-section">
    <div class="container">
      <span class="section-label"><?php _e( 'PASSENDE PRODUKTE', 'scanpro-child' ); ?></span>
      <h2 class="section-title"><?php _e( 'Empfohlene Produkte', 'scanpro-child' ); ?></h2>

      <?php if ( ! empty( $einsatz_products ) ) : ?>
        <div class="einsatz-products-carousel">
          <button type="button" class="einsatz-carousel-arrow einsatz-carousel-prev" aria-label="<?php esc_attr_e( 'Zurück', 'scanpro-child' ); ?>">&#8249;</button>

          <div class="einsatz-products-track" role="list">
            <?php foreach ( $einsatz_products as $item ) :
                if ( 'category' === $item['type'] ) :
                    $term      = $item['term'];
                    $term_link = get_term_link( $term );
            ?>
              <div class="product-card einsatz-carousel-item" role="listitem">
                <a href="<?php echo esc_url( $term_link ); ?>" class="product-card-img-link" tabindex="-1" aria-hidden="true">
                  <div class="product-card-img">
                    <div class="product-img-placeholder"></div>
                  </div>
                </a>
                <div class="product-card-body">
                  <span class="product-card-category"><?php _e( 'Kategorie', 'scanpro-child' ); ?></span>
                  <h3 class="product-card-title">
                    <a href="<?php echo esc_url( $term_link ); ?>"><?php echo esc_html( $term->name ); ?></a>
                  </h3>
                  <a href="<?php echo esc_url( $term_link ); ?>" class="btn btn-primary product-card-btn">
                    <?php _e( 'Kategorie ansehen', 'scanpro-child' ); ?>
                  </a>
                </div>
              </div>
            <?php
                else :
                    $p_id = $item['post']->ID;
            ?>
              <div class="product-card einsatz-carousel-item" role="listitem">
                <a href="<?php echo esc_url( get_permalink( $p_id ) ); ?>" class="product-card-img-link" tabindex="-1" aria-hidden="true">
                  <div class="product-card-img">
                    <?php if ( has_post_thumbnail( $p_id ) ) :
                      echo get_the_post_thumbnail( $p_id, 'medium', [ 'loading' => 'lazy' ] );
                    else : ?>
                      <div class="product-img-placeholder"></div>
                    <?php endif; ?>
                  </div>
                </a>
                <div class="product-card-body">
                  <h3 class="product-card-title">
                    <a href="<?php echo esc_url( get_permalink( $p_id ) ); ?>"><?php echo esc_html( get_the_title( $p_id ) ); ?></a>
                  </h3>
                  <a href="<?php echo esc_url( get_permalink( $p_id ) ); ?>" class="btn btn-primary product-card-btn">
                    <?php _e( 'Produkt ansehen', 'scanpro-child' ); ?>
                  </a>
                </div>
              </div>
            <?php endif; endforeach; ?>
          </div>

          <button type="button" class="einsatz-carousel-arrow einsatz-carousel-next" aria-label="<?php esc_attr_e( 'Weiter', 'scanpro-child' ); ?>">&#8250;</button>
        </div>

        <div style="text-align: center; margin-top: 36px;">
          <a href="<?php echo esc_url( home_url( '/produkte' ) ); ?>" class="btn btn-outline-dark">
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
