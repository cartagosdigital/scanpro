<?php
/**
 * Footer do tema Scan Pro Child
 *
 * Fundo claro (#f4f6f8), 4 colunas: logo+descrição, páginas, categorias de produtos, contato.
 * Animação de entrada das colunas via IntersectionObserver (main.js).
 */
?>

</div><!-- .site-content-wrapper -->

<footer class="site-footer" role="contentinfo">
  <div class="footer-top">
    <div class="container footer-grid">

      <!-- Coluna 1: Logo + descrição -->
      <div class="footer-col footer-brand">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo">
          <img
            src="https://lp.scanpro.ch/wp-content/uploads/2025/10/logo-Scan-Pro-1.png"
            alt="Scan-Pro"
            height="38"
            width="auto"
          >
        </a>
        <p class="footer-tagline">
          <?php _e( 'Seit über 50 Jahren Ihr Schweizer Spezialist für effiziente Lüftungssysteme.', 'scanpro-child' ); ?>
        </p>
        <div class="footer-partners-label">
          <?php _e( 'Offizielle Partner:', 'scanpro-child' ); ?>
        </div>
        <div class="footer-partners-logos">
          <!-- Substituir por logos reais dos parceiros -->
          <span class="partner-name">EXHAUSTO</span>
          <span class="partner-name">exodraft</span>
          <span class="partner-name">Thermomatic</span>
        </div>
      </div>

      <!-- Coluna 2: Páginas do site -->
      <div class="footer-col footer-links">
        <h4 class="footer-heading"><?php _e( 'Seiten', 'scanpro-child' ); ?></h4>
        <ul>
          <li>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
              <?php _e( 'Startseite', 'scanpro-child' ); ?>
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url( home_url( '/ueber-uns' ) ); ?>">
              <?php _e( 'Über uns', 'scanpro-child' ); ?>
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url( home_url( '/team' ) ); ?>">
              <?php _e( 'Team', 'scanpro-child' ); ?>
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url( home_url( '/einsatzbereiche' ) ); ?>">
              <?php _e( 'Einsatzbereiche', 'scanpro-child' ); ?>
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url( home_url( '/wissen' ) ); ?>">
              <?php _e( 'Wissen', 'scanpro-child' ); ?>
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url( home_url( '/referenzen' ) ); ?>">
              <?php _e( 'Referenzen', 'scanpro-child' ); ?>
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url( home_url( '/kontakt' ) ); ?>">
              <?php _e( 'Kontakt', 'scanpro-child' ); ?>
            </a>
          </li>
        </ul>
      </div>

      <!-- Coluna 3: Kategorias de produtos — busca dinâmica no WooCommerce,
           para nunca ficar desatualizada quando categorias forem criadas/removidas -->
      <div class="footer-col footer-links">
        <h4 class="footer-heading"><?php _e( 'Produktkategorien', 'scanpro-child' ); ?></h4>
        <ul>
          <?php
          $footer_cats_parent = get_term_by( 'slug', 'produkte', 'product_cat' );
          $footer_cats        = $footer_cats_parent
            ? get_terms( [
                'taxonomy'   => 'product_cat',
                'parent'     => $footer_cats_parent->term_id,
                'hide_empty' => true,
                'orderby'    => 'menu_order',
                'order'      => 'ASC',
              ] )
            : [];
          if ( ! empty( $footer_cats ) && ! is_wp_error( $footer_cats ) ) :
              foreach ( $footer_cats as $footer_cat ) :
          ?>
          <li>
            <a href="<?php echo esc_url( get_term_link( $footer_cat ) ); ?>">
              <?php echo esc_html( $footer_cat->name ); ?>
            </a>
          </li>
          <?php
              endforeach;
          endif;
          ?>
          <li>
            <a href="<?php echo esc_url( home_url( '/produkte' ) ); ?>">
              <?php _e( 'Alle Produkte', 'scanpro-child' ); ?>
            </a>
          </li>
        </ul>
      </div>

      <!-- Coluna 4: Contato -->
      <div class="footer-col footer-contact">
        <h4 class="footer-heading"><?php _e( 'Kontakt', 'scanpro-child' ); ?></h4>
        <address>
          <p class="footer-address">
            <span class="footer-icon" aria-hidden="true">&#9679;</span>
            Scan-Pro AG<br>
            Bahnhofstrasse 1<br>
            CH-8852 Altendorf
          </p>
          <p>
            <span class="footer-icon" aria-hidden="true">&#9742;</span>
            <a href="tel:+41433553400">043 355 34 00</a>
          </p>
          <p>
            <span class="footer-icon" aria-hidden="true">&#9993;</span>
            <a href="mailto:info@scanpro.ch">info@scanpro.ch</a>
          </p>
        </address>
        <a href="<?php echo esc_url( home_url( '/kontakt' ) ); ?>" class="btn btn-primary footer-cta-btn">
          <?php _e( 'Offerte anfragen', 'scanpro-child' ); ?>
        </a>
      </div>

    </div><!-- .footer-grid -->
  </div><!-- .footer-top -->

  <div class="footer-bottom">
    <div class="container footer-bottom-inner">
      <p>
        &copy; <?php echo esc_html( date( 'Y' ) ); ?>
        <?php _e( 'Scan-Pro AG. Alle Rechte vorbehalten.', 'scanpro-child' ); ?>
      </p>
      <nav class="footer-legal-nav" aria-label="<?php _e( 'Rechtliche Links', 'scanpro-child' ); ?>">
        <a href="<?php echo esc_url( home_url( '/datenschutz' ) ); ?>">
          <?php _e( 'Datenschutz', 'scanpro-child' ); ?>
        </a>
        <a href="<?php echo esc_url( home_url( '/impressum' ) ); ?>">
          <?php _e( 'Impressum', 'scanpro-child' ); ?>
        </a>
      </nav>
    </div>
  </div><!-- .footer-bottom -->

</footer>

<?php wp_footer(); ?>
</body>
</html>
