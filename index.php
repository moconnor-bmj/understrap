<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

  get_header();

  $container = get_theme_mod('understrap_container_type');

  $sidebar_pos = get_theme_mod('understrap_sidebar_position');

  if ( is_front_page() && is_home() ) {
    get_sidebar('hero');

    get_sidebar('statichero');
  } else {
    // Do nothing...or?
  }
?>

<div class="wrapper" id="wrapper-index">

  <div class="<?php echo $container?>" id="content">

    <div class="row">

      <!-- Do the left sidebar check and opens the primary div -->
      <?php get_template_part( 'global-templates/left-sidebar-check', 'none' ); ?>

        <main class="site-main" id="main" role="main">

          <?php if ( have_posts() ) : ?>

            <?php /* Start the Loop */ ?>

            <?php while ( have_posts() ) : the_post(); ?>

              <?php
                /* Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part( 'loop-templates/content', get_post_format() );
              ?>

            <?php endwhile; ?>

            <?php the_posts_navigation(); ?>

          <?php else : ?>

            <?php get_template_part( 'loop-templates/content', 'none' ); ?>

          <?php endif; ?>

        </main><!-- #main -->

      </div><!-- #primary -->

      <!-- Do the right sidebar check -->
      <?php if ( 'right' === $sidebar_pos || 'both' === $sidebar_pos ): ?>
      
        <?php get_sidebar( 'right' ); ?>
      
      <?php endif; ?>

    </div><!-- .row -->

  </div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
