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
define( 'DB_NAME', 'gym' );

/** Database username */
define( 'DB_USER', 'root_gym' );

/** Database password */
define( 'DB_PASSWORD', 'juan2002' );

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
define( 'AUTH_KEY',         '&:iN?W)9t5*%tPl4v75W+NBwSclQ%YDQ|fPJZxk4tpgTF&65@oVHJ3>|^.zX+:52' );
define( 'SECURE_AUTH_KEY',  'yHX{W?`^U?Hn*<KYOCZ$T_.<PqS(=-a HrA$}W_m]Y()= nM]Z8pAxp;~b!!dxc>' );
define( 'LOGGED_IN_KEY',    'UO]~#Wk+3L~w4s?UF#gX8X.WkGPkIh$NAniUp8@J@03P.(fT$?ZkbdANR#DQm%u ' );
define( 'NONCE_KEY',        '9SHxJ||q!P,m{uTM0$SqV}gd:Tl@3rjL;%J-Eoue)>b~_$Jp4*WDu7h97;/e^oK/' );
define( 'AUTH_SALT',        'Nh?]!k7/Vb|.<R(fr50ua)YeLJ9nSL#bK|;oD*ew3U6n7d=^rAutNy?iF-VU9(+$' );
define( 'SECURE_AUTH_SALT', 'F9uo)~40~7+T@XIED1qv:sKF7D8~dV&oy|~hboB^2cw|1:lb<5WUnOa_V^Q_7xDn' );
define( 'LOGGED_IN_SALT',   'f&y:(:bYRB9Kd~:3TWD0(2Xy$IJ5  $lcpDU6ZUB{~rsg6U@hs2z;`8B{O5wXYpg' );
define( 'NONCE_SALT',       ')}TrG<O>q3Z}6idP@=a?C#,m}hC&-Q+`c2P[4DpTrH%13C#V@$:U6qDXT?[rBs7i' );

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
