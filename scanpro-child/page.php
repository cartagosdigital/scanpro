<?php
/**
 * Template para páginas internas genéricas — Scan Pro Child
 */

get_header();
?>

<main class="site-main" id="main" role="main">

  <!-- Banner claro com título e breadcrumb -->
  <section class="page-banner page-banner--light">
    <div class="container">
      <nav class="breadcrumb" aria-label="<?php _e( 'Brotkrümelnavigation', 'scanpro-child' ); ?>">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
          <?php _e( 'Startseite', 'scanpro-child' ); ?>
        </a>
        <span class="breadcrumb-sep" aria-hidden="true">›</span>
        <span aria-current="page"><?php the_title(); ?></span>
      </nav>
      <h1><?php the_title(); ?></h1>
    </div>
  </section>

  <!-- Conteúdo -->
  <div class="page-body">
    <div class="container">

      <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class( 'page-article' ); ?>>
          <div class="page-article-inner">
            <div class="page-content">
              <?php the_content(); ?>
            </div>
          </div>
        </article>

      <?php endwhile; ?>

    </div>
  </div>

</main>

<?php get_footer(); ?>
