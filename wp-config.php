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
define('DB_NAME', 'test');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '47rv!Tg)~Hy#dTwP:6BC$[~)mq:$ZM?l@,9cpe&VFJhfC%^odJA>$Oq2=~6* :jr');
define('SECURE_AUTH_KEY',  'd8v$WThl+G0%#Sc8<`)RzW(dxX`Bs54bX.0GysE>MkXh5L})F1zjQe<|#K+%0wK]');
define('LOGGED_IN_KEY',    '19}PaMM[IxnpEy[~dEC6wAe<Xi*WFch6?&dK#cJ5l$l^}.h4C>7(3tE<s1M%sGaG');
define('NONCE_KEY',        'v1iv-zh-Zlo9+/nz&r>2K@<!:NPE!Rhjjy8jZ5-p[ZL*kbCSLt,%QTz0i ~d%?7[');
define('AUTH_SALT',        '] kaO8G^D t[U)%hiTl%bL#sGLMpkJE4UgGgrX{0#SaYfdG<rg`8/rXjitNI5IXo');
define('SECURE_AUTH_SALT', '|lD6|S&/(nw,3huL97(_:RlsW{bGj_r4nBH<|uT|,B4M,dQF_u|I6n97,KIWEk>U');
define('LOGGED_IN_SALT',   '=hgUImO6o`5h(I;y:ewYc_ChuA$WsdZTU.CTQnw-R%dCFIeO<zV82dvPD>a1ucD-');
define('NONCE_SALT',       'I2J4Ysam)eEs}W>_|2UzoR0W*h/a%aWIKDV[ANV@2ivjU(|-zZng[Ffw6Uu}i~&L');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
