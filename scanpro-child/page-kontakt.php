<?php
/**
 * Template: Kontakt — Scan Pro Child
 * Slug da página: kontakt
 *
 * O formulário é enviado por AJAX para o Web3Forms (api.web3forms.com),
 * que trata do envio do e-mail para info@scanpro.ch. Não usa wp_mail().
 *
 * A Access Key define-se em functions.php (SCANPRO_WEB3FORMS_KEY) ou
 * através do filtro 'scanpro_web3forms_key'.
 */

// Access Key do Web3Forms
$w3f_key = apply_filters(
    'scanpro_web3forms_key',
    defined( 'SCANPRO_WEB3FORMS_KEY' ) ? SCANPRO_WEB3FORMS_KEY : ''
);

get_header();

?>

<main class="site-main" id="main" role="main">

  <!-- Hero -->
  <section class="page-hero">
    <div class="container">
<span class="section-label"><?php _e( 'KONTAKT', 'scanpro-child' ); ?></span>
      <h1><?php _e( 'Kontakt', 'scanpro-child' ); ?></h1>
      <p><?php _e( 'Wir freuen uns auf Ihre Anfrage', 'scanpro-child' ); ?></p>
    </div>
  </section>

  <!-- Grid: formulário + dados de contato -->
  <section class="contact-section">
    <div class="container">
      <div class="contact-grid">

        <!-- Formulário -->
        <div class="contact-form-col">
          <h2><?php _e( 'Offerte anfragen', 'scanpro-child' ); ?></h2>
          <p class="contact-intro">
            <?php _e( 'Füllen Sie das Formular aus und wir melden uns innerhalb von 24 Stunden bei Ihnen.', 'scanpro-child' ); ?>
          </p>

          <?php if ( ! $w3f_key && current_user_can( 'manage_options' ) ) : ?>
            <div class="form-notice form-notice--error" role="alert">
              [Admin] <?php _e( 'Web3Forms Access Key fehlt — bitte SCANPRO_WEB3FORMS_KEY in functions.php setzen.', 'scanpro-child' ); ?>
            </div>
          <?php endif; ?>

          <div class="form-notice" id="contact-form-notice" role="alert" hidden></div>

          <form
            class="contact-form"
            id="contact-form"
            method="post"
            action="https://api.web3forms.com/submit"
            novalidate
          >
            <input type="hidden" name="access_key" value="<?php echo esc_attr( $w3f_key ); ?>">
            <input type="hidden" name="subject" value="<?php esc_attr_e( '[Scan-Pro] Neue Anfrage über das Kontaktformular', 'scanpro-child' ); ?>">
            <input type="hidden" name="from_name" value="Scan-Pro Website">

            <!-- Honeypot: invisível para pessoas, preenchido por bots -->
            <input type="checkbox" name="botcheck" class="form-botcheck" tabindex="-1" autocomplete="off" style="display:none !important;">

            <div class="form-row form-row--2col">
              <div class="form-group">
                <label for="contact_name">
                  <?php _e( 'Name', 'scanpro-child' ); ?>
                  <span class="required" aria-hidden="true">*</span>
                </label>
                <input
                  type="text"
                  id="contact_name"
                  name="name"
                  required
                  placeholder="<?php _e( 'Max Mustermann', 'scanpro-child' ); ?>"
                >
              </div>
              <div class="form-group">
                <label for="contact_company">
                  <?php _e( 'Firma', 'scanpro-child' ); ?>
                </label>
                <input
                  type="text"
                  id="contact_company"
                  name="Firma"
                  placeholder="<?php _e( 'Mustermann GmbH', 'scanpro-child' ); ?>"
                >
              </div>
            </div>

            <div class="form-row form-row--2col">
              <div class="form-group">
                <label for="contact_email">
                  <?php _e( 'E-Mail', 'scanpro-child' ); ?>
                  <span class="required" aria-hidden="true">*</span>
                </label>
                <input
                  type="email"
                  id="contact_email"
                  name="email"
                  required
                  placeholder="beispiel@firma.ch"
                >
              </div>
              <div class="form-group">
                <label for="contact_phone">
                  <?php _e( 'Telefon', 'scanpro-child' ); ?>
                </label>
                <input
                  type="tel"
                  id="contact_phone"
                  name="Telefon"
                  placeholder="+41 43 355 34 00"
                >
              </div>
            </div>

            <div class="form-group">
              <label for="contact_subject">
                <?php _e( 'Betreff', 'scanpro-child' ); ?>
              </label>
              <select id="contact_subject" name="Betreff">
                <option value=""><?php _e( 'Bitte wählen…', 'scanpro-child' ); ?></option>
                <option value="<?php esc_attr_e( 'Offerte anfragen', 'scanpro-child' ); ?>"><?php _e( 'Offerte anfragen', 'scanpro-child' ); ?></option>
                <option value="<?php esc_attr_e( 'Technische Frage', 'scanpro-child' ); ?>"><?php _e( 'Technische Frage', 'scanpro-child' ); ?></option>
                <option value="<?php esc_attr_e( 'Bestellung / Lieferung', 'scanpro-child' ); ?>"><?php _e( 'Bestellung / Lieferung', 'scanpro-child' ); ?></option>
                <option value="<?php esc_attr_e( 'Support / Service', 'scanpro-child' ); ?>"><?php _e( 'Support / Service', 'scanpro-child' ); ?></option>
                <option value="<?php esc_attr_e( 'Sonstiges', 'scanpro-child' ); ?>"><?php _e( 'Sonstiges', 'scanpro-child' ); ?></option>
              </select>
            </div>

            <div class="form-group">
              <label for="contact_message">
                <?php _e( 'Nachricht', 'scanpro-child' ); ?>
                <span class="required" aria-hidden="true">*</span>
              </label>
              <textarea
                id="contact_message"
                name="message"
                rows="6"
                required
                placeholder="<?php _e( 'Beschreiben Sie Ihr Projekt oder Ihre Anfrage…', 'scanpro-child' ); ?>"
              ></textarea>
            </div>

            <p class="form-required-note">
              <span class="required">*</span>
              <?php _e( 'Pflichtfelder', 'scanpro-child' ); ?>
            </p>

            <button type="submit" class="btn btn-primary form-submit">
              <?php _e( 'Anfrage senden', 'scanpro-child' ); ?>
            </button>
          </form>
        </div><!-- .contact-form-col -->

        <!-- Dados de contato -->
        <div class="contact-info-col">
          <h2><?php _e( 'So erreichen Sie uns', 'scanpro-child' ); ?></h2>

          <?php
          // Mesmos textos do rodapé: uma única entrada no Loco actualiza ambos.
          /* translators: Telefonnummer wie angezeigt — erscheint in Fusszeile und auf der Kontaktseite */
          $kontakt_phone      = __( '043 355 34 00', 'scanpro-child' );
          /* translators: dieselbe Telefonnummer für den Anruf-Link, international und ohne Leerzeichen */
          $kontakt_phone_link = __( '+41433553400', 'scanpro-child' );
          /* translators: E-Mail-Adresse — wird als Text und als Link verwendet */
          $kontakt_email      = __( 'info@scanpro.ch', 'scanpro-child' );
          ?>

          <div class="contact-info-block">
            <h3><?php _e( 'Adresse', 'scanpro-child' ); ?></h3>
            <address>
              <?php /* translators: Firmenname in der Adresse */ ?>
              <?php _e( 'Scan-Pro AG', 'scanpro-child' ); ?><br>
              <?php /* translators: Strasse und Hausnummer */ ?>
              <?php _e( 'Bahnhofstrasse 1', 'scanpro-child' ); ?><br>
              <?php /* translators: Postleitzahl und Ort */ ?>
              <?php _e( 'CH-8852 Altendorf', 'scanpro-child' ); ?>
            </address>
          </div>

          <div class="contact-info-block">
            <h3><?php _e( 'Telefon', 'scanpro-child' ); ?></h3>
            <p><a href="tel:<?php echo esc_attr( $kontakt_phone_link ); ?>"><?php echo esc_html( $kontakt_phone ); ?></a></p>
          </div>

          <div class="contact-info-block">
            <h3><?php _e( 'E-Mail', 'scanpro-child' ); ?></h3>
            <p><a href="mailto:<?php echo esc_attr( $kontakt_email ); ?>"><?php echo esc_html( $kontakt_email ); ?></a></p>
          </div>

          <div class="contact-info-block">
            <h3><?php _e( 'Öffnungszeiten', 'scanpro-child' ); ?></h3>
            <p>
              <?php _e( 'Montag – Freitag', 'scanpro-child' ); ?><br>
              <?php /* translators: Öffnungszeiten, Format: Vormittag / Nachmittag */ ?>
              <?php _e( '08:00 – 12:00 / 13:00 – 17:00', 'scanpro-child' ); ?>
            </p>
          </div>

          <!-- Mapa: Bahnhofstrasse 1, CH-8852 Altendorf -->
          <div class="contact-map">
            <iframe
              src="https://maps.google.com/maps?q=Bahnhofstrasse+1,+8852+Altendorf,+Schweiz&z=15&output=embed"
              title="<?php esc_attr_e( 'Standort Scan-Pro AG auf der Karte', 'scanpro-child' ); ?>"
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
              allowfullscreen
            ></iframe>
          </div>

        </div><!-- .contact-info-col -->

      </div><!-- .contact-grid -->
    </div>
  </section>

</main>

<?php get_footer(); ?>
