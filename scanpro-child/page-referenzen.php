<?php
/**
 * Template Name: Referenzen
 * Página de referências com lista de clientes por categoria.
 */
get_header(); ?>

<main class="referenzen-main">

  <!-- Hero -->
  <section class="page-hero">
    <div class="container">
      <span class="section-label"><?php _e( 'REFERENZEN', 'scanpro-child' ); ?></span>
      <h1><?php _e( 'Unsere Referenzen', 'scanpro-child' ); ?></h1>
      <p><?php _e( 'Seit über 50 Jahren vertrauen Unternehmen, Institutionen und private Bauherren in der ganzen Schweiz auf unsere Lüftungslösungen. Ein Auszug aus unserer Referenzliste.', 'scanpro-child' ); ?></p>
    </div>
  </section>

  <!-- Filtros de categoria -->
  <section class="referenzen-filter-bar">
    <div class="container">
      <div class="ref-filters">
        <button class="ref-filter-btn active" data-filter="all">
          <?php _e( 'Alle', 'scanpro-child' ); ?>
        </button>
        <button class="ref-filter-btn" data-filter="hotel">
          <?php _e( 'Hotel & Gastronomie', 'scanpro-child' ); ?>
        </button>
        <button class="ref-filter-btn" data-filter="spital">
          <?php _e( 'Spital & Gesundheit', 'scanpro-child' ); ?>
        </button>
        <button class="ref-filter-btn" data-filter="wohnen">
          <?php _e( 'Wohnen', 'scanpro-child' ); ?>
        </button>
        <button class="ref-filter-btn" data-filter="oeffentlich">
          <?php _e( 'Öffentliche Gebäude', 'scanpro-child' ); ?>
        </button>
        <button class="ref-filter-btn" data-filter="sport">
          <?php _e( 'Sport & Wellness', 'scanpro-child' ); ?>
        </button>
        <button class="ref-filter-btn" data-filter="industrie">
          <?php _e( 'Industrie & Gewerbe', 'scanpro-child' ); ?>
        </button>
      </div>
    </div>
  </section>

  <!-- Seções de referências -->
  <section class="referenzen-sections">
    <div class="container">

      <?php
      $kategorien = [

        // ————————————————————————————————————————————
        'hotel' => [
          'title' => __( 'Hotel, Restaurants, Bars, Camping etc.', 'scanpro-child' ),
          'img'   => 'https://azure-skunk-391096.hostingersite.com/wp-content/uploads/2026/09/scan-pro-lueftung-hotel-restaurant-gastronomie-schweiz.jpg.png',
          'desc'  => __( 'Küchendüfte gehören nicht in die Gaststube. Gesunde, frische Luft mit angenehmer Luftfeuchtigkeit und ohne störende Gerüche lassen den Gast länger verweilen und schaffen damit mehr Umsatz. Einen Vorschlag für den Weg zur angepassten Be- und Entlüftung Ihres Lokales unterbreiten wir Ihnen gerne kostenfrei.', 'scanpro-child' ),
          'refs'  => [
            'Hotel Donatz, Samedan',
            'Les Wagons, Winterthur',
            'Sporthotel Pontresina',
            'Gasthaus Montana Stoos',
            'Hotel Rosatsch, Celerina',
            'Hotel Alpenrose, Wengen',
            'Gasthaus zur Fernsicht, Heiden',
            'Bergrestaurant Rinderberg, Zweisimmen',
            'Rest. La Terrasse, Wetzikon',
            'Camping Unterägeri',
            'Bar Fernsehstudio SF DRS Aeschbacher Zürich',
            'Hotel Beatus, Merligen',
            'Hotel de la Gare, Cressier',
            'Hotel Distelboden, Melchsee-Frutt',
            'Hotel Hermitage, Luzern',
            'Flugplatz Meiringen',
            'Hotel Kulm, St. Moritz',
            'Schulküche Tösstalstr., Winterthur',
            'Rest. Stätzerhorn',
            'Hotel de la gare, Courgenay',
            'Rest. Steinbock, Näfels',
            'Vinothek, Thun',
            'Rest. Kreuz, Egerkingen',
            'Hotel Ermitage, Schönried',
            'Campingplatz Surcuolm',
            'Flugplatz Alpnach',
            'Rest. Bierfass, Zürich',
            'Rest. Kaffisatz, Winterthur',
            'Hotel du Lac, Interlaken',
            'Hotel Suvretta, St. Moritz',
            'Flughafenbeizli Saanen',
            'Silvretta Center, Davos',
            'Betriebskantine KEZO, Hinwil',
            'Hotel La Val, Brigels',
            'Sitting Bul Bar, Arosa',
            'Kebab, Schwanden',
            'Hotel Maierhof, Horgen',
            'Hotel Alpina, Maloya',
            'Berghaus Niederhorn',
            'Hotel Palace, Gstaad',
            "Frizzi's Bar, Zug",
            'Take Away, Villmergen',
          ],
        ],

        // ————————————————————————————————————————————
        'spital' => [
          'title' => __( 'Spital, Heim, Praxis, Tierheim etc.', 'scanpro-child' ),
          'img'   => 'https://azure-skunk-391096.hostingersite.com/wp-content/uploads/2026/09/scan-pro-lueftung-spital-praxis-pflegeheim-gesundheit-schweiz.jpg.jpg',
          'desc'  => __( 'Eine gute Belüftung ist im Operationssaal genau so wichtig wie in der Arztpraxis, im Pflegeheim, im Spital, auf der Unfallstation oder im Tiergehege. Gefilterte Luft, praktisch geräuschlos in den Raum geführt, lässt alle aufatmen. Wir zeigen Ihnen gerne wie.', 'scanpro-child' ),
          'refs'  => [
            'Aeskulap Klinik, Brunnen',
            'Altersheim, Grosshöchstetten',
            'Alterszentrum, Gebenstorf',
            'Altersheim, Steffisburg',
            'Arztpraxis Roter Löwen, Kloten',
            'Therapieraum Ochsen, Pratteln',
            'Psych. Klinik, Königsfelden',
            'Paracelsus Klinik, St. Gallen',
            'Jugendklinik, Bolligen',
            'Kurhaus Bäregg-Höhe',
            'Tierspital, Bern',
            'Klinik Waldhaus, Chur',
            'Elisabethenheim, Luzern',
            'Notkerianum, St. Gallen',
            'Behindertenheim Sonnenhalde, St. Gallen',
            'Drogenanlaufstelle, Wattwil',
            'Andreaspark Tierärzte, Zürich',
            'Stiftung Silea, Gwatt',
            'OP-Zentrum, Burgdorf',
            "L'hôpital du Locle",
            'IWAZ, Wetzikon',
            'Erziehungsheim Albisbrunn, Hausen a. A.',
            'Psych. Universitätsklinik Burghölzli, Zürich',
            'Kantonsspital, St. Gallen',
            'Physiotherapie Schlössli, Rheineck',
            'OP Tagesklinik Uroviva, Bülach',
            'Stiftung Sunneschyn, Meiringen',
            'Viehvermarktungshalle, Mülenen',
            'Arztpraxis Rössliwiese',
            'VET-Station, Buchs',
            'Home Les Sugits, Fleurier',
          ],
        ],

        // ————————————————————————————————————————————
        'wohnen' => [
          'title' => __( 'Wohnung, EFH, MFH, Mehrzweckraum etc.', 'scanpro-child' ),
          'img'   => 'https://azure-skunk-391096.hostingersite.com/wp-content/uploads/2026/09/scan-pro-lueftung-wohnung-efh-mfh-wohnraum-schweiz.jpg-scaled.jpg',
          'desc'  => __( 'Im Ein- oder Mehrfamilienhaus, überall wo Menschen wohnen, arbeiten, spielen und schlafen, ist der regelmässige Luftaustausch für das Wohlbefinden und die Leistungsfähigkeit von besonderer Bedeutung. Der richtige Luftwechsel hilft Krankheiten durch Bakterienübertragung zu vermeiden. Auch bleiben Bauschäden durch Feuchtigkeit aus. Wir haben die Lösung, individuell auf Ihr Objekt abgestimmt.', 'scanpro-child' ),
          'refs'  => [
            'Überbauung Wyden, Winterthur',
            'Überbauung Altstattwiese, Wil',
            'Maison pro Familial, Delémont',
            'MFH Böndlerpark, Zürich',
            'MFH Margstrahler, Flums',
            'MFH Säntisstr. 14, Flawil',
            'Neubau Hof-Wagenburg, Seegräben',
            'DEFH Pflugsteinstrasse, Erlenbach',
            'Steingrube, Oberburg',
            'Theater Bahnhof Stadelhofen, Zürich',
            'Überbauung, Obere Frutt',
            'Villa Bassani, St. Moritz',
            'Skihütte Wintergarten, Oberurmein',
            'Hochhaus Rütistrasse 3A, Baden',
            'MFH Binzigerstrasse, Uetikon am See',
          ],
        ],

        // ————————————————————————————————————————————
        'oeffentlich' => [
          'title' => __( 'Öffentliche Gebäude, Schule, Universität etc.', 'scanpro-child' ),
          'img'   => 'https://azure-skunk-391096.hostingersite.com/wp-content/uploads/2026/09/scan-pro-lueftung-schule-universitaet-oeffentliche-gebaeude-schweiz.jpg-scaled.jpg',
          'desc'  => __( 'Nur mit genügend Sauerstoff in frischer Luft lässt sich gut studieren, regieren und trainieren. Das Be- und Entlüftungssystem Exhausto, auf jeden Bedarf individuell zugeschnitten, stellt dies sicher. Wir machen gerne einen Vorschlag für die Schritte zu Ihrer massgeschneiderten Lösung.', 'scanpro-child' ),
          'refs'  => [
            'Milizfeuerwehr Haggenstrasse, St. Gallen',
            'Milizfeuerwehr Espenmoosstrasse, St. Gallen',
            'Gymnasium Seefeld, Thun',
            'Stadthaus, Olten',
            'Rotenfluebahn',
            'Berner Fachhochschule Marzili, Bern',
            'SBB Rail City, Luzern',
            'Lyceum Kloster Einsiedeln',
            'Amtshaus Helvetiaplatz, Zürich',
            'Schulküche Tösstalstr., Winterthur',
            'Asylorganisation, Zürich',
            'Aufbahrungsraum, Zürich',
            'Kirche, Langnau',
            'Berufsschule, Zürich',
            'Bezirksgebäude, Kulm',
            'BLS Bahnhof, Ins',
            'Bundeshaus, Bern',
            'Pfarrheim, Rapperswil',
            'Collège des Foulets, La Chaux-de-Fonds',
            'Labor KAPO, St. Gallen',
            "Ecole d'Humanité, Hasliberg",
            'Feuerwehrmagazin, Herzogenbuchsee',
            'Gare CFF, Delémont',
            'Gemeindehaus, Zetziwil',
            'Gewerbeschule, Wattwil',
            'Gewerbl. Industr. Berufsschule, Bern',
            'Kant. Verwaltung, Zug',
            'Kath. Lehrerseminar St. Michael, Zug',
            'Kripo, Zürich',
            'Police cantonale, Sion',
            'SBB, Basel',
            'Tunnelbelüftung, Küssnacht',
            'SBB Verwaltungsgebäude, Zürich',
            'Schulhaus Kohlenberg, Basel',
            'Seepolizei Tiefenbrunnen, Zürich',
            'Sekundarschulhaus, Niederuzwil',
            'Swiss Jazz School, Bern',
            'Schulküche, Zufikon',
            'Strafanstalt, Lenzburg',
            'Busdepot Zofingen',
            'SBB 2000, Adlentunnel',
            'Bezirksgefängnis, Langnau',
            'Kunstgewerbeschule Luzern',
            'Ref. Kirche, Zug',
            'Historisches Museum, Luzern',
            'Kantonale Steuerverwaltung, Glarus',
            'RAV, Thun',
            'Autobahnwerkhof, Spiez',
            'TCS Stockenthal',
            'Scientology-Kirche, Zürich',
            'SSTH Tourismusschule, Passugg',
            'RAV, Bern',
            'Jungfraubahn, Interlaken',
            'Schulhaus Rittermatte, Biel',
            'Gemeindehaus, St. Moritz',
            'SBB, Urdorf',
            'Postgebäude, Baar',
            'Abtei St. Otmarsberg, Uznach',
            'Schulhaus Burgerau, Rapperswil',
            'Giessenpark, Bad Ragaz',
            'Berufsschule für Gestaltung, Zürich',
            'SBB, Luzern',
            'Musikschule am Damm, St. Gallen',
            'Touristcenter, Wengen',
            'WKS Wirtschaft- und Kaderschule, Bern',
            'Ev. Kirchgemeinde, Niederuzwil',
            'HTW Fachhochschule, Chur',
            'Tunnel Buchberg',
            'Kindergarten, Münsingen',
            'Bildungszentrum Zürich',
            'Elektrofachschule, St. Gallen',
            'BWS, Wetzikon',
            'Sonderpädagogische Tagesschule, Oberglatt',
            'Untersuchungsgefängnis Gmünden, Niederteufen',
          ],
        ],

        // ————————————————————————————————————————————
        'sport' => [
          'title' => __( 'Sportzentrum, Fitnessraum, Wellness, Yoga etc.', 'scanpro-child' ),
          'img'   => 'https://azure-skunk-391096.hostingersite.com/wp-content/uploads/2026/09/scan-pro-lueftung-sportzentrum-fitness-wellness-schweiz.jpg-scaled.jpg',
          'desc'  => __( 'Ob beim Training oder beim Ausspannen, beim Intensivsport oder beim Freizeitspass — die zweckdienliche Versorgung mit frischer Luft ist überall imperativ. Unsere Geräte mit den objektbezogenen Steuerungen sorgen dafür. Wir geben gerne nähere Auskunft.', 'scanpro-child' ),
          'refs'  => [
            'Sanapurna Ayurveda & Yoga, Zürich',
            'Golfclub Zuoz',
            'Bowling-Bahn, Langnau',
            'Cabaret Alpenrose, Niederurnen',
            'Centre équestre, Cheveney',
            "Centre sportif d'Ouvronnez",
            'Clubhaus FC Alpnach',
            'Eishalle Sagibach, Oberwichtrach',
            'Eissporthalle, Lyss',
            'FC Tägerwilen',
            'Sporthalle Oberei, Malters',
            'Freizeitzentrum Landauer, Bern',
            'Golfclub Schloss Goldenberg',
            'Golfpark Oberburg',
            'Gym-Room, Langenthal',
            'Halle de gymnastique, La Heutte',
            'Kunsteisbahn Dolder, Zürich',
            'Turnhalle, Hergiswil',
            'SAC, Kletterhalle Langnau i.E.',
            'Pistolenschützen, Sargans',
            'Ruderclub, Baden',
            'Schiessanlage, Thun',
            'Solbadhotel, Sigriswil',
            'Sportanlage Buchwiesen, Zürich',
            'Ballsporthalle Zollbrücke',
            'Clubhaus FC Allschwil',
            'Zentre de Sport Purtum, Zuoz',
            'Erweiterung Sportanlage Weiher Weggis',
            'Sportzentrum Kerenzerberg, Filzbach',
            'Rothbachzentrum Sportzentrum, Teufen',
            'Fussballgarderobe Lengg, Zürich',
            'Hallenbad Neubau Oltramare, Zürich',
            'Tennishalle, Affoltern a.A.',
            'Judo- und Jiu-Jitsuclub, Rorschach',
            'Kletterhalle St. Gallen',
            'Golfclub Breitenloo, Nürensdorf',
            'Tennisclub, Biel',
          ],
        ],

        // ————————————————————————————————————————————
        'industrie' => [
          'title' => __( 'Industrie/Gewerbe, Werkstatt, Büro etc.', 'scanpro-child' ),
          'img'   => 'https://azure-skunk-391096.hostingersite.com/wp-content/uploads/2026/09/scan-pro-lueftung-industrie-gewerbe-werkstatt-buero-schweiz.jpg.png',
          'desc'  => __( 'Computer und andere Maschinen in Büro und Werkstatt geben Wärme ab und sorgen, nicht nur im Sommer, für ein zu warmes Arbeitsklima. Unsere Be- und Entlüftungsgeräte mit Wärmerückgewinnung schaffen Abhilfe, helfen Energie sparen und machen das Werken zur Freude. Fragen Sie uns.', 'scanpro-child' ),
          'refs'  => [
            'Bäckerei Steiner, Wallisellen',
            'Bäckerei Steiner, Frauenfeld',
            'Botanica GmbH, Sins',
            'Florin AG, Muttenz',
            'Ferrowohlen AG, Wohlen',
            'Jysk, Ilanz',
            'Stanzwerk, Unterentfelden',
            'Victorinox Ibach/SZ',
            'Boegli Gravures, Marin',
            'Landi, Oberbüren',
            'Jysk, Muri',
            'Staplerhandel, Bonau',
            'Bäckerei Hug, Zürich',
            'Bank Armand von Ernst, Bern',
            'Bürohaus Kasernenstr. 7, Bern',
            'JOWA AG, Gossau',
            'CARITAS, Luzern',
            'Coop Super Center, Sarnen',
            'Crédit Suisse, Buchs',
            'DHL, Basel',
            'Coiffeursalon, Winterthur',
            'Coop Frenkendorf',
            'Migrosbetriebe, Basel',
            'Coop Center Bümpliz',
            'Dörig Fenster, Mörschwil',
            'Feldschlösschen, Rheinfelden',
            'Geschäftshaus Zentrum, Hochdorf',
            'Heberlein AG, Wattwil',
            'Helsana Versicherungen, Rapperswil',
            'Hiestand AG, Lupfig',
            'Löwen-Apotheke, Zürich',
            'Permapack, Rorschach',
            'Nestlé Konolfingen',
            'Crédit Suisse, Interlaken',
            'Gais-Center, Aarau',
            'Migros, Gossau',
            'Musterküche Bell AG',
            'Raiffeisenbank, Flawil',
            'Raiffeisenbank, Steffisburg',
            'Schwyzer Kantonalbank, Seewen',
            'Emmentalische Mobiliar',
            'Planzer Transport, Lyss',
            'RUAG Gebäude',
            'Cargo Umschlagcenter, Burgdorf',
            'Swisscom, St. Gallen',
            'Raiffeisenbank, Unterseen',
            'National Versicherung, Interlaken',
            'EMS Chemie, Chur',
            'Kieswerk, Pontresina',
            'Spar AG, St. Gallen',
            'Möbelhaus Natuzzi, St. Gallen',
            'AIG Privatbank, Zürich',
            'Micarna, Bazenheid',
            'Smart-Center, St. Gallen',
            'Distrelec, Greifensee',
            'Ticket Corner, Rümlang',
            'Theatersaal Albiville, Rapperswil',
            'Schubiger, St. Gallen',
            'Regloplas AG, St. Gallen',
            'Weinkellerei Reichling, Stäfa',
            'Gewerbebau Altgasse 44, Baar',
            'Spavetti AG, Kerzers',
          ],
        ],

      ];

      foreach ( $kategorien as $key => $kat ) : ?>

        <div class="ref-kategorie" data-category="<?php echo esc_attr( $key ); ?>">

          <!-- Split: descrição à esquerda, lista à direita -->
          <div class="ref-kategorie-header<?php echo empty( $kat['img'] ) ? ' ref-kategorie-header--no-img' : ''; ?>">
            <?php if ( ! empty( $kat['img'] ) ) : ?>
            <div class="ref-kategorie-img">
              <img
                src="<?php echo esc_url( $kat['img'] ); ?>"
                alt="<?php echo esc_attr( $kat['title'] ); ?>"
                loading="lazy"
              >
            </div>
            <?php endif; ?>
            <div class="ref-kategorie-text">
              <h2><?php echo esc_html( $kat['title'] ); ?></h2>
              <p><?php echo esc_html( $kat['desc'] ); ?></p>
            </div>
          </div>

          <!-- Lista de referências em grid -->
          <div class="ref-list-wrapper">
            <p class="ref-list-label">
              <?php _e( 'Auszug aus unserer Referenzliste:', 'scanpro-child' ); ?>
            </p>
            <ul class="ref-list">
              <?php foreach ( $kat['refs'] as $ref ) : ?>
                <li><?php echo esc_html( $ref ); ?></li>
              <?php endforeach; ?>
            </ul>
          </div>

        </div><!-- /ref-kategorie -->

      <?php endforeach; ?>

    </div>
  </section>

  <!-- CTA Final -->
  <section class="cta-section">
    <div class="container cta-content">
      <h2><?php _e( 'Werden Sie Teil unserer Referenzliste', 'scanpro-child' ); ?></h2>
      <p><?php _e( 'Kontaktieren Sie uns für eine individuelle Beratung und ein massgeschneidertes Angebot.', 'scanpro-child' ); ?></p>
      <a href="<?php echo esc_url( home_url( '/kontakt' ) ); ?>" class="btn btn-white">
        <?php _e( 'Kostenlose Offerte anfragen', 'scanpro-child' ); ?>
      </a>
    </div>
  </section>

</main>

<?php get_footer(); ?>
