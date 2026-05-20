<?php
/**
 * Template: Produto individual — Scan Pro Child
 * Override de woocommerce/single-product.php
 *
 * Seções: galeria | dados | abas (Beschreibung / Technische Daten / Downloads)
 * Seção inferior: Ähnliche Produkte
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main class="site-main woocommerce-main single-product-main" id="main" role="main">

  <?php while ( have_posts() ) : the_post(); ?>

  <div class="container single-product-container">

    <!-- Breadcrumb -->
    <nav class="breadcrumb" aria-label="<?php _e( 'Brotkrümelnavigation', 'scanpro-child' ); ?>">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php _e( 'Startseite', 'scanpro-child' ); ?>
      </a>
      <span aria-hidden="true"> / </span>
      <a href="<?php echo esc_url( home_url( '/shop' ) ); ?>">
        <?php _e( 'Produkte', 'scanpro-child' ); ?>
      </a>
      <?php
      $terms = get_the_terms( get_the_ID(), 'product_cat' );
      if ( $terms && ! is_wp_error( $terms ) ) :
      ?>
        <span aria-hidden="true"> / </span>
        <a href="<?php echo esc_url( get_term_link( $terms[0] ) ); ?>">
          <?php echo esc_html( $terms[0]->name ); ?>
        </a>
      <?php endif; ?>
      <span aria-hidden="true"> / </span>
      <span aria-current="page"><?php the_title(); ?></span>
    </nav>

    <!-- Grid: galeria + resumo -->
    <div class="single-product-layout">

      <!-- Galeria de imagens -->
      <div class="single-product-gallery">
        <?php
        // Galeria nativa do WooCommerce (zoom, lightbox, slider)
        woocommerce_show_product_images();
        ?>
      </div>

      <!-- Resumo do produto -->
      <div class="single-product-summary">
        <?php
        // Categoria do produto
        $cats = get_the_terms( get_the_ID(), 'product_cat' );
        if ( $cats && ! is_wp_error( $cats ) ) :
        ?>
          <span class="product-category-badge">
            <?php echo esc_html( $cats[0]->name ); ?>
          </span>
        <?php endif; ?>

        <!-- H1: nome do produto (dinâmico do WooCommerce) -->
        <h1 class="product-title"><?php the_title(); ?></h1>

        <!-- SKU -->
        <?php global $product; ?>
        <?php if ( $product->get_sku() ) : ?>
          <p class="product-sku">
            <span class="sku-label"><?php _e( 'Artikelnr.:', 'scanpro-child' ); ?></span>
            <?php echo esc_html( $product->get_sku() ); ?>
          </p>
        <?php endif; ?>

        <!-- Preço -->
        <div class="product-price-wrapper">
          <?php woocommerce_template_single_price(); ?>
        </div>

        <!-- Trecho da descrição -->
        <div class="product-short-description">
          <?php woocommerce_template_single_excerpt(); ?>
        </div>

        <!-- Botões de ação -->
        <div class="product-actions">
          <?php woocommerce_template_single_add_to_cart(); ?>
          <a href="<?php echo esc_url( add_query_arg( 'produkt', get_the_ID(), home_url( '/kontakt' ) ) ); ?>" class="btn btn-outline-dark product-quote-btn">
            <?php _e( 'Offerte anfragen', 'scanpro-child' ); ?>
          </a>
        </div>

        <!-- Meta: categorias e marcas -->
        <div class="product-meta">
          <?php woocommerce_template_single_meta(); ?>
        </div>

      </div><!-- .single-product-summary -->
    </div><!-- .single-product-layout -->

    <!-- Abas: Descrição | Dados Técnicos | Downloads -->
    <div class="product-tabs-section" id="product-tabs">

      <div class="product-tabs-nav" role="tablist" aria-label="<?php _e( 'Produktinformationen', 'scanpro-child' ); ?>">
        <button
          class="product-tab-btn active"
          role="tab"
          aria-selected="true"
          aria-controls="tab-panel-beschreibung"
          id="tab-btn-beschreibung"
          data-tab="beschreibung"
        >
          <?php _e( 'Beschreibung', 'scanpro-child' ); ?>
        </button>
        <button
          class="product-tab-btn"
          role="tab"
          aria-selected="false"
          aria-controls="tab-panel-technisch"
          id="tab-btn-technisch"
          data-tab="technisch"
          tabindex="-1"
        >
          <?php _e( 'Technische Daten', 'scanpro-child' ); ?>
        </button>
        <button
          class="product-tab-btn"
          role="tab"
          aria-selected="false"
          aria-controls="tab-panel-downloads"
          id="tab-btn-downloads"
          data-tab="downloads"
          tabindex="-1"
        >
          <?php _e( 'Downloads', 'scanpro-child' ); ?>
        </button>
      </div>

      <!-- Painel: Descrição completa -->
      <div
        class="product-tab-panel active"
        role="tabpanel"
        id="tab-panel-beschreibung"
        aria-labelledby="tab-btn-beschreibung"
      >
        <div class="product-description">
          <?php the_content(); ?>
        </div>
      </div>

      <!-- Painel: Dados técnicos (atributos WooCommerce) -->
      <div
        class="product-tab-panel"
        role="tabpanel"
        id="tab-panel-technisch"
        aria-labelledby="tab-btn-technisch"
        hidden
      >
        <?php
        // Atributos do produto (especificações técnicas)
        $attributes = $product->get_attributes();
        if ( $attributes ) :
        ?>
        <table class="product-specs-table">
          <tbody>
            <?php foreach ( $attributes as $attribute ) :
              $label  = wc_attribute_label( $attribute->get_name() );
              $values = $attribute->is_taxonomy()
                ? wc_get_product_terms( $product->get_id(), $attribute->get_name(), [ 'fields' => 'names' ] )
                : $attribute->get_options();
              if ( empty( $values ) ) continue;
            ?>
            <tr>
              <th><?php echo esc_html( $label ); ?></th>
              <td><?php echo esc_html( implode( ', ', $values ) ); ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <?php else : ?>
          <p><?php _e( 'Keine technischen Daten verfügbar.', 'scanpro-child' ); ?></p>
        <?php endif; ?>
      </div>

      <!-- Painel: Downloads -->
      <div
        class="product-tab-panel"
        role="tabpanel"
        id="tab-panel-downloads"
        aria-labelledby="tab-btn-downloads"
        hidden
      >
        <?php
        // Downloads do produto (se WooCommerce downloadable)
        if ( $product->is_downloadable() && $product->get_downloads() ) :
            $downloads = $product->get_downloads();
        ?>
        <ul class="product-downloads-list">
          <?php foreach ( $downloads as $download ) : ?>
          <li class="download-item">
            <a href="<?php echo esc_url( $download->get_file() ); ?>" class="download-link" download>
              <span class="download-icon" aria-hidden="true">&#8659;</span>
              <?php echo esc_html( $download->get_name() ); ?>
            </a>
          </li>
          <?php endforeach; ?>
        </ul>
        <?php else : ?>
          <p><?php _e( 'Keine Downloads verfügbar.', 'scanpro-child' ); ?></p>
        <?php endif; ?>
      </div>

    </div><!-- .product-tabs-section -->

  </div><!-- .single-product-container -->

  <!-- Produtos relacionados -->
  <section class="related-products-section">
    <div class="container">
      <h2 class="section-title"><?php _e( 'Ähnliche Produkte', 'scanpro-child' ); ?></h2>
      <?php
      $related_ids = wc_get_related_products( $product->get_id(), 4 );
      if ( $related_ids ) :
          $related_args = [
              'post_type'      => 'product',
              'post__in'       => $related_ids,
              'posts_per_page' => 4,
          ];
          $related_query = new WP_Query( $related_args );
          if ( $related_query->have_posts() ) :
      ?>
      <div class="products-grid products-grid--related">
        <?php while ( $related_query->have_posts() ) : $related_query->the_post();
          $rel_product = wc_get_product( get_the_ID() );
          $rel_cats    = get_the_terms( get_the_ID(), 'product_cat' );
        ?>
        <div class="product-card">
          <a href="<?php the_permalink(); ?>" class="product-card-img-link" tabindex="-1" aria-hidden="true">
            <div class="product-card-img">
              <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail( 'medium', [ 'loading' => 'lazy' ] ); ?>
              <?php else : ?>
                <div class="product-img-placeholder"></div>
              <?php endif; ?>
            </div>
          </a>
          <div class="product-card-body">
            <?php if ( $rel_cats && ! is_wp_error( $rel_cats ) ) : ?>
              <span class="product-card-category"><?php echo esc_html( $rel_cats[0]->name ); ?></span>
            <?php endif; ?>
            <h3 class="product-card-title">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
            <div class="product-card-price"><?php echo wp_kses_post( $rel_product->get_price_html() ); ?></div>
            <a href="<?php the_permalink(); ?>" class="btn btn-primary product-card-btn">
              <?php _e( 'Produkt ansehen', 'scanpro-child' ); ?>
            </a>
          </div>
        </div>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
      <?php endif; endif; ?>
    </div>
  </section>

  <?php endwhile; ?>

</main>

<?php get_footer(); ?>
