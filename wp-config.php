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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         '%3m;h.+Kg6,~td(#~+dnA:H0BFth]o54&#f:*7Kq?dld5:/g,.*=V!>sG7saJW1]' );
define( 'SECURE_AUTH_KEY',  '>X#FarUc&7(Kb!6~kT#Cvj8M+G2Bm:69uic8ojbw/CK0<tM$f[R8`YnGFI!Zw=3[' );
define( 'LOGGED_IN_KEY',    'wj] IZxP,|#r<rQ-x~(-vN$=;_?M3@}flOgB8]J1+^D,Z~Bo/)r >]OOY2GO4fNn' );
define( 'NONCE_KEY',        ' {O?uf?gq4(k9Ms}rlg1iH*g`y!n&Z:M7NhQofaMJ1!/Fmlh$H*cJ>rsh,6X4Yvj' );
define( 'AUTH_SALT',        'BX+Avs^&C`f^T}wo5;Ha{>%`Sd[86rM]AjYH?n+%XRuts1znTh={Bju(@.V_KXr~' );
define( 'SECURE_AUTH_SALT', 'DV_UU9O?~(%vEMAF,)K6M!2xm.;z5?WU*5/{T-M5L$m*aul,o!SLjV_[5*)HWo!d' );
define( 'LOGGED_IN_SALT',   'Xmi[@-H~_I1(#X^#~H65k&]|n&d+.xIt(M9Z]THGg|OMTpS;er)6/h~g1mFcj2+C' );
define( 'NONCE_SALT',       'ZlrGWK6rk^FI*Q1+YYajlw9]%K@r$~s;`@@b2jlOJdX-P(RkHb4Q{hth%KzSYR^/' );

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
