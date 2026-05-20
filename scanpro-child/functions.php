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
        '1.0.0'
    );

    // CSS do header
    wp_enqueue_style(
        'scanpro-header',
        get_stylesheet_directory_uri() . '/assets/css/header.css',
        [ 'scanpro-main' ],
        '1.0.0'
    );

    // CSS do footer
    wp_enqueue_style(
        'scanpro-footer',
        get_stylesheet_directory_uri() . '/assets/css/footer.css',
        [ 'scanpro-main' ],
        '1.0.0'
    );

    // CSS da home
    if ( is_front_page() ) {
        wp_enqueue_style(
            'scanpro-home',
            get_stylesheet_directory_uri() . '/assets/css/home.css',
            [ 'scanpro-main' ],
            '1.0.0'
        );
    }

    // CSS do WooCommerce — carrega após os estilos do WooCommerce para garantir precedência
    if ( class_exists( 'WooCommerce' ) ) {
        wp_enqueue_style(
            'scanpro-woocommerce',
            get_stylesheet_directory_uri() . '/assets/css/woocommerce.css',
            [ 'scanpro-main', 'woocommerce-general', 'woocommerce-layout', 'woocommerce-smallscreen' ],
            '1.0.2'
        );
    }

    // Script principal
    wp_enqueue_script(
        'scanpro-main',
        get_stylesheet_directory_uri() . '/assets/js/main.js',
        [ 'jquery' ],
        '1.0.0',
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

// Função helper para gerar URLs de categorias de produto de forma consistente
if ( ! function_exists( 'scanpro_product_cat_url' ) ) {
    function scanpro_product_cat_url( string $slug ): string {
        return get_term_link( $slug, 'product_cat' ) ?: home_url( '/produktkategorie/' . $slug );
    }
}
