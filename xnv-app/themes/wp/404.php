<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://developer.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

        <div id="content" class="site-content">
                <div class="container">
                        <div class="row justify-content-center">

        <section id="primary" class="content-area col-12 col-lg-8">
                <div id="main" class="site-main" role="main">

                        <section class="error-404 not-found text-center">
                                <div class="nv-404-code" aria-hidden="true">404</div>
                                <header class="page-header">
                                        <h1 class="page-title"><?php esc_html_e( 'Block not found.', 'wp-bootstrap-starter' ); ?></h1>
                                </header><!-- .page-header -->

                                <div class="page-content">
                                        <p class="nv-lead" style="margin:0 auto 2rem;">
                                                <?php esc_html_e( 'This page spent its outputs and can&rsquo;t be found on chain. Maybe try a search, or head back to the homepage.', 'wp-bootstrap-starter' ); ?>
                                        </p>

                                        <div class="d-flex flex-wrap justify-content-center mb-4">
                                                <a class="btn btn-primary mr-2 mb-2" href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="fas fa-home" aria-hidden="true"></span>&nbsp; Back to home</a>
                                                <a class="btn btn-ghost mb-2" href="https://docs.nerva.one" target="_blank" rel="noopener"><span class="fas fa-book" aria-hidden="true"></span>&nbsp; Read the docs</a>
                                        </div>

                                        <?php get_search_form(); ?>

                                </div><!-- .page-content -->
                        </section><!-- .error-404 -->

                </div><!-- #main -->
        </section><!-- #primary -->

<?php
get_footer();
