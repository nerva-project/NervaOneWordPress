<?php
/**
 * Template Name: Nerva Milestones
 */
get_header();
?>

<div class="milestones-page">
    <div class="container">
        <div class="milestones-wrap">

            <!-- ── Capture target ── -->
            <div id="milestones-widget">

                <div class="mw-header">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/images/png-nerva-logo-white-256x256.png' ); ?>"
                         alt="Nerva" class="mw-logo">
                    <div class="mw-title-group">
                        <div class="mw-title">NERVA <span>Milestones</span></div>
                        <div class="mw-subtitle">
                            <span id="mw-age">Age: —</span>
                            &nbsp;·&nbsp;
                            <span id="mw-updated">Updated: —</span>
                        </div>
                    </div>
                </div>

                <div class="mw-stats-row">
                    <div class="mw-stat-primary">
                        <div class="mw-stat-label">Price (USD)</div>
                        <div class="mw-stat-value" id="mw-price">—</div>
                    </div>
                    <div class="mw-stat-primary">
                        <div class="mw-stat-label">Market Cap</div>
                        <div class="mw-stat-value" id="mw-mcap">—</div>
                    </div>
                    <div class="mw-stat-changes">
                        <div class="mw-change">
                            <div class="mw-stat-label">24h</div>
                            <div class="mw-stat-value" id="mw-24h">—</div>
                        </div>
                        <div class="mw-change">
                            <div class="mw-stat-label">7d</div>
                            <div class="mw-stat-value" id="mw-7d">—</div>
                        </div>
                        <div class="mw-change">
                            <div class="mw-stat-label">30d</div>
                            <div class="mw-stat-value" id="mw-30d">—</div>
                        </div>
                    </div>
                </div>

                <!-- Goals are rendered dynamically by milestones.js -->
                <div class="mw-goals" id="mw-goals"></div>

                <div class="mw-branding">nerva.one</div>

            </div><!-- #milestones-widget -->

            <!-- ── Controls (outside capture target) ── -->
            <div class="mw-actions">
                <p class="mw-status" id="mw-loading">Loading data…</p>
                <p class="mw-status mw-status-error" id="mw-error" style="display:none">
                    Could not reach CoinGecko — showing last cached snapshot.
                </p>
                <button class="btn btn-primary mw-share-btn" id="mw-share-btn" style="display:none">
                    <span class="fab fa-x-twitter"></span>&nbsp; Share on X
                </button>
                <p class="mw-update-note">Data is sourced from CoinGecko and updates every 15 minutes.</p>
            </div>

        </div><!-- .milestones-wrap -->
    </div><!-- .container -->
</div><!-- .milestones-page -->

<?php get_footer(); ?>
