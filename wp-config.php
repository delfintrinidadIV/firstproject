<?php
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
define('DB_NAME', 'padagosocampoDB');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '%>Zku3RxY5`Shc:br~QyI,yyzklCTjJg|G:[*|KF%)~WPe6Fax+Q^NSGhJ%GBOfZ');
define('SECURE_AUTH_KEY',  '7i5>O/|:MdO-yD#T&/cgo}?m+-*LZAbM;SfZ+<qRYy9B.WI<_ECKj;HP=hxTl/C/');
define('LOGGED_IN_KEY',    'kNp?Y,yNuPUGMgIYd7@xNvBB#y.sFgv8;2/Zz?,*p0S^-y^7bgj[|+kkZVC? 6[E');
define('NONCE_KEY',        '%pxIY/jlDiog&V!4tV{Qv ##(;fv[L6l-Jb4,mW|TyA tErHC@P?7KUj`*-taE-h');
define('AUTH_SALT',        ']-XE1d0gA(IPvX!fj3;8Ie4{ST <}eqhW?VD|TK?3Gs^bcqIi]gi@--y9@o*3`+F');
define('SECURE_AUTH_SALT', ',bCX|U`+,3:b< o3*|3|hTg3*.MYM BAm4>[VFdA@%ZFnhAr.554zN?[opZ1DU*c');
define('LOGGED_IN_SALT',   '#0EpP:[Z1s9!$1vE>+|iolo-GLs*mz:z:z/,gKyx$i4^j1PyffX`]NC, 0?t@:oT');
define('NONCE_SALT',       '-V-&/+Jo VO^d$*Q6;:+J_k#`|;2FRI1o)-~F|tv{~R:JMlM[KJ)}oj`RoXQ:KKl');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
