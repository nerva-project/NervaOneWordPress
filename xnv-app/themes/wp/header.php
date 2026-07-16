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
    <script>(function(){var s=localStorage.getItem('nerva-theme'),p=window.matchMedia&&window.matchMedia('(prefers-color-scheme: dark)').matches;if(s==='dark'||(s===null&&p)){document.documentElement.classList.add('dark-mode');}})();</script>
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
	
		<!-- HF13 Notice - Comment out after block 4320000 -->
		<div id="hf13-notice" style="display:none; position:fixed; top:0; left:0; right:0; background:linear-gradient(135deg,#6e45e2 0%,#88d3ce 100%); color:#fff; padding:10px 50px 10px 20px; text-align:center; z-index:10000; font-size:15px; line-height:1.4;">
			<strong>Hard Fork 13 incoming!</strong>
			Activates at block <strong>4,320,000</strong> &mdash;
			<span id="hf13-remaining">calculating...</span> remaining &mdash;
			<a href="https://nerva.one/nerva-v0-3-0-0-legacy-remade-our-first-hard-fork-in-years-is-here/" style="color:#fff; text-decoration:underline;" target="_blank">Read more &rarr;</a>
			<button id="hf13-close" style="position:absolute; right:12px; top:50%; transform:translateY(-50%); background:transparent; border:none; color:#fff; font-size:22px; line-height:1; cursor:pointer;" aria-label="Dismiss">&times;</button>
		</div>
		<script>
		(function() {
			var HF_BLOCK = 4320000;

			function adjustNav(show) {
				var masthead = document.getElementById('masthead');
				if (!masthead) return;
				masthead.style.top = show ? document.getElementById('hf13-notice').offsetHeight + 'px' : '0';
			}

			document.getElementById('hf13-close').addEventListener('click', function() {
				document.getElementById('hf13-notice').style.display = 'none';
				adjustNav(false);
			});

			function updateHF13() {
				fetch('https://api.nerva.one/daemon/explorer/index.php?endpoint=get_info')
					.then(function(r) { return r.json(); })
					.then(function(data) {
						var height = data.height || 0;
						var remaining = HF_BLOCK - height;
						if (remaining <= 0) return;
						var totalHours = Math.floor(remaining * 60 / 3600);
						var days = Math.floor(totalHours / 24);
						var hrs = totalHours % 24;
						var timeStr = days > 0 ? '~' + days + 'd ' + hrs + 'h' : '~' + hrs + 'h';
						document.getElementById('hf13-remaining').innerText =
							remaining.toLocaleString('en-US') + ' blocks (' + timeStr + ')';
						document.getElementById('hf13-notice').style.display = 'block';
						setTimeout(function() { adjustNav(true); }, 0);
					})
					.catch(function() {
						document.getElementById('hf13-remaining').innerText = 'a few';
						document.getElementById('hf13-notice').style.display = 'block';
						setTimeout(function() { adjustNav(true); }, 0);
					});
			}

			updateHF13();
			setInterval(updateHF13, 60000);
		})();
		</script>
		<!-- HF13 Notice End -->

		<header id="masthead" class="site-header nav-menu fixed-top <?php echo wp_bootstrap_starter_bg_class(); ?>" role="banner">
			<div class="container">
				<nav class="navbar navbar-dark navbar-expand-xl">
					<div class="navbar-brand">
						<a href="<?php echo esc_url( home_url( '/' )); ?>">
							<img class="img-fluid nerva-logo-icon-white" alt="cpu-mining" src="<?php echo get_template_directory_uri() . '/images/png-nerva-logo-white-256x256.png'; ?>">
							<img src="<?php echo get_template_directory_uri() . '/images/logo.png'; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
						</a>
					</div>
					<button id="dark-mode-toggle" class="dark-mode-btn" aria-label="Toggle dark mode" title="Toggle dark mode">
						<i id="dark-mode-icon" class="fas fa-moon"></i>
					</button>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<?php // Hardcoded bec. it'ss not possible to set id like #blog to the wp menu without https in front of it ?>
					<div id="main-nav" class="collapse navbar-collapse justify-content-start">
						<ul id="menu-top-menu" class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link" href="<?php if ( is_front_page() && is_home() ) { echo '#home'; } else { echo esc_url( home_url( '/#home' )); } ?>">HOME</a>
							</li>							
							<li class="menu-item nav-item">
								<a class="nav-link" href="<?php if ( is_front_page() && is_home() ) { echo '#features'; } else { echo esc_url( home_url( '/#features' )); } ?>">FEATURES</a>
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
							<li class="menu-item menu-item-has-children dropdown nav-item">
							<a href="#moredd" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link">RESOURCES</a>
								<ul class="dropdown-menu" aria-labelledby="menu-item-dropdown-31269" role="menu">
									<li class="menu-item nav-item">
										<a class="dropdown-item" href="<?php echo is_front_page() && is_home() ? '#blog' : esc_url( home_url( '/#blog' ) ); ?>">BLOG</a>
									</li>
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
									<li class="menu-item nav-item">
										<a class="dropdown-item" href="<?php echo esc_url( home_url( '/nerva-milestones/' ) ); ?>">MILESTONES</a>
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
					'container_class' => 'collapse navbar-collapse justify-content-start',
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