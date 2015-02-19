<?php
define('WP_APPLICATION_ENV', (getenv('WP_APPLICATION_ENV') ? getenv('WP_APPLICATION_ENV') : 'production'));

define( 'DB_NAME', (getenv('WP_DB_NAME') ? getenv('WP_DB_NAME') : 'wordpress') );
define( 'DB_USER', (getenv('WP_DB_USER') ? getenv('WP_DB_USER') : 'wordpress-user') );
define( 'DB_PASSWORD', (getenv('WP_DB_PASS') ? getenv('WP_DB_PASS') : '') ); //leave password blank, so we get a connection error as a reminder to set the required environment variabled
define( 'DB_HOST', (getenv('WP_DB_HOST') ? getenv('WP_DB_HOST') : 'localhost') );
define( 'DB_PREFIX', (getenv('WP_DB_PREFIX') ? getenv('WP_DB_PREFIX') : 'wp_') );

if(file_exists(dirname(__FILE__).'/aws-credentials.php')) {
    require dirname(__FILE__).'/aws-credentials.php';
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
// Salts, for security
// Grab these from: https://api.wordpress.org/secret-key/1.1/salt
// ==============================================================
define('AUTH_KEY',         'YFZf?|el(vOARG,@*XjT6|DV`JkTZ4ZmN[LQJpl_;Gmoe,7VO2,Mn#({0}&(+@CZ');
define('SECURE_AUTH_KEY',  'IFY[vEpH?B`#PTDO>WT oEJl|w(?HYl8:DN>Ul2}!|18KW;~NiZr@~zO:Y2bo,Ym');
define('LOGGED_IN_KEY',    '7pe3<s;zOe#xo]0(+<+pYMs/(pAy,;t8?$VFek,P<2iU1+Be-Q.=4AF7UflOgZyI');
define('NONCE_KEY',        '&bL+#B}|smmLBbF]hI)D28&}]K]b0vi--}n8yZYM+$|+P3`!3G@t#*>Nb~5fF~}o');
define('AUTH_SALT',        ')ntM@qNO$K)#7nc>_{#F5K!0dB~(xP*F66#+Q-0JV+o%TXYp{~}u(vQvnk.XkzaN');
define('SECURE_AUTH_SALT', 'a4pF~Ppcuwu=)|_m=%]|2><+6{zNpq5bgy/|PgP6`2~uC49T*=(S-x_9tHZTdYmK');
define('LOGGED_IN_SALT',   'rY`3l>?[&8Gv)mU7bH@4b]{,N-!u9[Umo.*_*t@71=t(W<P7{86^dN!Ww_;G0+ r');
define('NONCE_SALT',       'Gi6|.^>ANDrJ?_$H0~R4+(GYSchl-k2kj>m/3L(++NXU[O 7csgA%S./z-n[dHT3');

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
