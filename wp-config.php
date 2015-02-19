<?php
define('WP_APPLICATION_ENV', (getenv('WP_APPLICATION_ENV') ? getenv('WP_APPLICATION_ENV') : 'production'));

define( 'DB_NAME', (getenv('WP_DB_NAME') ? getenv('WP_DB_NAME') : 'wordpress') );
define( 'DB_USER', (getenv('WP_DB_USER') ? getenv('WP_DB_USER') : 'wordpress-user') );
define( 'DB_PASSWORD', (getenv('WP_DB_PASS') ? getenv('WP_DB_PASS') : '') ); //leave password blank, so we get a connection error as a reminder to set the required environment variabled
define( 'DB_HOST', (getenv('WP_DB_HOST') ? getenv('WP_DB_HOST') : 'localhost') );
define( 'DB_PREFIX', (getenv('WP_DB_PREFIX') ? getenv('WP_DB_PREFIX') : 'wp_') );

if(file_exists(dirname(__FILE__).'/config/wp-extras.php')) {
    //Use this wp-extras.php file in the config dir to configure
    //database credentials, salts and other sensitive data you don't want
    //in your git history (so, yes, the above lines will be removed
    require dirname(__FILE__).'/config/wp-extras.php';
}

// ========================
// Custom Content Directory
// ========================
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/content' );
define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/content' );

// ================================================
// You almost certainly do not want to change these
// ================================================
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

// ==============================================================
// Table prefix
// Change this if you have multiple installs in the same database
// ==============================================================
$table_prefix  = DB_PREFIX;

// ================================
// Language
// Leave blank for American English
// ================================
define( 'WPLANG', '' );

// ===========
// Hide errors
// ===========
if(WP_APPLICATION_ENV === 'development') {
	ini_set( 'display_errors', 0 );
	define( 'WP_DEBUG', true );
	define( 'WP_DEBUG_DISPLAY', true );
	define( 'SAVEQUERIES', true );

	//do not use the trash
	define('EMPTY_TRASH_DAYS', 0 );
} else {
	ini_set( 'display_errors', 0 );
	define( 'WP_DEBUG', false );
	define( 'WP_DEBUG_DISPLAY', false );
	define( 'SAVEQUERIES', false );

	//keep trash for 7 days
	define('EMPTY_TRASH_DAYS', 7 );
}

// Caching done via W3-Total-Cache
// Don't verify the loader, it's there allright?
// http://wordpress.org/support/topic/issue-with-w3tc-wp-loaderphp
define('DONOTVERIFY_WP_LOADER', true);

// Yeah, we want cache!
define('WP_CACHE', false);

// Don't concatenate javascripts
define('CONCATENATE_SCRIPTS', false);

// Always enable multisite, even when used with a single site
// As seen on http://goo.gl/gtdc4
define('WP_ALLOW_MULTISITE', true);

// ======================================
// Load a Memcached config if we have one
// ======================================
if ( file_exists( dirname( __FILE__ ) . '/memcached.php' ) )
	$memcached_servers = include( dirname( __FILE__ ) . '/memcached.php' );


// ===================
// Bootstrap WordPress
// ===================
if ( !defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/wp/' );
require_once( ABSPATH . 'wp-settings.php' );
