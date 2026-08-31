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
    <script>(function(){var s=localStorage.getItem('nerva-theme'),p=window.matchMedia&&window.matchMedia('(prefers-color-scheme: dark)').matches;if(s==='dark'||(s===null&&p)){document.documentElement.classList.add('dark-mode');}/* opt in to scroll-reveal only when JS is available; theme-script.js clears the timer, and if it never loads the class is removed again so content stays visible */var d=document.documentElement;if(!window.matchMedia||!window.matchMedia('(prefers-reduced-motion: reduce)').matches){d.classList.add('nv-anim');window.__nvAnimFallback=setTimeout(function(){d.classList.remove('nv-anim');},2500);}})();</script>
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
		// Live circulating supply (hero stat cell) with a one-time count-up
		var xnvSupplyAnimated = false;

		function animateXNVSupply(target) {
			var el = document.getElementById('xnv-supply');
			if (!el) return;
			if (xnvSupplyAnimated || !window.matchMedia || window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
				el.innerText = target.toLocaleString('en-US', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
				xnvSupplyAnimated = true;
				return;
			}
			xnvSupplyAnimated = true;
			var start = null;
			var from = target * 0.965;
			var duration = 1400;
			function step(ts) {
				if (!start) start = ts;
				var p = Math.min(1, (ts - start) / duration);
				var eased = 1 - Math.pow(1 - p, 3);
				el.innerText = Math.round(from + (target - from) * eased).toLocaleString('en-US', {
					minimumFractionDigits: 0,
					maximumFractionDigits: 0
				});
				if (p < 1) window.requestAnimationFrame(step);
			}
			window.requestAnimationFrame(step);
		}

		function updateXNVSupply() {
			fetch('https://api.nerva.one/daemon/explorer/index.php?endpoint=get_generated_coins')
				.then(function(r) { return r.text(); })
				.then(function(data) {
					var supply = parseFloat(data);
					if (isFinite(supply) && supply > 0) animateXNVSupply(supply);
				})
				.catch(function() {
					var el = document.getElementById('xnv-supply');
					if (el && !xnvSupplyAnimated) el.innerText = '19.19M';
				});
		}

		document.addEventListener('DOMContentLoaded', updateXNVSupply);
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
	
		<?php /* HF Notice - Uncomment to activate
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
		*/ ?>

		<header id="masthead" class="site-header nav-menu fixed-top <?php echo wp_bootstrap_starter_bg_class(); ?>" role="banner">
			<div class="container">
				<nav class="navbar navbar-dark navbar-expand-xl" aria-label="Main navigation">
					<div class="nav-inner w-100">
						<div class="navbar-brand">
							<a href="<?php echo esc_url( home_url( '/' )); ?>" aria-label="Nerva home">
								<img class="nerva-logo-icon" alt="" src="<?php echo get_template_directory_uri() . '/images/png-nerva-logo-white-256x256.png'; ?>">
								<img class="nerva-logo-word" src="<?php echo get_template_directory_uri() . '/images/logo.png'; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
							</a>
						</div>
					<button id="dark-mode-toggle" class="dark-mode-btn" aria-label="Toggle dark mode" title="Toggle dark mode">
						<i id="dark-mode-icon" class="fas fa-moon" aria-hidden="true"></i>
					</button>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<?php // Hardcoded bec. it's not possible to set id like #blog to the wp menu without https in front of it ?>
					<div id="main-nav" class="collapse navbar-collapse justify-content-end">
						<ul id="menu-top-menu" class="navbar-nav align-items-xl-center">
							<li class="nav-item">
								<a class="nav-link" href="<?php if ( is_front_page() && is_home() ) { echo '#home'; } else { echo esc_url( home_url( '/#home' )); } ?>">Home</a>
							</li>							
							<li class="menu-item nav-item">
								<a class="nav-link" href="<?php if ( is_front_page() && is_home() ) { echo '#features'; } else { echo esc_url( home_url( '/#features' )); } ?>">Features</a>
							</li>
							<li class="menu-item nav-item">
								<a class="nav-link" href="<?php if ( is_front_page() && is_home() ) { echo '#roadmap'; } else { echo esc_url( home_url( '/#roadmap' )); } ?>">Roadmap</a>
							</li>                                
							<li class="menu-item nav-item">
								<a class="nav-link" href="<?php if ( is_front_page() && is_home() ) { echo '#exchanges'; } else { echo esc_url( home_url( '/#exchanges' )); } ?>">Trade</a>
							</li>
							<li class="menu-item nav-item">
								<a class="nav-link" href="<?php if ( is_front_page() && is_home() ) { echo '#downloads'; } else { echo esc_url( home_url( '/#downloads' )); } ?>" >Downloads</a>
							</li>
							<li class="menu-item nav-item">
								<a class="nav-link" href="<?php if ( is_front_page() && is_home() ) { echo '#mining'; } else { echo esc_url( home_url( '/#mining' )); } ?>">Mine</a>
							</li>                                         
							<li class="menu-item menu-item-has-children dropdown nav-item">
							<a href="#moredd" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link">Resources</a>
								<ul class="dropdown-menu" aria-labelledby="menu-item-dropdown-31269" role="menu">
									<li class="menu-item nav-item">
										<a class="dropdown-item" href="<?php echo is_front_page() && is_home() ? '#blog' : esc_url( home_url( '/#blog' ) ); ?>">Blog</a>
									</li>
									<li class="menu-item nav-item">
										<?php // No if else for href needed because of absolute urls ?>
										<a class="dropdown-item" href="https://docs.nerva.one" target="_blank" rel="noopener">Wiki <span class="fa fa-external-link-alt external-ico" aria-hidden="true"></span></a>
									</li>
									<li class="menu-item nav-item">
										<?php // No if else for href needed because of absolute urls ?>
										<a class="dropdown-item" href="https://explorer.nerva.one" target="_blank" rel="noopener">Explorer <span class="fa fa-external-link-alt external-ico" aria-hidden="true"></span></a>
									</li>
									<li class="menu-item nav-item">
										<?php // No if else for href needed because of absolute urls ?>
										<a class="dropdown-item" href="https://map.nerva.one" target="_blank" rel="noopener">Node&nbsp;Map <span class="fa fa-external-link-alt external-ico" aria-hidden="true"></span></a>
									</li>
									<li class="menu-item nav-item">
										<?php // Internal page, so no target and no external icon ?>
										<a class="dropdown-item" href="<?php echo esc_url( home_url( '/nerva-mining-profitability-calculator/' ) ); ?>">Calculator</a>
									</li>
									<li class="menu-item nav-item">
										<a class="dropdown-item" href="<?php echo esc_url( home_url( '/nerva-milestones/' ) ); ?>">Milestones</a>
									</li>
								</ul>
							</li>
							<?php // Community lives here rather than in a wp_nav_menu() at the
							      // 'primary' location. A second menu renders its own
							      // .navbar-collapse, which the toggler cannot reach because it
							      // targets #main-nav, so those links were unreachable on mobile. ?>
							<li class="menu-item menu-item-has-children dropdown nav-item">
							<a href="#communitydd" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link">Community</a>
								<ul class="dropdown-menu" aria-labelledby="menu-item-dropdown-community" role="menu">
									<li class="menu-item nav-item">
										<a class="dropdown-item" href="https://discord.gg/ufysfvcFwe" target="_blank" rel="noopener">Discord <span class="fa fa-external-link-alt external-ico" aria-hidden="true"></span></a>
									</li>
									<li class="menu-item nav-item">
										<a class="dropdown-item" href="https://t.me/NervaCrypto" target="_blank" rel="noopener">Telegram <span class="fa fa-external-link-alt external-ico" aria-hidden="true"></span></a>
									</li>
									<li class="menu-item nav-item">
										<a class="dropdown-item" href="https://twitter.com/NervaCurrency" target="_blank" rel="noopener">Twitter <span class="fa fa-external-link-alt external-ico" aria-hidden="true"></span></a>
									</li>
									<li class="menu-item nav-item">
										<a class="dropdown-item" href="https://www.youtube.com/channel/UC84v_i1iNZrLUUA9XbhuCAQ" target="_blank" rel="noopener">YouTube <span class="fa fa-external-link-alt external-ico" aria-hidden="true"></span></a>
									</li>
									<li class="menu-item nav-item">
										<a class="dropdown-item" href="https://www.reddit.com/r/NervaCrypto/" target="_blank" rel="noopener">Reddit <span class="fa fa-external-link-alt external-ico" aria-hidden="true"></span></a>
									</li>
									<li class="menu-item nav-item">
										<a class="dropdown-item" href="https://nervaquest.com" target="_blank" rel="noopener">Nerva&nbsp;Quest <span class="fa fa-external-link-alt external-ico" aria-hidden="true"></span></a>
									</li>
									<li class="menu-item nav-item">
										<a class="dropdown-item" href="<?php echo esc_url( home_url( '/donate/' ) ); ?>">Donate</a>
									</li>
								</ul>
							</li>
							<li class="nav-item nav-item-btn d-none d-xl-inline-flex ml-xl-2">
								<a class="btn btn-primary nav-cta" href="<?php if ( is_front_page() && is_home() ) { echo '#downloads'; } else { echo esc_url( home_url( '/#downloads' )); } ?>">Get NervaOne</a>
							</li>
						</ul>
					</div>
					</div><!-- .nav-inner -->

				</nav>
			</div>
			<div class="nv-scroll-progress" aria-hidden="true"><span></span></div>
		</header><!-- #masthead -->

	<?php // endif; ?>