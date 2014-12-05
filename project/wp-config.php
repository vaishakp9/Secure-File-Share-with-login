<?php
define('WP_MEMORY_LIMIT', '64M');
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', '');

/** MySQL database username */
define('DB_USER', '');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', '');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'al[J4UB_ M<bvM/nwx*{>nb&gm5)[Sx)i!*uYWl]vD!`N|+T+.xiNhFhydXBva-1');
define('SECURE_AUTH_KEY',  'oER8wQ!ur!,+ej-780hy`i,$}Hn&tU)urMlymc/e~rLtzGKVEh[GaZOYcNzh 0bA');
define('LOGGED_IN_KEY',    'xc]{5V X#|h2~-c!j[m4b],QO6:r%{(M@HH]CH+Z5$>K@]|Z@.rq6&@gf-U+m])<');
define('NONCE_KEY',        't%`2&j96?ESmy^/0A:|Rkp|g/:4^6$`3f+6<oR+Z/4h<{ie*t[eDBlr7yAz7*XZX');
define('AUTH_SALT',        'Nt))/z;w v&2`qy@GH/-XGQ!C2KTT6t|+,S@+ =SnP4Wy-5v_nc|d%.eUl1!}LoM');
define('SECURE_AUTH_SALT', 'I6e]qq/*|KW-AHj=/.f@0X;3.)j6]~fOQcPiA90BT.?TvablNJk;/{05nG4~Io!W');
define('LOGGED_IN_SALT',   '[S2t/>;9W2t3&pK_,}AxxN2a%?h_[-gkJFXE~G:k&R+=n(`/c+>+a9qg =4E(U]D');
define('NONCE_SALT',       '|LHy$x-5zC@;2?[Do g|3zi9&U|@o/`WOv~nl+-!h-OZQL-ZWmW#iVHGFNV-RdO|');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_ashwa';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
