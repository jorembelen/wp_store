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
define( 'DB_NAME', 'wp_store' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'c[I-]hSox+HTTQF^A%ntR7z: x(.^,%@U`whsZ>=zAX5qr+:[& El!28d1IXSpfa' );
define( 'SECURE_AUTH_KEY',  '/?dvBMyy&Eu&o.-#z{vTx2LCXb>a~;lZKkTMR>_t>2Nmc.=YEu<S9>SBrWXd3F,o' );
define( 'LOGGED_IN_KEY',    'G~u)>/9EjF J#rGzl3:dcH/~XPE{D,Wn#UpEF@Uv.~1o!!-ifv#ugmc#4O<19Gzx' );
define( 'NONCE_KEY',        'N5+WK%q/eB&C&[GdP.ODxw!>qlG,,M!Y73c?ktTPhv}}C.>Z;^XHT-v?av2oOk8a' );
define( 'AUTH_SALT',        'I^NbohDi96K2r+{LH72RTX^9;XMvmP;xGDh[VuJc,WlBCGo6D=},l{0]9,Mrg]~8' );
define( 'SECURE_AUTH_SALT', 'i{t@KZ.EI>A5pN0ye|Y:^)?2&]Z63LIFWJTxQ9>zvM|=JymT-0~mG[DHU8bD6j$N' );
define( 'LOGGED_IN_SALT',   'wBA13rKHtA@f%nCM~y4@jC1v_zw}8myv?g?}x5M}.]ck)/N.xmfH[+_d@DYB-:Z(' );
define( 'NONCE_SALT',       'QW$#0^oB%43dA,f63!hZ<5a4]?6(/yLHEg<b-TtKtSc7W_P-^Cq5@%c>a0f&smw2' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
