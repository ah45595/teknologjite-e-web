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
define( 'DB_NAME', 'gym' );

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
define( 'AUTH_KEY',         'aIP<YW!%0vu1WXrc2#=QPH$tCZp_U,$YiIh_J7Sx?P57U)mU}8rOrf4aormIhHrU' );
define( 'SECURE_AUTH_KEY',  '/QL`IEPBNvd/k(6ohR{0q[iplc0>4DFak} qlmWCPiVqqLK+ynEPL}c.di&N:R#(' );
define( 'LOGGED_IN_KEY',    'lb&u}{F[(CC9Sq1UnJxh 9I2D?R 0WvhuWpz!no:>?[7vwFfFgM:+YA6^AX(:ZG^' );
define( 'NONCE_KEY',        ':;vvjWy /7 }+DuH@eY3w3xu`43+?2iVO~/BEGQM{u2z.PkOOqoh[PJPg;DP(I|z' );
define( 'AUTH_SALT',        '0Hah-QHN1Gv_<.mp-|)wg(et&=K-<RB?_MTbFr2O-<~,Ih7{XM}Qv=%BcmOm$j[J' );
define( 'SECURE_AUTH_SALT', '%E*&cg1h##SR^d<MFOG}ng*?MA*Art%IrV;LbiTa$gF3@_-y$gFWdRl|Vyh:^KU&' );
define( 'LOGGED_IN_SALT',   '1hG_$i)wOns|DobG?wZoMX{Tte8(o 6l4F:Sf.}ASqJ99#m_zL4,fCt5W:P1i0/4' );
define( 'NONCE_SALT',       'YAFqYbGY.mj1y  .(>/3Ce+@AF2Olqol|2],`NmpNRf}HS3N&&Txj;9^z5X&}$_.' );

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
