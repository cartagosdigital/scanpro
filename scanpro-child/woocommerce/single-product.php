<?php
/**
 * Template: Produto individual — Scan Pro Child
 * Override de woocommerce/single-product.php
 *
 * Seções: galeria | dados | descrição única (conteúdo colado via WooCommerce)
 * Seção inferior: Ähnliche Produkte
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main class="site-main woocommerce-main single-product-main" id="main" role="main">

  <?php while ( have_posts() ) : the_post(); ?>

  <div class="container single-product-container">


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

    <!-- Descrição — campo único, conteúdo colado diretamente no editor WooCommerce -->
    <div class="product-description-section">
      <div class="product-description">
        <?php the_content(); ?>
      </div>
    </div><!-- .product-description-section -->

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
          $rel_cats = get_the_terms( get_the_ID(), 'product_cat' );
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
