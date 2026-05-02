<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
   
	<!-- Google Analytics Begins - Global site tag -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-J46F6TCMGV"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-J46F6TCMGV');
    </script> 
    <!-- Google Analytics Ends -->
	
	<?php wp_head(); ?>
	
	<script>
		function updateXNVSupply() {
		  fetch('https://api.nerva.one/daemon/explorer/index.php?endpoint=get_generated_coins')
			.then(r => r.text())
			.then(function(data) {
			  var supply = parseFloat(data).toLocaleString('en-US', {
				minimumFractionDigits: 0,
				maximumFractionDigits: 0
			  });
			  document.getElementById('xnv-supply').innerText = supply;
			})
			.catch(function() {
			  document.getElementById('xnv-supply').innerText = '19.19 million XNV (Apr 2026)';
			});
		}

		updateXNVSupply();
		setInterval(updateXNVSupply, 60000); // refreshes every 60 seconds
	</script>
</head>

<body <?php body_class(); ?>>

<?php 

    // WordPress 5.2 wp_body_open implementation
    if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
    } else {
        do_action( 'wp_body_open' );
    }

?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-bootstrap-starter' ); ?></a>
    
	<?php // if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
	
		<header id="masthead" class="site-header nav-menu fixed-top <?php echo wp_bootstrap_starter_bg_class(); ?>" role="banner">
			<div class="container">
				<nav class="navbar navbar-dark navbar-expand-xl">
					<div class="navbar-brand">
						<a href="<?php echo esc_url( home_url( '/' )); ?>">
							<img class="img-fluid nerva-logo-icon-white" alt="cpu-mining" src="<?php echo get_template_directory_uri() . '/images/png-nerva-logo-white-256x256.png'; ?>">
							<img src="<?php echo get_template_directory_uri() . '/images/logo.png'; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
						</a>
					</div>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<?php // Hardcoded bec. it'ss not possible to set id like #blog to the wp menu without https in front of it ?>
					<div id="main-nav" class="collapse navbar-collapse justify-content-start">
						<ul id="menu-top-menu" class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link active" href="<?php if ( is_front_page() && is_home() ) { echo '#home'; } else { echo esc_url( home_url( '/#home' )); } ?>">HOME <span class="sr-only">(current)</span></a>
							</li>							
							<li class="menu-item nav-item">
								<a class="nav-link" href="<?php if ( is_front_page() && is_home() ) { echo '#features'; } else { echo esc_url( home_url( '/#features' )); } ?>">FEATURES</a>
							</li>
							<li class="menu-item nav-item">
								<a class="nav-link" href="<?php if ( is_front_page() && is_home() ) { echo '#our-mission'; } else { echo esc_url( home_url( '/#our-mission' )); } ?>">MISSION</a>
							</li>
							<li class="menu-item nav-item">
								<a class="nav-link" href="<?php if ( is_front_page() && is_home() ) { echo '#roadmap'; } else { echo esc_url( home_url( '/#roadmap' )); } ?>">ROADMAP</a>
							</li>                                
							<li class="menu-item nav-item">
								<a class="nav-link" href="<?php if ( is_front_page() && is_home() ) { echo '#exchanges'; } else { echo esc_url( home_url( '/#exchanges' )); } ?>">TRADE</a>
							</li>
							<li class="menu-item nav-item">
								<a class="nav-link" href="<?php if ( is_front_page() && is_home() ) { echo '#downloads'; } else { echo esc_url( home_url( '/#downloads' )); } ?>" >DOWNLOADS</a>
							</li>
							<li class="menu-item nav-item">
								<a class="nav-link" href="<?php if ( is_front_page() && is_home() ) { echo '#mining'; } else { echo esc_url( home_url( '/#mining' )); } ?>">MINE</a>
							</li>                                         
							<li class="menu-item nav-item">
								<a class="nav-link" href="<?php if ( is_front_page() && is_home() ) { echo '#blog'; } else { echo esc_url( home_url( '/#blog' )); } ?>">BLOG</a>
							</li>
							
							<li class="menu-item menu-item-has-children dropdown nav-item">
							<a href="#moredd" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link">RESOURCES</a>
								<ul class="dropdown-menu" aria-labelledby="menu-item-dropdown-31269" role="menu">
									<li class="menu-item nav-item">
										<?php // No if else for href needed because of absolute urls ?>
										<a class="dropdown-item" href="https://docs.nerva.one" target="_blank">WIKI</a>
									</li>
									<li class="menu-item nav-item">
										<?php // No if else for href needed because of absolute urls ?>
										<a class="dropdown-item" href="https://explorer.nerva.one" target="_blank">EXPLORER</a>
									</li>
									<li class="menu-item nav-item">
										<?php // No if else for href needed because of absolute urls ?>
										<a class="dropdown-item" href="https://map.nerva.one" target="_blank">NODEMAP</a>
									</li>
									<li class="menu-item nav-item">
										<?php // No if else for href needed because of absolute urls ?>
										<a class="dropdown-item" href="https://nerva.one/nerva-mining-profitability-calculator/" target="_blank">CALCULATOR</a>
									</li>
								</ul>
							</li>							
						</ul>
					</div>
					
					<!-- Check it out menu is located under Appearance > Menus -->


					<?php
					wp_nav_menu(array(
					'theme_location'    => 'primary',
					'container'       => 'div',
					'container_id'    => 'main-nav',
					'container_class' => 'collapse navbar-collapse justify-content-end',
					'menu_id'         => false,
					'menu_class'      => 'navbar-nav',
					'depth'           => 3,
					'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
					'walker'          => new wp_bootstrap_navwalker()
					));
					?>

				</nav>
			</div>
		</header><!-- #masthead -->

	<?php // endif; ?>