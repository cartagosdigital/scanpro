<?php
/**
 * Template Name: Wissen — Blog
 */
get_header();
?>
<main class="wissen-main" id="main" role="main">

  <section class="page-hero">
    <div class="container">
<span class="section-label"><?php _e( 'WISSEN', 'scanpro-child' ); ?></span>
      <h1><?php _e( 'Blog & Aktuelles', 'scanpro-child' ); ?></h1>
      <p><?php _e( 'Fachartikel, Neuigkeiten und Praxistipps aus der Welt der Lüftungstechnik.', 'scanpro-child' ); ?></p>
    </div>
  </section>

  <section class="wissen-content-section">
    <div class="container">
      <div class="wissen-content-grid">

        <div class="wissen-text">

          <?php
          $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
          $args  = [
            'post_type'      => 'post',
            'posts_per_page' => 9,
            'paged'          => $paged,
            'post_status'    => 'publish',
          ];
          $blog = new WP_Query( $args );
          ?>

          <?php if ( $blog->have_posts() ) : ?>
            <div class="blog-grid">
              <?php while ( $blog->have_posts() ) : $blog->the_post(); ?>
                <article class="blog-card">
                  <?php if ( has_post_thumbnail() ) : ?>
                    <a href="<?php the_permalink(); ?>" class="blog-card-img">
                      <?php the_post_thumbnail( 'medium_large' ); ?>
                    </a>
                  <?php else : ?>
                    <div class="blog-card-img blog-card-img-placeholder"></div>
                  <?php endif; ?>
                  <div class="blog-card-body">
                    <span class="blog-card-date"><?php echo get_the_date( 'd.m.Y' ); ?></span>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
                    <a href="<?php the_permalink(); ?>" class="blog-card-link">
                      <?php _e( 'Weiterlesen →', 'scanpro-child' ); ?>
                    </a>
                  </div>
                </article>
              <?php endwhile; ?>
            </div>

            <div class="blog-pagination">
              <?php echo paginate_links( [
                'total'     => $blog->max_num_pages,
                'current'   => $paged,
                'prev_text' => '← ' . __( 'Zurück', 'scanpro-child' ),
                'next_text' => __( 'Weiter', 'scanpro-child' ) . ' →',
              ] ); ?>
            </div>

          <?php else : ?>
            <p class="blog-empty">
              <?php _e( 'Noch keine Beiträge vorhanden. Schauen Sie bald wieder vorbei.', 'scanpro-child' ); ?>
            </p>
          <?php endif;
          wp_reset_postdata(); ?>

        </div>

        <?php scanpro_wissen_sidebar(); ?>

      </div>
    </div>
  </section>

</main>
<?php get_footer(); ?>
