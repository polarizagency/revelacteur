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
define( 'DB_NAME', 'revelacteurwordpress' );

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
define( 'AUTH_KEY',         '>yKCq&}?&O*Y-_^P($[fLzKq5v7F>l*[Uc*Ugun&=da O4f;-j)g~s,7r<+y,&B+' );
define( 'SECURE_AUTH_KEY',  ',Bv[pD/.!/glhP_IryKDZIBA7|YF@E77!n}4(@iwC1`v,$:@F4AodpAu?)ScoJ+n' );
define( 'LOGGED_IN_KEY',    '9gx#rhkzKIJTSz;=@}mllp3K]awbt];~ml?,kNKEjq2eR1goz]$SB%PvFmx(&iE.' );
define( 'NONCE_KEY',        'N9QX8/sJi64r)Ly!I>ibPaRU49_nOr<cEfQZq.&HUFhj;RxgGESpHh]Z<|?%1Ff>' );
define( 'AUTH_SALT',        'AsXAR-TKE#RS^2,M9+@RTG{(FM4Ff5d@w(zU{(;7pvI[S&~sw0|`}2./Ji?$OPnF' );
define( 'SECURE_AUTH_SALT', '.v1MGDiMK?Np)}_DWl@`^AR* >iZ>k]9gAC2C-C$?Dv 9D.+}7W?WW?gEqe,6&&H' );
define( 'LOGGED_IN_SALT',   ']##Rr*4T/Kovo},]HyuJ3)J?FfOjl)I1 6]5yzTS-BC@i52xQ}4BK4)P&]bWTc/T' );
define( 'NONCE_SALT',       'a7p|o2+VO@+bp3f I{ekT$Jz|K}w+{CwU?M>9qTP^<gWBUr|[cB.)x4iGg[t1lrz' );

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
