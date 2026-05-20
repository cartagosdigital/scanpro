<?php
/**
 * Template para páginas internas genéricas — Scan Pro Child
 */

get_header();
?>

<main class="site-main page-main" id="main" role="main">
  <div class="container">

    <?php while ( have_posts() ) : the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class( 'page-article' ); ?>>

        <!-- Cabeçalho da página -->
        <header class="page-header">
          <h1 class="page-title"><?php the_title(); ?></h1>
        </header>

        <!-- Conteúdo da página (gerenciado pelo Elementor ou editor do WP) -->
        <div class="page-content">
          <?php the_content(); ?>
        </div>

      </article>

    <?php endwhile; ?>

  </div>
</main>

<?php get_footer(); ?>
