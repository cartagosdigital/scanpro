<?php
/**
 * Footer do tema Scan Pro Child
 *
 * Fundo escuro (#0f1923), 3 colunas: logo+descrição, links rápidos, contato.
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
            src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/logo-scanpro.svg' ); ?>"
            alt="Scan Pro"
            height="36"
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
          <span class="partner-name">Exhausto</span>
          <span class="partner-name">exodraft</span>
          <span class="partner-name">Aldes</span>
          <span class="partner-name">Aereco</span>
        </div>
      </div>

      <!-- Coluna 2: Links rápidos -->
      <div class="footer-col footer-links">
        <h4 class="footer-heading"><?php _e( 'Schnellzugriff', 'scanpro-child' ); ?></h4>
        <ul>
          <li>
            <a href="<?php echo esc_url( home_url( '/shop' ) ); ?>">
              <?php _e( 'Produkte', 'scanpro-child' ); ?>
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url( home_url( '/produktkategorie/lueftung' ) ); ?>">
              <?php _e( 'Lüftung', 'scanpro-child' ); ?>
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url( home_url( '/produktkategorie/waermerueckgewinnung' ) ); ?>">
              <?php _e( 'Wärmerückgewinnung', 'scanpro-child' ); ?>
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url( home_url( '/produktkategorie/rauchsauger' ) ); ?>">
              <?php _e( 'Rauchsauger', 'scanpro-child' ); ?>
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url( home_url( '/ueber-uns' ) ); ?>">
              <?php _e( 'Über uns', 'scanpro-child' ); ?>
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

      <!-- Coluna 3: Contato -->
      <div class="footer-col footer-contact">
        <h4 class="footer-heading"><?php _e( 'Kontakt', 'scanpro-child' ); ?></h4>
        <address>
          <p class="footer-address">
            <span class="footer-icon" aria-hidden="true">&#9679;</span>
            Scan Pro AG<br>
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
        <?php _e( 'Scan Pro AG. Alle Rechte vorbehalten.', 'scanpro-child' ); ?>
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
