<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'uo`~{:LmE(JH^]%00fx]*(rLfUN[]pi:,TNs6kLgp<WUZp64Lj*-!GNip}Xd+V%:' );
define( 'SECURE_AUTH_KEY',   'L !iJ+xlEe*`|c2|2|w`E-N@YVgE2%ehWAO_gR[>G*9)N;vc<c;XC3zlMDZ+TuzL' );
define( 'LOGGED_IN_KEY',     '/d]&Vy0N^i4g+dkVm(br$~sM#K $ATe62L/s0@a]|Htk*_/mrm[`s9k,fV6a/OsS' );
define( 'NONCE_KEY',         '7=`IR&yj!|c]YyamW[u7i1+Eov@a#Hkh~]%,)3Y]0c}=b=%),g8YZtq]MSdc`q|s' );
define( 'AUTH_SALT',         '9$:Bd4DYn_2^I[CqnPl_j(7=YgyJf!LT}>g;?vmm &7EyiOW=O>2ch&1lUkg{U)E' );
define( 'SECURE_AUTH_SALT',  'BEq,mfvrw4sHiCQo=$J|%6P]SzQFZeb .sJ.K7(3B:ZA6H@5o6^m#eoV}mpok+RJ' );
define( 'LOGGED_IN_SALT',    '[=TlOh^/oBZ4tkdp?*a|[0vv6cAWn-V8)q2eVpIh5dU[=<]-ypM,c6bT3YD,iUjM' );
define( 'NONCE_SALT',        '4G)!{Qd96Vqoh[]:$v35opU,fhKhG<YB[e*s^J~Z}sc~-f=V~nB.3%{Rr;Vz-&mK' );
define( 'WP_CACHE_KEY_SALT', ',EV* Rq_IclRVMTNP2P{}F-JH KZK?H,.U(P{k|D%~b*ecnV^2]~JqKK_F{YT^Ya' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
