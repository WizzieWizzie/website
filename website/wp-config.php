<?php
// ===================================================
// Load database info and local development parameters
// ===================================================
if ( file_exists( dirname( __FILE__ ) . '/local-config.php' ) ) {
	include( dirname( __FILE__ ) . '/local-config.php' );
} else {
	define( 'DB_NAME', 'Wizzie' );
	define( 'DB_USER', 'root' );
	define( 'DB_PASSWORD', '' );
	define( 'DB_HOST', 'localhost' );
	define( 'WP_HOME', 'http://localhost:8080');
	define( 'WP_SITEURL', 'http://localhost:8080/wordpress');

	// ==============================================================
	// Salts, for security
	// Grab these from: https://api.wordpress.org/secret-key/1.1/salt
	// ==============================================================
	define('AUTH_KEY',         'HzHHZ}Wnm)KaMl]Yy8e:0/_sSwx-*K?=@#;<M8nejf,~k+5UEjZtax~vE;nuFO_o');
	define('SECURE_AUTH_KEY',  '+]<WhWgEP5|W-@>?y+K6oP!e*A8{wc<+;{B0ePePwKR+.;*yoN5cuY@-+B3`7Oov');
	define('LOGGED_IN_KEY',    '_lkwmW&j##tT.+[S]6{Ea$*}+hGQ`HRZjRJZU[S?Ks*z8ij K>T@A17#hz+mNZ/(');
	define('NONCE_KEY',        'au$+5R+<tbhs[s,iBGfFR)cf-c^}Y9L{L>]vR-?UgL|i#7!IQVd=IR7e!?Z=SY[g');
	define('AUTH_SALT',        'VO!E+z.l$h8z7+i-+bkhKv^:^[}-zGhAic]}8h{g6$Cg>&>_luqz+1#d[I0YN.XL');
	define('SECURE_AUTH_SALT', '|vsDlvhxmFnB8~_@ro|_ t_hU^b e(pn&4~~:g`T|pt}kc]MTEJV-a5WP,.fM<,5');
	define('LOGGED_IN_SALT',   'p^:`]8rz&rE-7]L({.|d[Yt=3lQnq<SmMWM Jz#nW-r`jZW4q:U31mdl3q[|HM`{');
	define('NONCE_SALT',       '=3v/c^LrPGd{s|,B[QR%IZ/a22dR]s_Wb393bciKEa<Qdi#@l>OfX-a(A&sDz*1s');

}

// ========================
// Custom Content Directory
// ========================
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/content' );
define( 'WP_CONTENT_URL', WP_HOME . '/content' );

// ================================================
// You almost certainly do not want to change these
// ================================================
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

// ==============================================================
// Table prefix
// Change this if you have multiple installs in the same database
// ==============================================================
$table_prefix  = 'wp_';

// ================================
// Language
// Leave blank for American English
// ================================
define( 'WPLANG', '' );

// ===========
// Hide errors
// ===========
ini_set( 'display_errors', 0 );
define( 'WP_DEBUG_DISPLAY', false );

// =================================================================
// Debug mode
// Debugging? Enable these. Can also enable them in local-config.php
// =================================================================
// define( 'SAVEQUERIES', true );
// define( 'WP_DEBUG', true );

// ======================================
// Load a Memcached config if we have one
// ======================================
if ( file_exists( dirname( __FILE__ ) . '/memcached.php' ) )
	$memcached_servers = include( dirname( __FILE__ ) . '/memcached.php' );

// ===========================================================================================
// This can be used to programatically set the stage when deploying (e.g. production, staging)
// ===========================================================================================
define( 'WP_STAGE', '%%WP_STAGE%%' );
define( 'STAGING_DOMAIN', '%%WP_STAGING_DOMAIN%%' ); // Does magic in WP Stack to handle staging domain rewriting

// ===================
// Bootstrap WordPress
// ===================
if ( !defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/wordpress/' );
require_once( ABSPATH . 'wp-settings.php' );
