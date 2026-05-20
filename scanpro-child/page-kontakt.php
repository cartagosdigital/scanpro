<?php
/**
 * Template: Kontakt — Scan Pro Child
 * Slug da página: kontakt
 *
 * Formulário nativo HTML5 + PHP mailer via wp_mail().
 * Para usar um plugin de formulários (Contact Form 7, WPForms, etc.),
 * substituir o bloco do formulário pelo shortcode correspondente.
 */

get_header();

// Processamento do formulário de contato
$form_sent    = false;
$form_error   = '';
$form_success = '';

if ( isset( $_POST['scanpro_contact_nonce'] ) &&
     wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['scanpro_contact_nonce'] ) ), 'scanpro_contact_form' ) ) {

    $name    = sanitize_text_field( wp_unslash( $_POST['contact_name'] ?? '' ) );
    $company = sanitize_text_field( wp_unslash( $_POST['contact_company'] ?? '' ) );
    $email   = sanitize_email( wp_unslash( $_POST['contact_email'] ?? '' ) );
    $phone   = sanitize_text_field( wp_unslash( $_POST['contact_phone'] ?? '' ) );
    $subject = sanitize_text_field( wp_unslash( $_POST['contact_subject'] ?? '' ) );
    $message = sanitize_textarea_field( wp_unslash( $_POST['contact_message'] ?? '' ) );

    if ( empty( $name ) || empty( $email ) || empty( $message ) ) {
        $form_error = __( 'Bitte füllen Sie alle Pflichtfelder aus.', 'scanpro-child' );
    } elseif ( ! is_email( $email ) ) {
        $form_error = __( 'Bitte geben Sie eine gültige E-Mail-Adresse ein.', 'scanpro-child' );
    } else {
        $to      = get_option( 'admin_email' );
        $headers = [
            'Content-Type: text/html; charset=UTF-8',
            'Reply-To: ' . esc_html( $name ) . ' <' . esc_html( $email ) . '>',
        ];
        $mail_subject = sprintf(
            /* translators: %s: betreff da mensagem */
            __( '[Scan Pro] Neue Anfrage: %s', 'scanpro-child' ),
            $subject ?: __( 'Kontaktformular', 'scanpro-child' )
        );
        $mail_body = sprintf(
            '<p><strong>%s:</strong> %s</p><p><strong>%s:</strong> %s</p><p><strong>%s:</strong> %s</p><p><strong>%s:</strong> %s</p><p><strong>%s:</strong></p><p>%s</p>',
            __( 'Name', 'scanpro-child' ),    esc_html( $name ),
            __( 'Firma', 'scanpro-child' ),   esc_html( $company ),
            __( 'E-Mail', 'scanpro-child' ),  esc_html( $email ),
            __( 'Telefon', 'scanpro-child' ), esc_html( $phone ),
            __( 'Nachricht', 'scanpro-child' ),
            nl2br( esc_html( $message ) )
        );

        $sent = wp_mail( $to, $mail_subject, $mail_body, $headers );

        if ( $sent ) {
            $form_sent    = true;
            $form_success = __( 'Vielen Dank! Ihre Anfrage wurde erfolgreich gesendet. Wir melden uns so bald wie möglich.', 'scanpro-child' );
        } else {
            $form_error = __( 'Es ist ein Fehler aufgetreten. Bitte versuchen Sie es später erneut oder kontaktieren Sie uns per Telefon.', 'scanpro-child' );
        }
    }
}
?>

<main class="site-main" id="main" role="main">

  <!-- Banner -->
  <section class="page-banner page-banner--dark">
    <div class="container">
      <nav class="breadcrumb" aria-label="<?php _e( 'Brotkrümelnavigation', 'scanpro-child' ); ?>">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
          <?php _e( 'Startseite', 'scanpro-child' ); ?>
        </a>
        <span aria-hidden="true"> / </span>
        <span aria-current="page"><?php _e( 'Kontakt', 'scanpro-child' ); ?></span>
      </nav>
      <h1><?php _e( 'Kontakt', 'scanpro-child' ); ?></h1>
      <p class="page-banner-subtitle">
        <?php _e( 'Wir freuen uns auf Ihre Anfrage', 'scanpro-child' ); ?>
      </p>
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

          <?php if ( $form_success ) : ?>
            <div class="form-notice form-notice--success" role="alert">
              <?php echo esc_html( $form_success ); ?>
            </div>
          <?php elseif ( $form_error ) : ?>
            <div class="form-notice form-notice--error" role="alert">
              <?php echo esc_html( $form_error ); ?>
            </div>
          <?php endif; ?>

          <?php if ( ! $form_sent ) : ?>
          <form class="contact-form" method="post" action="<?php echo esc_url( get_permalink() ); ?>" novalidate>
            <?php wp_nonce_field( 'scanpro_contact_form', 'scanpro_contact_nonce' ); ?>

            <div class="form-row form-row--2col">
              <div class="form-group">
                <label for="contact_name">
                  <?php _e( 'Name', 'scanpro-child' ); ?>
                  <span class="required" aria-hidden="true">*</span>
                </label>
                <input
                  type="text"
                  id="contact_name"
                  name="contact_name"
                  required
                  placeholder="<?php _e( 'Max Mustermann', 'scanpro-child' ); ?>"
                  value="<?php echo isset( $_POST['contact_name'] ) ? esc_attr( sanitize_text_field( wp_unslash( $_POST['contact_name'] ) ) ) : ''; ?>"
                >
              </div>
              <div class="form-group">
                <label for="contact_company">
                  <?php _e( 'Firma', 'scanpro-child' ); ?>
                </label>
                <input
                  type="text"
                  id="contact_company"
                  name="contact_company"
                  placeholder="<?php _e( 'Mustermann GmbH', 'scanpro-child' ); ?>"
                  value="<?php echo isset( $_POST['contact_company'] ) ? esc_attr( sanitize_text_field( wp_unslash( $_POST['contact_company'] ) ) ) : ''; ?>"
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
                  name="contact_email"
                  required
                  placeholder="beispiel@firma.ch"
                  value="<?php echo isset( $_POST['contact_email'] ) ? esc_attr( sanitize_email( wp_unslash( $_POST['contact_email'] ) ) ) : ''; ?>"
                >
              </div>
              <div class="form-group">
                <label for="contact_phone">
                  <?php _e( 'Telefon', 'scanpro-child' ); ?>
                </label>
                <input
                  type="tel"
                  id="contact_phone"
                  name="contact_phone"
                  placeholder="+41 43 355 34 00"
                  value="<?php echo isset( $_POST['contact_phone'] ) ? esc_attr( sanitize_text_field( wp_unslash( $_POST['contact_phone'] ) ) ) : ''; ?>"
                >
              </div>
            </div>

            <div class="form-group">
              <label for="contact_subject">
                <?php _e( 'Betreff', 'scanpro-child' ); ?>
              </label>
              <select id="contact_subject" name="contact_subject">
                <option value=""><?php _e( 'Bitte wählen…', 'scanpro-child' ); ?></option>
                <option value="offerte"><?php _e( 'Offerte anfragen', 'scanpro-child' ); ?></option>
                <option value="technisch"><?php _e( 'Technische Frage', 'scanpro-child' ); ?></option>
                <option value="bestellung"><?php _e( 'Bestellung / Lieferung', 'scanpro-child' ); ?></option>
                <option value="support"><?php _e( 'Support / Service', 'scanpro-child' ); ?></option>
                <option value="sonstiges"><?php _e( 'Sonstiges', 'scanpro-child' ); ?></option>
              </select>
            </div>

            <div class="form-group">
              <label for="contact_message">
                <?php _e( 'Nachricht', 'scanpro-child' ); ?>
                <span class="required" aria-hidden="true">*</span>
              </label>
              <textarea
                id="contact_message"
                name="contact_message"
                rows="6"
                required
                placeholder="<?php _e( 'Beschreiben Sie Ihr Projekt oder Ihre Anfrage…', 'scanpro-child' ); ?>"
              ><?php echo isset( $_POST['contact_message'] ) ? esc_textarea( sanitize_textarea_field( wp_unslash( $_POST['contact_message'] ) ) ) : ''; ?></textarea>
            </div>

            <p class="form-required-note">
              <span class="required">*</span>
              <?php _e( 'Pflichtfelder', 'scanpro-child' ); ?>
            </p>

            <button type="submit" class="btn btn-primary form-submit">
              <?php _e( 'Anfrage senden', 'scanpro-child' ); ?>
            </button>
          </form>
          <?php endif; ?>
        </div><!-- .contact-form-col -->

        <!-- Dados de contato -->
        <div class="contact-info-col">
          <h2><?php _e( 'So erreichen Sie uns', 'scanpro-child' ); ?></h2>

          <div class="contact-info-block">
            <h3><?php _e( 'Adresse', 'scanpro-child' ); ?></h3>
            <address>
              Scan Pro AG<br>
              Bahnhofstrasse 1<br>
              CH-8852 Altendorf
            </address>
          </div>

          <div class="contact-info-block">
            <h3><?php _e( 'Telefon', 'scanpro-child' ); ?></h3>
            <p><a href="tel:+41433553400">043 355 34 00</a></p>
          </div>

          <div class="contact-info-block">
            <h3><?php _e( 'E-Mail', 'scanpro-child' ); ?></h3>
            <p><a href="mailto:info@scanpro.ch">info@scanpro.ch</a></p>
          </div>

          <div class="contact-info-block">
            <h3><?php _e( 'Öffnungszeiten', 'scanpro-child' ); ?></h3>
            <p>
              <?php _e( 'Montag – Freitag', 'scanpro-child' ); ?><br>
              08:00 – 12:00 / 13:30 – 17:00
            </p>
          </div>

          <!-- Placeholder mapa — substituir por iframe do Google Maps ou OpenStreetMap -->
          <div class="contact-map-placeholder" aria-label="<?php _e( 'Kartenplatzhalter', 'scanpro-child' ); ?>">
            <!-- Substituir por iframe do mapa real -->
            <p><?php _e( 'Karte: Bahnhofstrasse 1, 8852 Altendorf', 'scanpro-child' ); ?></p>
          </div>

        </div><!-- .contact-info-col -->

      </div><!-- .contact-grid -->
    </div>
  </section>

</main>

<?php get_footer(); ?>
