<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

	get_header();

	// include file where urls for download section are defined
	include_once('define-download-urls.php');


	// Only echo if Mainpage is NOT paged like https://nerva.one/page/2/
	if ( is_paged() ) {
	
		// something
	
	} else {		
		 // Include old html Nerva website
		 include_once('index-nerva-html.php');
	}
	
?>



    <?php if(is_front_page() && !get_theme_mod( 'header_banner_visibility' )) { ?>
        
		<div id="page-sub-header" <?php if(has_header_image()) { ?>style="background-image: url('<?php header_image(); ?>');" <?php } ?>>
            <div id="blog" class="container">
                <h2>
                    <?php
                    if(get_theme_mod( 'header_banner_title_setting' )){
                        echo esc_attr( get_theme_mod( 'header_banner_title_setting' ) );
                    } else {
                        echo 'The Nerva Project';
                    }
                    ?>
                </h2>
                <p>
                    <?php
                    if(get_theme_mod( 'header_banner_tagline_setting' )){
                        echo esc_attr( get_theme_mod( 'header_banner_tagline_setting' ) );
					} else {
                        echo esc_html__('To customize the contents of this header banner and other elements of your site, go to Dashboard > Appearance > Customize','wp-bootstrap-starter');
                    }
                    ?>
                </p>
                <a href="#content" class="page-scroller"><i class="fa fa-fw fa-angle-down"></i></a>
            </div>
        </div>
		
		<?php } else { ?>
		
			<div id="page-sub-header">
				<div id="blog" class="container">
					<h2>
						The Nerva Project Blog
					</h2>
					<p>Dive in into the Crypto Sphere</p>
					<a href="#content" class="page-scroller"><i class="fa fa-fw fa-angle-down"></i></a>
				</div>
			</div>
			
		<?php }  ?>
	
	
	<div id="content" class="site-content">
		<div class="container">
			<div class="row">
                
								

	<section class="content-area col-sm-12 col-md-12 col-lg-8">
		<div id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</div><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
