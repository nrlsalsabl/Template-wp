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
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'fypmedia' );

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
define( 'AUTH_KEY',         'YzDwK:WC6M*442lG?buPhm1oS=JRJD{!#h18XVCBYq/Qq~vH`/&ec>d1f3(I];Jx' );
define( 'SECURE_AUTH_KEY',  'vwG|S2%SOD8qL(.:|&$1wF*z?|bdV%T+J<G5pS1R83!iW:yT<aoBOqG.%YmfB7je' );
define( 'LOGGED_IN_KEY',    '!KUdJ u* U{f*&7Y8m;YD(ChSqz:,)kY{VF?<O>lf:[Ns`|s6H6{:A!3t|vv[@&!' );
define( 'NONCE_KEY',        '<73B[*D=uDi1LmrpESoT^I->yMU8~O76?-k8_L^%(f6zF)S]hPON9e5rr$vSOftS' );
define( 'AUTH_SALT',        'Iq{ug}miYZ&YCbAV.!5t1)E8f8f/o[)`.OGKKj N8Yzz%L^sE8rq: [AmRK8m+S]' );
define( 'SECURE_AUTH_SALT', 'TrI&~u(@tY6FG=j4J[VwnYIO|7vJ1P+@x9U0Es<b>T0;v/PJ,p#>lFqy`9]u50)g' );
define( 'LOGGED_IN_SALT',   'mC N;lZcX?iMcwRQVTka.*YZ`Q}D;`e[Y1eC.GgPp@iGZ}74j0[l$BI[lD3 ESvP' );
define( 'NONCE_SALT',       'VfhgKQg{8YJw!_(G63Gd_-<VOKq+u|3N^!YY}[ n3of>zs/G#wm166AWm>Tw>[,b' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
