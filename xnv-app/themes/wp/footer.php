<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?>
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->
    <?php get_template_part( 'footer-widget' ); ?>
	<footer id="colophon" class="site-footer nv-footer" role="contentinfo">
		<div class="container">
			<div class="nv-footer-grid">

				<div class="nv-footer-col nv-footer-about">
					<div class="nv-footer-brand">
						<img src="<?php echo get_template_directory_uri() . '/images/png-nerva-logo-white-256x256.png'; ?>" alt="Nerva logo" width="34" height="34">
						<img class="brand-word" src="<?php echo get_template_directory_uri() . '/images/logo.png'; ?>" alt="NERVA">
					</div>
					<p class="nv-footer-desc">
						NERVA (XNV) is a privacy cryptocurrency with CPU-only mining and no
						pool support. Community managed and maintained on a voluntary basis.
					</p>
					<div class="nv-footer-social" aria-label="Social networks">
						<a href="https://discord.gg/ufysfvcFwe" target="_blank" rel="noopener" aria-label="Discord"><span class="fab fa-discord" aria-hidden="true"></span></a>
						<a href="https://twitter.com/NervaCurrency" target="_blank" rel="noopener" aria-label="X (Twitter)"><span class="fab fa-twitter" aria-hidden="true"></span></a>
						<a href="https://t.me/NervaCrypto" target="_blank" rel="noopener" aria-label="Telegram"><span class="fab fa-telegram-plane" aria-hidden="true"></span></a>
						<a href="https://www.youtube.com/channel/UC84v_i1iNZrLUUA9XbhuCAQ" target="_blank" rel="noopener" aria-label="YouTube"><span class="fab fa-youtube" aria-hidden="true"></span></a>
						<a href="https://www.reddit.com/r/NervaCrypto/" target="_blank" rel="noopener" aria-label="Reddit"><span class="fab fa-reddit-alien" aria-hidden="true"></span></a>
						<a href="https://github.com/nerva-project" target="_blank" rel="noopener" aria-label="GitHub"><span class="fab fa-github" aria-hidden="true"></span></a>
					</div>
				</div>

				<div class="nv-footer-col">
					<h4>Project</h4>
					<ul>
						<li><a href="<?php echo esc_url( home_url( '/#features' ) ); ?>">Features</a></li>
						<li><a href="<?php echo esc_url( home_url( '/#roadmap' ) ); ?>">Roadmap</a></li>
						<li><a href="<?php echo esc_url( home_url( '/#exchanges' ) ); ?>">Where to trade</a></li>
						<li><a href="<?php echo esc_url( home_url( '/#downloads' ) ); ?>">Downloads</a></li>
						<li><a href="<?php echo esc_url( home_url( '/#mining' ) ); ?>">Start mining</a></li>
						<li><a href="<?php echo esc_url( home_url( '/#paper-wallet' ) ); ?>">Paper wallet</a></li>
					</ul>
				</div>

				<div class="nv-footer-col">
					<h4>Resources</h4>
					<ul>
						<li><a href="https://docs.nerva.one" target="_blank" rel="noopener">Documentation <span class="fa fa-external-link-alt ext" aria-hidden="true"></span></a></li>
						<li><a href="https://explorer.nerva.one" target="_blank" rel="noopener">Block explorer <span class="fa fa-external-link-alt ext" aria-hidden="true"></span></a></li>
						<li><a href="https://map.nerva.one" target="_blank" rel="noopener">Node map <span class="fa fa-external-link-alt ext" aria-hidden="true"></span></a></li>
						<li><a href="<?php echo esc_url( home_url( '/nerva-milestones/' ) ); ?>">Milestones</a></li>
						<li><a href="<?php echo esc_url( home_url( '/nerva-mining-profitability-calculator/' ) ); ?>">Mining calculator</a></li>
						<li><a href="<?php echo esc_url( home_url( '/donate/' ) ); ?>">Donate &amp; treasury</a></li>
						<li><a href="<?php echo esc_url( home_url( '/#faq' ) ); ?>">FAQ</a></li>
					</ul>
				</div>

				<div class="nv-footer-col">
					<h4>Community</h4>
					<ul>
						<li><a href="https://discord.gg/ufysfvcFwe" target="_blank" rel="noopener">Discord <span class="fa fa-external-link-alt ext" aria-hidden="true"></span></a></li>
						<li><a href="https://t.me/NervaCrypto" target="_blank" rel="noopener">Telegram <span class="fa fa-external-link-alt ext" aria-hidden="true"></span></a></li>
						<li><a href="https://twitter.com/NervaCurrency" target="_blank" rel="noopener">X / Twitter <span class="fa fa-external-link-alt ext" aria-hidden="true"></span></a></li>
						<li><a href="https://www.reddit.com/r/NervaCrypto/" target="_blank" rel="noopener">Reddit <span class="fa fa-external-link-alt ext" aria-hidden="true"></span></a></li>
						<li><a href="https://github.com/nerva-project" target="_blank" rel="noopener">GitHub <span class="fa fa-external-link-alt ext" aria-hidden="true"></span></a></li>
						<li><a href="<?php echo esc_url( home_url( '/#blog' ) ); ?>">Blog</a></li>
					</ul>
				</div>

			</div>

			<div class="nv-footer-bottom">
				<div class="copyright">
					Copyright &copy; 2018 &ndash; <?php echo date('Y'); ?> <a href="<?php echo esc_url( home_url() ); ?>">Nerva Project</a>
					&nbsp;&middot;&nbsp; GPL-2.0-or-later
				</div>
				<span class="nv-foot-tag"><span class="dot" aria-hidden="true"></span> 1 CPU = 1 VOTE &nbsp;&middot;&nbsp; NO POOLS &nbsp;&middot;&nbsp; PRIVATE BY DEFAULT</span>
			</div>
		</div>
	</footer><!-- #colophon -->
<?php endif; ?>
</div><!-- #page -->

<button id="nv-back-to-top" aria-label="Back to top" title="Back to top">
	<span class="fas fa-chevron-up" aria-hidden="true"></span>
</button>

<?php wp_footer(); ?>
</body>
</html>