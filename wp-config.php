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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'cloriwatdb');

/** Database username */
define('DB_USER', 'root');

/** Database password */
define('DB_PASSWORD', '');

/** Database hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define('AUTH_KEY',         '0Ir5.x4r<3)= Tb`KP6@SCN*>;C%lv}..zsZ+Ih|MLF4VowCZM*/~Xh2qq4R}t;I');
define('SECURE_AUTH_KEY',  '5TTs# O7*e|JN)9(;jZEMdL|c$W*LHtyT6w~s2&,a?vNqSK<^9N+9>pAkywXzlCc');
define('LOGGED_IN_KEY',    ' /I*z2%Hz&`5SRjV`82~ntcdggrZ^, `G.6s1*t,@nIQ;d/~xhcZ3j[U8bo`Uo`:');
define('NONCE_KEY',        '5Cg%$ili/E.B?A?0w/-j1+`((<okQga!)LN#Q&~L(I[[sT`kiev[yxkq-%Glz$8|');
define('AUTH_SALT',        's+ @Avj85w2IN$2/~QL(ba 9l7&&>r+1b^BZ4zuh|@5}`EE-*i5eQbPWN/Q8G}3+');
define('SECURE_AUTH_SALT', 'hZ[GbOP86j>:`#e~6o:JG;1e%Y`M$*2HTBt:Uc^>0{WP#BDqA |{~ifefRt-mgkH');
define('LOGGED_IN_SALT',   'NeWrnj*`mAJkBu!9)It<<>cp9dzD!|0qqns>d212`Y22i:+=kB$*Vu+N`CLG_b$f');
define('NONCE_SALT',       ',&*Kr9W?98+Y.[gk)7,^^b<?IZT_|k|m|_AEvFX:59K W3yNqw IjB0!X>(@wZMB');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (! defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
