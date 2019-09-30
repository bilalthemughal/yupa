<?php
define('WP_CACHE', true);
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
define( 'DB_NAME', 'yupaasia_wp281' );

/** MySQL database username */
define( 'DB_USER', 'yupaasia_wp281' );

/** MySQL database password */
define( 'DB_PASSWORD', '279.pI6S(4' );

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
define( 'AUTH_KEY',         'zhls6dozwp2ndcd7y7oyria79863vf3ybyskkvplmnufphmij7sk1nufw4dib5pj' );
define( 'SECURE_AUTH_KEY',  '56b7llfzn3w8j5tz84szko1ikakdw4gfzaxqfisjw6fi5wvsdlo8qhhiz7xzne8p' );
define( 'LOGGED_IN_KEY',    'xmsz27cqwfpyyltvfdcwcgxq1gfhcwnq1dchnagkjt8ww0c7qqvv5jxfvxwpdmdp' );
define( 'NONCE_KEY',        '0nv6l7vgpyebpu215hmfgdmxvg4db296ciulsudbkua8khar1p1wjgj1jtmb0uzi' );
define( 'AUTH_SALT',        'csnxt9ufh2ngonvm5xwyauwqpcf71uqxbc7rnklsfggo1afe6zox2myg2den4xzd' );
define( 'SECURE_AUTH_SALT', 'fr2oku3jpceapxfej2njf7zwqhnqxkgvfw5dbtach6vc1wu0t0y36zwaa7r8l0ey' );
define( 'LOGGED_IN_SALT',   'jrgdgrth4ajdajndsafmngds5syuvkbgkdwik0m8tcbgamhomtmidm9lyk7lw0ar' );
define( 'NONCE_SALT',       'yozegg44wxblvuloums6lasatuyw5aajkrtw2c86c4aziyym4iryxacuvf1pmjru' );

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
