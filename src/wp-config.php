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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_eduguruloc' );

/** MySQL database username */
define( 'DB_USER', 'wp_eduguruloc' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wp_eduguruloc' );

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
define( 'AUTH_KEY',         'aIf7L#STv-9reew?5]#<-3@]GF{+2c[eO;9?dtdA}jVm,q?^H`pd@Krn/%BfZ?-Q' );
define( 'SECURE_AUTH_KEY',  'v)1(We$bH.8l(tq~%L53j.9Ag$Y8E~<DpeSKolfQJ{FR}J$bzH--HjGJ/qK|5JNo' );
define( 'LOGGED_IN_KEY',    '&6jW kiEgd`~vRrAB~`gTx^3&P:w`41FhNeM|>A -+N]m$R1@W<sqDl]`TJkL6>Z' );
define( 'NONCE_KEY',        '#vcT8`Sn~1C4X=Q@j;6MfZ-@:~;-VzC2I`A.YEp&dXGD3wFnsy4NZ9]u4B;W%aUQ' );
define( 'AUTH_SALT',        '0[@V@hhEzY]f4<IjE>9i^JqYB&l$~4q,,0R^.BTSaQtAd*-.4+d8`X%}Or,,<Z3Y' );
define( 'SECURE_AUTH_SALT', 'U`7fC#2f<I[~tEh5h|<Eb5HN15Yz8bdm01*(jjQ8|G@~hmsp:{GMvhy6}x<^^Jav' );
define( 'LOGGED_IN_SALT',   '=g(oH.WW4(1)thbAd;n*S*ik$jW x5S+)pnj5^DV78Q->)XFTilB7)/{U&HG>^?}' );
define( 'NONCE_SALT',       'n@p[8_QI(boF&;s[(Pa-8xi*l{7kHCf{h-l5+brAI$ 8skx^.J6:t858h}k*e=XL' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
