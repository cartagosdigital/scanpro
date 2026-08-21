<?php
/**
 * Scan Pro Child Theme — functions.php
 *
 * NOTA: Para ativar alemão como idioma padrão do WordPress,
 * adicionar no wp-config.php:
 *   define('WPLANG', 'de_DE');
 *
 * Para adicionar francês depois:
 * 1. Instalar o plugin Polylang (gratuito)
 * 2. Em Polylang > Idiomas, adicionar DE e FR
 * 3. Duplicar as páginas e traduzir os conteúdos para FR
 * 4. Os textos dos templates PHP já usam __() e estarão prontos para tradução
 */

// Enfileirar estilos do tema pai + filho e scripts
add_action( 'wp_enqueue_scripts', function () {

    // Estilos do tema pai
    wp_enqueue_style(
        'hello-elementor-style',
        get_template_directory_uri() . '/style.css'
    );

    // Google Fonts
    wp_enqueue_style(
        'scanpro-fonts',
        'https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;700&family=Roboto+Slab:wght@400;600&family=Inter:wght@400;500;600&display=swap',
        [],
        null
    );

    // CSS principal do tema filho
    wp_enqueue_style(
        'scanpro-main',
        get_stylesheet_directory_uri() . '/assets/css/main.css',
        [ 'scanpro-fonts' ],
        '1.5.0'
    );

    // CSS do header
    wp_enqueue_style(
        'scanpro-header',
        get_stylesheet_directory_uri() . '/assets/css/header.css',
        [ 'scanpro-main' ],
        '2.6.0'
    );

    // CSS do footer
    wp_enqueue_style(
        'scanpro-footer',
        get_stylesheet_directory_uri() . '/assets/css/footer.css',
        [ 'scanpro-main' ],
        '1.1.0'
    );

    // CSS da home
    if ( is_front_page() ) {
        wp_enqueue_style(
            'scanpro-home',
            get_stylesheet_directory_uri() . '/assets/css/home.css',
            [ 'scanpro-main' ],
            '2.9.0'
        );
    }

    // CSS Einsatzbereiche — páginas de áreas de aplicação e seção da home
    wp_enqueue_style(
        'scanpro-einsatzbereiche',
        get_stylesheet_directory_uri() . '/assets/css/einsatzbereiche.css',
        [ 'scanpro-main' ],
        '1.6.1'
    );

    // CSS Wissen
    wp_enqueue_style(
        'scanpro-wissen',
        get_stylesheet_directory_uri() . '/assets/css/wissen.css',
        [ 'scanpro-main' ],
        '1.0.1'
    );

    // CSS Referenzen
    wp_enqueue_style(
        'scanpro-referenzen',
        get_stylesheet_directory_uri() . '/assets/css/referenzen.css',
        [ 'scanpro-main' ],
        '1.0.1'
    );

    // CSS do WooCommerce — carrega após os estilos do WooCommerce para garantir precedência
    if ( class_exists( 'WooCommerce' ) ) {
        wp_enqueue_style(
            'scanpro-woocommerce',
            get_stylesheet_directory_uri() . '/assets/css/woocommerce.css',
            [ 'scanpro-main', 'woocommerce-general', 'woocommerce-layout', 'woocommerce-smallscreen' ],
            '1.4.0'
        );
    }

    // Script principal
    wp_enqueue_script(
        'scanpro-main',
        get_stylesheet_directory_uri() . '/assets/js/main.js',
        [ 'jquery' ],
        '1.3.0',
        true
    );

    // Script de filtro de produtos (só na home)
    if ( is_front_page() ) {
        wp_enqueue_script(
            'scanpro-product-filter',
            get_stylesheet_directory_uri() . '/assets/js/product-filter.js',
            [ 'scanpro-main' ],
            '1.0.0',
            true
        );
    }
} );

// Configurações do tema e suporte a features
add_action( 'after_setup_theme', function () {

    // Carregar traduções do tema filho
    load_child_theme_textdomain(
        'scanpro-child',
        get_stylesheet_directory() . '/languages'
    );

    // Suporte a WooCommerce
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

    // Suporte a imagens em destaque
    add_theme_support( 'post-thumbnails' );

    // Suporte a menus de navegação
    register_nav_menus( [
        'primary' => __( 'Hauptmenü', 'scanpro-child' ),
        'footer'  => __( 'Fusszeile', 'scanpro-child' ),
    ] );
} );

// Remover o prefixo "Categoria:" dos títulos de arquivo WooCommerce
add_filter( 'woocommerce_page_title', function ( $title ) {
    return $title;
} );

// Fixar 3 colunas no loop de produtos
add_filter( 'loop_shop_columns', function () { return 3; } );

// Remover o breadcrumb padrão do WooCommerce (o template usa o nosso próprio)
add_action( 'init', function () {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
} );

// Produtos não são precificados no site — remover exibição de preço
// e do badge "em oferta" (percentual de desconto) no loop e no produto individual
add_action( 'init', function () {
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
    remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
    remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
} );

// Remover opções de ordenação por preço no dropdown da loja, já que não há preços
add_filter( 'woocommerce_catalog_orderby', function ( $options ) {
    unset( $options['price'], $options['price-desc'] );
    return $options;
} );
add_filter( 'woocommerce_default_catalog_orderby_options', function ( $options ) {
    unset( $options['price'], $options['price-desc'] );
    return $options;
} );

// Sidebar de navegação da seção Wissen
if ( ! function_exists( 'scanpro_wissen_sidebar' ) ) {
    function scanpro_wissen_sidebar() {
        $pages = [
            [ 'label' => 'CO₂',                      'slug' => 'wissen/co2' ],
            [ 'label' => 'FAQ',                       'slug' => 'wissen/faq' ],
            [ 'label' => 'Blog',                      'slug' => 'wissen/blog' ],
            [ 'label' => 'Regulierungen',             'slug' => 'wissen/regulierungen' ],
            [ 'label' => 'Regelung von Luftmengen',   'slug' => 'wissen/regelung-von-luftmengen' ],
        ];
        $current = get_page_uri();
        ?>
        <aside class="wissen-sidebar">
          <h4><?php _e( 'Wissen', 'scanpro-child' ); ?></h4>
          <ul class="wissen-nav">
            <?php foreach ( $pages as $p ) :
              $page   = get_page_by_path( $p['slug'] );
              $url    = $page ? get_permalink( $page->ID ) : '#';
              $active = ( $current === $p['slug'] ) ? 'active' : '';
            ?>
              <li class="<?php echo esc_attr( $active ); ?>">
                <a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $p['label'] ); ?></a>
              </li>
            <?php endforeach; ?>
          </ul>
        </aside>
        <?php
    }
}

// Função helper para gerar URLs de categorias de produto de forma consistente
if ( ! function_exists( 'scanpro_product_cat_url' ) ) {
    function scanpro_product_cat_url( string $slug ): string {
        return get_term_link( $slug, 'product_cat' ) ?: home_url( '/produktkategorie/' . $slug );
    }
}

// Conteúdo HTML das subpáginas Einsatzbereiche — detectado por slug
if ( ! function_exists( 'scanpro_get_einsatzbereich_content' ) ) {
    function scanpro_get_einsatzbereich_content( string $slug ): string {

        $contents = [];

        // — WOHNEN ————————————————————————————————————
        $contents['wohnen'] = '
<div class="eb-intro">
  <h2>' . __( 'Frische Luft, wo das Leben stattfindet', 'scanpro-child' ) . '</h2>
  <p>' . __( 'Ob Einfamilienhaus, Mehrfamilienhaus oder Wohnanlage — dort, wo Menschen wohnen, schlafen und leben, ist Luftqualität keine Nebensache. Viele Neubauten und energetisch sanierte Gebäude sind heute so dicht, dass eine natürliche Lüftung über Fenster und Ritzen kaum mehr möglich ist. Die Folge: erhöhte CO₂-Konzentrationen, Feuchtigkeit, Schimmelgefahr und ein spürbares Nachlassen von Komfort und Wohlbefinden.', 'scanpro-child' ) . '</p>
  <p>' . __( 'Eine kontrollierte Wohnraumlüftung sorgt dafür, dass verbrauchte Luft zuverlässig abgeführt und gleichzeitig frische Aussenluft zugeführt wird — und das energieeffizient, dank integrierter Wärmerückgewinnung. So bleibt Wärme im Gebäude, ohne auf Frischluft zu verzichten.', 'scanpro-child' ) . '</p>
</div>

<div class="eb-anforderungen">
  <h3>' . __( 'Technische Anforderungen an die Wohnraumlüftung', 'scanpro-child' ) . '</h3>
  <p>' . __( 'Ein normgerechtes Lüftungskonzept für Wohngebäude sollte folgende Zielwerte sicherstellen:', 'scanpro-child' ) . '</p>
  <ul class="eb-list">
    <li>' . __( 'CO₂-Konzentration im Mittelwert ≤ 1.000 ppm während der Nutzung', 'scanpro-child' ) . '</li>
    <li>' . __( 'Raumtemperatur 20 bis 26 °C', 'scanpro-child' ) . '</li>
    <li>' . __( 'Relative Luftfeuchte 30 bis 60 %', 'scanpro-child' ) . '</li>
    <li>' . __( 'Mittlere Luftgeschwindigkeit ≤ 0,15 m/s — kein Zugluftgefühl', 'scanpro-child' ) . '</li>
    <li>' . __( 'Schalldruckpegel ≤ 30 dB(A) in Schlaf- und Wohnräumen', 'scanpro-child' ) . '</li>
    <li>' . __( 'Wärmerückgewinnungsgrad ≥ 75 % gemäss SIA 382/1', 'scanpro-child' ) . '</li>
  </ul>
</div>

<div class="eb-loesung">
  <h3>' . __( 'Die Scan Pro Lösung für Wohngebäude', 'scanpro-child' ) . '</h3>
  <p>' . __( 'Mit unserem Sortiment an zentralen und dezentralen Lüftungsgeräten — unter anderem aus dem Hause Exhausto und Aldes — decken wir alle Anforderungen moderner Wohnraumlüftung ab. Unsere Geräte mit Gegenstrom- oder Rotationstauscher erreichen Wärmerückgewinnungsgrade von bis zu 95 % und arbeiten dabei ausgesprochen leise.', 'scanpro-child' ) . '</p>
  <p>' . __( 'Ob Neubau oder Sanierung, Einfamilienhaus oder grössere Überbauung — wir beraten Sie bei der Wahl des richtigen Systems und unterstützen Planer und Installateure mit technischen Unterlagen, Auslegungshilfen und direktem Fachsupport.', 'scanpro-child' ) . '</p>
</div>

<div class="eb-specs-grid">
  <div class="eb-spec-card">
    <h4>' . __( 'Volumenstrom', 'scanpro-child' ) . '</h4>
    <p>' . __( 'Aussenluftvolumenstrom ≥ 30 m³/h pro Person', 'scanpro-child' ) . '</p>
  </div>
  <div class="eb-spec-card">
    <h4>' . __( 'Schall', 'scanpro-child' ) . '</h4>
    <p>' . __( 'Schalldruckpegel ≤ 30 dB(A) in Schlafräumen', 'scanpro-child' ) . '</p>
  </div>
  <div class="eb-spec-card">
    <h4>' . __( 'Wärmerückgewinnung', 'scanpro-child' ) . '</h4>
    <p>' . __( 'Wirkungsgrad bis zu 95 % — Energie sparen ohne Komfortverlust', 'scanpro-child' ) . '</p>
  </div>
  <div class="eb-spec-card">
    <h4>' . __( 'Filter', 'scanpro-child' ) . '</h4>
    <p>' . __( 'Aussenluftfilter mindestens ePM1 50 % gemäss ISO 16890', 'scanpro-child' ) . '</p>
  </div>
  <div class="eb-spec-card">
    <h4>' . __( 'Regelung', 'scanpro-child' ) . '</h4>
    <p>' . __( 'Bedarfsorientierte Steuerung nach CO₂, Feuchte oder Präsenz', 'scanpro-child' ) . '</p>
  </div>
</div>';

        // — GEWERBE ————————————————————————————————————
        $contents['gewerbe'] = '
<div class="eb-intro">
  <h2>' . __( 'Raumklima, das Produktivität fördert', 'scanpro-child' ) . '</h2>
  <p>' . __( 'Wussten Sie, dass schlechte Raumluft die Leistungsfähigkeit von Mitarbeitenden um bis zu 15 % senken kann? In Büros, Verwaltungsgebäuden und Gewerbeflächen ist ein durchdachtes Lüftungskonzept daher keine Kostenstelle — sondern eine Investition in Produktivität, Gesundheit und Wohlbefinden.', 'scanpro-child' ) . '</p>
  <p>' . __( 'Moderne Bürogebäude stellen besondere Anforderungen an die Lüftungstechnik: Viele Personen auf engem Raum, hohe interne Wärmelasten durch Technik und Beleuchtung sowie immer dichtere Gebäudehüllen machen eine mechanische Be- und Entlüftung unumgänglich. Eine bedarfsgeregelte Anlage sorgt dafür, dass Frischluft genau dann zugeführt wird, wenn sie gebraucht wird — energieeffizient und ohne unnötige Geräusche.', 'scanpro-child' ) . '</p>
</div>

<div class="eb-anforderungen">
  <h3>' . __( 'Technische Anforderungen an die Büro- und Gewerbelüftung', 'scanpro-child' ) . '</h3>
  <p>' . __( 'Ein normgerechtes raumlufttechnisches Konzept sollte folgende Zielwerte sicherstellen:', 'scanpro-child' ) . '</p>
  <ul class="eb-list">
    <li>' . __( 'CO₂-Konzentration im Mittelwert ≤ 1.000 ppm über die Nutzungsdauer', 'scanpro-child' ) . '</li>
    <li>' . __( 'Raumtemperatur 20 bis 26 °C', 'scanpro-child' ) . '</li>
    <li>' . __( 'Relative Raumluftfeuchte 30 bis 60 %', 'scanpro-child' ) . '</li>
    <li>' . __( 'Mittlere Luftgeschwindigkeit ≤ 0,15 m/s', 'scanpro-child' ) . '</li>
    <li>' . __( 'Schalldruckpegel ≤ 35 dB(A) in Einzel- und Besprechungsräumen, ≤ 45 dB(A) in Grossraumbüros', 'scanpro-child' ) . '</li>
  </ul>
</div>

<div class="eb-loesung">
  <h3>' . __( 'Die Scan Pro Lösung für Gewerbe und Büros', 'scanpro-child' ) . '</h3>
  <p>' . __( 'Unser breites Sortiment an zentralen und semi-zentralen Lüftungsgeräten ermöglicht massgeschneiderte Lösungen für Bürogebäude jeder Grösse — vom Kleinbüro bis zum mehrgeschossigen Verwaltungsbau. Wärmerückgewinnung ist dabei selbstverständlich: Mit Wirkungsgraden von bis zu 95 % senken unsere Geräte die Betriebskosten spürbar.', 'scanpro-child' ) . '</p>
  <p>' . __( 'Fachplaner und Installateure unterstützen wir mit technischen Unterlagen, Auslegungsprogrammen und persönlicher Beratung — von der Konzeption bis zur Inbetriebnahme.', 'scanpro-child' ) . '</p>
</div>

<div class="eb-specs-grid">
  <div class="eb-spec-card">
    <h4>' . __( 'Volumenstrom', 'scanpro-child' ) . '</h4>
    <p>' . __( 'Aussenluftvolumenstrom > 25 m³/h pro Person im Raum', 'scanpro-child' ) . '</p>
  </div>
  <div class="eb-spec-card">
    <h4>' . __( 'Schall', 'scanpro-child' ) . '</h4>
    <p>' . __( 'Schallleistungspegel ≤ 35 dB(A) für Büro- und Besprechungsräume', 'scanpro-child' ) . '</p>
  </div>
  <div class="eb-spec-card">
    <h4>' . __( 'Energieeffizienz', 'scanpro-child' ) . '</h4>
    <p>' . __( 'Verpflichtender Einsatz von Wärmerückgewinnung gemäss SIA 382/1', 'scanpro-child' ) . '</p>
  </div>
  <div class="eb-spec-card">
    <h4>' . __( 'Filter', 'scanpro-child' ) . '</h4>
    <p>' . __( 'Aussenluftfilter mindestens ePM1 50 % gemäss ISO 16890', 'scanpro-child' ) . '</p>
  </div>
  <div class="eb-spec-card">
    <h4>' . __( 'Regelung', 'scanpro-child' ) . '</h4>
    <p>' . __( 'Bedarfsorientierte Einzelraumregelung nach CO₂ und Belegung', 'scanpro-child' ) . '</p>
  </div>
</div>';

        // — INDUSTRIE ————————————————————————————————————
        $contents['industrie'] = '
<div class="eb-intro">
  <h2>' . __( 'Lüftungstechnik für anspruchsvolle Umgebungen', 'scanpro-child' ) . '</h2>
  <p>' . __( 'In Produktionshallen, Werkstätten und Industriebetrieben entstehen täglich Herausforderungen, die gewöhnliche Lüftungsanlagen schnell an ihre Grenzen bringen: Wärme durch Maschinen und Prozesse, Staub, Dämpfe, Schadstoffe und ein hoher Personenverkehr verlangen nach robusten, leistungsstarken Lüftungslösungen.', 'scanpro-child' ) . '</p>
  <p>' . __( 'Eine durchdachte Industrielüftung schützt die Gesundheit der Mitarbeitenden, verlängert die Lebensdauer von Maschinen und Gebäudestrukturen und hilft, Energiekosten durch intelligente Wärmerückgewinnung zu senken. Dabei muss sie den rauen Bedingungen des industriellen Alltags standhalten — zuverlässig, wartungsarm und effizient.', 'scanpro-child' ) . '</p>
</div>

<div class="eb-anforderungen">
  <h3>' . __( 'Technische Anforderungen an die Industrielüftung', 'scanpro-child' ) . '</h3>
  <p>' . __( 'Die Auslegung richtet sich nach den spezifischen Prozessen und Emissionen im Betrieb. Folgende Richtwerte gelten als Grundlage:', 'scanpro-child' ) . '</p>
  <ul class="eb-list">
    <li>' . __( 'Ausreichende Abfuhr von Wärme, Feuchtigkeit, Staub und prozessbedingten Schadstoffen', 'scanpro-child' ) . '</li>
    <li>' . __( 'Raumtemperatur in Arbeitsbereichen: mindestens 15 °C, maximal 26 °C', 'scanpro-child' ) . '</li>
    <li>' . __( 'CO₂-Konzentration ≤ 1.000 ppm in dauerhaft besetzten Zonen', 'scanpro-child' ) . '</li>
    <li>' . __( 'Filterklasse je nach Prozess und Schadstoffart: mindestens ePM10 50 %', 'scanpro-child' ) . '</li>
    <li>' . __( 'Schalldruckpegel nach Arbeitsschutzanforderungen, je nach Nutzungszone', 'scanpro-child' ) . '</li>
    <li>' . __( 'Wärmerückgewinnung wo prozessbedingt möglich — Einsparungen bis zu 80 %', 'scanpro-child' ) . '</li>
  </ul>
</div>

<div class="eb-loesung">
  <h3>' . __( 'Die Scan Pro Lösung für Industrie und Gewerbe', 'scanpro-child' ) . '</h3>
  <p>' . __( 'Wir liefern leistungsstarke Ventilatoren, Dachventilatoren, Abluftsysteme und komplette raumlufttechnische Anlagen, die auch unter industriellen Bedingungen zuverlässig funktionieren. Unser Sortiment umfasst Geräte für die direkte Prozessabluft ebenso wie bedarfsgeregelte Gesamtlösungen für grosse Hallenflächen.', 'scanpro-child' ) . '</p>
  <p>' . __( 'Dank unserer langjährigen Erfahrung in der Schweizer Industrie kennen wir die besonderen Anforderungen verschiedener Branchen — von der Lebensmittelverarbeitung über den Maschinenbau bis zur Werkstatt. Wir entwickeln individuelle Lösungsansätze und stehen Planern sowie Betreibern als technischer Partner zur Seite.', 'scanpro-child' ) . '</p>
</div>

<div class="eb-specs-grid">
  <div class="eb-spec-card">
    <h4>' . __( 'Volumenstrom', 'scanpro-child' ) . '</h4>
    <p>' . __( 'Individuell nach Prozess, Hallengrösse und Personenbelegung', 'scanpro-child' ) . '</p>
  </div>
  <div class="eb-spec-card">
    <h4>' . __( 'Robustheit', 'scanpro-child' ) . '</h4>
    <p>' . __( 'Geräte für hohe Betriebsstunden, Staub und aggressive Umgebungen', 'scanpro-child' ) . '</p>
  </div>
  <div class="eb-spec-card">
    <h4>' . __( 'Wärmerückgewinnung', 'scanpro-child' ) . '</h4>
    <p>' . __( 'Nutzung von Prozesswärme zur Senkung der Heizkosten', 'scanpro-child' ) . '</p>
  </div>
  <div class="eb-spec-card">
    <h4>' . __( 'Filter', 'scanpro-child' ) . '</h4>
    <p>' . __( 'Filterklasse je nach Schadstoff und Prozessanforderung wählbar', 'scanpro-child' ) . '</p>
  </div>
  <div class="eb-spec-card">
    <h4>' . __( 'Regelung', 'scanpro-child' ) . '</h4>
    <p>' . __( 'Bedarfsgerechte Steuerung nach Belegung, Temperatur und Schadstoffbelastung', 'scanpro-child' ) . '</p>
  </div>
</div>';

        // — BILDUNGSEINRICHTUNGEN ————————————————————————————————————
        $contents['bildungseinrichtungen'] = '
<div class="eb-intro">
  <h2>' . __( 'Gute Luft ist die Grundlage für gutes Lernen', 'scanpro-child' ) . '</h2>
  <p>' . __( 'Klassenräume, Kitas, Aulas und Hochschulgebäude sind Orte, an denen sich viele Menschen auf engem Raum aufhalten. Ohne ausreichenden Luftwechsel steigt der CO₂-Gehalt rasch auf Werte, die Konzentration, Merkfähigkeit und Wohlbefinden spürbar beeinträchtigen. Studien belegen: Ab 1.000 ppm sinkt die kognitive Leistungsfähigkeit messbar.', 'scanpro-child' ) . '</p>
  <p>' . __( 'Gleichzeitig stellen Bildungseinrichtungen besondere Anforderungen an Lärm und Energieeffizienz: Lüftungsgeräte müssen im Unterrichtsbetrieb leise arbeiten, bedarfsgerecht reagieren und in Sanierungen wie Neubauten gleichermassen integrierbar sein. Fensterlüftung allein — abhängig von Aussentemperatur, Lärm und Wetter — reicht dafür längst nicht mehr aus.', 'scanpro-child' ) . '</p>
</div>

<div class="eb-anforderungen">
  <h3>' . __( 'Technische Anforderungen an die Schul- und Kitaslüftung', 'scanpro-child' ) . '</h3>
  <p>' . __( 'Die Auslegung richtet sich nach DIN EN 16798 sowie den schweizerischen Normen SIA 382/1 und SWKI VA104-01. Folgende Zielwerte gelten als massgeblich:', 'scanpro-child' ) . '</p>
  <ul class="eb-list">
    <li>' . __( 'CO₂-Mittelwert ≤ 1.000 ppm während der Nutzungszeit', 'scanpro-child' ) . '</li>
    <li>' . __( 'Raumtemperatur 20 bis 26 °C', 'scanpro-child' ) . '</li>
    <li>' . __( 'Relative Luftfeuchte 30 bis 60 %', 'scanpro-child' ) . '</li>
    <li>' . __( 'Mittlere Luftgeschwindigkeit ≤ 0,15 m/s — kein störendes Zugluftgefühl', 'scanpro-child' ) . '</li>
    <li>' . __( 'Schalldruckpegel ≤ 35 dB(A) in Unterrichtsräumen, ≤ 40 dB(A) in Sporthallen', 'scanpro-child' ) . '</li>
    <li>' . __( 'Aussenluftvolumenstrom > 25 m³/h pro Person', 'scanpro-child' ) . '</li>
  </ul>
</div>

<div class="eb-loesung">
  <h3>' . __( 'Die Scan Pro Lösung für Schulen und Bildungsbauten', 'scanpro-child' ) . '</h3>
  <p>' . __( 'Wir bieten zentrale, semi-zentrale und dezentrale Lüftungslösungen für alle Bereiche einer Bildungseinrichtung — vom Klassenraum über die Mensa bis zur Sporthalle und den Sanitärbereichen. Unsere Geräte mit hocheffizienter Wärmerückgewinnung arbeiten leise, zuverlässig und lassen sich bedarfsgerecht nach CO₂, Belegung oder Zeitprogramm steuern.', 'scanpro-child' ) . '</p>
  <p>' . __( 'Für Neubauten wie für Sanierungen stehen verschiedene Systemvarianten zur Verfügung. Planern stellen wir technische Unterlagen, Auslegungshilfen und Produktdatenblätter zur Verfügung — und beraten Sie gerne direkt bei der Systemwahl.', 'scanpro-child' ) . '</p>
</div>

<div class="eb-specs-grid">
  <div class="eb-spec-card">
    <h4>' . __( 'Volumenstrom', 'scanpro-child' ) . '</h4>
    <p>' . __( 'Aussenluftvolumenstrom > 25 m³/h pro Person im Raum', 'scanpro-child' ) . '</p>
  </div>
  <div class="eb-spec-card">
    <h4>' . __( 'Schall', 'scanpro-child' ) . '</h4>
    <p>' . __( '≤ 35 dB(A) in Unterrichtsräumen, ≤ 40 dB(A) in Sporthallen', 'scanpro-child' ) . '</p>
  </div>
  <div class="eb-spec-card">
    <h4>' . __( 'Energieeffizienz', 'scanpro-child' ) . '</h4>
    <p>' . __( 'Wärmerückgewinnung verpflichtend — Wirkungsgrad bis zu 95 %', 'scanpro-child' ) . '</p>
  </div>
  <div class="eb-spec-card">
    <h4>' . __( 'Filter', 'scanpro-child' ) . '</h4>
    <p>' . __( 'Aussenluftfilter mindestens ePM1 50 % gemäss ISO 16890', 'scanpro-child' ) . '</p>
  </div>
  <div class="eb-spec-card">
    <h4>' . __( 'Regelung', 'scanpro-child' ) . '</h4>
    <p>' . __( 'Bedarfsorientierte Einzelraumregelung nach CO₂, Feuchte oder Belegungsplan', 'scanpro-child' ) . '</p>
  </div>
</div>';

        // — GASTRONOMIE ————————————————————————————————————
        $contents['gastronomie'] = '
<div class="eb-intro">
  <h2>' . __( 'Küche und Gastraum — zwei Anforderungen, eine Lösung', 'scanpro-child' ) . '</h2>
  <p>' . __( 'Wer in einer professionellen Küche arbeitet, weiss: Wenn mehrere Herdplatten laufen und der Ofen auf Hochtouren ist, verwandelt sich der Raum schnell in ein unangenehmes Arbeitsumfeld aus Hitze, Gerüchen und Wasserdampf. Was in der Küche entsteht, darf den Gastraum nicht erreichen — und doch liegen beide oft nur wenige Meter voneinander entfernt.', 'scanpro-child' ) . '</p>
  <p>' . __( 'Die Gastronomie steht täglich vor dieser doppelten Herausforderung: In der Küche braucht es eine leistungsstarke Ablufttechnik, die Hitze, Fett und Gerüche effektiv abführt. Im Gastraum hingegen sollen die Gäste bei angenehmer Temperatur und frischer Luft entspannen — unabhängig davon, wie viele Personen sich im Raum befinden. Eine optimal ausgelegte Lüftungsanlage schafft diese Balance und wird damit zu einem entscheidenden Faktor für Ihren Betriebserfolg.', 'scanpro-child' ) . '</p>
</div>

<div class="eb-anforderungen">
  <h3>' . __( 'Technische Anforderungen — Küche und Gastraum', 'scanpro-child' ) . '</h3>

  <h4>' . __( 'Anforderungen für die Küche', 'scanpro-child' ) . '</h4>
  <ul class="eb-list">
    <li>' . __( 'Wirksame Abfuhr von Feuchtigkeit, Wärme, Fett und Verbrennungsprodukten', 'scanpro-child' ) . '</li>
    <li>' . __( 'Raumtemperatur mindestens 18 °C, maximal 26 °C', 'scanpro-child' ) . '</li>
    <li>' . __( 'Relative Luftfeuchte in der Aufenthaltszone: 55 bis 80 %', 'scanpro-child' ) . '</li>
    <li>' . __( 'Aussenluft darf die Lebensmittelqualität nicht beeinträchtigen', 'scanpro-child' ) . '</li>
    <li>' . __( 'Schalldruckpegel ≤ 60 dB(A)', 'scanpro-child' ) . '</li>
  </ul>

  <h4 style="margin-top: 24px;">' . __( 'Anforderungen für den Gastraum', 'scanpro-child' ) . '</h4>
  <ul class="eb-list">
    <li>' . __( 'CO₂-Konzentration im Mittelwert ≤ 1.000 ppm', 'scanpro-child' ) . '</li>
    <li>' . __( 'Raumtemperatur 20 bis 26 °C', 'scanpro-child' ) . '</li>
    <li>' . __( 'Relative Luftfeuchte 30 bis 60 %', 'scanpro-child' ) . '</li>
    <li>' . __( 'Mittlere Luftgeschwindigkeit ≤ 0,15 m/s — kein Zugluftgefühl für Gäste', 'scanpro-child' ) . '</li>
    <li>' . __( 'Schalldruckpegel ≤ 50 dB(A)', 'scanpro-child' ) . '</li>
  </ul>
</div>

<div class="eb-loesung">
  <h3>' . __( 'Die Scan Pro Lösung für die Gastronomie', 'scanpro-child' ) . '</h3>
  <p>' . __( 'Mit unserem Sortiment aus leistungsstarken Küchenabluftgeräten, zentralen Lüftungsanlagen und bedarfsgeregelten Systemen für den Gastraum bieten wir Ihnen aufeinander abgestimmte Gesamtlösungen. Wärmerückgewinnung ist dabei auch in der Gastronomie wirtschaftlich sinnvoll — besonders bei langen Betriebszeiten.', 'scanpro-child' ) . '</p>
  <p>' . __( 'Unsere Fachkompetenz und die Produkttiefe unserer Partner Exhausto, exodraft und Aldes ermöglichen es uns, individuelle Konzepte für Restaurant, Bar, Betriebskantine oder Hotelküche zu entwickeln. Wir unterstützen Sie von der Planung bis zur Inbetriebnahme.', 'scanpro-child' ) . '</p>
</div>

<div class="eb-specs-grid">
  <div class="eb-spec-card">
    <h4>' . __( 'Volumenstrom', 'scanpro-child' ) . '</h4>
    <p>' . __( 'Aussenluftvolumenstrom > 25 m³/h pro Person im Gastraum', 'scanpro-child' ) . '</p>
  </div>
  <div class="eb-spec-card">
    <h4>' . __( 'Schall', 'scanpro-child' ) . '</h4>
    <p>' . __( '≤ 60 dB(A) Küche / ≤ 50 dB(A) Gastraum', 'scanpro-child' ) . '</p>
  </div>
  <div class="eb-spec-card">
    <h4>' . __( 'Energieeffizienz', 'scanpro-child' ) . '</h4>
    <p>' . __( 'Wärmerückgewinnung empfohlen — wirtschaftlich ab 8h Betrieb/Tag', 'scanpro-child' ) . '</p>
  </div>
  <div class="eb-spec-card">
    <h4>' . __( 'Filter', 'scanpro-child' ) . '</h4>
    <p>' . __( 'Fettfilter in der Küche, Aussenluftfilter ePM1 50 % im Gastraum', 'scanpro-child' ) . '</p>
  </div>
  <div class="eb-spec-card">
    <h4>' . __( 'Regelung', 'scanpro-child' ) . '</h4>
    <p>' . __( 'Bedarfsgerechte Steuerung nach CO₂, Personenzahl und Betriebszeiten', 'scanpro-child' ) . '</p>
  </div>
</div>';

        $html = isset( $contents[ $slug ] ) ? $contents[ $slug ] : '<p>' . __( 'Inhalt folgt in Kürze.', 'scanpro-child' ) . '</p>';

        return '<div class="eb-content">' . $html . '</div>';
    }
}
