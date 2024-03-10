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
define( 'DB_NAME', 'salammassonrywp_db' );

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
define( 'AUTH_KEY',         '3S)-nnni#;BWz#me>!#Ql,=bW,rG~Odz53ED;|^-8V|00c,8_+?)-]xJq}[RQ@>y' );
define( 'SECURE_AUTH_KEY',  '%}mE2X56+>Rt~7-b=fHjtst<kmh?My$+6?,S=nQj}3Xjp8lS1D4qYB/~P$Ezc@t5' );
define( 'LOGGED_IN_KEY',    'b&2^?FRX>/#]a&){r!W6y*Z)p>w/]hW,bsHI(X]xd>_Cv |nhurvZMP6HLAjyTB2' );
define( 'NONCE_KEY',        'dPl#X+  T2b7Sexdnj(5<RZjw_KUi%LP]Qq]NsnPXN7Ufb[/@iaSI27bxckLh:Tc' );
define( 'AUTH_SALT',        'fTH/r)=V:g=_.W}w5m@SH`YGicjd(YD%~];/O-hMnqBrOl$<vIRh`8GL{`0Sx-oY' );
define( 'SECURE_AUTH_SALT', 'eTKtxAmw!JD6/?d~4T~4K?*Pur0)mh~09?sj$+^w6([rwkL{%%Zt!F#V[=!7j|af' );
define( 'LOGGED_IN_SALT',   'C75dv[Ze;(>,mD#p76Xld}b!eX$)vb%;,:#TpX0]I-[u)~tgmlf]7D&*Zg+<~|B&' );
define( 'NONCE_SALT',       'F3)/f.yYkRI3Iw^G`6^`D bY3 <T9FXZokjk~Mm5sHqFCh6v]CmxrX<bhhFFB*,w' );

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
