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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         '?8S*0uR3^=3[xT|-@V$8 F=fR_nj.=Uz05k(rm7oI;8t|G?Tt5C+)_dUw;2oz-*[' );
define( 'SECURE_AUTH_KEY',  'U(T KMi:Lp[ulHbw0;q-& 9()t;2L%Go:Ij1DN)7<TQ}x->^kL|QZOCnw4tCO#RW' );
define( 'LOGGED_IN_KEY',    '^UoF1b~JI!(?`XTTyQuJo6&X_o3R6$UMf+)0o`uncJ:qt>EWyd.@*;4k@-u.^Azt' );
define( 'NONCE_KEY',        'cL^_prl2,OduQRuOjF3@[V9V).SU8 YV]rQ||DQa&]9R2XWtZOYs=qR6[NmVknhI' );
define( 'AUTH_SALT',        'U=@>]Lq_$;qb@T&qc>o~K(pe&9;VAF!dhLw@;-rJB^AUSlVQhI`){I($ndH%NgZy' );
define( 'SECURE_AUTH_SALT', 'd5wK6i$^V{**>Yi*lMH|S$CV. l)WF#I/lLkWRl$b7mJlfkH[<~N<NCL%!DLtK_D' );
define( 'LOGGED_IN_SALT',   'rqIB56@@o` +f6{j7yzxlMxYQ!*_0-(DwlH:WEk0to}A``C!+B.<[HL,&M ~zZ V' );
define( 'NONCE_SALT',       ';93;#]b$zMe&E}{KIV4K]aaH}1O+o4BmqYHu(o;>3h*cGbb*!wW1$7W$Z$>;BBNv' );

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
