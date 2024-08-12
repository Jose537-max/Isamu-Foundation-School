<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
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
define( 'DB_NAME', 'School web' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '()_Nyg I%Y]o,j>r|S{|Y>S(XHz,dbtThz6+IO~i%N|(_-o#BG [ySu}bM1sJbGJ' );
define( 'SECURE_AUTH_KEY',  ';(J10}7`WfW9AJ$pnw<H38SZpC(ciO[G{qMGpVEz{5kuOH*^T`:Y0&DL3!l{y]}I' );
define( 'LOGGED_IN_KEY',    'g.dNX/[dwhM|p_4*T:]WWc:FCzM*2Ot1R [J#f0)TdLm=r]{|mBNbPQ3V1Y6_U(M' );
define( 'NONCE_KEY',        'pp+A2/3&`&IBtD9`[!nHB6?Mzx3v[s7y>PxVc[VW|%1zh[w+PwQlDT@6&Z62;4OV' );
define( 'AUTH_SALT',        'cOjR53;r1U.!#CuK$)XPb0F;!$5DJ@4cF~.!f.f|{r|`m#W3>2ejsvPD@RjQ/^Xk' );
define( 'SECURE_AUTH_SALT', 'OjPwq=g-X~H-~x@IGd)Zs3# ).I@8QT[?)h?9pnaXJS:`]H5J0.|S{f?`3|):+Y#' );
define( 'LOGGED_IN_SALT',   'h=+:`?}/l/>4Qtkhr_TU6}>j)@d~~e%|V00hkh^;M]db&DH,?1rW3h_lQe,e&{k ' );
define( 'NONCE_SALT',       'p`<%g_[yEpZ!;<sp2Iu7He;Dn%+B*CR9*7+Ic.?Y:u%yT:9<(26u.NxsIIbgJ=R}' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
