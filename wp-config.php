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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wcom' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '7,R/Ijl`xnqe@H?`Uou/kY[==?_#EqL#:dCx=ar1JBXkMUZBe.`qRV1fK:>6#g#c' );
define( 'SECURE_AUTH_KEY',  '!vyYxpn i9QrrSQ&xE4nj=( Du*x:V^t1AX1P+8?bBlb{Kj=+-LxHae<Biu]vwez' );
define( 'LOGGED_IN_KEY',    'R;mVU38N,U:h12FpCx9`}Gxg(i|w*K=TFewcdDfVHFV*Jn;M`x+4wo.Vz-:fNM<u' );
define( 'NONCE_KEY',        'S~!!R!h[z/p0f#]1LYCI]sIBpMAO;vRj8ICcj*a]78|BiNT[hWHCi]m/xm<jSs6>' );
define( 'AUTH_SALT',        'n5(ek:[I:bQy^Q< 2GS_{kZd-OzmUrx-e;?ug_GPm[W%X+UL-g1)f8k%],SnVqL+' );
define( 'SECURE_AUTH_SALT', 'XS!~9]CDqJGqsT7mZ)UPc^e3pk5gom!634TK11Dlpt83JqI|I6~iE.B}q=C4Sr-W' );
define( 'LOGGED_IN_SALT',   'L-he$_D/#JE?Ut-x01eb_KP4I7@}k2;#9bi%[`deM/8;L?7@hhR)8uX4O05I@8mG' );
define( 'NONCE_SALT',       'C3{cMST(r/$96gA.nBteekziyjGtAbKU7-c(&{Dk(=j{BO0/VEblDyOK M*P.A(R' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
