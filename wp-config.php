<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'stuckifarms_tcf');

/** MySQL database username */
define('DB_USER', 'stucki_admin');

/** MySQL database password */
define('DB_PASSWORD', 'stuckifarms2018');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         't+,-}c_uRSl 4=V_#ji*N^O1b{VrxP@$F`f+.uS&r|W,G1)KR]%rcd@^P=ZVdU8-');
define('SECURE_AUTH_KEY',  '19]K=>cSDRRea:+<{>;bu2y$qc&)P[M$2ZUab#f30b4~L0|EV3m~CshoXYV4u)Rr');
define('LOGGED_IN_KEY',    '(&R5U!DNzy+2&/)0BfB..+yCD;--ZQUM[K92f7,Arg-:yD2mWp+jhrMgCe#GcS[M');
define('NONCE_KEY',        'I74;>]b}Ls+p`|>pR sU>S+cKl_*){{P_[{|vhg4E9;s]+_owht27*#t/kFO51x)');
define('AUTH_SALT',        'Equat.-O/2*Gm!+AG:0/O)r0hUlps9vC5[QwSHiYQpmml--hKrXML#aJ{mzZn]?V');
define('SECURE_AUTH_SALT', '9nBs&|59$;,W-I#B$LaMK6e]L;YJblJ$+{V=wnU e|lYw?i}LUuu4[`{h.kSFARs');
define('LOGGED_IN_SALT',   'o}Uzk/~`_~hKH50+XH0zC(+Lixb_W33r)<w|m(|}x/GHH]o6G4bQ,WW3YJg<g 9]');
define('NONCE_SALT',       '[nTP(b6I!n{8N+bdi2[l +()+5|6)`0}N#G!5neh-;K-4Cul+9vOR+<,mo2o;83q');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'stucki_wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
