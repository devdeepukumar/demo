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
define( 'DB_NAME', 'demo' );

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
define( 'AUTH_KEY',         'Y]u]ep}gF|8X{Q^JBeY)Fq>=*j~s[&*jDHr0@H[Z2N_fGR-We4Em)|/*7Mr&Jo7f' );
define( 'SECURE_AUTH_KEY',  ':5wAVA>Z?}0Zx/IX+LQxcC)#(6_m.loN]z }RSaC^`XYvT7u_0#<0^EtHD4eOAxs' );
define( 'LOGGED_IN_KEY',    'l[G_$hOQh[`GhB^2VVz-,KSPsD9Pp?)xCqd[j+VI*!XOZ!T0T1.e6v`Qm:kfex!#' );
define( 'NONCE_KEY',        's4p]wf8o([ZWl9d*{pkk.JusH1L~SwN01DD::j}yEPZUI_*@fajJvyfSws~[L6AP' );
define( 'AUTH_SALT',        'p#ajq~QU`=X&s-kZOgMR*i#Q,xj>5NpR&Hh BdLOdb*=#XvMmTH8gtHEwRjSb{{b' );
define( 'SECURE_AUTH_SALT', 'j.[B-Tda]NUGKYGt[|C?-X4S^KX)f5sR#9=Lfut4%,P4)]nj|[4Rl4rm$R65@&xw' );
define( 'LOGGED_IN_SALT',   '_B{5dKKML1/_tf{|(MEXCT@o~l:HYX28)JTq$xrO]Voz4#xb`UrS!4^~PfkGh08j' );
define( 'NONCE_SALT',       '}v/ucPLTS1Ybdy}_c(5?K{Pr=4/gX}h81VkPDynCBkG3L@pd=tw%QYZ_WD=]O{-D' );

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
