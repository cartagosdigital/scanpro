<?php
/**
 * Template: Loja / Arquivo de produtos — Scan Pro Child
 * Override de woocommerce/archive-product.php
 *
 * Lista todos os produtos da loja com filtros laterais e grid responsivo.
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main class="site-main woocommerce-main" id="main" role="main">

  <!-- Banner da loja -->
  <section class="page-banner page-banner--dark">
    <div class="container">
      <nav class="breadcrumb" aria-label="<?php _e( 'Brotkrümelnavigation', 'scanpro-child' ); ?>">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
          <?php _e( 'Startseite', 'scanpro-child' ); ?>
        </a>
        <span aria-hidden="true"> / </span>
        <span aria-current="page">
          <?php
          if ( is_product_category() ) {
              single_cat_title();
          } else {
              _e( 'Produkte', 'scanpro-child' );
          }
          ?>
        </span>
      </nav>
      <h1>
        <?php
        if ( is_product_category() ) {
            single_cat_title();
        } else {
            _e( 'Unsere Produkte', 'scanpro-child' );
        }
        ?>
      </h1>
      <?php if ( is_product_category() && 0 < woocommerce_get_loop_display_mode() ) : ?>
        <div class="shop-category-description">
          <?php the_archive_description( '<p>', '</p>' ); ?>
        </div>
      <?php endif; ?>
    </div>
  </section>

  <!-- Visão geral de categorias — só na página principal da loja -->
  <?php
  if ( ! is_product_category() ) :
    $produkte_term = get_term_by( 'slug', 'produkte', 'product_cat' );
    $main_cats     = $produkte_term
      ? get_terms( [ 'taxonomy' => 'product_cat', 'parent' => $produkte_term->term_id, 'hide_empty' => true, 'orderby' => 'name' ] )
      : [];
  ?>
  <?php if ( ! empty( $main_cats ) && ! is_wp_error( $main_cats ) ) : ?>
  <section class="shop-cats-section">
    <div class="shop-cats-inner">
      <div class="shop-cats-grid">
        <?php foreach ( $main_cats as $cat ) :
          $cat_link = get_term_link( $cat );
          $sub_cats = get_terms( [ 'taxonomy' => 'product_cat', 'parent' => $cat->term_id, 'hide_empty' => true, 'number' => 4 ] );
        ?>
        <a class="shop-cat-card" href="<?php echo esc_url( $cat_link ); ?>">
          <div class="shop-cat-card-body">
            <div class="shop-cat-card-top">
              <h3 class="shop-cat-card-name"><?php echo esc_html( $cat->name ); ?></h3>
              <span class="shop-cat-card-count"><?php echo esc_html( $cat->count ); ?></span>
            </div>
            <?php if ( ! empty( $sub_cats ) && ! is_wp_error( $sub_cats ) ) : ?>
            <ul class="shop-cat-card-subs">
              <?php foreach ( $sub_cats as $sub ) : ?>
              <li><?php echo esc_html( $sub->name ); ?></li>
              <?php endforeach; ?>
            </ul>
            <?php endif; ?>
          </div>
          <span class="shop-cat-card-arrow" aria-hidden="true">→</span>
        </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>
  <?php endif; ?>

  <!-- Layout loja: sidebar + grid -->
  <div class="shop-layout">

    <!-- Sidebar / Filtros -->
    <aside class="shop-sidebar" aria-label="<?php _e( 'Produktfilter', 'scanpro-child' ); ?>">

      <div class="sidebar-widget">
        <h3 class="sidebar-widget-title">
          <?php _e( 'Kategorien', 'scanpro-child' ); ?>
        </h3>
        <?php
        $root = get_term_by( 'slug', 'produkte', 'product_cat' );
        wp_list_categories( [
            'taxonomy'     => 'product_cat',
            'hide_empty'   => true,
            'title_li'     => '',
            'hierarchical' => true,
            'parent'       => $root ? $root->term_id : 0,
        ] );
        ?>
      </div>

      <?php if ( class_exists( 'WooCommerce' ) ) : ?>
        <div class="sidebar-widget">
          <h3 class="sidebar-widget-title">
            <?php _e( 'Preis', 'scanpro-child' ); ?>
          </h3>
          <?php the_widget( 'WC_Widget_Price_Filter' ); ?>
        </div>
      <?php endif; ?>

    </aside>

    <!-- Área principal de produtos -->
    <div class="shop-main">

      <?php if ( woocommerce_product_loop() ) : ?>

        <!-- Barra de ferramentas: ordenação e contagem -->
        <div class="shop-toolbar">
          <?php woocommerce_result_count(); ?>
          <?php woocommerce_catalog_ordering(); ?>
        </div>

        <?php woocommerce_product_loop_start(); ?>

        <?php if ( wc_get_loop_prop( 'total' ) ) : ?>
          <?php while ( have_posts() ) : ?>
            <?php the_post(); ?>
            <?php wc_get_template_part( 'content', 'product' ); ?>
          <?php endwhile; ?>
        <?php endif; ?>

        <?php woocommerce_product_loop_end(); ?>

        <!-- Paginação -->
        <div class="shop-pagination">
          <?php
          woocommerce_pagination();
          ?>
        </div>

      <?php else : ?>

        <!-- Sem produtos -->
        <div class="shop-no-products">
          <?php wc_no_products_found(); ?>
        </div>

      <?php endif; ?>

    </div><!-- .shop-main -->
  </div><!-- .shop-layout -->

</main>

<?php get_footer(); ?>
