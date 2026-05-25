<?php
/**
 * Nerva Milestones Tracker — backend
 *
 * Handles DB table creation, hourly CoinGecko snapshots via WP Cron,
 * and REST API endpoints consumed by the /nerva-milestones page.
 */

// ---------------------------------------------------------------------------
// Comparison coin config — add or remove CoinGecko IDs here as needed.
// These are fetched hourly alongside XNV and cached for 1 hour.
// Their current market caps are used as dynamic goal targets in the JS config.
// ---------------------------------------------------------------------------
define( 'NERVA_COMPARISON_COINS', [
    'monero' => 'Monero (XMR)',
    'zcash'  => 'Zcash (ZEC)',
] );


// ---------------------------------------------------------------------------
// 0. Assets + Twitter Card meta
// ---------------------------------------------------------------------------

function nerva_milestones_enqueue_assets() {
    if ( ! is_page_template( 'page-milestones.php' ) ) {
        return;
    }

    wp_enqueue_style(
        'nerva-milestones',
        get_stylesheet_directory_uri() . '/inc/assets/css/milestones.css',
        [],
        '1.0'
    );

    wp_enqueue_script(
        'html2canvas',
        'https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js',
        [],
        '1.4.1',
        true
    );

    wp_enqueue_script(
        'nerva-milestones',
        get_stylesheet_directory_uri() . '/inc/assets/js/milestones.js',
        [ 'html2canvas' ],
        '1.0',
        true
    );

    global $post;
    wp_localize_script( 'nerva-milestones', 'nervaMilestones', [
        'apiBase' => rest_url( 'nerva/v1' ),
        'pageUrl' => get_permalink( $post->ID ),
        'nonce'   => wp_create_nonce( 'wp_rest' ),
        'logoUrl' => get_template_directory_uri() . '/images/png-nerva-logo-white-256x256.png',
    ] );
}
add_action( 'wp_enqueue_scripts', 'nerva_milestones_enqueue_assets' );


function nerva_milestones_meta_tags() {
    if ( ! is_page_template( 'page-milestones.php' ) ) {
        return;
    }

    global $wpdb;
    $table      = $wpdb->prefix . 'nerva_tracker_snapshots';
    $latest_id  = $wpdb->get_var( "SELECT id FROM $table ORDER BY snapshot_time DESC LIMIT 1" );
    $upload_dir = wp_upload_dir();
    $file_path  = $upload_dir['basedir'] . '/nerva-milestones/' . $latest_id . '.png';
    $file_url   = $upload_dir['baseurl'] . '/nerva-milestones/' . $latest_id . '.png';

    $og_image = ( $latest_id && file_exists( $file_path ) )
        ? esc_url( $file_url )
        : esc_url( get_template_directory_uri() . '/images/png-nerva-logo-white-256x256.png' );

    ?>
    <meta property="og:type"        content="website" />
    <meta property="og:title"       content="Nerva (XNV) Milestones" />
    <meta property="og:description" content="Track Nerva's progress toward key market cap milestones." />
    <meta property="og:image"       content="<?php echo $og_image; ?>" />
    <meta property="og:url"         content="<?php echo esc_url( get_permalink() ); ?>" />
    <meta name="twitter:card"        content="summary_large_image" />
    <meta name="twitter:title"       content="Nerva (XNV) Milestones" />
    <meta name="twitter:description" content="Track Nerva's progress toward key market cap milestones." />
    <meta name="twitter:image"       content="<?php echo $og_image; ?>" />
    <?php
}
add_action( 'wp_head', 'nerva_milestones_meta_tags', 5 );


// ---------------------------------------------------------------------------
// 1. Database
// ---------------------------------------------------------------------------

function nerva_milestones_create_table() {
    global $wpdb;
    $table          = $wpdb->prefix . 'nerva_tracker_snapshots';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table (
        id bigint(20) NOT NULL AUTO_INCREMENT,
        snapshot_time datetime NOT NULL,
        price_usd decimal(20,8) NOT NULL DEFAULT 0,
        market_cap_usd bigint(20) NOT NULL DEFAULT 0,
        change_24h decimal(10,4) DEFAULT NULL,
        change_7d decimal(10,4) DEFAULT NULL,
        change_30d decimal(10,4) DEFAULT NULL,
        circulating_supply decimal(20,4) DEFAULT NULL,
        is_daily_snapshot tinyint(1) NOT NULL DEFAULT 0,
        PRIMARY KEY (id),
        KEY snapshot_time (snapshot_time)
    ) $charset_collate;";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta( $sql );
}

function nerva_milestones_maybe_create_table() {
    $db_version = '1.0';
    if ( get_option( 'nerva_tracker_db_version' ) !== $db_version ) {
        nerva_milestones_create_table();
        update_option( 'nerva_tracker_db_version', $db_version );
    }
}
add_action( 'init', 'nerva_milestones_maybe_create_table' );


// ---------------------------------------------------------------------------
// 2. WP Cron — hourly CoinGecko fetch
// ---------------------------------------------------------------------------

function nerva_milestones_schedule_cron() {
    if ( ! wp_next_scheduled( 'nerva_milestones_hourly_fetch' ) ) {
        wp_schedule_event( time(), 'hourly', 'nerva_milestones_hourly_fetch' );
    }
}
add_action( 'wp', 'nerva_milestones_schedule_cron' );

function nerva_milestones_fetch_coingecko() {
    global $wpdb;

    $response = wp_remote_get( 'https://api.coingecko.com/api/v3/coins/nerva', [
        'timeout' => 15,
        'headers' => [ 'Accept' => 'application/json' ],
    ] );

    if ( is_wp_error( $response ) ) {
        return;
    }

    $body = json_decode( wp_remote_retrieve_body( $response ), true );
    if ( empty( $body['market_data'] ) ) {
        return;
    }

    $md    = $body['market_data'];
    $table = $wpdb->prefix . 'nerva_tracker_snapshots';
    $today = current_time( 'Y-m-d' );

    // Mark the first snapshot of each calendar day as the daily snapshot
    $has_daily = $wpdb->get_var( $wpdb->prepare(
        "SELECT COUNT(*) FROM $table WHERE DATE(snapshot_time) = %s AND is_daily_snapshot = 1",
        $today
    ) );

    $wpdb->insert( $table, [
        'snapshot_time'      => current_time( 'mysql' ),
        'price_usd'          => $md['current_price']['usd']          ?? 0,
        'market_cap_usd'     => $md['market_cap']['usd']             ?? 0,
        'change_24h'         => $md['price_change_percentage_24h']   ?? null,
        'change_7d'          => $md['price_change_percentage_7d']    ?? null,
        'change_30d'         => $md['price_change_percentage_30d']   ?? null,
        'circulating_supply' => $md['circulating_supply']            ?? null,
        'is_daily_snapshot'  => $has_daily == 0 ? 1 : 0,
    ] );
}
add_action( 'nerva_milestones_hourly_fetch', 'nerva_milestones_fetch_coingecko' );


function nerva_milestones_fetch_comparison_coins() {
    $ids      = implode( ',', array_keys( NERVA_COMPARISON_COINS ) );
    $url      = 'https://api.coingecko.com/api/v3/simple/price'
              . '?ids=' . $ids
              . '&vs_currencies=usd&include_market_cap=true';

    $response = wp_remote_get( $url, [
        'timeout' => 15,
        'headers' => [ 'Accept' => 'application/json' ],
    ] );

    if ( is_wp_error( $response ) ) {
        return;
    }

    $data = json_decode( wp_remote_retrieve_body( $response ), true );
    if ( ! empty( $data ) ) {
        set_transient( 'nerva_comparison_coins', $data, HOUR_IN_SECONDS );
    }
}
add_action( 'nerva_milestones_hourly_fetch', 'nerva_milestones_fetch_comparison_coins' );


// ---------------------------------------------------------------------------
// 3. REST API endpoints
// ---------------------------------------------------------------------------

function nerva_milestones_register_routes() {
    register_rest_route( 'nerva/v1', '/milestones/latest', [
        'methods'             => 'GET',
        'callback'            => 'nerva_milestones_get_latest',
        'permission_callback' => '__return_true',
    ] );

    register_rest_route( 'nerva/v1', '/milestones/comparison', [
        'methods'             => 'GET',
        'callback'            => 'nerva_milestones_get_comparison',
        'permission_callback' => '__return_true',
    ] );

    register_rest_route( 'nerva/v1', '/milestones/screenshot', [
        [
            'methods'             => 'GET',
            'callback'            => 'nerva_milestones_check_screenshot',
            'permission_callback' => '__return_true',
        ],
        [
            'methods'             => 'POST',
            'callback'            => 'nerva_milestones_save_screenshot',
            'permission_callback' => '__return_true',
        ],
    ] );
}
add_action( 'rest_api_init', 'nerva_milestones_register_routes' );


function nerva_milestones_get_latest( WP_REST_Request $request ) {
    global $wpdb;
    $table = $wpdb->prefix . 'nerva_tracker_snapshots';
    $row   = $wpdb->get_row( "SELECT * FROM $table ORDER BY snapshot_time DESC LIMIT 1", ARRAY_A );

    // Fetch fresh data if no snapshot exists or last one is older than 10 minutes
    $age = $row ? ( current_time( 'timestamp' ) - strtotime( $row['snapshot_time'] ) ) : PHP_INT_MAX;
    if ( $age > 900 ) {
        nerva_milestones_fetch_coingecko();
        nerva_milestones_fetch_comparison_coins();
        $row = $wpdb->get_row( "SELECT * FROM $table ORDER BY snapshot_time DESC LIMIT 1", ARRAY_A );
    }

    if ( ! $row ) {
        return new WP_Error( 'no_data', 'No snapshot data available yet.', [ 'status' => 404 ] );
    }

    return rest_ensure_response( $row );
}


function nerva_milestones_get_comparison( WP_REST_Request $request ) {
    $cached = get_transient( 'nerva_comparison_coins' );

    if ( ! $cached ) {
        // Cache cold — fetch now so the first page load still gets data
        nerva_milestones_fetch_comparison_coins();
        $cached = get_transient( 'nerva_comparison_coins' );
    }

    if ( ! $cached ) {
        return new WP_Error( 'no_data', 'Comparison coin data not available.', [ 'status' => 503 ] );
    }

    return rest_ensure_response( $cached );
}


function nerva_milestones_check_screenshot( WP_REST_Request $request ) {
    $snapshot_id = absint( $request->get_param( 'snapshot_id' ) );

    if ( ! $snapshot_id ) {
        return new WP_Error( 'missing_param', 'snapshot_id is required.', [ 'status' => 400 ] );
    }

    $upload_dir = wp_upload_dir();
    $file_path  = $upload_dir['basedir'] . '/nerva-milestones/' . $snapshot_id . '.png';
    $file_url   = $upload_dir['baseurl'] . '/nerva-milestones/' . $snapshot_id . '.png';

    if ( file_exists( $file_path ) ) {
        return rest_ensure_response( [ 'exists' => true, 'url' => $file_url ] );
    }

    return rest_ensure_response( [ 'exists' => false ] );
}


function nerva_milestones_save_screenshot( WP_REST_Request $request ) {
    $snapshot_id = absint( $request->get_param( 'snapshot_id' ) );
    $image_data  = $request->get_param( 'image' );

    if ( ! $snapshot_id ) {
        return new WP_Error( 'missing_param', 'snapshot_id is required.', [ 'status' => 400 ] );
    }

    if ( empty( $image_data ) ) {
        return new WP_Error( 'no_image', 'No image data provided.', [ 'status' => 400 ] );
    }

    // Strip the data URI header if the browser included it
    $image_data = preg_replace( '/^data:image\/png;base64,/', '', $image_data );
    $decoded    = base64_decode( $image_data, true );

    if ( $decoded === false ) {
        return new WP_Error( 'invalid_image', 'Image data could not be decoded.', [ 'status' => 400 ] );
    }

    // Verify it's actually a PNG (check magic bytes)
    if ( substr( $decoded, 0, 8 ) !== "\x89PNG\r\n\x1a\n" ) {
        return new WP_Error( 'invalid_image', 'Uploaded data is not a valid PNG.', [ 'status' => 400 ] );
    }

    $upload_dir = wp_upload_dir();
    $dir_path   = $upload_dir['basedir'] . '/nerva-milestones/';

    if ( ! file_exists( $dir_path ) ) {
        wp_mkdir_p( $dir_path );
    }

    $file_path = $dir_path . $snapshot_id . '.png';
    $file_url  = $upload_dir['baseurl'] . '/nerva-milestones/' . $snapshot_id . '.png';

    // Return existing file if already saved for this snapshot (idempotent)
    if ( file_exists( $file_path ) ) {
        return rest_ensure_response( [ 'url' => $file_url ] );
    }

    // phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_read_file_put_contents
    file_put_contents( $file_path, $decoded );

    return rest_ensure_response( [ 'url' => $file_url ] );
}
